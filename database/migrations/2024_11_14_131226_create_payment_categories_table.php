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
        Schema::create('payment_categories', function (Blueprint $table) {
            $table->bigIncrements('pyc_id');
            $table->string('pyc_name');
            $table->BigInteger('pyc_price');
            $table->timestamps();
            $table->renameColumn('updated_at', 'pyc_updated_at');
            $table->renameColumn('created_at', 'pyc_created_at');
            $table->unsignedBigInteger('pyc_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('pyc_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('pyc_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'pyc_deleted_at');
            $table->string('pyc_sys_note')->nullable();


            $table->foreign('pyc_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('pyc_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('pyc_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_categories');
    }
};
