<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    public function showDashboard()
    {
        return view('produit'); // Replace 'yourViewNameHere' with the actual name of your Blade file
    }

    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function loginPost(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ]);

    $credentials = $request->only(['email', 'password']);

    // Show loader before attempting login
    echo "<script>showLoader();</script>";

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        
        if ($user->is_suspended) {
            // Hide loader after login attempt and redirect back with error message
            echo "<script>hideLoader();</script>";
            return redirect()->back()->withErrors([
                'email' => 'Your account has been suspended. Please contact the administrator.',
            ]);
        }

        // Hide loader after successful login and redirect
        echo "<script>hideLoader();</script>";
        return redirect()->intended(route('home')); // Assuming 'home' is the route name for your dashboard
    }
    
    // Flash an error message to the session if authentication fails
    // Hide loader after login attempt (whether successful or not)
    echo "<script>hideLoader();</script>";
    return redirect()->back()->withInput($request->only('email'))->withErrors([
        'email' => 'Login failed. Please check your username and password and try again.',
    ]);
}

    
    public function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add validation for the image
        ]);

        // Handle file upload
        if ($request->hasFile('profile_image')) {
            $imageName = time().'.'.$request->profile_image->extension();  
            $request->profile_image->storeAs('public/profile_images', $imageName);
            $profileImagePath = 'profile_images/' . $imageName;
        } else {
            $profileImagePath = null; // Or set a default image path
        }

        // Creating the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image' => $profileImagePath, // Save the image path
        ]);

        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration failed, please try again.");
        }

        return redirect(route('login'))->with("success", "Registration successful, please log in to access the app.");
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
