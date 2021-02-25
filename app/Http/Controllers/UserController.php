<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ConsumesExternalServices;
use DB;

class UserController extends Controller
{
    use ConsumesExternalServices;

    public function __construct()
    {

        $api_url = env('API_URL');
        $this->baseUri = !empty($api_url) ? $api_url : 'http://127.0.0.1:8001/api';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Consulto como si fuere el Cliente al servidor
        $data = $this->makeRequest(
            'POST',
            '/api/users/list',
            [],
            [],
            [],
            $isJsonRequest = true
        );

        $data = json_decode($data);

        return view('users.index')
            ->with([
                'users' => $data->result,
            ]);

    }

    public function apiIndex()
    {
        $users  = DB::select('call GetUsersAndDocTypes()');

        return response()->json([
            'status'  => true,
            'result'  => $users
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saved = User::create($request->all());

        if ($saved) {
            return redirect()
                ->route('users.index')
                ->with('success', 'Usuario nuevo creado...');
        }

        return redirect()
            ->route('users.index')
            ->with('error', 'Error al crear el usuario...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = (int)$id;

        $data = $this->makeRequest(
            'POST',
            '/api/users/show',
            [ "id" => $id],
            [],
            [],
            $isJsonRequest = true
        );

        $data = json_decode($data);
       //  dd($data->result[0], "asd");

        return view('users.show')
            ->with([
                'user' => $data->result[0],
            ]);
    }

    public function xx(Request $request)
    {
        return response()->json($request);
    }

    public function apiShow(Request $request)
    {
        $id = $request->id;

        if (! $id) {
            return response()->json([
                'status'  => false,
                'result'  => "No se envio el id del usuario"
            ], 200);
        }

        $user  = DB::select("call GetUser($id)");

        return response()->json([
            'status'  => true,
            'result'  => $user
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
