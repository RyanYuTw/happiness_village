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
        Schema::create('activities', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->comment('活動編號');
            $table->string('name', 256)->comment('活動名稱');
            $table->text('description')->nullable()->comment('活動描述');
            $table->unsignedBigInteger('start_at')->default(0)->comment('開始時間');
            $table->unsignedBigInteger('end_at')->default(0)->comment('結束時間');
            $table->json('limit')->nullable()->comment('限制條件');
            $table->unsignedBigInteger('created_at')->default(0)->comment('建立時間');
            $table->unsignedBigInteger('updated_at')->default(0)->comment('修改時間');

            $table->index(['start_at', 'end_at']);
        });
        DB::statement("ALTER TABLE `activities` comment '活動'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
