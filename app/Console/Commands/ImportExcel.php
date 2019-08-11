<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Imports\UserImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel {type} {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import something';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // dd('here argument value: ', $this->argument('type'), $this->argument('file'));
        // Excel::import(new UserImport, resource_path('excels/01-2016_Laravel-API.csv'));

        $file = $this->argument('file') ?: '01-2016_Laravel-API.csv';
        $file = resource_path('excels/'. $file);

        $this->output->title('Starting import');

        $data = new UserImport;
        $data->withOutput($this->output)->import($file);

        $this->output->success('√ Import successful');

        // Display the report
        $this->table(['Report Result'], [
            ['Total Row:', $data->totalRow],
            ['Skipped Row:', $data->skippedRow],
            ['Inserted Row:', $data->insertedRow],
        ]);
    }
}
