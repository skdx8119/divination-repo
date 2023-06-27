<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GptFortuneController extends Controller
{
    public function show(Request $request)
    {
        $client = new Client(['base_uri' => 'https://api.openai.com/v1/']);

        $response = $client->post('engines/davinci-codex/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'prompt' => 'Predict the future based on these information: ' . $request->input('info'),
                'max_tokens' => 100,
            ],
        ]);

        $result = json_decode((string) $response->getBody(), true);

        $fortune = $result['choices'][0]['text'];

        return view('gptfortune', ['fortune' => $fortune]);
    }
}
