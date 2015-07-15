<?php

namespace App\Http\Controllers;

use App\EducationTest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EducationTestRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EducationTestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('education.test-results', ['testResults' => EducationTest::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('education.test', [
            'groups' => EducationTest::groups(),
            'answerThreeAlternatives' => EducationTest::answerThreeAlternatives()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(EducationTestRequest $request)
    {
        $et = new EducationTest($request->all());
        $et->answer_one = $request->input('answer_one','');
        $et->answer_two = json_encode(array_values($request->input('answer_two', [])));
        $et->answer_three = $request->input('answer_three','');
        $et->save();

        return view('education.test-passed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
