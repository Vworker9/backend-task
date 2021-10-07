<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string("full_detail_url")->nullable()->after("property_for");
            $table->string("latitude")->nullable()->after("full_detail_url");
            $table->string("longitude")->nullable()->after("latitude");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn("full_detail_url");
            $table->dropColumn("latitude");
            $table->dropColumn("longitude");
        });
    }
}
