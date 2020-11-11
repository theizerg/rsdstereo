<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Models\Estado;
use App\Models\Estado_Civil;
use App\Models\Genero;
use App\Models\Grado_Instruccion;
use App\Models\Nacionalidad;
use App\Models\Pais;
use App\Models\TipoSangre;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Redirect;

class EmpleadosController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $idempleado=\Auth::user()->id;
        $gerente = \Auth::user()->display_name; 

        if ($gerente <> 'Libardo Perez') {
        
        $empleados = Empleados::where('users_id',$idempleado)->Paginate(4);
        return view('admin.empleados.index')->with('empleados',$empleados);

        }

        $empleados = Empleados::Paginate(4);
        return view('admin.empleados.index')->with('empleados',$empleados);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genero = Genero::get()->pluck('nb_genero','id');
        $estadoC = Estado_Civil::get()->pluck('nb_estado_civil','id');
        $estado = Estado::get()->pluck('nb_estado','id');
        $pais = Pais::get()->pluck('nb_pais','id');
        $gradoIns = Grado_Instruccion::get()->pluck('nb_grado_instruccion','id');
        $nacionalidad = Nacionalidad::get()->pluck('nb_nacionalidad','id');
        $tipoSangre = TipoSangre::get()->pluck('nb_tipo_sangre','id');

            return view('admin.empleados.create')->with([
            'genero'     => $genero,
            'estadoC'    => $estadoC,
            'estado'     => $estado,
            'gradoIns'        => $gradoIns,
            'nacionalidad'    => $nacionalidad,
            'pais'            => $pais,
            'tipoSangre'      => $tipoSangre
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
        

        $empleado = new Empleados();
        $this->setEmpleado($empleado,$request);

        $notification = array(
            'message' => '¡Empleado Creado!',
            'alert-type' => 'success'
        );
        
        return Redirect::to('/empleados')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $empleado = Empleados::find($id);
        return view('admin.empleados.show')->with('empleado',$empleado);
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
        $genero = Genero::get()->pluck('nb_genero','id');
        $estadoC = Estado_Civil::get()->pluck('nb_estado_civil','id');
        $estado = Estado::get()->pluck('nb_estado','id');
        $pais = Pais::get()->pluck('nb_pais','id');
        $gradoIns = Grado_Instruccion::get()->pluck('nb_grado_instruccion','id');
        $nacionalidad = Nacionalidad::get()->pluck('nb_nacionalidad','id');
        $tipoSangre = TipoSangre::get()->pluck('nb_tipo_sangre','id');
        $empleado = Empleados::find($id);


            return view('admin.empleados.edit')->with([
            'genero'     => $genero,
            'estadoC'    => $estadoC,
            'estado'     => $estado,
            'gradoIns'        => $gradoIns,
            'nacionalidad'    => $nacionalidad,
            'pais'            => $pais,
            'tipoSangre'      => $tipoSangre,
            'idUsuario'       => $idUsuario,
            'empleado'          => $empleado
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
       
        $empleado = Empleados::find($id);
        $this->setEmpleado($empleado,$request);

        $notification = array(
            'message' => '¡Empleado Actualizado!',
            'alert-type' => 'success'
        );
        
        return Redirect::to('/empleados')->with($notification);
        
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


    



     private function setEmpleado(Empleados $empleado,Request $request){
       

        $empleado->tx_nombres   = $request->input('tx_nombres');
        $empleado->tx_apellidos    = $request->input('tx_apellidos');
        $empleado->nu_cedula        = $request->input('nu_cedula');
        $empleado->nu_telefono          = $request->input('nu_telefono');
        $empleado->nu_edad      = $request->input('nu_edad');
        $empleado->tx_direccion        = $request->input('tx_direccion');
        //Format Date then insert it to the database
        $empleado->fe_nacimiento    = date('Y-m-d', strtotime(str_replace('-', '/', $request->input('fe_nacimiento'))));
        $empleado->lugar_nacimiento_id    = $request->input('lugar_nacimiento_id');
        $empleado->nacionalidad_id  = $request->input('nacionalidad_id');
        $empleado->genero_id    = $request->input('genero_id'); 
        $empleado->grado_instruccion_id      = $request->input('grado_instruccion_id');
        $empleado->estado_civil_id      = $request->input('estado_civil_id');
        $empleado->estado_id     = $request->input('estado_id');
        $empleado->fe_ingreso   = $request->input('fe_ingreso');
        $empleado->nb_sufre_enfermedad   = $request->input('nb_sufre_enfermedad');
        $empleado->nb_descripcion_enfermedad   = $request->input('nb_descripcion_enfermedad');
        $empleado->tipo_sangre_id   = $request->input('tipo_sangre_id');
        $empleado->tx_correo   = $request->input('tx_correo');
        $empleado->nb_ocupacion   = $request->input('nb_ocupacion');
        $empleado->users_id   = $request->input('users_id');
        $empleado->save();
    }
}
