<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Twine;
use Session;

class TwineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $twines = Twine::all();

        return view('twine.index')->with([
            "twines" => $twines
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('twine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Validate the request data
        $this->validate($request, [
            'type' => 'required|min:3',
            'title' => 'required|min:3',
            'starter' => 'required|min:3',
        ]);

        #add to the database
        $title = $request->input('title');

        $twine = new Twine();

        $twine->type = $request->input('type');//$twine->type_id = $request->type_id;
        $twine->title = $request->input('title');
        $twine->starter = $request->input('starter');//$twine->starter_id = $request->starter_id;
        //$twine->author_id = $request->author()->id;
        $twine->save();

        #feedback to user
        Session::flash('flash_message', 'You have started a new twine titled: '.$twine->title);

        return redirect('/twines');
        // return 'Process creating a new twine: '.$title;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fish)
    {
        #return "please show me the thing you want:".$id;
        return view('test')->with ('t', $fish);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $twine = Twine::find($id);
        return view('twine.edit')->with([
            'twine' => $twine,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type' => 'required|min:3',
            'title' => 'required|min:3',
            'starter' => 'required|min:3',
        ]);

        $twine = Twine::find($request->id);

        $twine->title = $request->title;
        $twine->starter = $request->starter;

        $twine->save();

        #feedback to user
        Session::flash('flash_message1', 'Your changes have been added to: ');
        Session::flash('flash_message2', $twine->title);

        return redirect('/twines');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
