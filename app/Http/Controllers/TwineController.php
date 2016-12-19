<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Twine;
use App\Type;
use App\Starter;
use Session;
use App\Helpers\Helper;
use App\Strand;

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
        # Type
        # Building an array that is something like:
        #['type_id' => 'type_name']
        $types_for_dropdown = Type::getForDropdown();

        # Starter
        $starters_for_dropdown = Starter::getForDropdown();

        # Tags
        // $tags_for_checkboxes = Tag::getForCheckboxes();

        return view('twine.create')->with([
            'types_for_dropdown' => $types_for_dropdown,
            'starters_for_dropdown' => $starters_for_dropdown,
            // 'tags_for_checkboxes' => $tags_for_checkboxes
        ]);
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
            'title' => 'required|min:4',
        ]);


        #add to the database
        $title = $request->input('title');
        $title = Helper::Titlecase($title);

        $twine = new Twine();

        $twine->type_id = $request->type_id;
        $twine->title = $title;
        $twine->starter_id = $request->starter_id;
        //$twine->author_id = $request->author()->id;
        $twine->save();

        #feedback to user
        Session::flash('flash_message1', 'You have started a new twine titled: ');
        Session::flash('flash_message2', $twine->title);

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
        $strand = $twine->strands->last();

        return view('twine.edit')->with(
            [
                'twine' => $twine,
                'strand' => $strand,
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
            'title' => 'required|min:3|max:100',
            'strand_text' => 'required|min:3|max:660',
        ]);

        $twine = Twine::find($request->id);
        $strand = Strand::find($request->strand_id);
        $twine->title = $request->title;
                $strand->strand_text = $request->strand_text;
        $strand->save();
        $twine->save();

        #feedback to user
        Session::flash('flash_message1', 'Your changes have been added to: ');
        Session::flash('flash_message2', $twine->title);

        return redirect('/twines');

    }

    /**
    * GET
    * Page to confirm twine deletion
    */
    public function delete($id) {

        $twine = Twine::find($id);

        return view('twine.delete')->with('twine', $twine);
    }



    /**
    * POST - No actual page, just process the delete request
    */
    public function destroy($id)
    {
        # Get the twine to be deleted
        $twine = Twine::find($id);

        if(is_null($twine)) {
            Session::flash('message','twine not found.');
            return redirect('/twines');
        }


        # Remove any strands associated with this twine
        if($twine->strands()) {

            $strands = $twine->strands;
            foreach($strands as $strand) {
               $strand->delete();
            }
        }

        # Remove any items in a pivot-table associated with this twine
        # This is code that is needed when the tags table is incorporated.
        // if($twine->tags()) {
        //     $twine->tags()->detach();
        // }

        # Delete the twine
        $twine->delete();

        # Finish
        Session::flash('flash_message', $twine->title.' was deleted.');
        return redirect('/twines');
    }




}
