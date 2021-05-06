<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'name'
    ];
    protected $primaryKey = 'roles_id';
 	protected $table = 'Roles';
    //quyen co nhieu admin
    public function admin(){
        return $this->belongsToMany('App\Models\Admin');
     }
}
