<?php

namespace App\Imports;

use App\Models\Role;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class UserImport implements ToModel, WithStartRow, WithProgressBar
{
    use Importable;

    public $totalRow = 0;
    public $insertedRow = 0;
    public $skippedRow = 0;

    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        // dump($row);
        ++$this->totalRow;

        $data = $this->filterUserData($row);
        if (!$data) {
            ++$this->skippedRow;
            return;
        }
        
        ++$this->insertedRow;

        return new User([
            'role_id' => Role::USER,
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt('secret'),
            'province' => 'Jawa Timur',
            'city' => 'Surabaya',
            'address' => $data['address'],
            'phone' => $data['phone'],
            'job' => $data['job'],
            'company' => $data['company'],
            'facebook' => $data['facebook'],
            'telegram' => $data['telegram'],
        ]);
    }

    protected function filterUserData(array $row)
    {
        // Manually adjust which column value
        $job = null;
        $telegram = null;
        $facebook = null;

        // Data Volunteer
        // $name = ucwords(trim($row[2]));
        // $email = strtolower(trim($row[1]));
        // $phone = trim($row[3]);
        // $address = ucwords(trim($row[6]));
        // $company = ucwords(trim($row[4]));
        // $facebook = null;

        // Laravel API 2016
        // $name = ucwords(trim($row[1]));
        // $email = strtolower(trim($row[2]));
        // $phone = trim($row[3]);
        // $address = ucwords(trim($row[4]));
        // $company = ucwords(trim($row[5]));
        // $facebook = trim($row[6]);

        // Laravel Swagger 2017
        // $name = ucwords(trim($row[1]));
        // $email = strtolower(trim($row[3]));
        // $phone = trim($row[2]);
        // $address = null;
        // $company = ucwords(trim($row[4]));
        // $job = ucwords(trim($row[6]));

        // Uinsa 2018
        // $name = ucwords(trim($row[3]));
        // $email = strtolower(trim($row[2]));
        // $phone = trim($row[4]);
        // $address = null;
        // $company = ucwords(trim($row[5]));
        // $job = ucwords(trim($row[6]));
        // $telegram = trim($row[7]);

        // Nuxtjs 2019
        $name = ucwords(trim($row[2]));
        $email = strtolower(trim($row[1]));
        $phone = trim($row[3]);
        $address = null;
        $company = ucwords(trim($row[4]));
        $job = ucwords(trim($row[5]));


        // 1. check name
        if (!$name) {
            return false;
        }

        // 2. check if email exists
        $emailExists = User::where('email', $email)->count();
        if ($emailExists) {
            return false;
        }

        // 3. check if username exists
        $username = str_slug(strtolower($name));
        $usernameExists = User::where('username', $username)->count();
        if ($usernameExists) {
            return false;
        }

        // 4. filter facebook
        if (!empty($facebook)) {
            // 4.1 if contains space
            if (preg_match('/\s/', $facebook)) {
                $facebook = null;
            }
            // 4.2 if valid url
            if (filter_var($facebook, FILTER_VALIDATE_URL)) {
                $facebook = basename($facebook);
            }
        }

        // 5. filter phone
        $phone = (integer) $phone;

        // 6. filter telegram
        if ($telegram) {
            $telegram = str_replace('@', '', $telegram);
        }

        return [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'address' => $address,
            'phone' => $phone,
            'job' => $job,
            'company' => $company,
            'facebook' => $facebook,
            'telegram' => $telegram,
        ];
    }
}
