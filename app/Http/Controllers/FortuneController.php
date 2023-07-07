<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class FortuneController extends Controller
{
    public function show(Request $request)
    {
        try {

        $request->validate([
            'blood_type' => ['required', Rule::in(['A', 'B', 'O', 'AB'])],
            'birthday' => 'required|date',
        ]);

        $blood_type = $request->input('blood_type');
        $zodiac = $this->getZodiac(new \DateTime($request->input('birthday')));
        $element = $this->getElementFromZodiac($zodiac);

        // fortunes configから占い結果を取得
        $fortune = config("fortunes.$blood_type.$zodiac");

        // ラッキーアイテムはランダムで選びます
        $lucky_items = ['ぺん', 'ちくわ', 'コーヒー', 'ひまわり', '時計', 'モノクル', 'パンダ', 'まめねこ', 'ライトノベル', 'またたび' ,'試験管' ,'マイク' ,'サイリウム' ,'うちわ'];
        $lucky_item = $lucky_items[array_rand($lucky_items)];

        // 相性の良い人を取得します
        $compatible_people = $this->getCompatiblePeople($blood_type, $element);

        if ($compatible_people) {
            $compatible_person = $compatible_people[array_rand($compatible_people)];
            $compatible_blood_type = $compatible_person['blood_type'];
            $compatible_birthday = $compatible_person['birthday'];
            $compatible_person_name = $compatible_person['name'];
        } else {
            $compatible_person = null;
            $compatible_blood_type = null;
            $compatible_birthday = null;
            $compatible_person_name = null;
        }

        return view('fortune.show', [
            'fortune' => $fortune,
            'lucky_item' => $lucky_item,
            'compatible_person' => $compatible_person_name,
            'blood_type' => $blood_type,
            'zodiac' => $zodiac,
            'compatible_blood_type' => $compatible_blood_type,
            'compatible_birthday' => $compatible_birthday,
        ]);
    } catch (\Exception $e) {
        return back()->withErrors(['msg' => $e->getMessage()]);
    }

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

    private function getElementFromZodiac($zodiac)
    {
        $elements = [
            'Aries' => 'Fire',
            'Taurus' => 'Earth',
            'Gemini' => 'Air',
            'Cancer' => 'Water',
            'Leo' => 'Fire',
            'Virgo' => 'Earth',
            'Libra' => 'Air',
            'Scorpio' => 'Water',
            'Sagittarius' => 'Fire',
            'Capricorn' => 'Earth',
            'Aquarius' => 'Air',
            'Pisces' => 'Water',
        ];

        if (array_key_exists($zodiac, $elements)) {
            return $elements[$zodiac];
        } else {
            throw new \Exception('Invalid zodiac');
        }
    }
    private function getCompatiblePeople($blood_type, $element)
{
    $compatible_people = [];

    // 同じ血液型の相性の良い人を取得
    $same_blood_type_compatible_people = config("compatibles.$blood_type");
    if ($same_blood_type_compatible_people) {
        $compatible_people = array_merge($compatible_people, $same_blood_type_compatible_people[$element] ?? []);
    }

    // 血液型が~型の場合は-型も考慮します
    if ($blood_type === 'A') {
        $compatible_people = array_merge($compatible_people, config("compatibles.O.$element") ?? []);
    }

    if ($blood_type === 'B') {
        $compatible_people = array_merge($compatible_people, config("compatibles.AB.$element") ?? []);
    }

    if ($blood_type === 'O') {
        $compatible_people = array_merge($compatible_people, config("compatibles.A.$element") ?? []);
        $compatible_people = array_merge($compatible_people, config("compatibles.O.$element") ?? []);
    }

    if ($blood_type === 'AB') {
        $compatible_people = array_merge($compatible_people, config("compatibles.B.$element") ?? []);
    }

    return $compatible_people;
}


}
