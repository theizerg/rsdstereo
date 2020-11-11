<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
class ImprimirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       $id_imp = 189;
        $fecha = "04/07/2018";
        $pdf= app('Fpdf');

        $pdf->AddPage();


       
        $pdf->Ln(1);
        
        $pdf->Image('images/fondo/logo-rsdstereo.png',10,5,40,25,'PNG');


         $pdf->Ln(1);
         $pdf->SetY(20);
         $pdf-> SetFillColor(234, 231, 230);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(170,5,utf8_decode('FICHA DE IDENTIFICACIÓN DEL EMPLEADO'),0,1,'C');
         $pdf->Ln(2);
         $pdf->SetXY(175, 10);
         $pdf->SetFont('Arial','B',6);
         $pdf->Cell(25,25,"FOTO:",1,1,'C');


         //titulos encabezado
         $pdf->SetXY(10, 40);
         $pdf->SetFont('Arial','B',8);
         $pdf->Cell(190,5,utf8_decode("DATOS DE LA COMPAÑIA CENTRAL"),1,1,'C');
         $pdf->SetXY(10, 45);
         $pdf->SetFont('Arial','B',6);
         $pdf->Cell(80,5,utf8_decode("NOMBRE DE LA ORGANIZACIÓN:"),1,1,'L');
         $pdf->SetXY(90, 45);
         $pdf->Cell(30,5,utf8_decode("R.I.F:"),1,1,'L');
         $pdf->SetXY(120, 45);
         $pdf->Cell(80,5,utf8_decode("SEDE CENTRAL:"),1,1,'L');

         // datos del encabezado
         $pdf->SetFont('Arial','',6);
         $pdf->SetXY(10, 50);
         $pdf->Cell(80,5,utf8_decode("RsdStero 105.5 fm C.A"),1,1,'C');
         $pdf->SetXY(90, 50);
         $pdf->Cell(30,5,utf8_decode("G-20004752-6"),1,1,'C');
         $pdf->SetXY(120, 50);
         $pdf->Cell(80,5,utf8_decode("CATIA-CARACAS"),1,1,'C');
       
   
         

         //titulos
         $pdf->SetXY(10, 55);
         $pdf->SetFont('Arial','B',8);
         $pdf->Cell(190,5,utf8_decode("DATOS PERSONALES DEL EMPLEADO"),1,1,'C',true);
         $pdf->SetFont('Arial','B',6);
         $pdf->SetXY(10, 60);
         $pdf->Cell(40,5,utf8_decode("CEDULA:"),1,1,'L');
         $pdf->SetXY(50, 60);
         $pdf->Cell(70,5,utf8_decode("NOMBRES:"),1,1,'L');
         $pdf->SetXY(120, 60);
         $pdf->Cell(80,5,utf8_decode("APELLIDO:"),1,1,'L');

          //datos******************
         $pdf->SetFont('Arial','',6);
         $pdf->SetXY(10, 65);
         $pdf->Cell(40,5,$empleado->nu_cedula,1,1,'C');
         $pdf->SetXY(50, 65);
         $pdf->Cell(70,5,$empleado->tx_nombres,1,1,'C');
         $pdf->SetXY(120, 65);
         $pdf->Cell(80,5,$empleado->tx_apellidos,1,1,'C');
         
         $pdf->SetFont('Arial','B',6);
         $pdf->SetXY(10, 70);
         $pdf->Cell(40,5,utf8_decode("FECHA DE NACIMIENTO:"),1,1,'C');
         $pdf->SetXY(50, 70);
         $pdf->Cell(40,5,utf8_decode("LUGAR DE NACIMIENTO:"),1,1,'C');
         $pdf->SetXY(90, 70);
         $pdf->Cell(30,5,utf8_decode("NACIONALIDAD:"),1,1,'C');
         $pdf->SetXY(120, 70);
         $pdf->Cell(30,5,utf8_decode("GENERO:"),1,1,'C');
         $pdf->SetXY(150, 70);
         $pdf->Cell(50,5,utf8_decode("EDAD:"),1,1,'C');

         //datos ***************************************************************************
         $pdf->SetFont('Arial','',6);
         $pdf->MultiCell(40,10,$empleado->fe_nacimiento,1,'C');  

         $pdf->SetXY(50, 75);
         $pdf->MultiCell(40,10,$empleado->empPais->nb_pais,1,'C'); 

         $pdf->SetXY(90, 75);
         $pdf->MultiCell(30,10,$empleado->empNacionalidad->nb_nacionalidad,1,'C');

         $pdf->SetXY(120, 75);
         $pdf->MultiCell(30,10,$empleado->empGenero->nb_genero,1,'C'); 

         $pdf->SetXY(150, 75);
         $pdf->MultiCell(50,10,$empleado->nu_edad,1,'C');




         $pdf->SetFont('Arial','B',6);
         $pdf->SetXY(10, 85);
         $pdf->Cell(40,5,utf8_decode("CORREO:"),1,1,'C');
         $pdf->SetXY(50, 85);
         $pdf->Cell(40,5,utf8_decode("DIRECCION:"),1,1,'C');
         $pdf->SetXY(90, 85);
         $pdf->Cell(30,5,utf8_decode("TELEFONO:"),1,1,'C');
         $pdf->SetXY(120, 85);
         $pdf->Cell(30,5,utf8_decode("GRADO DE INSTRUCCION:"),1,1,'C');
         $pdf->SetXY(150, 85);
         $pdf->Cell(50,5,utf8_decode("OCUPACIÓN:"),1,1,'C');



          //datos ***************************************************************************
         $pdf->SetFont('Arial','',6);
         $pdf->MultiCell(40,10,$empleado->tx_correo,1,'C'); 

         $pdf->SetFont('Arial','',4);
         $pdf->SetXY(50, 90);
         $pdf->MultiCell(40,10,$empleado->tx_direccion,1,'C');  

         $pdf->SetFont('Arial','',6);
         $pdf->SetXY(90, 90);
         $pdf->MultiCell(30,10,$empleado->nu_telefono,1,'C');  

         $pdf->SetFont('Arial','',6);
         $pdf->SetXY(120, 90);
         $pdf->MultiCell(30,10,$empleado->empGradoInstruccion->nb_grado_instruccion,1,'C');  

         $pdf->SetFont('Arial','',6);
         $pdf->SetXY(150, 90);
         $pdf->MultiCell(50,10,$empleado->nb_ocupacion,1,'C'); 

         $pdf->SetFont('Arial','B',8);
         $pdf->SetXY(10, 100);
         $pdf->Cell(190,5,utf8_decode("DATOS MÉDICOS DEL EMPLEADO"),1,1,'C',true);
         $pdf->SetFont('Arial','B',6);
         $pdf->SetXY(10, 105);
         $pdf->Cell(40,5,utf8_decode("¿SUFRE ALGUNA ENFERMEDAD?:"),1,1,'C');
         $pdf->SetXY(50, 105);
         $pdf->Cell(40,5,utf8_decode("DESCRIPCIÓN DE ENFERMEDAD:"),1,1,'C');
         $pdf->SetXY(90, 105);
         $pdf->Cell(110,5,utf8_decode("TIPO DE SANGRE:"),1,1,'C');
         $pdf->SetXY(130, 105);
 

         $pdf->SetFont('Arial','',6);
         $pdf->SetXY(10, 110);
         $pdf->MultiCell(40,10,$empleado->nb_sufre_enfermedad,1,'C');  //datos

         $pdf->SetXY(50, 110);
         $pdf->MultiCell(40,10,$empleado->nb_descripcion_enfermedad,1,'C');  //datos

         $pdf->SetXY(90, 110);
         $pdf->MultiCell(110,10,$empleado->empTipoSangre->nb_tipo_sangre,1,'C');  //datos




          $headers=['Content-Type'=>'application/pdf'];
      return Response($pdf->Output(), 200, $headers);
        

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
