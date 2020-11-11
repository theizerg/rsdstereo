<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programas;
use App\Models\Tipo_Programa;
use Redirect;

class ProgramasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programas::paginate(4);
        return view('admin.programas.index')->with('programas',$programas);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $tipoProgramas = Tipo_Programa::get()->pluck('nb_tipo_programa','id');

          return view('admin.programas.create')->with([
            'tipoProgramas'     => $tipoProgramas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $programa = new Programas();
        
        $this->setProgramas($programa,$request);

        $notification = array(
            'message' => '¡Programa Creado!',
            'alert-type' => 'success'
        );
        
        return Redirect::to('/programas')->with($notification);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=\Auth::user();
        $idUsuario=$usuario->id;
        $tipoProgramas = Tipo_Programa::get()->pluck('nb_tipo_programa','id');
        $programas = Programas::find($id);


            return view('admin.programas.edit')->with([
            'idUsuario'       => $idUsuario,
            'programas'       => $programas,
            'tipoProgramas'   => $tipoProgramas,

        ]);
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
       $programa = Programas::find($id);
        $this->setProgramas($programa,$request);

        $notification = array(
            'message' => '¡Programa Actualizado!',
            'alert-type' => 'success'
        );
        
        return Redirect::to('/programas')->with($notification);
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



     private function setProgramas(Programas $programas,Request $request){
       

        $programas->nb_nombre   = $request->input('nb_nombre');
        $programas->nb_moderador    = $request->input('nb_moderador');
        $programas->tipo_programa_id        = $request->input('tipo_programa_id');
        $programas->nb_desde          = $request->input('nb_desde');
        $programas->nb_hasta      = $request->input('nb_hasta');
        $programas->status =$request->input('status');

        $programas->save();
    }
}
