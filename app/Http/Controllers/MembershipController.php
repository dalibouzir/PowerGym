<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class MembershipController extends Controller
{
    // Handle the form submission
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:memberships',
                'phone' => 'required|string|max:15',
                'membership_type' => 'required|string',
                'paid' => 'required|boolean',
            ]);

            Membership::create($request->all());

            return back()->with('success', 'Your membership form has been submitted successfully!');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    // Display all membership submissions to the admin
    public function index()
    {
        $memberships = Membership::all();
        return view('memberships.admin_index', compact('memberships'));
    }

   
    public function approve($id)
    {
        $membership = Membership::find($id);
        
        if (!$membership || !$membership->paid) {
            return back()->with('error', 'Membership is not marked as paid or does not exist.');
        }
        

        $user = User::create([
            'name' => $membership->name,
            'email' => $membership->email,
            'password' => Hash::make($membership->phone),
        ]);
        

        $membership->delete();
        
        return back()->with('success', 'Membership approved and user account created.');
    }
    
}
