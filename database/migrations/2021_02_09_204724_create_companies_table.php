<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('afm', 20)->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('company_email', 100)->unique();
            $table->string('company_name');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_num', 16);
            $table->string('address', 50);
            $table->string('city', 30);
            $table->string('post_code', 15);
            $table->string('open_time', 15);
            $table->string('close_time', 15);
            $table->string('reservation_frequency', 2);
            $table->unsignedBigInteger('category_id');
            $table->text('profile_photo_path')->nullable();
            $table->boolean('rsv_availabillity')->default(false);
            $table->timestamp('registration_date')->useCurrent();
            $table->timestamps();

            $table->unique(['id','user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
