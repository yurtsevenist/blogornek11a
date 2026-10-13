<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $topic = $this->faker->randomElement([
            'günlük alışkanlıklar', 'yaratıcılık', 'iyi yaşam', 'kitaplar',
            'şehir hayatı', 'kişisel gelişim', 'doğa', 'öğrenme',
            'zaman yönetimi', 'dijital denge', 'sade yaşam', 'ilişkiler',
        ]);

        $category = $this->faker->randomElement([
            'İyi Yaşam', 'Kişisel Gelişim', 'Yaratıcılık', 'Kitaplar',
            'Şehir Yaşamı', 'Doğa', 'Öğrenme', 'Günlük Yaşam',
        ]);

        $title = $this->faker->randomElement([
            ucfirst($topic) . ' için küçük bir başlangıç',
            ucfirst($topic) . ' üzerine düşünmenin yeni yolları',
            ucfirst($topic) . ' hayatına nasıl daha çok yer açarsın?',
            'Daha sakin bir gün için ' . $topic,
            $topic . ' konusunda kendine nazik davran',
            'Bugün deneyebileceğin ' . $topic . ' fikirleri',
        ]);

        $excerpt = $this->faker->randomElement([
            'Küçük ve sürdürülebilir seçimlerle ' . $topic . ' için kendine yeni bir alan aç.',
            'Günlük hayatın içinden birkaç fikirle ' . $topic . ' konusuna farklı bir gözle bak.',
            'Büyük değişiklikler beklemeden ' . $topic . ' için bugün ufak bir adım atabilirsin.',
            'Kendine uygun bir ritim bulmak, ' . $topic . ' yolculuğunu daha keyifli hale getirebilir.',
        ]);

        $paragraphs = [
            'Bazen yeni bir şey denemek için ihtiyacımız olan tek şey, başlangıcı kolaylaştıracak küçük bir fikirdir. ' . ucfirst($topic) . ' konusunda herkesin yolu farklı olabilir; önemli olan sana iyi gelen noktayı keşfetmektir.',
            $this->faker->randomElement([
                'Kendine kısa bir zaman ayır, beklentilerini sadeleştir ve ilk adımı gözünde büyütmeden at.',
                'Gün içinde sana uygun bir an seç. Birkaç dakikalık düzenli tekrar, zamanla güçlü bir alışkanlığa dönüşebilir.',
                'Çevrendeki küçük ayrıntılara dikkat etmek yeni seçenekleri fark etmene yardımcı olabilir.',
                'Her gün aynı tempoda ilerlemek zorunda değilsin. Ara vermek de sürecin doğal bir parçasıdır.',
            ]),
            $this->faker->randomElement([
                'Deneyimini bir yere not et ve sana nasıl hissettirdiğine bak. Böylece sonraki adımını daha bilinçli seçebilirsin.',
                'Kendini başkalarıyla kıyaslamak yerine kendi ilerlemene odaklan. Sana ait bir yöntem bulmak zaman alabilir.',
                'Küçük bir değişikliği birkaç gün sürdür, işe yarayan yanlarını fark et ve gerektiğinde kendine göre düzenle.',
                'Bazen en iyi sonuç, kendine biraz boşluk tanıdığında ortaya çıkar. Merakını canlı tut ve denemeye devam et.',
            ]),
        ];

        $coverImages = [
            'tema/assets/img/home-bg.jpg',
            'tema/assets/img/about-bg.jpg',
            'tema/assets/img/contact-bg.jpg',
            'tema/assets/img/post-bg.jpg',
            'tema/assets/img/post-sample-image.jpg',
        ];

        return [
            'user_id' => null,
            'title' => Str::ucfirst($title),
            'slug' => Str::slug($title) . '-' . Str::lower(Str::random(6)),
            'category' => $category,
            'author_name' => $this->faker->name(),
            'excerpt' => $excerpt,
            'body' => implode("\n\n", $paragraphs),
            'cover_image' => $this->faker->randomElement($coverImages),
            'meta_title' => Str::ucfirst($title),
            'meta_description' => $excerpt,
            'read_time' => $this->faker->numberBetween(3, 12),
            'is_published' => true,
            'is_featured' => $this->faker->boolean(15),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'view_count' => $this->faker->numberBetween(0, 5000),
            'like_count' => $this->faker->numberBetween(0, 500),
            'dislike_count' => $this->faker->numberBetween(0, 50),
        ];
    }
}
