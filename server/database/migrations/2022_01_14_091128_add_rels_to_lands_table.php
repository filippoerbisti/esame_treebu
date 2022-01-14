<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelsToLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lands', function (Blueprint $table) {
            $table->bigInteger("land_types_id")->unsigned()->nullable();
            $table->foreign("land_types_id")->references("id")->on("land-types");
            $table->bigInteger("irrigation_types_id")->unsigned()->nullable();
            $table->foreign("irrigation_types_id")->references("id")->on("irrigation-types");
            $table->bigInteger("offer_types_id")->unsigned()->nullable();
            $table->foreign("offer_types_id")->references("id")->on("offer-types");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lands', function (Blueprint $table) {
            $table->dropForeign(["land_types_id"]);
            $table->dropColumn(["land_types_id"]);
            $table->dropForeign(["irrigation_types_id"]);
            $table->dropColumn(["irrigation_types_id"]);
            $table->dropForeign(["offer_types_id"]);
            $table->dropColumn(["offer_types_id"]);
        });
    }
}
