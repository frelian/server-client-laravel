<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = DocumentType::GetAllData()->paginate(15);

        return view('types.index')
            ->with([
                'types' => $types,
            ]);
    }

    public function getTypes()
    {
        $types = DocumentType::GetAllData()->paginate(15);
        return response()->json($types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saved = DocumentType::create($request->all());

        if ($saved) {
            return redirect()
                ->route('types.index')
                ->with('success', 'Tipo de documento creado...');
        }
    }

    public function show($id)
    {
        $type = DocumentType::find($id);

        return view('types.show')
            ->with([
                'type' => $type,
            ]);
    }

    public function edit($id)
    {
        $type = DocumentType::find($id);

        return view('types.edit')
            ->with([
                'type' => $type,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocumentType  $documentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type = DocumentType::find($id);
        $type->type_name = $request->type_name;
        $type->save();

        return redirect()
            ->route('types.index')
            ->with('success', 'Datos actualizados...');
    }

    public function destroy($id)
    {
        $status = DB::table('document_types')->delete($id);

        if ( $status ) {
            $data = [
                "result"  => true,
                "message" => "Tipo de documento eliminado..."
            ];

            return response()->json($data, 200);
        }

        $data = [
            "result"  => false,
            "message" => "Error al eliminar."
        ];

        return response()->json($data, 302);
    }
}
