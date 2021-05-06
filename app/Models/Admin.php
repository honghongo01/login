<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'admin_name','admin_email', 'admin_password',
    ];
    protected $primaryKey = 'admin_id';
 	protected $table = 'Admin';

    public function roles(){
        return $this->belongsToMany('App\Models\Roles');
     }
     public function getAuthPassword(){
      return $this->admin_password;
   }
   public function hasAnyRoles($roles){
      return null !==  $this->roles()->whereIn('name',$roles)->first();
   }
   public function hasRole($role){
      return null !==  $this->roles()->where('name',$role)->first();
   }
}
