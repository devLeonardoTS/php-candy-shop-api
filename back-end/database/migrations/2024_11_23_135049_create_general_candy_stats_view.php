<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW candy_sale_stats AS
            SELECT 
                COUNT(*) AS total_candies_sold,
                SUM(price) AS total_revenue
            FROM sales;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS candy_sale_stats");
    }
};