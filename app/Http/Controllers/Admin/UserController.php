<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::filterable()->latest()->paginate(10);
        $data = [
            'title' => 'User List',
            'users' => $users,
            'userCount' => User::count(),
            'editorCount' => User::byEditor()->count(),
            'memberCount' => User::byMember()->count(),
        ];
        return view('admin::contents.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create User',
        ];
        return view('admin::contents.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->offsetSet('password_confirmation', $request->password);
        $this->validate($request, User::validationRules());

        $user = $this->processToDatabase($request);

        return redirect()->route('admin.user.index')->withAlert([
            'type' => 'success',
            'title' => 'User "'. $user->name .'" Successfully created',
        ]);
    }

    public function show($id)
    {
        //
    }
    
    public function profile()
    {
        $user = auth()->user();
        $data = [
            'title' => 'My Profile',
            'isProfile' => true,
            'user' => $user,
        ];
        return view('admin::contents.users.edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $user->phone = str_replace('+62', '', $user->phone);
        $data = [
            'title' => 'Edit User: ' . $user->title,
            'user' => $user,
        ];
        return view('admin::contents.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$request->password) {
            $request->offsetUnset('password');
        }

        $this->validate($request, User::validationRules($id));

        $user = $this->processToDatabase($request, $id);

        return redirect()->route('admin.user.index')->withAlert([
            'type' => 'success',
            'title' => 'User "'. $user->name .'" Successfully updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->withAlert([
            'type' => 'success',
            'title' => 'User "'. $user->name .'" Successfully soft-deleted',
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    private function processToDatabase(Request $request, $id = null)
    {
        if (!str_contains($request->phone, '+62')) {
            $request->offsetSet('phone', '+62'. $request->phone);
        }

        $user = $id ? User::findOrFail($id) : new User;
        $user->fill($request->all());

        if (empty($id)) {
            $user->password = bcrypt($request->password);
        }

        if (!$user->save()) {
            return false;
        }

        return $user;
    }
}
