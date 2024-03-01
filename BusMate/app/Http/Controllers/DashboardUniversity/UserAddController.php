<?php

namespace App\Http\Controllers\DashboardUniversity;

use App\Models\year;

use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use App\Models\Dashboard_user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class UserAddController extends Controller
{
    /**
     * Display a listing of the User all data.
     */
    public function index()
    {
        $user = Dashboard_user::get();
        return view('DashboardUniversity.AddUser.user_table')->with('user', $user);
    }

    /**
     * Show the form for creating a new User.
     */
    public function create()
    {
        return view('DashboardUniversity.AddUser.add_user');
    }

    /**
     * Store a newly created User in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'user_name' => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:6'],
                'phone_number' => ['required', 'regex:/^09\d{8}$/'],
                'role' => ['required']
            ]
        );
        $user = $request->only(['user_name', 'email', 'password', 'phone_number', 'role']);
        $user['password'] = Hash::make($user['password']);
        $year_id = year::latest('year_id')->first();
        $user['year_id'] = $year_id->year_id;
        Dashboard_user::create($user);

        return redirect()->route('UniversityUserAdd.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(string $id)
    {
        try {

            return view('DashboardUniversity.AddUser.edit_user')->with('edit_user', Dashboard_user::findOrFail($id));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found');
        }
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate(
            [
                'user_name' => ['required', 'regex:/^[\pL\s\-]+$/u'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:6'],
                'phone_number' => ['required', 'regex:/^09\d{8}$/'],
                'role' => ['required']
            ]
        );

        try {
            $user = Dashboard_user::findOrFail($id);
            $user->update($request->only('user_name', 'email', 'password', 'phone_number', 'role'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found');
        }
        return redirect()->route('UniversityUserAdd.index');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = Dashboard_user::findOrFail($id);
            $user->delete();
            return redirect()->route('UniversityUserAdd.index');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found');
        }
    }
}
