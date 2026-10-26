<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // UNTUK MENGAMBIL DATA KESELURUHAN / BY ID
    public function getStudents($id = null)
    {
        if ($id != null) {
            $student = Student::find($id);

            if (!$student) {
                abort(404);
            }

            return response()->json($student, 200);
        }

        $students = Student::orderBy("id", "ASC")->paginate(10);

        return response()->json($students, 200);
    }

    // UNTUK MENAMBAH DATA
    public function storeStudent(Request $request)
    {
        $input = $request->all();
        $student = Student::create($input);

        return response()->json($student, 200);
    }

    // UNTUK MENGUBAH DATA
    public function updateStudent(Request $request, $id)
    {
        $inputs = $request->all();
        $student = Student::find($id);

        if (!$student) {
            abort(404);
        }

        $student->fill($inputs);
        $student->save();

        return response()->json($student);
    }

    // UNTUK MENGHAPUS DATA
    public function destroyStudent($id)
    {
        $student = Student::find($id);

        if (!$student) {
            abort(404);
        }

        $student->delete();
        $message = ['message' => 'delete successfully', 'student_id' => $id];

        return response()->json($message, 200);
    }
}


