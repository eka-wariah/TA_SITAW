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
        Schema::create('complaints', function (Blueprint $table) {
            $table->bigIncrements('cmp_id');
            $table->string('cmp_evidence');
            $table->string('cmp_location');
            $table->unsignedBigInteger('cmp_scope_id');
            $table->timestamps();
            $table->renameColumn('updated_at', 'cmp_updated_at');
            $table->renameColumn('created_at', 'cmp_created_at');
            $table->unsignedBigInteger('cmp_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('cmp_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('cmp_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'cmp_deleted_at');
            $table->string('cmp_sys_note')->nullable();


            $table->foreign('cmp_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cmp_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cmp_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cmp_scope_id')->references('scs_id')->on('scope_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
