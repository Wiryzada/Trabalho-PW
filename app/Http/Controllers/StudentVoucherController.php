<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentUserCreateRequest;
use App\Http\Requests\UpdateStudentVoucherRequest;
use App\Models\Course;
use App\Models\Institution;
use App\Models\Student;
use App\Models\StudentVoucher;
use Illuminate\Http\Request;
use App\Models\User;

class StudentVoucherController extends Controller
{
    public function getCoursesByInstitution($institutionId)
    {
        $courses = Course::where('institution_id', $institutionId)->get();

        return response()->json($courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $institution = Institution::all();
        $courses = Course::all();

        return view('student-voucher.create', [
            'institutions' => $institution,
            'courses' => $courses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentUserCreateRequest $request)
    {
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $user->assignRole('student');

        $student = Student::create([
            'user_id' => $user->id,
            'course_id' => $data['course_id'],
            'cpf' => $data['cpf'],
            'birth_date' => $data['birth_date'],
            'enrollment' => $data['enrollment'],
        ]);


        $voucher = StudentVoucher::create([
            'student_id' => $student->id,
        ]);

        $user->student_id = $student->id;
        $user->save();
        $student->student_voucher_id = $voucher->id;
        $student->save();

        return redirect()->route('student-voucher.create')->with('success', 'Voucher gerado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $voucher = StudentVoucher::find($id);

        return view('student-voucher.show', [
            'voucher' => $voucher,
        ]);
    }

    public function showByStudent()
    {
        $student = Student::where('user_id', auth()->user()->id)->first();
        $voucher = StudentVoucher::where('student_id', $student->id)->first();

        return view('student-voucher.showByStudent', [
            'voucher' => $voucher,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentVoucherRequest $request, string $id)
    {
        $data = $request->validated();

        $voucher = StudentVoucher::find($id);

        if ($voucher->status == 'Pendente') {
            if ($data['status'] == 'Aprovado') {
                $generateCode = function () {
                    $code = '';
                    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    for ($i = 0; $i < 10; $i++) {
                        $code .= $characters[mt_rand(0, 35)];
                    }

                    return $code;
                };

                $voucher->code_voucher = $generateCode();
                $voucher->status = 'Aprovado';
                $voucher->validity = now()->addYear();
                $voucher->save();

                return redirect()->route('users.index')->with('success', 'Voucher aprovado com sucesso!');
            } else if ($data['status'] == 'Reprovado') {
                $voucher->status = 'Reprovado';
                $voucher->save();
                return redirect()->route('users.index')->with('success', 'Voucher reprovado com sucesso!');
            }
        } else {
            //
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
