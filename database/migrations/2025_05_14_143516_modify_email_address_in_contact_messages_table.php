<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyEmailAddressInContactMessagesTable extends Migration
{
    public function up()
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropUnique(['email_address']); // Remove unique constraint
            $table->string('email_address')->change(); // Re-declare column without unique
        });
    }

    public function down()
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->string('email_address')->unique()->change(); // Revert back
        });
    }
}

