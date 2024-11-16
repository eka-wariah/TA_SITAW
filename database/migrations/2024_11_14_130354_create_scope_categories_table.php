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
        Schema::create('scope_categories', function (Blueprint $table) {
            $table->bigIncrements('scs_id');
            $table->string('scs_name');
            $table->unsignedBigInteger('scs_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('scs_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('scs_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'scs_deleted_at');
            $table->string('scs_sys_note')->nullable();


            $table->foreign('scs_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('scs_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('scs_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scope_categories');
    }
};
