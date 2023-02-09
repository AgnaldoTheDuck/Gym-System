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
        create definer = current_user trigger `tai_clients` after insert on `clients` for each row
        begin
        call sp_bonificacao(new.employee_id);
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
        DB::unprepared('drop trigger tai_clients');
    }
};
