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
        create procedure sp_bonificacao (codigo int, timing int)
        begin
            if(timing = 0) then
                update employees set bonus = bonus + 10 where id = `codigo`;
            elseif(timing = 1) then
                update employees set bonus = bonus - 10 where id = `codigo`;
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
        DB::unprepared('drop procedure sp_bonificacao');
    }
};