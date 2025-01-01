<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();

        return Inertia::render('Admin/Admins/index', [
            'users' => $users,
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->email === 'admin@gmail.com') {
            return response()->json([
                'message' => 'You cannot delete the admin user.',
            ], 400);
        }

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully.',
        ], 200);
    }

}
