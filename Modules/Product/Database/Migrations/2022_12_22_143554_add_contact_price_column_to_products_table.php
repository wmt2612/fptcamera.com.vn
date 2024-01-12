<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Product\Entities\Product;

class AddContactPriceColumnToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            if(!Schema::hasColumn('products', 'contact_for_price')) {
                $table->boolean('contact_for_price')->after('is_active')->default(Product::CONTACT_FOR_PRICE_DEACTIVE);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {

        });
    }
}
