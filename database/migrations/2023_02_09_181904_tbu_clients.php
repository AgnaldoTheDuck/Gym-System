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
        DB::unprepared("delimiter /
        create definer = current_user trigger `tbu_clients` before update on `clients` for each row 
        begin 
            if(fn_statusClient(new.id)) then
                signal sqlstate '45000' set message_text = 'Usuário Inativo ou inexistente';
            end if;
        
            call sp_bonificacao(new.employee_id, 0);
            call sp_bonificacao(old.employee_id, 1); 
            
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
        DB::unprepared('drop trigger tbu_clients');
    }
};
