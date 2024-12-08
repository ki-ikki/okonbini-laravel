<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->nullable(false);
            $table->foreignId('item_category_id')->nullable(false);
            $table->foreignId('item_image_id')->nullable(false);
            $table->string('item_name', 255)->nullable(false);
            $table->text('item_info')->nullable();
            $table->integer('price')->check('price >= 0')->nullable(false);
            $table->date('release_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        // `tsvector` 型のカラムを追加するためのSQLを手動で実行
        DB::statement('ALTER TABLE items ADD COLUMN search_vector tsvector');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
