<?php

namespace UgelCajamarca;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    //
         protected $table ="distrito";
    protected $primaryKey ="distritoid";
    protected $fillable =['nombreDistrito','idprovincia'];
    protected $guarded =[];
}
