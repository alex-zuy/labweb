<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationTest extends Model
{
    protected $fillable = ['full_name', 'gender', 'group'];

    public function answerTwo()
    {
        return json_decode($this->answer_two);
    }

    public function isAnswerOneCorrect()
    {
        return $this->answer_one === 'electrons';
    }

    public function isAnswerTwoCorrect()
    {
        $correct = ['force'];
        $actual = $this->answerTwo();

        return self::arrayValuesEqual($correct, $actual);
    }

    public function isAnswerThreeCorrect()
    {
        return $this->answer_three === 'Newton';
    }

    private static function arrayValuesEqual($array1, $array2)
    {
        return count(array_intersect($array1, $array2)) == count($array1);
    }

    public static function answerThreeAlternatives()
    {
        $scientists = ['Bor', 'Newton', 'Einstein', 'Reserford'];

        return array_combine($scientists, $scientists);
    }

    public static function groups()
    {
        $groups = [
            'И11',
            'И12',
            'И13',
            'И21',
            'И22',
            'И23',
            'И31',
            'И32',
            'И33',
            'И41',
            'И42',
            'И43',
        ];

        return array_combine($groups, $groups);
    }
}
