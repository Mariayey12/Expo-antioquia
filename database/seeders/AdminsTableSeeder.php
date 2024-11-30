<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        // Datos para la tabla 'admins'
        $admins = [
            [
                'permissions' => 'manage_users,view_reports',
                'department' => 'IT',
                'notes' => 'Administrador del sistema principal',
            ],
            [
                'permissions' => 'manage_services,view_statistics',
                'department' => 'Customer Support',
                'notes' => 'Responsable de soporte al cliente',
            ],
        ];


    }
}
