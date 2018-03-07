<?php

namespace UgelCajamarca;

use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    //
     protected $table ="planilla";
    protected $primaryKey ="planillaid";
    protected $fillable =['iddocente','idinstitucion','anio','mes','imagen'];
    
    protected $guarded =[];
}
