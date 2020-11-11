<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    private $permissions , $user_permissions;


    public function __construct()
    {
        /*
        set the default permissions
        */
        $this->permissions =  [
                                /* user */
                                'view_users',
                                'add_users',
                                'edit_users',
                                'delete_users',
                                'assign_permissions',

                                /* empleados */
                                'view_empleados',
                                'add_empleados',
                                'edit_empleados',
                                'show_empleados',
                                'delete_empleados',

                                /* asistencia */
                                'view_asistencia',
                                'add_asistencia',
                                'edit_asistencia',
                                'delete_asistencia',

                                /* programas */
                                'view_programas',
                                'add_programas',
                                'edit_programas',
                                'delete_programas'
                              ];
        /*
        set the permissions for the user role, by default
        role admin we will assign all the permissions
        */
        $this->user_permissions = [
                                    'add_empleados',
                                    'edit_empleados',
                                    'show_empleados',
                                    'add_asistencia',
                                    'edit_asistencia'

                            ];

    }




    public function run()
	  {
    	  // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        foreach ($this->permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

        // create the admin role and set all default permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo($this->permissions);

        // create the user role and set all user permissions
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo($this->user_permissions);
    }
}
