<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History_model extends Model
{
    protected $table='history';
    protected $primaryKey='id';
    protected $fillable=['products_id','product_name','product_code','product_color','size','price','quantity'];
}
