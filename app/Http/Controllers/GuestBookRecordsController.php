<?php

namespace App\Http\Controllers;

use App\GuestBookRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class GuestBookRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.guest-book', ['records' => GuestBookRecord::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\GuestBookRecordRequest $request)
    {
        $gbr = new GuestBookRecord($request->all());
        $gbr->save();

        return redirect()->back();
    }

    /**
     * Load records from file.
     *
     * @return Response
     */
    public function loadRecords(Request $request)
    {
        $validator = Validator::make($request->all(), ['file' => 'required'], ['required' => 'No file provided']);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else {
            $contents = file($request->file('file')->getRealPath());

            try {
                DB::beginTransaction();
                $properties = ['full_name', 'email', 'text'];
                foreach($contents as $lineNumber => $line) {
                    $gbr = new GuestBookRecord(array_combine($properties, explode(';', $line)));
                    $gbr->save();
                }
                DB::commit();

                return redirect()->back();
            }
            catch(\Exception $e) {
                DB::rollBack();
                $message = 'Invalid data provided at line ' . ($lineNumber +1) . " ('$line')";
                $messageBag = new MessageBag(['content' => $message]);

                return redirect()->back()->withErrors($messageBag);
            }

        }
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
