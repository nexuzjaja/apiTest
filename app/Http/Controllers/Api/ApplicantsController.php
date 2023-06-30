<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    public function index()
    {
        $applicants = \App\Models\applicants::all();
        if ($applicants->isEmpty()) {
            return response()->json([
                'message' => 'No applicants found',
                'status' => 404,
            ]);
        } else {
            return response()->json([
                'message' => 'success',
                'status' => 200,
                'data' => \App\Models\applicants::all(),
            ]);
        }
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:150',
            'email' => 'required|email',
            'job' => 'required|string|max:150',
            'birthday' => 'required|date',
            'addres' => 'required|string|max:150',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Error de Validacion',
                'status' => 422,
                'errors' => $validator->messages(),
            ]);
        } else {
            $applicant = \App\Models\applicants::create([
                'name' => $request->name,
                'email' => $request->email,
                'job' => $request->job,
                'birthday' => $request->birthday,
                'addres' => $request->addres,
            ]);

            if ($applicant) {
                return response()->json([
                    'message' => 'success',
                    'status' => 200,
                    'data' => $applicant,
                ]);
            } else {
                return response()->json([
                    'message' => 'Error al crear el aplicante',
                    'status' => 500,
                ]);
            }
            # code...
        }
    }

    public function show($id)
    {
        $applicant = \App\Models\applicants::find($id);
        if ($applicant) {
            return response()->json([
                'message' => 'Encontrado',
                'status' => 200,
                'data' => $applicant,
            ]);
        } else {
            return response()->json([
                'message' => 'Applicant no encontrado',
                'status' => 404,
            ]);
        }
    }

    public function update(Request $request, int $id)
    {
        $applicant = \App\Models\applicants::find($id);
        if ($applicant) {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|string|max:150',
                'email' => 'required|email',
                'job' => 'required|string|max:150',
                'birthday' => 'required|date',
                'addres' => 'required|string|max:150',
            ]);

            if($validator->fails()){
                return response()->json([
                    'message' => 'Error de Validacion',
                    'status' => 422,
                    'errors' => $validator->messages(),
                ]);
            } else {
                $applicant->name = $request->name;
                $applicant->email = $request->email;
                $applicant->job = $request->job;
                $applicant->birthday = $request->birthday;
                $applicant->addres = $request->addres;
                $applicant->save();

                return response()->json([
                    'message' => 'Actualizado',
                    'status' => 200,
                    'data' => $applicant,
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Applicant no actualizado',
                'status' => 404,
            ]);
        }
    }

    public function destroy(int $id)
    {
        $applicant = \App\Models\applicants::find($id);
        if ($applicant) {
            $applicant->delete();
            return response()->json([
                'message' => 'Applicant eliminado',
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'message' => 'Applicant no eliminado',
                'status' => 404,
            ]);
        }
    }
}
