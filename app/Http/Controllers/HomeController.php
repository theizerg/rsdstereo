<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Empleados;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        

        $fecha = Carbon::now();

       $gerente = \Auth::user()->display_name; 
       $idGerente=\Auth::user()->id;

     if ($gerente <> 'Libardo Perez') {
         $empleados = Empleados::Paginate(4);
       return Redirect::to('/empleados')->with('empleados',$empleados);

        }

        $empleados = Empleados::Paginate(4);
         return Redirect::to('/empleados')->with('empleados',$empleados);
       
    }
}
