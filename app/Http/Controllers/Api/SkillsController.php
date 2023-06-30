<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index()
    {
        $skills = \App\Models\skills::all();
        if ($skills->isEmpty()) {
            return response()->json([
                'message' => 'No skills found',
                'status' => 404,
            ]);
        } else {
            return response()->json([
                'message' => 'success',
                'status' => 200,
                'data' => \App\Models\skills::all(),
            ]);
        }
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'applicant_id' => 'required|integer',
            'skill' => 'required|string|max:150',
            'level' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Error de Validacion',
                'status' => 422,
                'errors' => $validator->messages(),
            ]);
        } else {
            $skill = \App\Models\skills::create([
                'applicant_id' => $request->applicant_id,
                'skill' => $request->skill,
                'level' => $request->level,
            ]);

            if ($skill) {
                return response()->json([
                    'message' => 'success',
                    'status' => 200,
                    'data' => $skill,
                ]);
            } else {
                return response()->json([
                    'message' => 'Error al crear el skil',
                    'status' => 500,
                ]);
            }
        }
    }

    public function show($id)
    {
        $skill = \App\Models\skills::find($id);
        if ($skill) {
            return response()->json([
                'message' => 'Mostrando skill',
                'status' => 200,
                'data' => $skill,
            ]);
        } else {
            return response()->json([
                'message' => 'Skill no encontrado',
                'status' => 404,
            ]);
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = \Validator::make($request->all(), [
            'applicant_id' => 'required|integer',
            'skill' => 'required|string|max:150',
            'level' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Error de Validacion',
                'status' => 422,
                'errors' => $validator->messages(),
            ]);
        } else {
            $skill = \App\Models\skills::find($id);
            if ($skill) {
                $skill->update([
                    'applicant_id' => $request->applicant_id,
                    'skill' => $request->skill,
                    'level' => $request->level,
                ]);
                return response()->json([
                    'message' => 'success',
                    'status' => 200,
                    'data' => $skill,
                ]);
            } else {
                return response()->json([
                    'message' => 'Skill no encontrado',
                    'status' => 404,
                ]);
            }
        }
    }

    public function destroy(int $id)
    {
        $skill = \App\Models\skills::find($id);
        if ($skill) {
            $skill->delete();
            return response()->json([
                'message' => 'Skill eliminado',
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'message' => 'Skill no encontrado',
                'status' => 404,
            ]);
        }
    }
}
