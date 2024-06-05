<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->insert([

            // TONER
            [
                'id_kategori' => 1,
                'id_merk' => 1,
                'nama_product' => 'Wardah - Acnederm Pure Refining Toner
                ',
                'harga' => 'Rp 34.000',
                'deskripsi' => 'Toner multifungsi yang dapat bantu meringkas pori-pori kulit setelah membersihkan wajah. Hasilnya kulit akan lebih mudah menyerap manfaat krim pelembab yang akan digunakan.'
            ],
            [
                'id_kategori' => 1,
                'id_merk' => 1,
                'nama_product' => 'Wardah - Hydra Rose Petal Infused Toner',
                'harga' => 'Rp 127.500',
                'deskripsi' => 'Toner dengan kelopak bunga mawar asli serta 72 Hours Hydrating Active di dalamnya bekerja dengan mengembalikan skin barrier yang rusak, menenangkan serta mengembalikan hidrasi/kelembaban optimal kulit wajah.'
            ],
            [
                'id_kategori' => 1,
                'id_merk' => 2,
                'nama_product' => 'Scarlett Whitening Brightly Essence Toner 100ml
                ',
                'harga' => 'Rp 59.000',
                'deskripsi' => 'SCARLETT Brightly Ever After Essence Toner, kombinasi unik 2-in-1 essence dan toner dengan formula mencerahkan sekaligus menyiapkan kulit agar lebih maksimal menyerap skincare.'
            ],
            [
                'id_kategori' => 1,
                'id_merk' => 3,
                'nama_product' => 'Skintific 5% AHA BHA PHA Exfoliating Toner 80ml',
                'harga' => 'Rp 109.000',
                'deskripsi' => 'Skintific 5% AHA BHA PHA Exfoliating Toner 80ml. Kulit bersih dan tampak lebih bersinar dengan Skintific 5% AHA BHA PHA Exfoliating toner. Perpaduan acid yang baik untuk kulit dan Kompleks Probiotik.'
            ],
            [
                'id_kategori' => 1,
                'id_merk' => 3,
                'nama_product' => 'Skintific Glycolic Acid Daily Clarifying Toner 80ml',
                'harga' => 'Rp 109.000',
                'deskripsi' => 'Toner eksfoliasi ringan yang diformulasikan aman untuk digunakan setiap hari. Mengandung Glycolic Acid kualitas terbaik untuk membantu mencerahkan kulit. Kandungan Glycolic Acid membantu melawan jerawat dan beruntusan yang muncul pada kulit wajah.'
            ],
            [
                'id_kategori' => 1,
                'id_merk' => 3,
                'nama_product' => 'Skintific 5x Ceramide Soothing Toner 80ml',
                'harga' => 'Rp 109.000',
                'deskripsi' => 'Toner yang dapat digunakan sehari-hari untuk menenangkan kulit saat skin barrier sedang terganggu, membantu proses perbaikan skin barrier dan menjaga kulit agar tetap sehat.'
            ],

            // MOISTURIZER
            [
                'id_kategori' => 2,
                'id_merk' => 1,
                'nama_product' => 'Perfect Bright Moisturizer Bright + Oil Control Spf 30 Pa+++',
                'harga' => 'Rp 30.000',
                'deskripsi' => 'Inovasi terbaru dari Wardah, kini hadir moisturizer pencerah dengan kandungan 4X Bright Berries, kombinasi 4 berry pilihan yang cerahkan kulit, dilengkapi dengan Zinc dan SPF 30 PA+++ yang mengurangi tampilan minyak berlebih pada wajah!'
            ],
            [
                'id_kategori' => 2,
                'id_merk' => 1,
                'nama_product' => 'Perfect Bright Night Moisturizer Bright + Night Glow
                ',
                'harga' => 'Rp 30.500',
                'deskripsi' => 'Night moisturizer pencerah yang memberikan hidrasi dan menutrisi kulit pada malam hari, untuk kulit lebih cerah, glowing ternutrisi di pagi hari. Diformulasikan dengan 4X* Bright Berries *kombinasi 4 berry pilihan yang formulanya mencerahkan kulit.'
            ],
            [
                'id_kategori' => 2,
                'id_merk' => 2,
                'nama_product' => 'Scarlett Whitening Age Delay - Phyto Biotics Renewing Moisturizer 20 gr
                ',
                'harga' => 'Rp 75.000',
                'deskripsi' => 'Moisturizer atau pelembap yang ampuh menghidrasi dan memperlambat tanda penuaan, SCARLETT Whitening Phyto Biotics Renewing Moisturizer cocok untuk jadi pilihan. Hadir dengan tekstur gel bening, mudah meresap tanpa terasa lengket.'
            ],
            [
                'id_kategori' => 2,
                'id_merk' => 3,
                'nama_product' => 'Skintific 5% Panthenol Acne Calming Water Gel 45gr',
                'harga' => 'Rp 130.000',
                'deskripsi' => 'Moisturizer dengan tekstur gel ringan dan unik, terasa seperti air dan memberikan sensasi cooling yang menenangkan kulit. Mengandung 5% Panthenol dan Ectoin, moisturizer ini efektif membantu meredakan kemerahan dan menenangkan kulit berjerawat. '
            ],
            [
                'id_kategori' => 2,
                'id_merk' => 3,
                'nama_product' => 'Skintific MSH Niacinamide Brightening Moisturizer 30gr',
                'harga' => 'Rp 130.000',
                'deskripsi' => 'MSH Niacinamide Brightening Moisture Gel dengan tekstur seringan udara, dapat menyerap dengan cepat dan mengontrol minyak dalam 24 jam. Diformulasikan dengan Novel MSH Niacinamide dikombinasikan dengan dua bahan pencerah.
                '
            ],
            [
                'id_kategori' => 2,
                'id_merk' => 3,
                'nama_product' => 'Skintific Gentle A Retinol Cream Renewal Moisturizer
                ',
                'harga' => 'Rp 117.000',
                'deskripsi' => 'Moisturizer dengan kandungan encapsulated retinol yang gentle dan aman untuk pemula. Menggunakan Time-released Technology yang bekerja dengan cepat dan efektif tanpa menimbulkan iritasi pada kulit wajah.'
            ],

            // SERUM
            [
                'id_kategori' => 3,
                'id_merk' => 1,
                'nama_product' => 'Wardah - Hydra Rose Micro Gel Serum',
                'harga' => 'Rp 135.500',
                'deskripsi' => 'Serum dengan kandungan 72 Hours Hydrating Active dan Rose Oil menghidrasi serta menjaga kelembapan kulit. Diperkaya butiran HydraMoist Micro Gel, memberikan kelembapan ekstra sepanjang hari.'
            ],
            [
                'id_kategori' => 3,
                'id_merk' => 1,
                'nama_product' => 'Wardah - Lightening Serum Ampoule',
                'harga' => 'Rp 69.500',
                'deskripsi' => 'Wardah Lightening Serum Ampoule mengandung 10X Advanced Niacinamide lebih banyak di setiap tetesnya yang bekerja optimal untuk mencerahkan, menyamarkan bekas jerawat, sekaligus melindungi kulit dari paparan blue light.
                '
            ],
            [
                'id_kategori' => 3,
                'id_merk' => 2,
                'nama_product' => 'Scarlett Whitening Glowtening Serum 15ml',
                'harga' => 'Rp 59.000',
                'deskripsi' => 'Di dalam Glowtening Serum mengandung 16,5% Active Ingredients yaitu Tranexamide Acid, Niacinamide, Aloe Vera Extract, Allantoin, Licorice Extract, Calendula Oil, Geranium Oil, dan Olive Oil yang dimana bermanfaat bagi kesehatan kulit'
            ],
            [
                'id_kategori' => 3,
                'id_merk' => 3,
                'nama_product' => 'Skintific Symwhite377 Dark Spot Eraser Serum 20ml',
                'harga' => 'Rp 130.000',
                'deskripsi' => 'Serum yang mengandung SymWhite377 dengan tekstur ringan dan berat molekul rendah, menembus ke lapisan kulit dengan mudah dan efektif mencerahkan noda hitam pada kulit. Kandungan SymWhite377 membantu memudarkan noda hitam dalam 14 hari.
                '
            ],
            [
                'id_kategori' => 3,
                'id_merk' => 3,
                'nama_product' => 'Skintific 5x Ceramide Barrier Repair Serum 20ml ',
                'harga' => 'Rp 121.000',
                'deskripsi' => 'Serum yang diformulasikan untuk mengoptimalkan perbaikan skin barrier yang rusak. Mengkombinasikan 5 Jenis Ceramide yang berbeda untuk menjaga dan mengembalikan kondisi skin barrier agar kembali sehat. Dapat mencegah dan merawat inflamasi ataupun permasalahan kulit. '
            ],
            [
                'id_kategori' => 3,
                'id_merk' => 3,
                'nama_product' => 'Skintific Gentle A Retinol Renewal Serum',
                'harga' => 'Rp 129.000',
                'deskripsi' => 'Retinol serum dengan encapsulated retinol yang gentle dan aman untuk pemula. Menggunakan Time-released Technology yang bekerja dengan cepat dan efektif tanpa menimbulkan iritasi pada kulit wajah. '
            ],
              // SUNSCREEN
              [
                'id_kategori' => 4,
                'id_merk' => 1,
                'nama_product' => 'Wardah - UV Shield Aqua Fresh Essence Spf 50 Pa++++',
                'harga' => 'Rp 59.000',
                'deskripsi' => 'Sunscreen dengan Broad Spectrum Protection, 50x lebih optimal* menjaga kulit dari sinar UV A / UV B. Dengan inovasi formula 0% alkohol namun tetap ringan dan tidak lengket, serta terasa segar menghidrasi kulit.
                '
            ],
            [
                'id_kategori' => 4,
                'id_merk' => 1,
                'nama_product' => 'Wardah - UV Shield Essential Gel Sunscreen Serum Spf 35 Pa+++',
                'harga' => 'Rp 37.500',
                'deskripsi' => 'Sunscreen dengan SkinBoost DNA™ untuk perlindungan maksimal terhadap sinar UV sampai level DNA. Dilengkapi dengan : VITAMIN C, GLUTATHIONE, VITAMIN B3 untuk wajah cerah dan glowing!
                '
            ],
            [
                'id_kategori' => 4,
                'id_merk' => 2,
                'nama_product' => 'Scarlett Sun Bright Daily Sunscreen
                ',
                'harga' => 'Rp 59.000',
                'deskripsi' => 'Sunscreen yang membantu untuk melindungi kulit terhadap efek buruk sinar matahari (sinar UVA dan UVB), membantu mencerahkan kulit, serta menjaga kelembapan kulit'
            ],
            [
                'id_kategori' => 4,
                'id_merk' => 3,
                'nama_product' => 'Skintific 5x Ceramide Serum Sunscreen SPF50 PA++++ 30ml',
                'harga' => 'Rp 93.000',
                'deskripsi' => 'Sunscreen dengan kandungan utama 5X Ceramide yang dapat memperbaiki dan mengembalikan skin barrier. Dilengkapi  UV Filter jenis terbaru yang dapat melindungi kulit dari sinar UVA & UVB serta Blue Light, dengan SPF 50+ PA++++ tanpa mengiritasi kulit. '
            ],
            [
                'id_kategori' => 4,
                'id_merk' => 3,
                'nama_product' => 'Skintific All Day Light Sunscreen Mist SPF 50+ PA++++ 50ml',
                'harga' => 'Rp 74.000',
                'deskripsi' => 'Sunscreen mist dengan 0.01nm spray yang halus, mudah dibawa dan tidak merusak makeup pada saat diaplikasikan. Tekstur yang invisible, tidak terasa berat dan menyegarkan kulit. Memberikan rasa segar pada kulit saat digunakan. '
            ],
            [
                'id_kategori' => 4,
                'id_merk' => 3,
                'nama_product' => 'SKINTIFIC Sunscreen Ultra Light Serum SPF50 PA++++ 25ml Skincare - Ultra Light sun',
                'harga' => 'Rp 115.900',
                'deskripsi' => 'Sunscreen yang cepat menyerap dan sangat ringan dengan lapisan yang sangat tipis untuk perlindungan yang kuat, melawan sinar UVA/UVB. Mengandung antioksidan kuat dari Vitamin C untuk menetralkan radikal bebas.'
            ],


        ]);
    }
}
