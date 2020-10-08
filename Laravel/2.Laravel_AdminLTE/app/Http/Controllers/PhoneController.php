<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Student;
use Illuminate\Http\Request;

class PhoneController extends Controller
{

    public function create($student_id)
    {
        $student = Student::query()->find($student_id);
        return view('pages.after_authentication.students.phone-numbers.create')->with('student', $student);

    }


    public function store(Request $request, $student_id)
    {
        $validatedData = $request->validate([
            'new_phone'=> array('required', 'regex:/^[+]{0,}[0-9]{3,}$/')
        ]);


        $student = Student::query()->find($student_id);

        $new_phone = new Phone();
        $new_phone->number = $request->new_phone;

        $student->phones()->saveMany([$new_phone]);

        return redirect()->route('student.phone.index', $student_id);
    }

    
    public function index($id)
    {
        $student = Student::query()->find($id);
        $phone_numbers = $student->phones()->orderBy('created_at','desc')->paginate(3);

        return view('pages.after_authentication.students.phone-numbers.index')->with('student', $student)->with('phones', $phone_numbers);
    }


    public function edit_specific($student_id, $phone_id)
    {
        $student = Student::query()->find($student_id);
        $phone_number = Phone::query()->find($phone_id);

        return view('pages.after_authentication.students.phone-numbers.edit_specific')->with('student', $student)->with('phone', $phone_number);
    }



    public function update(Request $request, $student_id, $phone_id)
    {
        $validatedData = $request->validate([
            'new_phone'=> array('required', 'regex:/^[+]{0,}[0-9]{3,}$/')
        ]);

        $old_phone = Phone::query()->find($phone_id);

        $old_phone->number = $request->new_phone;

        $old_phone->save();

        return redirect()->route('student.phone.index', $student_id);

    }


    public function destroy(Request $request, $student_id, $phone_id)
    {
        $old_phone = Phone::query()->find($phone_id);
        $old_phone->delete();
        return redirect()->route('student.phone.index', $student_id);
    }
}
