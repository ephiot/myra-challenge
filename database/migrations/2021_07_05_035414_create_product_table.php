<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('brand');
            $table->float('price');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();
        });

        // Because Laravel doesn't support full text search migration
        DB::statement('ALTER TABLE `products` ADD FULLTEXT INDEX products_search_index (name, description, brand)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function($table) {
            $table->dropIndex('products_search_index');
        });
        Schema::dropIfExists('products');
    }
}
