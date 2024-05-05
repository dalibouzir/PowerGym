<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->user()->isAdmin1()) {
            abort(403);
        }

        $searchQuery = $request->input('query');
        $users = User::query()
                     ->when($searchQuery, function ($query) use ($searchQuery) {
                         return $query->where('name', 'LIKE', "%{$searchQuery}%")
                                      ->orWhere('email', 'LIKE', "%{$searchQuery}%");
                     })
                     ->paginate(10);

        return view('role', compact('users'));
    }

    public function destroy(User $user)
    {
        if (!auth()->user()->isAdmin1()) {
            abort(403);
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User removed successfully!');
    }

    public function updateRole(Request $request, User $user)
    {
        if (!auth()->user()->isAdmin1()) {
            abort(403);
        }

        $validated = $request->validate(['role' => 'required|string']);
        $user->update(['role' => $validated['role']]);

        return redirect()->route('admin.users.index')->with('success', 'User role updated successfully!');
    }
}
