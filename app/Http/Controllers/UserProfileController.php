<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->update(
            $request->validate([
                'blood_type' => 'required|string|max:2',
                'birthday' => 'required|date',
            ])
        );

        return redirect()->route('fortune.show', ['blood_type' => $user->blood_type, 'birthday' => $user->birthday->format('Y-m-d')]);
    }
}
