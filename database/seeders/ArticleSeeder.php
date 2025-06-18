<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all()->pluck('id')->toArray();
        $authors = Author::all()->pluck('id')->toArray();

        $articles = [
            [
                'title' => 'Mengenal macOS Sonoma: Fitur Baru dan Kesan Pertama',
                'content' => 'Apple secara resmi merilis macOS Sonoma sebagai penerus dari macOS Ventura. Sistem operasi terbaru ini membawa sejumlah fitur baru yang dirancang untuk meningkatkan produktivitas dan pengalaman pengguna Mac sehari-hari. Salah satu fitur yang paling mencolok adalah kehadiran widget di desktop. Sekarang, pengguna dapat menempatkan berbagai widget langsung di layar utama, dan widget tersebut akan menjadi transparan secara otomatis saat aplikasi lain sedang digunakan, sehingga tidak mengganggu tampilan utama.

macOS Sonoma juga memperkenalkan Game Mode, yang secara otomatis mengalokasikan sumber daya CPU dan GPU untuk game yang sedang berjalan. Hal ini membuat performa gaming menjadi lebih stabil dan mengurangi latensi pada perangkat tambahan seperti kontroler dan AirPods. Bagi pengguna yang sering melakukan video conference, fitur Presenter Overlay sangat berguna. Fitur ini memungkinkan wajah presenter tetap terlihat di layar secara overlay, meskipun sedang membagikan konten atau dokumen.

Safari pun mendapat pembaruan penting dengan hadirnya fitur profil, yang memungkinkan pengguna memisahkan riwayat, cookie, dan ekstensi untuk keperluan kerja, pribadi, dan lainnya. Selain itu, mode private browsing kini lebih aman dengan sistem penguncian otomatis saat tidak digunakan serta perlindungan pelacakan yang lebih baik.

macOS Sonoma kompatibel dengan sejumlah perangkat, termasuk iMac 2019 ke atas, MacBook Air dan Pro 2018 ke atas, Mac mini 2018 ke atas, serta semua model Mac Studio dan Mac Pro terbaru. Kesan awal penggunaan Sonoma sangat positif, dengan tampilan yang bersih, performa yang mulus, dan fitur-fitur kecil yang memberikan dampak nyata. Bagi yang ingin meng-upgrade, pengguna cukup membuka System Settings, lalu masuk ke General > Software Update, dan mengikuti petunjuk yang ada. Pastikan Mac terhubung ke Wi-Fi dan charger saat proses berlangsung.',
                'category_id' => $categories[array_rand($categories)],
                'author_id' => $authors[array_rand($authors)],
                'image' => 'https://picsum.photos/640/480?random=' . rand(1, 1000),
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
