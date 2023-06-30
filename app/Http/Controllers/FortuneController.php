<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FortuneController extends Controller
{
    public function show(Request $request)
    {
        $request->validate([
            'blood_type' => ['required', Rule::in(['A', 'B', 'O', 'AB'])],
            'birthday' => 'required|date',
        ]);

        $blood_type = $request->input('blood_type');
        $zodiac = $this->getZodiac(new \DateTime($request->input('birthday')));

        $fortune = config("fortunes.$blood_type.$zodiac");

        return view('fortune.show', ['fortune' => $fortune]);
    }

    private function getZodiac(\DateTime $birthday)
    {
        $zodiacs = [
            'Aquarius' => ['start' => '01-21', 'end' => '02-19'],
            'Pisces' => ['start' => '02-20', 'end' => '03-20'],
            'Aries' => ['start' => '03-21', 'end' => '04-20'],
            'Taurus' => ['start' => '04-21', 'end' => '05-20'],
            'Gemini' => ['start' => '05-21', 'end' => '06-21'],
            'Cancer' => ['start' => '06-22', 'end' => '07-22'],
            'Leo' => ['start' => '07-23', 'end' => '08-23'],
            'Virgo' => ['start' => '08-24', 'end' => '09-23'],
            'Libra' => ['start' => '09-24', 'end' => '10-23'],
            'Scorpio' => ['start' => '10-24', 'end' => '11-22'],
            'Sagittarius' => ['start' => '11-23', 'end' => '12-21'],
            'Capricorn' => ['start' => '12-22', 'end' => '01-20'],
        ];

        foreach ($zodiacs as $zodiac => $range) {
            $start = new \DateTime($birthday->format('Y') . '-' . $range['start']);
            $end = new \DateTime($birthday->format('Y') . '-' . $range['end']);

            if ($birthday >= $start && $birthday <= $end) {
                return $zodiac;
            }
        }

        throw new \Exception('Invalid birthday');
    }
}
