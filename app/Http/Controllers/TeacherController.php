<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // UNTUK MENGAMBIL DATA KESELURUHAN / BY ID
    public function getTeachers($id = null)
    {
        if ($id != null) {
            $teacher = Teacher::find($id);

            if (!$teacher) {
                abort(404);
            }

            return response()->json($teacher, 200);
        }

        $teachers = Teacher::orderBy("id", "ASC")->paginate(10);

        return response()->json($teachers, 200);
    }

    // UNTUK MENAMBAH DATA
    public function storeTeacher(Request $request)
    {
        $input = $request->all();
        $teacher = Teacher::create($input);

        return response()->json($teacher, 200);
    }

    // UNTUK MENGUBAH DATA
    public function updateTeacher(Request $request, $id)
    {
        $inputs = $request->all();
        $teacher = Teacher::find($id);

        if (!$teacher) {
            abort(404);
        }

        $teacher->fill($inputs);
        $teacher->save();

        return response()->json($teacher);
    }

    // UNTUK MENGHAPUS DATA
    public function destroyTeacher($id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            abort(404);
        }

        $teacher->delete();
        $message = ['message' => 'delete successfully', 'teacher_id' => $id];

        return response()->json($message, 200);
    }
}
