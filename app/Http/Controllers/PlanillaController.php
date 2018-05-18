<?php

namespace UgelCajamarca\Http\Controllers;

use Illuminate\Http\Request;

use UgelCajamarca\Http\Requests;

use UgelCajamarca\Institucion;
use UgelCajamarca\Departamento;
use UgelCajamarca\Docente;
use UgelCajamarca\Provincia;
use UgelCajamarca\Distrito;
use UgelCajamarca\Planilla;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use UgelCajamarca\Http\Requests\planillaFormRequest ;
use DB;
use Response;
use Illuminate\Support\Collection;

class PlanillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
    $this->middleware('auth');
}
    public function index(Request $request)
    {
        //

        if($request){

            $query=trim($request->get('searchText'));

            $Planilla=DB::table('planilla as p')

            ->join('docente  as d','p.iddocente','=','d.docenteid')
            ->join('institucion  as ins','p.idinstitucion','=','ins.institucionid')

            ->select('ins.nombreInstitucion', 'd.nombre','d.apellidos','p.planillaid','p.anio','p.mes','p.imagen')
            ->where('p.anio','LIKE','%'.$query)
            ->groupBy('ins.nombreInstitucion','d.nombre','d.apellidos','p.planillaid','p.anio','p.mes','p.imagen')
            ->orderBy('p.planillaid','desc')
            ->paginate(7);

                return view('planillas.index',["Planilla"=>$Planilla,'searchText'=>$query]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $Docente=DB::table('docente')->get();
         $Departamentos=DB::table('departamento')->get();
        return view("planillas.create",["Docente"=>$Docente,"Departamentos"=>$Departamentos]);
    }
     public function lisprovincias(){
      $departamento_id = Input::get('iddepartamento');
      $provincias = Provincia::where('iddepartamento', '=', $departamento_id)->get();
      return response()->json($provincias);
    }

    public function lisdistritos(){
      $provinces_id = Input::get('idprovincia');
      $distrito = Distrito::where('idprovincia', '=', $provinces_id)->get();
      return response()->json($distrito);
    }
    public function lisInstitucion(){
      $distrito_id = Input::get('iddistrito');
      $institucion = Institucion::where('iddistrito', '=', $distrito_id)->get();
      return response()->json($institucion);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(planillaFormRequest $request)
    {
        //
         $planilla=new Planilla();
        $planilla->iddocente=$request->get('iddocente');
        $planilla->idinstitucion=$request->get('idinstitucion');
        $planilla->anio=$request->get('anio');
        $planilla->mes=$request->get('mes');
        $rule=array ('imagen' =>'mimes:png,jpeg' );
        $validacion=validator::make(Input::all(),$rule);
        if($validacion->fails()){
            return back()->withErrors($validacion);
        }else{
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/planillas/',$file->getClientOriginalName());
            $planilla->imagen=$file->getClientOriginalName();
        }
        
        $planilla->save();
        return Redirect::to('planillas');
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
        //
        $planilla=Planilla::findOrFail($id);
        $Docente=DB::table('docente')->get();
        $Departamentos=DB::table('departamento')->get();
         return view('planillas.edit',["planilla"=>$planilla ,"Departamentos"=>$Departamentos,"Docente"=>$Docente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(planillaFormRequest $request, $id)
    {
        //
        $planilla=new Planilla();
        $planilla->iddocente=$request->get('iddocente');
        $planilla->idinstitucion=$request->get('idinstitucion');
        $planilla->anio=$request->get('anio');
        $planilla->mes=$request->get('mes');
        $rule=array ('imagen' =>'mimes:png,jpeg' );
        $validacion=validator::make(Input::all(),$rule);
        if($validacion->fails()){
            return back()->withErrors($validacion);
        }else{
            $file=Input::file('imagen');
            $file->move(public_path().'/imagenes/planillas/',$file->getClientOriginalName());
            $planilla->imagen=$file->getClientOriginalName();
        }
        
        $planilla->save();
        return Redirect::to('planillas');
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
