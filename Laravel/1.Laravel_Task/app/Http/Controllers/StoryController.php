<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;   // create the errors variable
use Illuminate\View\Middleware\ShareErrorsFromSession;  // bind the errors variable to the view
use App\Models\Story;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::all();

        if (count($stories)==0) {
            return view('story.empty');
        } else {
            return view('story.index')->with('stories', $stories);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('story.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $story = new Story();

        $story->title = $request->input('title');
        $story->content = $request->input('content');

        # Laravel's validation will do what you did in the highlighted code (except that it won't display errors)
    
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        
        $success;

        // $errors = [];

        // if(empty($story->title) || empty($story->content)){

        //     if(empty($story->title)){
        //         $errors['title'] = "* Title is required";
        //     }

        //     if(empty($story->content)){
        //         $errors['content'] = "* Content is required";
        //     }

        //     return view('story.create')->with('errors', $errors);
            
        // }


        $story->save();
        $title = $story->title;
        $success = "$title story added successfully!";

        $stories = Story::all();

        return view('story.index')->with(compact('stories', 'success'));
              
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Story::find($id);

        return view('story.show')->with('story', $story);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $story = Story::find($id);

        return view('story.edit')->with('story', $story);
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
        $story = Story::find($id);

        $story->title = $request->input('title');
        $story->content = $request->input('content');

        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);


        $story->save();
        return redirect(route('stories.show',$story->id));
               
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::find($id);
        $story->delete();
        return redirect(route('stories.index'));
    }
}
