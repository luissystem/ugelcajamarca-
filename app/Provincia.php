<?php

namespace UgelCajamarca;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    //
     protected $table ="provincia";
    protected $primaryKey ="provinciaid";
    protected $fillable =['nombreProvincia','iddepartamento'];
    protected $guarded =[];

    public static function provincias($id){

    	return Provincia::where('iddepartamento','=','provinciaid')->get();
    }
}
