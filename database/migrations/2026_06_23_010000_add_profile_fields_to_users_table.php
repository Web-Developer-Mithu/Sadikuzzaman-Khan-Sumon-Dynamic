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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'profile_image')) {
                $table->string('profile_image')->nullable()->after('remember_token');
            }
            if (!Schema::hasColumn('users', 'hero_tagline')) {
                $table->string('hero_tagline')->nullable()->after('profile_image');
            }
            if (!Schema::hasColumn('users', 'hero_title')) {
                $table->string('hero_title')->nullable()->after('hero_tagline');
            }
            if (!Schema::hasColumn('users', 'hero_description')) {
                $table->text('hero_description')->nullable()->after('hero_title');
            }
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('hero_description');
            }
            if (!Schema::hasColumn('users', 'contact_email')) {
                $table->string('contact_email')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('users', 'address')) {
                $table->text('address')->nullable()->after('contact_email');
            }
            if (!Schema::hasColumn('users', 'linkedin')) {
                $table->string('linkedin')->nullable()->after('address');
            }
            if (!Schema::hasColumn('users', 'facebook')) {
                $table->string('facebook')->nullable()->after('linkedin');
            }
            if (!Schema::hasColumn('users', 'twitter')) {
                $table->string('twitter')->nullable()->after('facebook');
            }
            if (!Schema::hasColumn('users', 'instagram')) {
                $table->string('instagram')->nullable()->after('twitter');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'instagram')) {
                $table->dropColumn('instagram');
            }
            if (Schema::hasColumn('users', 'twitter')) {
                $table->dropColumn('twitter');
            }
            if (Schema::hasColumn('users', 'facebook')) {
                $table->dropColumn('facebook');
            }
            if (Schema::hasColumn('users', 'linkedin')) {
                $table->dropColumn('linkedin');
            }
            if (Schema::hasColumn('users', 'address')) {
                $table->dropColumn('address');
            }
            if (Schema::hasColumn('users', 'contact_email')) {
                $table->dropColumn('contact_email');
            }
            if (Schema::hasColumn('users', 'phone')) {
                $table->dropColumn('phone');
            }
            if (Schema::hasColumn('users', 'hero_description')) {
                $table->dropColumn('hero_description');
            }
            if (Schema::hasColumn('users', 'hero_title')) {
                $table->dropColumn('hero_title');
            }
            if (Schema::hasColumn('users', 'hero_tagline')) {
                $table->dropColumn('hero_tagline');
            }
            if (Schema::hasColumn('users', 'profile_image')) {
                $table->dropColumn('profile_image');
            }
        });
    }
};
