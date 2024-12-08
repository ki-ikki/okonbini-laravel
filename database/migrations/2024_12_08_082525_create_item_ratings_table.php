<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->nullable(false);
            $table->foreignId('store_id')->nullable(false);
            $table->integer('favorite_weekly_count')->default(0)->check('favorite_weekly_count >= 0')->nullable(false);
            $table->integer('favorite_monthly_count')->default(0)->check('favorite_monthly_count >= 0')->nullable(false);
            $table->integer('favorite_total_count')->default(0)->check('favorite_total_count >= 0')->nullable(false);
            $table->integer('review_weekly_count')->default(0)->check('review_weekly_count >= 0')->nullable(false);
            $table->integer('review_monthly_count')->default(0)->check('review_monthly_count >= 0')->nullable(false);
            $table->integer('review_total_count')->default(0)->check('review_total_count >= 0')->nullable(false);
            $table->integer('sort_date')->nullable()->nullable(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_ratings');
    }
};
