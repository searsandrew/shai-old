<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailedAtAndAttacmentIdToWishlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wishlists', function (Blueprint $table) {
            $table->dateTime('emailed_at')->nullable()->after('status');
            $table->bigInteger('attachment_id')->unsigned()->nullable()->after('user_id');
            $table->foreign('attachment_id')->references('id')->on('attachments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wishlists', function (Blueprint $table) {
            $table->dropColumn('emailed_at');
            $table->dropForeign('wishlists_attachment_id_foreign');
            $table->dropColumn('attachment_id');
        });
    }
}
