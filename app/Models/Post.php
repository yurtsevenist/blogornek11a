<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Yazıyı oluşturan kullanıcının ID değeri.
        'title', // Yazının görünen başlığı.
        'slug', // Yazının URL adresinde kullanılan benzersiz adı.
        'category', // Yazının kategorisi.
        'author_name', // Kullanıcı ilişkisi olmayan yazarın görünen adı.
        'excerpt', // Yazı listelerinde gösterilen kısa özet.
        'body', // Yazının tam metni.
        'cover_image', // Kapak görselinin yolu.
        'meta_title', // Arama motorları için başlık.
        'meta_description', // Arama motorları için açıklama.
        'read_time', // Tahmini okuma süresi, dakika olarak.
        'is_published', // Yazının yayında olup olmadığını belirtir.
        'is_featured', // Yazının öne çıkarılıp çıkarılmadığını belirtir.
        'published_at', // Yayın tarihi ve saati.
        'view_count', // Görüntülenme toplamı.
        'like_count', // Beğeni toplamı.
        'dislike_count', // Beğenmeme toplamı.
    ];

    protected $casts = [
        'read_time' => 'integer', // Sayısal okuma süresi.
        'is_published' => 'boolean', // Yayın durumunu true/false olarak kullanır.
        'is_featured' => 'boolean', // Öne çıkarma durumunu true/false olarak kullanır.
        'published_at' => 'datetime', // Tarihi Carbon tarih nesnesine dönüştürür.
        'view_count' => 'integer', // Görüntülenme sayısını tam sayı yapar.
        'like_count' => 'integer', // Beğeni sayısını tam sayı yapar.
        'dislike_count' => 'integer', // Beğenmeme sayısını tam sayı yapar.
    ];

    public function user(): BelongsTo
    {
        // Yazının bağlı olduğu kullanıcıyı getirir.
        return $this->belongsTo(User::class);
    }
}
