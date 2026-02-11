<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exclude = ['login','logout','register'];
        $routes = Route::getRoutes();
        foreach($routes as $route){
            $routeName = $route->getName();
        if(!$routeName || in_array($routeName, $exclude)){
            continue;
            }
        Permission::firstOrCreate([
            'name'=>$routeName,
        ]);
        }
    }
}
