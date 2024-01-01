<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showUpdateForm()
    {
        $admin = Auth::guard('admin')->user();
        if (!$admin) {
            // Handle unauthorized access
            abort(403, 'Unauthorized access');
        }
    
        $path = $admin->profile_picture;
        $url = asset('storage/' . $path);
    
        return view('admin.data_admin.data_admin', ['url' => $url]);
    }
    

    public function updateProfile(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'current_password' => 'required|string',
            'password' => 'nullable|string|min:6|confirmed',
            'password_confirmation' => 'nullable|string|min:6',
        ]);
    
        $admin = Auth::guard('admin')->user();
    
        // Check if the current password matches the user's current password
        if (!Hash::check($request->current_password, $admin->password)) {
            throw ValidationException::withMessages(['current_password' => ['The current password is incorrect']]);
        }
    
        // Update username
        $admin->username = $request->username;
    
        // Update password if provided
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
    
        $admin->save();
    
        return redirect()->route('admin.update.profile.form')->with('success', 'Profile updated successfully');
    }
    


public function updateProfilePicture(Request $request)
{
    $request->validate([
        'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $admin = Auth::guard('admin')->user();

    // Update profile picture if provided
    if ($request->hasFile('profile_picture')) {
        $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        $admin->profile_picture = $imagePath;
        $admin->save();

        return redirect()->route('admin.update.profile.form')->with('success', 'Profile picture updated successfully');
    }

    return redirect()->route('admin.update.profile.form')->with('error', 'Failed to update profile picture');
}
}