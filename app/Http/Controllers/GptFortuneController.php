<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\OpenAI;
use OpenAI\API\Completion;
use OpenAI\Laravel\Facades\OpenAI;

class GptFortuneController extends Controller
{
    public function show(Request $request)
    {
        OpenAI::setApiKey(env('OPENAI_API_KEY'));

        $prompt = 'Predict the future based on these information: ' . $request->input('info');

        $gpt = Completion::create([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'max_tokens' => 100
        ]);

        $fortune = $gpt->toArray()['choices'][0]['text'];

        return view('gptfortune', ['fortune' => $fortune]);
    }
}
