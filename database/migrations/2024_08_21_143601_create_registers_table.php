<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->comment('報名編號');
            $table->unsignedBigInteger('activities_id')->comment('活動編號');
            $table->string('name', 128)->comment('姓名');
            $table->string('telephone', 32)->comment('市話');
            $table->string('mobile', 16)->comment('手機號碼');
            $table->string('email', 256)->comment('電子信箱');
            $table->string('line_id', 256)->comment('LINE ID');
            $table->string('city_code', 5)->comment('學校縣市代碼');
            $table->string('county_code', 3)->comment('學校鄉鎮區代碼');
            $table->string('school', 256)->comment('學校');
            $table->string('register_area', 256)->comment('報名區域');
            $table->string('agent_info', 256)->comment('報名窗口-姓名/手機');
            $table->string('agent_email', 256)->comment('報名窗口電子信箱');
            $table->unsignedBigInteger('created_at')->default(0)->comment('建立時間');
            $table->unsignedBigInteger('updated_at')->default(0)->comment('修改時間');

            $table->index('activities_id');
        });
        DB::statement("ALTER TABLE `registers` comment '報名資料'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
