<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->constrained("categories")->onDelete("cascade");
            $table->enum("featured", ["Featured", "Not Featured"])->default("Not Featured");
            $table->enum("status", ["Published", "Archived", "Not Published"])->default("Not Published");
            $table->foreignId("author_id")->constrained("users")->onDelete("cascade");
            $table->string("slug")->nullable();
            $table->string("seo_title")->nullable();
            $table->string("title")->nullable();
            $table->string("featured_img")->nullable();
            $table->string("featured_img_alt")->nullable();
            $table->enum("comments_status", ["Active", "Not Active", "Read Only"])->default("Active");
            $table->string("published_at")->nullable();
            $table->longText("detail")->nullable();
            $table->string("meta_desc")->nullable();
            $table->string("meta_tags")->nullable();
            $table->string("additional_tags")->nullable();
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
        Schema::dropIfExists('posts');
    }
};
