<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesUser extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'admin_admin_id','roles_roles_id'
    ];
    protected $primaryKey = 'id_admin_roles';
 	protected $table = 'admin_roles';
}
