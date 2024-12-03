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
        Schema::create('administrators', function (Blueprint $table) {
            $table->bigIncrements('adm_id');
            $table->unsignedBigInteger('adm_name_id');
            $table->unsignedBigInteger('adm_email_id');
            $table->unsignedBigInteger('adm_scope_management_id');
            $table->timestamps();
            $table->renameColumn('updated_at', 'adm_updated_at');
            $table->renameColumn('created_at', 'adm_created_at');
            $table->unsignedBigInteger('adm_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('adm_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('adm_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'adm_deleted_at');
            $table->string('adm_sys_note')->nullable();


            $table->foreign('adm_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('adm_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('adm_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('adm_name_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('adm_email_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('adm_scope_management_id')->references('scs_id')->on('scope_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrators');
    }
};
