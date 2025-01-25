<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePersonalAccessTokensCollection extends Migration
{
    public function up()
    {
        //Crear la colección en MongoDB
        Schema::connection('mongodb')->create('personal_access_tokens', function ($collection) {
            $collection->string('id', 36)->unique();
            $collection->string('tokenable_type');
            $collection->string('tokenable_id');
            $collection->string('name');
            $collection->string('token', 64)->unique();
            $collection->text('abilities')->nullable();
            $collection->timestamp('last_used_at')->nullable();
            $collection->timestamps();
        });
    }

    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('personal_access_tokens');
    }
}
