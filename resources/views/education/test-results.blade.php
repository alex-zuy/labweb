@extends('app')

@section('title')
    Education test results
@endsection

<?php
/**
 * Passed variables:
 * @var App\EducationTest $testResults
 */
?>

@section('content')
    <h1>Test results</h1>
    <p>
        Some results
    </p>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th rowspan='2'>Full name</th>
            <th rowspan='2'>Passing date</th>
            <th colspan='3'>Answers</th>
        </tr>
        <tr>
            <th>№1</th><th>№2</th><th>№3</th>
        </tr>
        </thead>
        <tbody>
            @foreach($testResults as $tr)
                <tr>
                    <td>{{$tr->full_name}}</td>
                    <td>{{ PrettyDate::parse($tr->created_at)->toDayDateTimeString() }}</td>
                    <td class="{{$tr->isAnswerOneCorrect() ? 'success' : 'danger'}}">{{$tr->answer_one}}</td>
                    <td class="{{$tr->isAnswerTwoCorrect() ? 'success' : 'danger'}}">{{implode(', ', $tr->answerTwo())}}</td>
                    <td class="{{$tr->isAnswerThreeCorrect() ? 'success' : 'danger'}}">{{$tr->answer_three}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
