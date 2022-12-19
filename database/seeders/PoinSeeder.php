<?php

namespace Database\Seeders;

use App\Models\Poin;
use App\Models\Agama;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PoinSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $alpha = str_split("abcdefghijklmnopqrstuvwxyz");

    // ISLAM
    $poins = [
      "Dapat menjelaskan makna Rukun Iman dan Rukun Islam.",
      "Mampu menjelaskan makna Sholat berjamaah dan dapat mendirikan Sholat sunah secara individu.",
      "Mampu menjelaskan makna berpuasa serta macam-macam Puasa.",
      "Tahu tata cara merawat atau mengurus jenazah (Tajhizul Jenazah).",
      "Dapat membaca doa Ijab Qobul Zakat.",
      "Dapat menghafal minimal sebuah hadist dan menjelaskan hadist tersebut.",
    ];
    for ($i = 0; $i < count($poins); $i++) {
      Poin::create([
        'nomor' => '1' . $alpha[$i] . ' Agama Islam',
        'isi' => $poins[$i],
        'agama_id' => 1
      ]);
    }

    // KATHOLIK
    $poins = [
      "Tahu dan paham makna dan arti Gereja Katolik.",
      "Dapat memimpin doa dan membangun serta membuat gerakan cinta kasih pada keberagaman agama di luar Gereja Katolik.",
    ];
    for ($i = 0; $i < count($poins); $i++) {
      Poin::create([
        'nomor' => '1' . $alpha[$i] . ' Agama Katholik',
        'isi' => $poins[$i],
        'agama_id' => 2 // KATHOLIK
      ]);
    }

    // PROTESTAN
    $poins = [
      "Mendalami Hukum Kasih dan mengamalkannya dalam kehidupan sehari-hari.",
    ];
    for ($i = 0; $i < count($poins); $i++) {
      Poin::create([
        'nomor' => '1' . $alpha[$i] . ' Agama Protestan',
        'isi' => $poins[$i],
        'agama_id' => 3 // KATHOLIK
      ]);
    }

    // HINDU
    $poins = [
      "Dapat menjelaskan sejarah perkembangan agama Hindu di Indonesia.",
      "Dapat menjelaskan makna dan hakikat dari tujuan melaksanakan persembahyangan sehari-hari dan hari besar keagamaan Hindu.",
      "Dapat menjelaskan maksud dan tujuan kelahiran menjadi manusia menurut agama Hindu.",
      "Dapat menjelaskan makna dan hakekat ajaran Tri Hita Karana dengan pelestarian alam lingkungan.",
      "Dapat mempraktikkan bentuk gerakan Asanas dari Hatta Yoga.",
      "Dapat melafalkan dan mengkidungkan salah satu bentuk Dharma Gita.",
      "Dapat mendeskripsikan struktur, fungsi dan sejarah pura dalam cakupan Sad Kahyangan.",
    ];
    for ($i = 0; $i < count($poins); $i++) {
      Poin::create([
        'nomor' => '1' . $alpha[$i] . ' Agama Hindu',
        'isi' => $poins[$i],
        'agama_id' => 4 // HINDU
      ]);
    }

    // BUDDHA
    $poins = [
      "Saddha: Mengungkapkan Buddha Dharma sebagai salah satu agama.",
      "Merumuskan dasar-dasar keyakinan dan cara mengembangkannya.",
      "Menjelaskan sejarah Buddha Gotama.",
      "Menjelaskan Tiratana sebagai pelindung.",
      "Menjelaskan kisah-kisah sejarah penulisan kitab suci tripitaka.",
    ];
    for ($i = 0; $i < count($poins); $i++) {
      Poin::create([
        'nomor' => '1' . $alpha[$i] . ' Agama Buddha',
        'isi' => $poins[$i],
        'agama_id' => 5 // BUDDHA
      ]);
    }

    // UMUM
    $poins = [
      "Berani menyampaikan kritik dan saran dengan sopan dan santun kepada sesama teman.",
      "Dapat mengikuti jalannya diskusi dengan baik.",
      "Dapat saling menghormati dan toleransi dalam bakti antar umat beragama.",
      "Mengikuti pertemuan Ambalan sekurang-kurangnya 2 kali setiap bulan.",
      "Setia membayar luran kepada gugus depan, dengan uang yang diperoleh dari usaha sendiri.",
      "Dapat berbahasa Indonesia dengan baik dan benar dalam pergaulan sehari-hari.",
      "Telah membantu mengelola kegiatan di Ambalan.",
      "Telah ikut aktif kerja bakti di masyarakat minimal 2 kali.",
      "Dapat menampilkan kesenian daerah di depan umum minimal satu kali.",
      "Mengenal, mengerti dan memahami isi AD & ART Gerakan Pramuka .",
      "Dapat menjelaskan sejarah kepramukaan Indonesia dan dunia.",
      "Dapat menggunakan jam, kompa tanda jejak dan tanda-tanda alam lainnya dalam pengembaraan.",
      "Dapat menjelaskan bentuk pengamalan Pancasila dalam kehidupan sehari-hari.",
      "Dapat menjelaskan tentang organisasi ASEAN dan PBB.",
      "Dapat menjelaskan tentang kewirausahaan.",
      "Dapat mendaur ulang barang bekas menjadi barang yang bermanfaat.",
      "Dapat menerapkan pengetahuannya tentang tali temall dan pionering dalam kehidupan sehari-hari.",
      "Selalu berolahraga, mampu melakukan olahraga renang gaya bebas dan menguasai 1 (satu) cabang olahraga tim.",
      "Dapat menjelaskan perkembangan fisik laki-laki dan perempuan.",
      "Dapat memimpin baris-berbaris dan menjelaskan peraturannya kepada anggota sangganya.",
      "Dapat menyebutkan beberapa penyakit infeksi, degeneratif dan penyakit yang disebabkan perilaku tidak sehat.",
      "Ikut serta dalam perkemahan selama 3 hari berturut-turut.",
    ];

    for ($i = 0; $i < count($poins); $i++) {
      Poin::create([
        'nomor' => $i + 2,
        'isi' => $poins[$i],
        'agama_id' => null
      ]);
    }
  }
}
