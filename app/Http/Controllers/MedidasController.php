<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medida;
use Illuminate\Support\Facades\DB;
use App\Catastrofe;
use App\Fondo;
use App\Region;
use App\Provincia;
use App\Comuna;
use Illuminate\Support\Facades\Auth;

class MedidasController extends Controller
{
	public function index()
    {
    	return view('medida/generateMedida');
    }
    public function store(Request $request){
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        Medida::create([
            'id_user'=> auth()->id(),
            'nombre'=> $request->nombre,
            'direccion' => $request->direccion,
            'fecha_inicio' => date("m-d-Y", strtotime($request->fechaInicio)),
            'fecha_termino' => date("m-d-Y", strtotime($request->fechaTermino)),
            'id_region' => $request->region,
            'id_provincia' => $request->provincia,
            'id_comuna' => $request->comuna,
            'descripcion' => $request->descripcion,
        ]);
        return back()->with('flash','Medida generada correctamente');
    }
    public function storeCentro(Request $request){
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $medida = new Medida();
        $medida->id_user = auth()->id();
        $medida->id_catastrofe=$request->catastrofe;
        $medida->nombre = $request->nombre;
        $medida->direccion = $request->direccion;
        $medida->descripcion = $request->descripcion;
        $medida->fecha_inicio = date("m-d-Y", strtotime($request->fechaInicio));
        $medida->fecha_termino = date("m-d-Y", strtotime($request->fechaTermino));
        $medida->situacion='Disponible';
        $medida->tipo='centro';
        $medida->id_comuna = $request->comuna;
        $medida->valido=0;
        $medida->save();
        
        return $this->show_centro($medida->id);;
    }
    public function createCentro($id)
    {
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $regiones = Region::all();
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararCentro',compact('catastrofe','regiones'));
    }
    public function delete_centro($id){
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        Medida::destroy($id);
        return $this->verCentros();
    }
    public function storeBeneficio(Request $request){
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $medida = new Medida();
        $medida->id_user = auth()->id();
        $medida->id_catastrofe=$request->catastrofe;
        $medida->nombre = $request->nombre;
        $medida->direccion = $request->direccion;
        $medida->descripcion = $request->descripcion;
        $medida->fecha_inicio = date("m-d-Y", strtotime($request->fechaInicio));
        $medida->fecha_termino = date("m-d-Y", strtotime($request->fechaTermino));
        $medida->situacion='Disponible';
        $medida->tipo='beneficio';
        $medida->valido=0;
        $medida->id_comuna = $request->comuna;
        $medida->save();
        return $this->show_evento($medida->id);
    }
    public function createBeneficio($id)
    {
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $regiones = Region::all();
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararBeneficio',compact('catastrofe','regiones'));
    }
    public function delete_beneficio($id){
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        Medida::destroy($id);
        return $this->verBeneficios();
    }
    public function storeVoluntariado(Request $request){
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $medida = new Medida();
        $medida->id_user = auth()->id();
        $medida->id_catastrofe=$request->catastrofe;
        $medida->nombre = $request->nombre;
        $medida->direccion = $request->direccion;
        $medida->descripcion = $request->descripcion;
        $medida->fecha_inicio = date("m-d-Y", strtotime($request->fechaInicio));
        $medida->fecha_termino = date("m-d-Y", strtotime($request->fechaTermino));
        $medida->situacion='Disponible';
        $medida->tipo='voluntariado';
        $medida->labor=$request->labor;
        $medida->valido=0;
        $medida->id_comuna = $request->comuna;
        $medida->save();
        
        return $this->show_voluntariado($medida->id);
    }
    public function createVoluntariado($id)
    {
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $regiones = Region::all();
        $catastrofe=Catastrofe::find($id);
        return view('medida/declararVoluntariado',compact('catastrofe','regiones'));
    }
    public function delete_voluntariado($id){
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        Medida::destroy($id);
        return $this->verVoluntariados();
    }

    public function historial()
    {
        $medidas = Medida::orderBy('fecha_inicio','desc')->get();
        //$comunas = Comuna::find($medidas->id_comuna)->get;
        return view('medida/historial',['medidas' => $medidas]);
    }
    public function verCentros()
    {
        $centros = Medida::where('tipo','centro')->where('valido',1)->get();
        return view('medida/verCentros',['centros'=>$centros]);
    }
    public function verBeneficios()
    {
        $beneficios = Medida::where('tipo','beneficio')->where('valido',1)->get();
        return view('medida/verBeneficios',compact('beneficios'));
    }
    public function verVoluntariados()
    {
        $voluntariados = Medida::where('tipo','voluntariado')->where('valido',1)->get();
        return view('medida/verVoluntariados',['voluntariados'=>$voluntariados]);
    }

