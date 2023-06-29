<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FortuneController extends Controller
{
    public function show(Request $request)
    {
        $blood_type = $request->input('blood_type');
        $birthday = $request->input('birthday');

        // 占いのロジックはここに実装します。
        // ここではサンプルとしてダミーデータを返します。
        $fortune = 'You will have a great day!';

        return view('fortune.show', ['fortune' => $fortune]);
    }
}

