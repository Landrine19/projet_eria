<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOndeleteEvenementToEvenementMembreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evenement_membre', function (Blueprint $table) {
            
            $table->dropForeign('evenement_membre_evenement_id_foreign');
            
            $table->foreign('evenement_id')
                ->references('id')
                ->on('evenements')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evenement_membre', function (Blueprint $table) {
            //
        });
    }
}
