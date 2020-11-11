<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Empleados;
use App\Models\DiaSemanales;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Redirect;


class AsistenciaController extends Controller
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
        
        $asistencia = Asistencia::where('users_id',$idempleado)->Paginate(4);
        return view('admin.asistencia.index')->with('asistencia',$asistencia);

        }

        $asistencia = Asistencia::Paginate(4);
        return view('admin.asistencia.index')->with('asistencia',$asistencia);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        




        setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
        $fecha= iconv('ISO-8859-2', 'UTF-8', strftime("%A" , strtotime(Carbon::now())));
     
      
    




        $idempleado=\Auth::user()->id;
        $cedula = Empleados::where('users_id',$idempleado)->pluck('nu_cedula','id');
        $nombres = Empleados::where('users_id',$idempleado)->pluck('tx_nombres','id');
        $asistencia= Asistencia::where('users_id',$idempleado)->Paginate(4);
        $dias = DiaSemanales::where('nb_dia_semanales',$fecha)->pluck('nb_dia_semanales','id');
       
        $horaActual = Carbon::now();
        //dd($horaActual);
       
          return view('admin.asistencia.create')->with([
            'horaActual'=>$horaActual,
            'dias'=>            $dias,
            'asistencia'     => $asistencia,
            'nombres'    => $nombres,
            'cedula'     => $cedula
        ]);




        dd($nombres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $asistencia = new asistencia();
        
        $this->setAsistenciaLlegada($asistencia,$request);

        $notification = array(
            'message' => '¡Asistencia Creada!',
            'alert-type' => 'success'
        );
        
        return Redirect::to('/asistencia')->with($notification);
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
       
       $fecha= Carbon::now()->format('l');




        $idempleado=\Auth::user()->id;
        $cedula = Empleados::where('users_id',$idempleado)->pluck('nu_cedula','id');
        $nombres = Empleados::where('users_id',$idempleado)->pluck('tx_nombres','id');
        $asistencia= Asistencia::find($id);
        $dias = DiaSemanales::where('nb_dia_semanales',$fecha)->pluck('nb_dia_semanales','id');
       
        $horaActual = Carbon::now();
        //dd($horaActual);


       
          return view('admin.asistencia.edit')->with([
            'horaActual'=>$horaActual,
            'dias'=>            $dias,
            'asistencia'     => $asistencia,
            'nombres'    => $nombres,
            'cedula'     => $cedula
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
        $asistencia = Asistencia::find($id);
        $this->setAsistenciaSalida($asistencia,$request);

        $notification = array(
            'message' => '¡Asistencia Actualizado!',
            'alert-type' => 'success'
        );
        
        return Redirect::to('/asistencia')->with($notification);
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

     private function setAsistenciaLlegada(asistencia $asistencia,Request $request){
       

        $asistencia->empleado_id   = $request->input('empleado_id');
        $asistencia->nu_cedula    = $request->input('nu_cedula');
        $asistencia->nb_dia        = $request->input('nb_dia');
        $asistencia->h_llegada          = $request->input('h_llegada');
        $asistencia->users_id =$request->input('users_id');

       
        $asistencia->save();
    }



     private function setAsistenciaSalida(Asistencia $asistencia,Request $request){
       

        $asistencia->empleado_id   = $request->input('empleado_id');
        $asistencia->nu_cedula    = $request->input('nu_cedula');
        $asistencia->nb_dia        = $request->input('nb_dia');
        $asistencia->h_salida          = $request->input('h_salida');
        $asistencia->users_id =$request->input('users_id');

        $asistencia->save();
    }
}
