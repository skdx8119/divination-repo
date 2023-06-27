<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class GptFortuneController extends Controller
{
    public function generateFortune($inputInfo) {
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003', // 2023年6月現在、利用可能なエンジン名に置き換えてください
            'prompt' => 'Predict the future based on these information: '.$inputInfo,
            'temperature' => 0.8,
            'max_tokens' => 150,
        ]);
        return $result['choices'][0]['text'];
    }

    public function show(Request $request)
    {
        OpenAI::setApiKey(env('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'));

        $inputInfo = $request->input('info');
        if ($inputInfo != null) {
            $fortune = $this->generateFortune($inputInfo);

            $messages = [
                ['title' => 'User Info', 'content' => $inputInfo],
                ['title' => 'Fortune', 'content' => $fortune]
            ];
            return view('gptfortune', ['messages' => $messages]);
        }

        return view('gptfortune');
    }

}
