<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBlogPosting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posting', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 65)->index();
            $table->string('slug', 64)->unique();
            $table->text('content');
            $table->string('description', 155);
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->dateTime('published_at')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posting');
    }
}
