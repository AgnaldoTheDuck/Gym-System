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
        DB::unprepared("
        delimiter /
        create definer = current_user trigger tbi_clients before insert on clients 
        for each row
        begin 
            if (new.employee_id in((select id from employees e where category_id <> 1))) then 
                signal sqlstate '45000' set message_text = 'Esse funcionário não é um Personal ';
            end if;
        end /
        delimiter ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('drop trigger tbi_clients');
    }
};
