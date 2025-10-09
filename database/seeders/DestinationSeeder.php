<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('destinations')->insert([
            [
                'name' => 'Wana Wisata Baturraden',
                'description' => 'Wana Wisata Baturraden merupakan hutan lindung dan tempat rekreasi yang ideal sebagai sarana pendidikan dan pengembangan ilmu pengetahuan juga dapat menimbulkan rasa cinta kepada alam.',
                'address' => 'Jl. Bumi Perkemahan Wana Wisata, Dusun I Karangmangu, Kemutug Lor, Kec. Baturaden, Kabupaten Banyumas, Jawa Tengah 53151',
                'maps_link' => 'https://maps.app.goo.gl/PLVRfeQAC3UYQQ8F7',
                'location' => 'Banyumas, Jawa Tengah',
                'main_image_url' => 'https://res.cloudinary.com/djfxfwzin/image/upload/v1759993844/WanaWisata_dmhuo4.jpg',
                'destination_category_id' => 1,
            ],
            [
                'name' => 'Curug Cipendok',
                'description' => 'Curug Cipendok adalah air terjun dengan ketinggian 92 meter yang terletak di lereng Gunung Slamet. Curug Cipendok mempunyai daya tarik tersendiri, karena lingkungan masih betul-betul alami. Kesunyian juga masih sangat terasa, sebab belum banyak pelancong yang datang menikmati keindahan alamnya.',
                'address' => 'Dusun II Lebaksiu, Karanganyar, Karangtengah, Kec. Cilongok, Kabupaten Banyumas, Jawa Tengah 53162',
                'maps_link' => 'https://maps.app.goo.gl/iK242jK1Ms5cy7v18',
                'location' => 'Banyumas, Jawa Tengah',
                'main_image_url' => 'https://res.cloudinary.com/djfxfwzin/image/upload/v1759994095/CurugCipendok_rj0nyn.jpg',
                'destination_category_id' => 2,
            ],
            [
                'name' => 'Hutan Pinus Limpakuwus',
                'description' => 'Hutan Pinus Limpakuwus adalah destinasi wisata alam yang menakjubkan yang menawarkan berbagai layanan dan aktivitas untuk semua jenis pengunjung. Dari cottage yang nyaman hingga petualangan outbound yang menantang, dari wahana menghibur hingga camping di alam terbuka, ada sesuatu untuk semua orang di sini.',
                'address' => 'Area Sawah, Limpakuwus, Kec. Sumbang, Kabupaten Banyumas, Jawa Tengah 53151',
                'maps_link' => 'https://maps.app.goo.gl/8VPvNZRP3NkXC1TQ9',
                'location' => 'Banyumas, Jawa Tengah',
                'main_image_url' => 'https://res.cloudinary.com/djfxfwzin/image/upload/v1759994180/HutanPinus_iv9pok.jpg',
                'destination_category_id' => 3,
            ],
            [
                'name' => 'Kawah Sikidang',
                'description' => 'Kawah Sikidang merupakan lapangan perkawahan di Dataran Tinggi Dieng yang berada paling dekat dengan kawasan percandian Dieng, mudah diakses dan dinikmati karena terletak di tanah datar, sehingga juga menjadi kawah yang paling dikunjungi wisatawan.',
                'address' => 'Bakal Buntu, Dieng Kulon, Kec. Batur, Kab. Banjarnegara, Jawa Tengah 53456',
                'maps_link' => 'https://maps.app.goo.gl/Mw5gH6FBYvRnq2Cd8',
                'location' => 'Banjarnegara, Jawa Tengah',
                'main_image_url' => 'https://res.cloudinary.com/djfxfwzin/image/upload/v1759994248/KawahSikidang_hoedsb.jpg',
                'destination_category_id' => 4,
            ],
            [
                'name' => 'Pantai Menganti',
                'description' => 'Pantai Menganti merupakan sebuah pantai yang berlokasi di Desa Karangduwur, Kecamatan Ayah, Kabupaten Kebumen, Jawa Tengah. Bentang alam pada Pantai Menganti terdiri dari perbukitan dan pasir putih. Sejak tahun 2011, Pantai Menganti menjadi tempat wisata dan selancar, sekaligus pelabuhan dan pelelangan ikan.',
                'address' => 'Tj. Karangboto, Karangduwur, Kec. Ayah, Kabupaten Kebumen, Jawa Tengah 54473',
                'maps_link' => 'https://maps.app.goo.gl/vM3JfvP5Hy6QqYon8',
                'location' => 'Kebumen, Jawa Tengah',
                'main_image_url' => 'https://res.cloudinary.com/djfxfwzin/image/upload/v1759994351/Menganti_oqcper.png',
                'destination_category_id' => 5,
            ],
            [
                'name' => 'Gunung Selok',
                'description' => 'Gunung Selok merupakan daerah perbukitan yang menjulang menyerupai gunung dan kawasan hutan homogen tanaman mahoni. Hutan buatan yang dikelola oleh pihak Kantor Pemangku Hutan (KPH) Banyumas ini terdapat beberapa sanggar yang digunakan untuk ziarah atau beribadah, yaitu Jambe 5, Jambe & dan Padepokan Sang Hyang Gunung Jati.',
                'address' => 'Sawah,Ladang, Karangbenda, Kec. Adipala, Kabupaten Cilacap, Jawa Tengah',
                'maps_link' => 'https://maps.app.goo.gl/1K6DHV9gdmixzbK88',
                'location' => 'Cilacap, Jawa Tengah',
                'main_image_url' => 'https://res.cloudinary.com/djfxfwzin/image/upload/v1759994433/GunungSelok_fjjqin.jpg',
                'destination_category_id' => 1,
            ],
            [
                'name' => 'Pantai Lampon',
                'description' => 'Pantai Lampon merupakan salah satu destinasi wisata bahari yang terletak di Desa Pasir, Kecamatan Ayah, Kabupaten Kebumen, Jawa Tengah. Dikenal sebagai pantai yang masih alami dan relatif tersembunyi, Pantai Lampon menawarkan pemandangan alam yang menakjubkan dengan perpaduan pasir cokelat kehitaman, perbukitan hijau, dan air laut yang jernih.',
                'address' => 'Hutan, Pasir, Kec. Ayah, Kabupaten Kebumen, Jawa Tengah 54473',
                'maps_link' => 'https://maps.app.goo.gl/ASx87gRXjVMVh2qp7',
                'location' => 'Kebumen, Jawa Tengah',
                'main_image_url' => 'https://res.cloudinary.com/djfxfwzin/image/upload/v1759994514/Pantai-Lampon-Kebumen_eiueiy.jpg',
                'destination_category_id' => 2,
            ],
            [
                'name' => 'Pantai Surumanis',
                'description' => 'Pantai Surumanis adalah salah satu pantai tersembunyi yang belum banyak dikunjungi oleh wisatawan. Dikelilingi tebing karang dan hamparan pasir hitam kecoklatan yang unik, pantai ini menawarkan pemandangan alam yang masih sangat alami serta suasana tenang.',
                'address' => 'Dilem, Pasir, Kec. Ayah, Kabupaten Kebumen, Jawa Tengah 54473',
                'maps_link' => 'https://maps.app.goo.gl/TSmZLr5KW3C7NCeJ9',
                'location' => 'Kebumen, Jawa Tengah',
                'main_image_url' => 'https://res.cloudinary.com/djfxfwzin/image/upload/v1759994563/surumanis_hvnvei.jpg',
                'destination_category_id' => 3,
            ],
            [
                'name' => 'Bukit Tengtung',
                'description' => 'Bukit Tengtung Baturaden yang terletak di kawasan wisata Baturaden yang menawarkan panorama sepektakuler yang memanjakan mata dengan pemandangan menakjubkan. Selain itu, Bukit Tengtung juga menjadi tempat yang ideal untuk menikmati matahari terbit atau terbenam sehingga sangat cocok untuk berfoto-foto.',
                'address' => 'Munggangsari, Karangsalam, Kec. Baturaden, Kabupaten Banyumas, Jawa Tengah 53126, Karangsalam, Baturraden',
                'maps_link' => 'https://maps.app.goo.gl/gFzvovgJvY5HnREX6',
                'location' => 'Banyumas, Jawa Tengah',
                'main_image_url' => 'https://res.cloudinary.com/djfxfwzin/image/upload/v1759994652/bukittengtung_dgi5jp.jpg',
                'destination_category_id' => 4,
            ],
            [
                'name' => 'Massapi Cafe & Resto',
                'description' => 'Massapi Cafe ini ada di tengah rimbunnya hutan pinus, tepatnya di kawasan wisata Baturaden yang memang terkenal dengan udaranya yang dingin dan segar.',
                'address' => 'Dusun III Berubahan, Kemutug Lor, Kec. Baturaden, Kabupaten Banyumas, Jawa Tengah 53151',
                'maps_link' => 'https://maps.app.goo.gl/MUkUmMc86S1pbPrd7',
                'location' => 'Banyumas, Jawa Tengah',
                'main_image_url' => 'https://res.cloudinary.com/djfxfwzin/image/upload/v1759994514/Pantai-Lampon-Kebumen_eiueiy.jpg',
                'destination_category_id' => 5,
            ],
        ]);
    }
}
