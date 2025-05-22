 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('penjualans', function (Blueprint $table) {
          $table->id();
          $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
          $table->integer('jumlah');
          $table->decimal('harga', 20, 2); // harga per item saat jual
          $table->decimal('total_price', 20, 2); // tambahkan ini
          $table->timestamps();
     });
    }

    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
