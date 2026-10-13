<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Yazının benzersiz kimliği.
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // Yazarı kullanıcıya bağlar; kullanıcı silinirse boş kalır.
            $table->string('title'); // Yazının görünen başlığı.
            $table->string('slug')->unique(); // URL'de kullanılan benzersiz kısa ad.
            $table->string('category')->nullable(); // Yazının kategorisi.
            $table->string('author_name')->nullable(); // İlişkili kullanıcı yoksa gösterilecek yazar adı.
            $table->text('excerpt')->nullable(); // Liste ve önizlemelerde kullanılan kısa özet.
            $table->longText('body'); // Yazının tam içeriği.
            $table->string('cover_image')->nullable(); // Kapak görselinin yolu.
            $table->string('meta_title')->nullable(); // Arama motorlarında kullanılacak başlık.
            $table->text('meta_description')->nullable(); // Arama motorlarında kullanılacak açıklama.
            $table->unsignedSmallInteger('read_time')->nullable(); // Tahmini okuma süresi, dakika cinsinden.
            $table->boolean('is_published')->default(false); // Yazının ziyaretçilere açık olup olmadığını belirtir.
            $table->boolean('is_featured')->default(false); // Yazının öne çıkarılıp çıkarılmadığını belirtir.
            $table->timestamp('published_at')->nullable(); // Yazının yayınlandığı tarih ve saat.
            $table->unsignedBigInteger('view_count')->default(0); // Toplam görüntülenme sayısı.
            $table->unsignedBigInteger('like_count')->default(0); // Toplam beğeni sayısı.
            $table->unsignedBigInteger('dislike_count')->default(0); // Toplam beğenmeme sayısı.
            $table->timestamps(); // Oluşturulma ve son güncellenme tarihleri.

            $table->index(['is_published', 'published_at']); // Yayındaki yazıları tarihe göre filtrelemeyi hızlandırır.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
