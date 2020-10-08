<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students =
        Student::query()
            ->orderBy("created_at", "desc")
            ->paginate(6);

        return view('pages.after_authentication.students.index')->with('students', $students);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.after_authentication.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;

        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;


        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ]);

        $student->save();

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::query()->find($id);
        $phone_numbers = $student->phones()->paginate(3);
        return view('pages.after_authentication.students.show')->with('student', $student)->with('phones', $phone_numbers) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $student = Student::query()->find($id);
        $phone_numbers = $student->phones()->paginate(3);

        return view('pages.after_authentication.students.edit')->with('student', $student)->with('phones', $phone_numbers);
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
        $student = Student::find($id);


        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ]);

        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;


        $student->save();

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect(route('students.index'));
    }

    public function search(Request $request){

        if(empty($request)){
            return redirect()->back();  // stay at the same page
        }

        else{
            $students =
            DB::table('students')
            ->where('firstname', "LIKE", "%".$request->search."%")
            ->orWhere('id',"=", $request->search)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

            return view('pages.after_authentication.students.index')->with('students', $students);
        }

    }



}
