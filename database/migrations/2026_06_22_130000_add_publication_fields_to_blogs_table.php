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
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'publication_name')) {
                $table->string('publication_name')->nullable()->after('subtitle');
            }
            if (!Schema::hasColumn('blogs', 'article_url')) {
                $table->string('article_url')->nullable()->after('publication_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (Schema::hasColumn('blogs', 'publication_name')) {
                $table->dropColumn('publication_name');
            }
            if (Schema::hasColumn('blogs', 'article_url')) {
                $table->dropColumn('article_url');
            }
        });
    }
};
