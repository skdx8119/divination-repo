<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'blood_type' => 'required|string',
            'birthday' => 'required|date',
        ]);

        $user = Auth::user();
        $user->blood_type = $request->blood_type;
        $user->birthday = $request->birthday;
        $user->save();

        return back()->with('status', 'Profile updated!');
    }

    public function fortune()
    {
        $user = Auth::user();

        // 占い結果をランダムに生成（実際にはもっと複雑なロジックになるかもしれません）
        $fortune = 'Your fortune for today is: ' . Str::random(10);

        return view('fortune.show', ['fortune' => $fortune]);
    }


}
