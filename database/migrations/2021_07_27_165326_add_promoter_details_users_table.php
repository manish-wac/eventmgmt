<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPromoterDetailsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->string('first_name')->after('name')->nullable();
            // $table->string('last_name')->after('first_name')->nullable();
            // $table->string('country_id')->after('last_name')->nullable();
            // $table->string('state_id')->after('country_id')->nullable();
            // $table->string('district_id')->after('state_id')->nullable();
            // $table->string('taluk_id')->after('district_id')->nullable();
            // $table->string('country_phone_code')->after('taluk_id')->nullable();
            // $table->string('mobile_number')->after('country_phone_code')->nullable();
            // $table->string('location')->after('mobile_number')->nullable();
            // $table->string('promoter')->after('location')->nullable();
            // $table->string('location')->after('promoter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
