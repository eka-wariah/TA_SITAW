<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('rpt_id');
            $table->string('rpt_name');  
            $table->unsignedBigInteger('rpt_date'); 
            $table->unsignedBigInteger('rpt_income_id');
            $table->unsignedBigInteger('rpt_output_id');
            $table->BigInteger('rpt_remaining_balance');
                        
            $table->unsignedBigInteger('rpt_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rpt_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('rpt_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'rpt_deleted_at');
            $table->string('rpt_sys_note')->nullable();

            $table->foreign('rpt_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rpt_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rpt_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rpt_date')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rpt_income_id')->references('icm_id')->on('incomes')->onDelete('cascade');
            $table->foreign('rpt_output_id')->references('otp_id')->on('outputs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
