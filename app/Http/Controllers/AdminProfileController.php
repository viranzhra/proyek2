<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showUpdateForm()
    {
        $admin = Auth::guard('admin')->user();
        $path = $admin->profile_picture_path;

        // Assuming the profile pictures are stored in the 'public' disk
        $url = asset('storage/' . $path);

        return view('admin/data_admin/data_admin', ['url' => $url]);
    }

    public function updateProfile(Request $request)
    {
        try {
            $request->validate([
                'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'username' => 'required|string|max:255',
                'password' => 'nullable|string|min:6|confirmed',
                'password_confirmation' => 'nullable|string|min:6',
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('admin.update.profile.form')->withErrors($e->errors())->withInput();
        }

        $admin = Auth::guard('admin')->user();

        // Update username
        $admin->username = $request->username;

        // Update password if provided
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        // Update profile picture if provided
        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $admin->profile_picture_path = $imagePath;
        }

        $admin->save();

        return redirect()->route('admin.update.profile.form')->with('success', 'Profile updated successfully');
    }
}