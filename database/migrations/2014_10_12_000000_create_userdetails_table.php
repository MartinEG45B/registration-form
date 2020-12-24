<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdetails', function (Blueprint $table) {
            $table->id(); //Didn't make the email primary, since it is long and it could change
            $table->string('username', 20);
            $table->string('password', 60);
            $table->string('email',320)->unique(); //64+1+255
            $table->text('url')->nullable(); //most popular
            $table->date('dob');
            $table->rememberToken();//for remember me cookie hijack. it changes everytime user logs out
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
        Schema::dropIfExists('userdetails');
    }
}
