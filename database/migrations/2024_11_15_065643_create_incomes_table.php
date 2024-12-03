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
        Schema::create('incomes', function (Blueprint $table) {
            $table->bigIncrements('icm_id');
            $table->string('icm_month');   
            $table->unsignedBigInteger('icm_quantity_id');
            $table->string('icm_status');
            $table->timestamps();
            $table->renameColumn('updated_at', 'icm_updated_at');
            $table->renameColumn('created_at', 'icm_created_at');
            $table->unsignedBigInteger('icm_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('icm_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('icm_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'icm_deleted_at');
            $table->string('icm_sys_note')->nullable();

            $table->foreign('icm_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('icm_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('icm_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('icm_quantity_id')->references('pym_id')->on('payments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
