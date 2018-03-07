<?php

namespace UgelCajamarca;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //
         protected $table ="docente";
    protected $primaryKey ="docenteid";
    protected $fillable =['nombre','apellidos','dni'];
    protected $guarded =[];
}