    public function verMedidasCatastrofe($id)
    {
        $medidas = Medida::where('id_catastrofe',$id)->where('valido',1)->get();
        $fondos = Fondo::where('id_catastrofe',$id)->where('valido',1)->get();
        return view('medida/historial',compact('medidas','fondos'));
    }


    public function update_evento(Request $request){
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $id = $request->beneficio;
        $beneficio = Medida::find($id);
        $beneficio->nombre=$request->nombre;
        $beneficio->fecha_inicio=$request->fecha_inicio;
        $beneficio->fecha_termino=$request->fecha_termino;
        $beneficio->direccion=$request->direccion;
        $beneficio->descripcion=$request->descripcion;
        $beneficio->id_comuna = $request->comuna;
        
        $beneficio->save();
        return $this->show_beneficio($beneficio->id);
    }

    public function edit_evento($id)
    {
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $beneficio = Medida::find($id);
        $regiones = Region::all();
        //return $catastrofe;
        return view('medida/editarBeneficio', compact('beneficio','regiones'));
    }

    

    public function update_centro(Request $request){
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $id = $request->centro;
        $centro = Medida::find($id);
        $centro->nombre=$request->nombre;
        $centro->fecha_inicio=$request->fecha_inicio;
        $centro->fecha_termino=$request->fecha_termino;
        $centro->direccion=$request->direccion;
        $centro->descripcion=$request->descripcion;
        $centro->id_comuna = $request->comuna;
        
        $centro->save();
        return $this->show_centro($centro->id);
    }

    public function show_centro($id)
    {

        $centro = Medida::find($id);
        $articulos = DB::table('articulos')->where('id_medida', $id)->get();
        $comuna = Comuna::find($centro->id_comuna);
        $provincia = Provincia::find($comuna->id_provincia);
        $region = Region::find($provincia->id_region);

        return view('medida/centroDetails', compact('centro','comuna','provincia','region','articulos'));

    }
    public function show_evento($id)
    {
        $beneficio = Medida::find($id);
        $comuna = Comuna::find($beneficio->id_comuna);
        $provincia = Provincia::find($comuna->id_provincia);
        $region = Region::find($provincia->id_region);

        return view('medida/beneficioDetails', compact('beneficio','comuna','provincia','region'));

    }
    

    public function edit_centro($id)
    {
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $centro = Medida::find($id);
        $regiones = Region::all();
        //return $catastrofe;
        return view('medida/editarCentro', compact('centro','regiones'));
    }

    //Voluntariados
    public function update_voluntariado(Request $request){
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $id = $request->voluntariado;
        $voluntariado = Medida::find($id);
        $voluntariado->nombre=$request->nombre;
        $voluntariado->fecha_inicio=$request->fecha_inicio;
        $voluntariado->fecha_termino=$request->fecha_termino;
        $voluntariado->direccion=$request->direccion;
        $voluntariado->descripcion=$request->descripcion;
        $voluntariado->id_comuna = $request->comuna;
        $voluntariado->labor=$request->labor;
        
        $voluntariado->save();
        return $this->show_voluntariado($id);
    }

    public function show_voluntariado($id)
    {
        $voluntariado = Medida::find($id);
        $comuna = Comuna::find($voluntariado->id_comuna);
        $provincia = Provincia::find($comuna->id_provincia);
        $region = Region::find($provincia->id_region);


        return view('medida/voluntariadoDetails', compact('voluntariado','comuna','provincia','region'));

    }

    public function edit_voluntariado($id)
    {
        $bool = Auth::user()->authorizeRoles(['admin','organizacion',]);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $voluntariado = Medida::find($id);
        $regiones = Region::all();
        return view('medida/editarVoluntariado', compact('voluntariado','regiones'));
    }
    public function showMedidas(){
            $medidas = Medida::where('valido',0)->get();
            $fondos = Fondo::where('valido',0)->get();
            return view('medida/validarMedidas',compact('medidas','fondos'));
    }
    public function aceptarMedida($id){
        $bool = Auth::user()->authorizeRoles(['admin','gobierno']);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $medida = Medida::find($id);
        $medida->valido = 1;
        $medida->save();
        return $this->showMedidas();
    }
    public function rechazarMedida($id){
        $bool = Auth::user()->authorizeRoles(['admin','gobierno']);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $medida = Medida::find($id);
        $medida->valido = 2;
        $medida->save();
        return $this->showMedidas();
    }
    public function aceptarFondo($id){
        $bool = Auth::user()->authorizeRoles(['admin','gobierno']);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $medida = Fondo::find($id);
        $medida->valido = 1;
        $medida->save();
        return $this->showMedidas();
    }
    public function rechazarFondo($id){
        $bool = Auth::user()->authorizeRoles(['admin','gobierno']);
        if(!$bool)
        {
            return view('bloqueado');
        }
        $medida = Fondo::find($id);
        $medida->valido = 2;
        $medida->save();
        return $this->showMedidas();
    }
}
