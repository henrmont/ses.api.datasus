<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FDWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sql = 'CREATE EXTENSION IF NOT EXISTS postgres_fdw;';
        $sql .= 'DROP SERVER IF EXISTS '.config('fdw.auth.module').' CASCADE;';
        DB::unprepared($sql);

        $sql = 'CREATE SERVER '.config('fdw.auth.module').' FOREIGN DATA WRAPPER postgres_fdw OPTIONS (host \''.config('fdw.auth.host').'\', dbname \''.config('fdw.auth.database').'\');';
        $sql .= 'CREATE USER MAPPING FOR '.config('fdw.auth.user').' SERVER '.config('fdw.auth.module').' OPTIONS (user \''.config('fdw.auth.user').'\', password \''.config('fdw.auth.password').'\');';
        $sql .= 'ALTER SERVER '.config('fdw.auth.module').' OPTIONS (ADD updatable \'true\');';
        $sql .= 'IMPORT FOREIGN SCHEMA public LIMIT TO (users,permissions,roles,model_has_permissions,model_has_roles,role_has_permissions,modules,user_modules) FROM SERVER '.config('fdw.auth.module').' INTO public;';
        DB::unprepared($sql);
    }
}
