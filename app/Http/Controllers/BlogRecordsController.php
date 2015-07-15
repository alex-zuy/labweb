<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\BlogRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\BlogRecordRequest;
use Illuminate\Support\MessageBag;

class BlogRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perPage = $request->session()->get('blog-records-per-page', 3);

        return view('blog.my-blog', ['records' => BlogRecord::paginate($perPage)]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setRecordsPerPage(Request $request)
    {
        $request->session()->set('blog-records-per-page', $request->input('per-page'));

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $perPage = session('blog-records-per-page', 3);

        return view('admin.blog.create-record', [
            'records' => BlogRecord::paginate($perPage),
            'method' => 'POST',
            'url' => action('BlogRecordsController@store')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\BlogRecordRequest $request)
    {
        $br = new BlogRecord($request->all());
        if($request->hasFile('image')) {
            $filePath = $request->file('image')->getRealPath();
            $file = fopen($filePath, 'rb');
            $content = fread($file, filesize($filePath));
            fclose($file);
            $mimeType = $request->file('image')->getMimeType();

            $br->image_data = base64_encode($content);
            $br->image_mime_type = $mimeType;
        }
        $br->save();

        return redirect()->back();
    }

    public function fetchImage($blogId)
    {
        $br = BlogRecord::findOrFail($blogId);

        if(config('database.default') == 'pgsql') {
            $data = stream_get_contents($br->image_data); //for postgres
        }
        else {
            $data = $br->image_data;    //for mysql
        }

        return response(base64_decode($data), 200, ['Content-Type' => $br->image_mime_type]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function loadFromFile(Request $request)
    {
        $validator = Validator::make($request->all(), ['file' => 'required'], [
            'required' => 'No file provided']);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        else {
            $contents = file($request->file('file')->getRealPath());
            try {
                DB::beginTransaction();
                foreach($contents as $lineNumber => $line) {
                    $record = array_combine(['subject', 'text', 'created_at'], str_getcsv($line));
                    $recordsValidator = Validator::make($record, BlogRecordRequest::getValidationRules());
                    if($recordsValidator->fails()) {
                        throw new \Exception;
                    }
                    else {
                        $br = new BlogRecord($record);
                        $br->save();
                    }
                }
                DB::commit();

                return redirect()->back();
            }
            catch(\Exception $e) {
                DB::rollBack();

                return redirect()->back()
                    ->withErrors(new MessageBag(['Line number' => $lineNumber]));
            }
        }
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
    public function edit(Request $request)
    {
        $blogRecord = BlogRecord::findOrFail($request->input('blog_record_id'));

        return view('admin.blog.record-form', [
            'blogRecord' => $blogRecord,
            'method' => 'PATCH',
            'url' => action('BlogRecordsController@update')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $id = $request->input('blog_record_id');

        $blogRecord = BlogRecord::findOrFail($id);

        $validator = Validator::make($request->all(), BlogRecordRequest::getValidationRules());

        if($validator->fails()) {

            $html = view('admin.blog.record-form', [
                'blogRecord' => $blogRecord,
                'method' => 'PATCH',
                'url' => action('BlogRecordsController@update')])
                ->withErrors($validator)
                ->render();

            return response()->json(['status' => 'retry', 'html' => $html]);
        }
        else {
            $blogRecord->subject = $request->input('subject');
            $blogRecord->text = $request->input('text');
            $blogRecord->save();

            return response()->json(['status' => 'success']);
        }
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
