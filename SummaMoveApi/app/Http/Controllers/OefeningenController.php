<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oefeningen;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class OefeningenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $content = [
                'status' => true,
                'data' => Oefeningen::All(),
            ];
            return response()->json($content, 200);
        } catch (\Throwable $th) {
            $content = [
                'status' => false,
                'data' => null,
            ];
            return response()->json($content, 400);
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
        //
        try {
            Log::info('Oefening toevoegen', [' ip' => $request->ip(), 'data' => $request->all()]);
            $validator = Validator::make($request->all(), [
                'naam_NL' => 'required',
                
            ]);
            if ($validator->fails()) {
                Log::error("Oefening validator error, kan niet toevoegen.");
                $content = [
                    'success' => false,
                    'data'    => null,
                    'token_type' => 'Bearer'
                ];
                return response()->json($content, 400);
            } else {

                $content = [
                    'success' => true,
                    'data'    => Oefeningen::create($request->all()),
                    'token_type' => 'Bearer'
                ];
                return response()->json($content, 202);
            }
        } catch (\Throwable $th) {
            Log::emergency('Oefening toevoegen', ['error' => $th->getMessage()]);
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
        //
        try {
            $oefeningen = Oefeningen::find($id);
            $content = [
                'success' => true,
                'data'    => $oefeningen,
                'message' => 'Oefeningen retrieved successfully'
            ];
            return response()->json($content, 200);
        } catch (\Throwable $th) {
            Log::emergency('Oefeningen tonen', ['error' => $th->getMessage()]);
            $content = [
                'success' => false,
                'data'    => null,
                'message' => 'Oefeningen not found'
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
        //
        try {
            Log::info('Oefeningen updaten', [' ip' => $request->ip(), 'data' => $request->all()]);
            $validator = Validator::make($request->all(), [
                'naam_NL' => 'required',
            ]);
            if ($validator->fails()) {
                Log::error("Oefeningen validator error, kan niet updaten.");
                $content = [
                    'success' => false,
                    'data'    => null,
                    'message' => 'Oefeningen validator Error'
                ];
                return response()->json($content, 400);
            } else {
                $oefeningen = Oefeningen::find($id);
                $content = [
                    'success' => true,
                    'data'    => $oefeningen->update($request->all()),
                    'message' => 'Oefeningen updated'
                ];
                return response()->json($content, 202);
            }
        } catch (\Throwable $th) {
            Log::emergency('Oefeningen updaten', ['error' => $th->getMessage()]);
            $content = [
                'success' => false,
                'data'    => null,
                'message' => 'Oefeningen not found'
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
    public function destroy($id)
    {
        //
        try {
            $oefeningen = Oefeningen::find($id);
            Log::info('Oefeningen verwijderen', ['data' => $oefeningen]);
            $oefeningen->delete();
            $content = [
                'success' => true,
                'data'    => $oefeningen,
                'message' => 'Oefeningen Delete sucesfully'
            ];
            return response()->json($content, 202);
        } catch (\Throwable $th) {
            Log::emergency('Oefeningen verwijderen', ['error' => $th->getMessage()]);
            $content = [
                'success' => false,
                'data'    => null,
                'message' => 'Oefeningen not found'
            ];
            return response()->json($content, 500);
        }
    }
}
