<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            if (!Schema::hasColumn('contact_messages', 'name')) {
                $table->string('name')->after('id');
            }

            if (!Schema::hasColumn('contact_messages', 'email')) {
                $table->string('email')->after('name');
            }

            if (!Schema::hasColumn('contact_messages', 'subject')) {
                $table->string('subject')->after('email');
            }

            if (!Schema::hasColumn('contact_messages', 'message')) {
                $table->text('message')->after('subject');
            }

            if (!Schema::hasColumn('contact_messages', 'is_read')) {
                $table->boolean('is_read')->default(false)->after('message');
            }
        });
    }

    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            if (Schema::hasColumn('contact_messages', 'is_read')) {
                $table->dropColumn('is_read');
            }

            if (Schema::hasColumn('contact_messages', 'message')) {
                $table->dropColumn('message');
            }

            if (Schema::hasColumn('contact_messages', 'subject')) {
                $table->dropColumn('subject');
            }

            if (Schema::hasColumn('contact_messages', 'email')) {
                $table->dropColumn('email');
            }

            if (Schema::hasColumn('contact_messages', 'name')) {
                $table->dropColumn('name');
            }
        });
    }
};