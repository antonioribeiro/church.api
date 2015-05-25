<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $tables = [
        'users'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->dropAll();

        $this->call('UsersSeeder');
    }

    private function dropAll()
    {
        foreach($this->tables as $table)
        {
            DB::table($table)->truncate();
        }
    }
}
