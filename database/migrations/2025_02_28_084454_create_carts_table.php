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
            Schema::create('carts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Hubungkan ke user
                $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Produk yang ditambahkan
                $table->foreignId('stock_id')->constrained()->onDelete('cascade'); 
                $table->integer('quantity')->default(1); // Jumlah produk
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('carts');
        }
    };
