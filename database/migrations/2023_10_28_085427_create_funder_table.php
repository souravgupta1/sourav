<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('funder', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('funder_type');
            $table->text('funder_category');
            $table->text('funder_entity');
            $table->text('funder_name');
            $table->text('funder_middel');
            $table->text('funder_last');
            $table->text('funder_nationality');
            $table->text('funder_country');
            $table->text('funder_state');
            $table->text('funder_city');
            $table->text('funder_pin');
            $table->text('funder_address1');
            $table->text('funder_address2');
            $table->text('funder_contact_name');
            $table->text('funder_contact_number');
            $table->text('funder_email');
            $table->text('funder_website');
            $table->text('funder_pan');
            $table->text('funder_pan_img');
            $table->text('funder_passport');
            $table->text('funder_passport_img');
            $table->text('funder_remark');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funder');
    }
};
