<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = DB::table('instructors')->orderBy('created_at', 'desc')->paginate(6);
        
        return view('pages.after_authentication.instructors.index')->with('instructors', $instructors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.after_authentication.instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instructor = new Instructor;

        $instructor->firstname = $request->firstname;
        $instructor->lastname = $request->lastname;
        $instructor->email = $request->email;
        $instructor->occupation = $request->occupation;


        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'occupation' => 'required',
        ]);

        $instructor->save();

        return redirect()->route('instructors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instructor = Instructor::find($id);
        return view('pages.after_authentication.instructors.show')->with('instructor', $instructor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instructor = Instructor::find($id);
        return view('pages.after_authentication.instructors.edit')->with('instructor', $instructor);
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
        $instructor = Instructor::find($id);

        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ]);

        $instructor->firstname = $request->firstname;
        $instructor->lastname = $request->lastname;
        $instructor->email = $request->email;

        $instructor->save();

        return redirect()->route('instructors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructor = Instructor::find($id);
        $instructor->delete();
        return redirect()->route('instructors.index');
    }
}
