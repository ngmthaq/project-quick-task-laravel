<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIsAdminAndIsActiveWithDefaultValueInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->smallInteger('is_admin')->default(User::IS_NOT_ADMIN)->change();
            $table->smallInteger('is_active')->default(User::USER_UNACTIVE)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->smallInteger('is_admin')->default(null)->change();
            $table->smallInteger('is_active')->default(null)->change();
        });
    }
}
