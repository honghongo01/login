<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        DB::table('admin_roles')->truncate();

        $adminRoles = Roles::where('name','admin')->first();
        $authorRoles = Roles::where('name','author')->first();
        $userRoles = Roles::where('name','user')->first();

        $admin = Admin::create([
        	'admin_name' => 'hanh@dmin',
        	'admin_email' => 'hanh@yahoo.com',
    
        	'admin_password' =>'123456'
        ]);

        $author = Admin::create([
        	'admin_name' => 'hanhauthor',
        	'admin_email' => 'hanhauthor@yahoo.com',
        	'admin_password' => '123456'
        ]);

        $user = Admin::create([
        	'admin_name' => 'hanhuser',
        	'admin_email' => 'hieuuser@yahoo.com',
        	'admin_password' => '123456',
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);

        factory(App\Admin::class, 20)->create();
    }
}
