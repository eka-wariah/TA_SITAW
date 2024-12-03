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
        Schema::create('waste_banks', function (Blueprint $table) {
            $table->bigIncrements('wtb_id');
            $table->unsignedBigInteger('wtb_name_id');
            $table->unsignedBigInteger('wtb_category_trash_id');
            $table->BigInteger('wtb_total_wate');
            $table->string('wtb_total_money');  
            $table->timestamps();
            $table->renameColumn('updated_at', 'wtb_updated_at');
            $table->renameColumn('created_at', 'wtb_created_at');             
            $table->unsignedBigInteger('wtb_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('wtb_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('wtb_updated_by')->unsigned()->nullable();
      
            $table->softDeletes();
            $table->renameColumn('deleted_at', 'wtb_deleted_at');
            $table->string('wtb_sys_note')->nullable();

            $table->foreign('wtb_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('wtb_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('wtb_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('wtb_name_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('wtb_category_trash_id')->references('trc_id')->on('trash_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_banks');
    }
};
