<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirectToDashboard()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('user')) {
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->route('home');
        }
    }
}
