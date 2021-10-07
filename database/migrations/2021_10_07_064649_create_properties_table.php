<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string("property_type")->nullable();
            $table->string("county")->nullable();
            $table->string("town")->nullable();
            $table->string("country")->nullable();
            $table->string("postcode")->nullable();
            $table->text("description")->nullable();
            $table->string("displayable_address")->nullable();
            $table->string("image_url")->nullable();
            $table->string("thumbnail_url")->nullable();
            $table->string("no_of_bedrooms")->nullable();
            $table->string("no_of_bathrooms")->nullable();
            $table->string("price")->nullable();
            $table->string("property_for")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
