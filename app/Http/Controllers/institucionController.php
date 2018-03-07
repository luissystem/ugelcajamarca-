<?php
namespace UgelCajamarca\Http\Controllers;

use Illuminate\Http\Request;

use UgelCajamarca\Http\Requests;

use UgelCajamarca\Institucion;
use UgelCajamarca\Departamento;
use UgelCajamarca\Provincia;
use UgelCajamarca\Distrito;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use UgelCajamarca\Http\Requests\institucionFormRequest ;
use DB;
use Response;
use Illuminate\Support\Collection;
class institucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request){

            $query=trim($request->get('searchText'));


            $instituciones=DB::table('institucion as ins')
            ->join('distrito  as ds','ins.iddistrito','=','ds.distritoid')
            ->join('provincia as pro','ds.idprovincia','=','pro.provinciaid')
            ->join('departamento as dp','pro.iddepartamento','=','dp.departamentoid')

            ->select('ins.institucionid','ins.nombreInstitucion','dp.nombreDepartamento','pro.nombreProvincia','ds.nombreDistrito')
            ->where('ins.nombreInstitucion','LIKE','%'.$query)
            ->groupBy('ins.institucionid','ins.nombreInstitucion','dp.nombreDepartamento','pro.nombreProvincia','ds.nombreDistrito')
            ->orderBy('ins.institucionid','desc')
            ->paginate(7);

                return view('institucion.index',["instituciones"=>$instituciones,'searchText'=>$query]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // $Departamentos=Departamento::lists('nombreDepartamento','departamentoid');
       //$Departamentos=DB::table('Departamento')->get();
        //$Departamentos=DB::table('Departamento')->pluck('nombreDepartamento','departamentoid')->all();
        $Departamentos = Departamento::all();
        return view("institucion.create",compact('Departamentos'));
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
    
    public function store(institucionFormRequest $request)
    {
        //
        $institucion=new Institucion();

        $institucion->iddistrito=$request->get('iddistrito');
        $institucion->nombreInstitucion=$request->get('nombreInstitucion');
       
        
        $institucion->save();
        return Redirect::to('institucion');
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
