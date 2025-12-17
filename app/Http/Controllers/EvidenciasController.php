<?php

namespace App\Http\Controllers;

use App\Models\Evidencias;
use Illuminate\Http\Request;

class EvidenciasController extends Controller
{
     public function getIndex()
    {
        $evidencias = Evidencias::all();
        return view('evidencias.index')
            ->with('evidencias', $evidencias);
    }

    public function getShow($id)
    {
        $evidencias = Evidencias::findOrFail($id);
        return view('evidencias.show')
            ->with('evidencias', $evidencias);
    }

    public function getCreate()
    {
        return view('evidencias.create');
    }

    public function getEdit($id)
    {
        $evidencias = Evidencias::findOrFail($id);
        return view('evidencias.edit')
            ->with('evidencias', $evidencias);
    }

    public function postCreate(Request $request)
    {
        $evidencias = Evidencias::create($request->all());
        return redirect()->action([self::class, 'getShow'], ['id' => $evidencias->id]);
    }



    public function putCreate(Request $request, $id)
    {
        $evidencias = Evidencias::findOrFail($id);

        $evidencias->update($request->all());
        return redirect()->action([self::class, 'getShow'], ['id' => $evidencias->id]);
    }
}
