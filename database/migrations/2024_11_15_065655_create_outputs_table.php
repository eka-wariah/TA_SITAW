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
        Schema::create('outputs', function (Blueprint $table) {
            $table->bigIncrements('otp_id');
            $table->string('otp_name');
            $table->BigInteger('otp_total_expenditure');
            $table->string('otp_status');    
            $table->timestamps();
            $table->renameColumn('updated_at', 'otp_updated_at');
            $table->renameColumn('created_at', 'otp_created_at');           
            $table->unsignedBigInteger('otp_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('otp_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('otp_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'otp_deleted_at');
            $table->string('otp_sys_note')->nullable();

            $table->foreign('otp_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('otp_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('otp_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outputs');
    }
};
