<?php

namespace UgelCajamarca\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use UgelCajamarca\Http\Requests;



use UgelCajamarca\Docente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use UgelCajamarca\Http\Requests\docenteFormRequest ;
use DB;
class DocenteController extends Controller
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
            $docentes=DB::table('docente as d')
            ->select('d.docenteid','d.nombre','d.apellidos','d.dni')
            ->where('d.nombre','like',$query.'%')->orwhere('d.apellidos','like',$query.'%')->orwhere('d.dni','like',$query.'%')
            ->orderBy('d.docenteid','desc')->paginate(7);
           return view('docentes.index',["docentes"=>$docentes,"searchText"=>$query]);
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
        //$institucion=DB::table('institucion')->get();
        //$Departamentos = Departamento::all();

        return view("docentes.create");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(docenteFormRequest $request)
    {
        //
        $docente=new docente();
        
        $docente->nombre=$request->get('nombre');
        $docente->apellidos=$request->get('apellidos');
        $docente->dni=$request->get('dni');
        $docente->save();
        return Redirect::to('docentes');
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
        $docente=Docente::findOrFail($id);
        

         return view("docentes.edit",["docente"=>$docente]);
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
         $docente=new docente();
        
        $docente->nombre=$request->get('nombre');
        $docente->apellidos=$request->get('apellidos');
        $docente->dni=$request->get('dni');
        $docente->update();
        return Redirect::to('docentes');
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
