<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use DB;

class ProfileController extends Controller
{

    public function index()
    {
        return view('admin.profilesss');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $rules = [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ];

        if ($request->filled('password')) {
            $rules['password'] = ['confirmed', Password::min(8)->mixedCase()->numbers()->symbols()];
        }

        $request->validate($rules);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile successfully updated!');
    }

public function allusers(Request $request)
{
    if ($request->isMethod('post')) {
        if ($request->input('_clear')) {
            $request->session()->forget('user_filters');
            return redirect()->route('admin.manage-users');
        }

        $filters = $request->only(['name', 'email', 'phone', 'city', 'role']);
        // Remove empty filters
        $filters = array_filter($filters, function($value) {
            return !empty($value);
        });

        $request->session()->put('user_filters', $filters);
        return redirect()->route('admin.manage-users');
    }

    $filters = $request->session()->get('user_filters', []);

    $query = User::query();

    if (isset($filters['name']) && $filters['name']) {
        $query->where('name', 'like', '%' . $filters['name'] . '%');
    }

    if (isset($filters['email']) && $filters['email']) {
        $query->where('email', 'like', '%' . $filters['email'] . '%');
    }

    if (isset($filters['phone']) && $filters['phone']) {
        $query->where('phone', 'like', '%' . $filters['phone'] . '%');
    }

    if (isset($filters['city']) && $filters['city']) {
        $query->where('city', 'like', '%' . $filters['city'] . '%');
    }

    if (isset($filters['role']) && $filters['role']) {
        $query->where('role', $filters['role']);
    }

    $users = $query->orderBy('id', 'desc')->paginate(50);

    $totalUsers     = User::count();
    $totalAdmins    = User::where('role', 'admin')->count();
    $totalPandits   = User::where('role', 'pandit')->count();
    $totalCustomers = User::where('role', 'user')->count();

    return view('admin.manage-users', compact(
        'users','totalUsers','totalAdmins','totalPandits','totalCustomers','filters'
    ));
}


    public function delete($id)
{
    User::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'User deleted successfully');
}


}