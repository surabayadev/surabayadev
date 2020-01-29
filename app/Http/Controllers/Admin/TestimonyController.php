<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::with('user')->latest('status')->latest()->paginate(10);
        $data = [
            'title' => 'Manage Testimonies',
            'testimonies' => $testimonies
        ];
        return view('admin::contents.testimonies.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Testimony',
            'userDropdown' => User::select('name', 'id')->get()->pluck('name', 'id'),
        ];
        return view('admin::contents.testimonies.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required_if:user_id,null',
            'email' => 'required_if:user_id,null',
            'status' => 'required',
            'content' => 'required'
        ]);

        Testimony::create($request->all());

        return redirect()->route('admin.testimonies.index')->withAlert([
            'type' => 'success',
            'title' => 'Successfully created!',
        ]);
    }

    public function edit($id)
    {
        $testimony = Testimony::findOrFail($id);
        $data = [
            'title' => 'Edit Testimony',
            'userDropdown' => User::select('name', 'id')->get()->pluck('name', 'id'),
            'testimony' => $testimony
        ];
        return view('admin::contents.testimonies.edit', $data);
    }

    public function update($id, Request $request)
    {
        $testimony = Testimony::findOrFail($id);
        
        $this->validate($request, [
            'name' => 'required_if:user_id,null',
            'email' => 'required_if:user_id,null',
            'status' => 'required',
            'content' => 'required'
        ]);

        $testimony->fill($request->all());
        if ($request->get('user_id')) {
            $testimony->name = null;
            $testimony->email = null;
            $testimony->job = null;
            $testimony->avatar = null;
        }
        $testimony->save();
        
        return redirect()->route('admin.testimonies.index')->withAlert([
            'type' => 'success',
            'title' => 'Successfully updated!',
        ]);
    }

    public function destroy($id)
    {
        $testimony = Testimony::findOrFail($id);
        $testimony->delete();
        
        return redirect()->route('admin.testimonies.index')->withAlert([
            'type' => 'success',
            'title' => 'Successfully deleted!',
        ]);
    }
}
