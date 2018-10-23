<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Tip;
use Validator;

class TipController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tips = Tip::all();

        return $this->sendResponse($tips->toArray(), 'Tip retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);


        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $tip = Tip::create($input);


        return $this->sendResponse($tip->toArray(), 'Tip created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $guid
     * @return \Illuminate\Http\Response
     */
    public function show($guid)
    {
        $tip = Tip::find($guid);


        if (is_null($tip)) {
            return $this->sendError('Tip not found.');
        }


        return $this->sendResponse($tip->toArray(), 'Tip retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tip $tip)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);


        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $tip->title = $input['title'];
        $tip->description = $input['description'];
        $tip->save();


        return $this->sendResponse($tip->toArray(), 'Tip updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $guid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tip $tip)
    {
        Tip::find($tip->guid)->delete();


        return $this->sendResponse($tip->toArray(), 'Tip deleted softly ;-)');
    }
}
