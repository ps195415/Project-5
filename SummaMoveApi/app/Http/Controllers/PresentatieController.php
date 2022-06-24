<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestatie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PresentatieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            if ($request->has('user')) {
                $data =  Prestatie::where('user_id',$request->user)->get();
            } else {
                $data = Prestatie::all();
            }
            $content = [
                'success' => true,
                'data'    => $data,
                'token_type' => 'Bearer',
            ];
            return response()->json($content, 200);
        } catch (\Throwable $th) {
            Log::emergency('prestatie', ['error' => $th->getMessage()]);

            $content = [
                'success' => false,
                'data'    => null,
                'foutmelding' => 'Gegegevens kunnen niet getoond worden',
                'token_type' => 'Bearer'
            ];
            return response()->json($content, 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Verwijder de actuele token
        try {
            Log::info('prestaties toevoegen', [' ip' => $request->ip(), 'data' => $request->all()]);
            $validator = Validator::make($request->all(), [
                'aantal' => 'required',
            ]);
            if ($validator->fails()) {
                Log::error("Presentaite validator error, kan niet toevoegen.");
                $content = [
                    'success' => false,
                    'data'    => null,
                    'token_type' => 'Bearer'
                ];
                return response()->json($content, 400);
            } else {

                $content = [
                    'success' => true,
                    'data'    => Prestatie::create($request->all()),
                    'token_type' => 'Bearer'
                ];
                return response()->json($content, 202);
            }
        } catch (\Throwable $th) {
            Log::emergency('presentatie toevoegen', ['error' => $th->getMessage()]);
            $content = [
                'success' => false,
                'data'    => null,
                'foutmelding' => 'Gegegevens kunnen niet toegevoegd worden.',
                'token_type' => 'Bearer'
            ];
            return response()->json($content, 500);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $prestatie = Prestatie::find($id);
            $content = [
                'success' => true,
                'data'    => $prestatie,
                'message' => 'Prestatie retrieved successfully'
            ];
            return response()->json($content, 200);
        } catch (\Throwable $th) {
            Log::emergency('prestatie tonen', ['error' => $th->getMessage()]);
            $content = [
                'success' => false,
                'data'    => null,
                'message' => 'Prestatie not found'
            ];
            return response()->json($content, 500);
        }
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
        try {
            Log::info('prestaties updaten', [' ip' => $request->ip(), 'data' => $request->all()]);
            $validator = Validator::make($request->all(), [
                'aantal' => 'required',
            ]);
            if ($validator->fails()) {
                Log::error("Presentaite validator error, kan niet updaten.");
                $content = [
                    'success' => false,
                    'data'    => null,
                    'message' => 'Prestatie validator Error'
                ];
                return response()->json($content, 400);
            } else {
                $prestatie = Prestatie::find($id);
                $content = [
                    'success' => true,
                    'data'    => $prestatie->update($request->all()),
                    'message' => 'Prestatie updated'
                ];
                return response()->json($content, 202);
            }
        } catch (\Throwable $th) {
            Log::emergency('presentatie updaten', ['error' => $th->getMessage()]);
            $content = [
                'success' => false,
                'data'    => null,
                'message' => 'Prestatie not found'
            ];
            return response()->json($content, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $prestatie = Prestatie::find($id);
            Log::info('Prestatie verwijderen', ['data' => $prestatie]);
            $prestatie->delete();
            $content = [
                'success' => true,
                'data'    => $prestatie,
                'message' => 'Prestatie Delete sucesfully'
            ];
            return response()->json($content, 202);
        } catch (\Throwable $th) {
            Log::emergency('Prestatie verwijderen', ['error' => $th->getMessage()]);
            $content = [
                'success' => false,
                'data'    => null,
                'message' => 'Prestatie not found'
            ];
            return response()->json($content, 500);
        }
    }
}