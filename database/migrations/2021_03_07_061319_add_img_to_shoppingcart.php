<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgToShoppingcart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shoppingcart', function (Blueprint $table) {
            $table->string('img')->default('https://marumiimgbucket.s3.ap-northeast-1.amazonaws.com/zgFMlUXLltJ9ts7jJbYbnjCbi8RgynwQtgphWxpr.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shoppingcart', function (Blueprint $table) {
            $table->dropColumn('img');
        });
    }
}
