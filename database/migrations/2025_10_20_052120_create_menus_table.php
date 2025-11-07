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
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('url');
            $table->string('icon')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('permission_name')->nullable();
            $table->unsignedBigInteger('permission_id')->nullable();
            $table->integer('order')->default(0);
            $table->string('data_key');
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('parent_id', 'menus_parent_id_foreign');
            $table->index('created_by', 'menus_created_by_foreign');
            $table->index('updated_by', 'menus_updated_by_foreign');
            $table->index('permission_id', 'menus_permission_id_foreign');

            // Foreign keys
            $table->foreign('created_by', 'menus_created_by_foreign')
                ->references('id')->on('users')
                ->onUpdate('restrict')
                ->onDelete('set null');

            $table->foreign('updated_by', 'menus_updated_by_foreign')
                ->references('id')->on('users')
                ->onUpdate('restrict')
                ->onDelete('set null');

            $table->foreign('parent_id', 'menus_parent_id_foreign')
                ->references('id')->on('menus')
                ->onUpdate('restrict')
                ->onDelete('cascade');

            $table->foreign('permission_id', 'menus_permission_id_foreign')
                ->references('id')->on('permissions')
                ->onUpdate('restrict')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
