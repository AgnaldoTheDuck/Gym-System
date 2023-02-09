<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //teste de migração conivente
        $sql = "'create view vw_indexClient as
        select c.id as 'id', c.name as 'name', c.telephone as 'telephone', c.height as 'height', c.weight as 'weight', c.age as 'age', e.name as 'personal' 
        from clients c join employees e on c.employee_id = e.id;'";
        DB::unprepared($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('drop view vw_indexClient');
    }
};
