<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('document_id');
            $table->unsignedBigInteger('product_id');
            $table->jsonb('property');
            $table->string('language', 8);
            $table->uuid('created_by');
            $table->uuid('updated_by');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });

        DB::statement('CREATE INDEX idx_document_property ON documents USING GIN (property jsonb_path_ops)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
