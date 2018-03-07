<?php

namespace UgelCajamarca;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
     protected $table ="departamento";
    protected $primaryKey ="departamentoid";
    protected $fillable =['nombredDepartamento'];
    protected $guarded =[];
}
