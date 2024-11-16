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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('pym_id');
            $table->unsignedBigInteger('pym_name_id');
            $table->unsignedBigInteger('pym_category_pay_id');
            $table->BigInteger('pym_total');
            $table->string('pym_type_payment');    
            $table->BigInteger('pym_quantity');            
            $table->unsignedBigInteger('pym_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('pym_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('pym_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'pym_deleted_at');
            $table->string('pym_sys_note')->nullable();

            $table->foreign('pym_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('pym_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('pym_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('pym_name_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('pym_category_pay_id')->references('pyc_id')->on('payment_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
