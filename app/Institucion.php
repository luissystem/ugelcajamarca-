<?php

namespace UgelCajamarca;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    //
     protected $table ="institucion";
    protected $primaryKey ="institucionid";
    protected $fillable =['nombreInstitucion','iddistrito'];
    protected $guarded =[];
}
