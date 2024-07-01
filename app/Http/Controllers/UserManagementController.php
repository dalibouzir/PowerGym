<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    // Display all users with search functionality
    public function index(Request $request)
    {
        // Check if the current user is authorized (admin)
        if (!auth()->user()->isAdmin1()) {
            abort(403);
        }

        // Retrieve users based on search query if provided
        $searchQuery = $request->input('query');
        $users = User::query()
                     ->when($searchQuery, function ($query) use ($searchQuery) {
                         return $query->where('name', 'LIKE', "%{$searchQuery}%")
                                      ->orWhere('email', 'LIKE', "%{$searchQuery}%");
                     })
                     ->paginate(10);

        return view('role', compact('users'));
    }

    // Suspend a user
    public function suspend(User $user)
    {
        // Check if the current user is authorized (admin)
        if (!auth()->user()->isAdmin1()) {
            abort(403);
        }

        // Update the user's data to mark them as suspended
        $user->update(['is_suspended' => true]);

        return redirect()->route('admin.users.index')->with('success', 'User suspended successfully!');
    }

    // Unsuspend a user
    public function unsuspend(User $user)
    {
        // Check if the current user is authorized (admin)
        if (!auth()->user()->isAdmin1()) {
            abort(403);
        }

        // Update the user's data to mark them as unsuspended
        $user->update(['is_suspended' => false]);

        return redirect()->route('admin.users.index')->with('success', 'User unsuspended successfully!');
    }

    // Delete a user
    public function destroy(User $user)
    {
        // Check if the current user is authorized (admin)
        if (!auth()->user()->isAdmin1()) {
            abort(403);
        }

        // Delete the user from the database
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User removed successfully!');
    }

    // Update user role
    public function updateRole(Request $request, User $user)
    {
        // Check if the current user is authorized (admin)
        if (!auth()->user()->isAdmin1()) {
            abort(403);
        }

        // Validate the role update request
        $validated = $request->validate(['role' => 'required|string']);
        
        // Update the user's role
        $user->update(['role' => $validated['role']]);

        return redirect()->route('admin.users.index')->with('success', 'User role updated successfully!');
    }
}
