<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;



class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {
            $message = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $message);
            $message = strtolower($message);

            if ($message == 'halo') {
                $botman->reply('Mau Tanya Apa ?');
                $botman->reply(Question::create('')->addButtons([
                    Button::create('Tentang Indonesia Eximbank')->value('tentang indonesia eximbank'),
                    Button::create('Pembiayaan Ekspor')->value('pembiayaan ekspor step1'),
                    Button::create('Belajar Ekspor')->value('belajar ekspor'),
                    Button::create('Program Jasa Konsultasi')->value('program jasa konsultasi'),
                    Button::create('Customer Service')->value('customer service'),
                ]));
            } elseif ($message == 'tentang indonesia eximbank') {
                $botman->reply("Indonesia Eximbank merupakan lembaga keuangan khusus milik Pemerintah Republik Indonesia 
                                                yang didirikan berdasarkan Undang-Undang Nomor 2 Tahun 2009 untuk menjalankan Pembiayaan Ekspor Nasional (PEN) 
                                                dengan memberikan Pembiayaan, Asuransi dan Penjaminan serta Jasa Konsultasi Untuk Ekspor");
                $botman->reply(Question::create("Menu : ")
                    ->addButtons([
                        Button::create('Pembiayaan Ekspor')->value('pembiayaan ekspor step1'),
                        Button::create('Program Jasa Konsultasi ')->value('program jasa konsultasi'),
                        Button::create('Kembali ke menu awal')->value('halo'),
                    ]));
            } elseif ($message == 'pembiayaan ekspor step1') {
                $botman->reply("Indonesia Eximbank berkomitmen untuk terus mendukung kinerja ekspor, meningkatkan nilai 
                                tambah dan daya saing komoditi ekspor dalam menghadapi tantangan global melalui penyediaan 
                                Pembiayaan, Penjaminan, Asuransi serta Jasa Konsultasi ");
                $botman->reply(Question::create("Menu : ")
                    ->addButtons([
                        Button::create('Pembiayaan Ekspor')->value('pembiayaan ekspor step2'),
                        Button::create('Penjaminan ekspor')->value('penjaminan ekspor'),
                        Button::create('Asuransi ekspor')->value('asuransi ekspor'),
                        Button::create('Program Jasa Konsultasi')->value('program jasa konsultasi'),
                        Button::create('Kembali ke menu awal')->value('halo'),
                    ]));
            } elseif ($message == 'pembiayaan ekspor step2') {
                $botman->reply("Pembiayaan diberikan dalam bentuk Modal Kerja Ekspor maupun Investasi Kerja Ekspor kepada badan usaha, yang berbentuk badan hukum yang berdomisili 
                                didalam maupun diluar wilayah Negara Republik Indonesia, termasuk perorangan.
                                <br>
                                <br>
                                Untuk lebih lengkapnya, klik tautan berikut 
                                <a href='https://www.indonesiaeximbank.go.id/id/products-services' target='_blank' rel='noopener noreferrer'>
                                https://www.indonesiaeximbank.go.id/id/products-services
                                </a>
                                ");
                $botman->reply(Question::create("Menu : ")
                    ->addButtons([
                        Button::create('Kembali ke menu awal')->value('halo'),
                        Button::create('Kembali ke menu sebelumnya')->value('pembiayaan ekspor step1'),
                    ]));
            } elseif ($message == 'penjaminan ekspor') {
                $botman->reply("Program Penjaminan Kredit Indonesia Eximbank untuk Lembaga Keuangan memberikan 
                                jaminan bagi bisnis yang ingin mendapatkan pembiayaan dari bank dan lembaga keuangan 
                                lainnya, jika mereka gagal membayar kembali fasilitas pembiayaan.
                                <br>
                                <br>
                                Untuk lebih lengkapnya, klik tautan berikut 
                                <a href='https://www.indonesiaeximbank.go.id/id/products-services' target='_blank' rel='noopener noreferrer'>
                                https://www.indonesiaeximbank.go.id/id/products-services
                                </a>
                                
                                ");
                $botman->reply(Question::create("Menu : ")
                    ->addButtons([
                        Button::create('Kembali ke menu awal')->value('halo'),
                        Button::create('Kembali ke menu sebelumnya')->value('pembiayaan ekspor step1'),
                    ]));
            } elseif ($message == 'asuransi ekspor') {
                $botman->reply("Layanan asuransi Indonesia Eximbank dirancang untuk memberikan kenyamanan 
                                transaksional dengan melindungi bisnis dari risiko kegagalan ekspor, gagal bayar pinjaman, kegagalan investasi yang 
                                dilakukan oleh perusahaan Indonesia di luar negeri, dan risiko politik di negara tujuan ekspor.
                                <br>
                                <br>
                                Untuk lebih lengkapnya, klik tautan berikut 
                                <a href='https://www.indonesiaeximbank.go.id/id/products-services' target='_blank' rel='noopener noreferrer'>
                                https://www.indonesiaeximbank.go.id/id/products-services
                                </a>
                                ");
                $botman->reply(Question::create("Menu : ")
                    ->addButtons([
                        Button::create('Kembali ke menu awal')->value('halo'),
                        Button::create('Kembali ke menu sebelumnya')->value('pembiayaan ekspor step1'),
                    ]));
            } elseif ($message == 'belajar ekspor') {
                $botman->reply("Ekspor adalah kegiatan kegiatan mengeluarkan Barang dari Daerah Pabean (Indonesia) 
                                yang terdiri dari ekspor langsung dan ekspor tidak langsung (melalui perantara) ");
                $botman->reply(Question::create("List : ")
                    ->addButtons([
                        Button::create('Tentang UMKM Calon Eksportir')->value('tentang umkm calon eksportir'),
                        Button::create('Persiapan Administrasi')->value('persiapan administrasi'),
                        Button::create('Legalitas sebagai Eksportir')->value('legalitas sebagai eksportir'),
                        Button::create('Persiapan Produk Ekspor')->value('persiapan produk ekspor'),
                        Button::create('Kembali ke menu awal')->value('halo'),
                    ]));
            } elseif ($message == 'tentang umkm calon eksportir') {
                $botman->reply("Produk-produk usaha mikro kecil dan menengah (UMKM) 
                                                di Indonesia memiliki potensi yang sangat besar untuk 
                                                menembus pasar ekspor. Ada empat langkah yang harus ditempuh 
                                                pelaku usaha hingga produknya bisa diekspor, yakni persiapan 
                                                administrasi, legalitas sebagai eksportir, persiapan produk ekspor, 
                                                dan persiapan operasional.
                                                <br>
                                                <br>
                                                Akses modul-modul pembelajaran lainnya terkait ekspor di 
                                                <a href='https://www.digitalekspor.com' target='_blank' rel='noopener noreferrer'>
                                                www.digitalekspor.com
                                                </a> 
                                                serta dapatkan informasi program Jasa Konsultasi
                                                ");
                $botman->reply(Question::create("Menu : ")
                    ->addButtons([
                        Button::create('Kembali ke menu awal')->value('halo'),
                        Button::create('Kembali ke menu sebelumnya')->value('belajar ekspor'),
                        Button::create('Program Jasa Konsultasi')->value('program jasa konsultasi'),
                    ]));
            } elseif ($message == 'persiapan administrasi') {
                $botman->reply("Persiapan Administrasi
                                                <br> 
                                                Sebagai badan usaha yang akan melakukan bisnis internasional, tentunya harus memiliki 
                                                elengkapan syarata administrasi, perlengkapan dan peralatan pendukung lainnya. Pelaku usaha 
                                                juga harus mempunyai jaringan komunikasi dan tenaga operasional yang dapat berkomunikasi dalam 
                                                Bahasa Inggris, serta menyiapkan company profile sebagai bahan informasi dan promosi 
                                                kepada calon pembeli.
                                                <br>
                                                <br>
                                                Akses modul-modul pembelajaran lainnya terkait ekspor di 
                                                <a href='https://www.digitalekspor.com' target='_blank' rel='noopener noreferrer'>
                                                www.digitalekspor.com
                                                </a> 
                                                serta dapatkan informasi program Jasa Konsultasi

                ");
                $botman->reply(Question::create("Pertanyaan : ")
                    ->addButtons([
                        Button::create('Kembali ke menu awal')->value('halo'),
                        Button::create('Kembali ke menu sebelumnya')->value('belajar ekspor'),
                        Button::create('Program Jasa Konsultasi')->value('program jasa konsultasi'),
                    ]));
            } elseif ($message == 'legalitas sebagai eksportir') {
                $botman->reply("Legalitas sebagai Eksportir
                <br>
                Calon eksportir juga harus mempersiapkan legalitas yang dibutuhkan untuk mengekspor produknya. 
                Beberapa persyaratan yang harus dipersiapkan di antaranya, Surat Izin Usaha Perdagangan (SIUP),
                 Tanda Daftar Perusahaan (TDP), Nomor Pokok Wajib Pokok (NPWP), serta dokumen lain yang 
                 dipersyaratkan berdasarkan peraturan perundang-undangan yang berlaku. 
                 Setelah persyaratan di atas dipenuhi, pelaku usaha juga harus menyiapkan dokumen 
                 ainnya seperti kontrak penjualan, faktur perdagangan, Letter of Credit (L/C), Pemberitahuan 
                 Ekspor Barang (PEB), Bill of Lading (B/L), polis asuransi, packing list, Surat Keterangan Asal,
                 surat pernyataan mutu, dan wessel export untuk eksportir.
                 <br>
                 <br>
                 Akses modul-modul pembelajaran lainnya terkait ekspor di 
                 <a href='https://www.digitalekspor.com' target='_blank' rel='noopener noreferrer'>
                 www.digitalekspor.com
                 </a> 
                 serta dapatkan informasi program Jasa Konsultasi");
                $botman->reply(Question::create("Pertanyaan : ")
                    ->addButtons([
                        Button::create('Kembali ke menu awal')->value('halo'),
                        Button::create('Kembali ke menu sebelumnya')->value('belajar ekspor'),
                        Button::create('Program Jasa Konsultasi')->value('program jasa konsultasi'),
                    ]));
            } elseif ($message == 'persiapan produk ekspor') {
                $botman->reply("Persiapan Produk Ekspor
                <br>
                Pelaku usaha sebelumnya harus dapat mengetahui ketentuan persyaratan internasional atau 
                ketentuan permintaan pasar luar negeri, misalnya kuantias, kualitas, pengemasan, pelabelan, 
                penadanaan dan waktu pengiriman. Pelaku usaha juga harus mengkalkulasi biaya-biaya yang diperlukan 
                mulai dari ongkos produksi hingga pemasaran, sehingga bisa menetapkan harga jual produk
                <br>
                <br>
                Akses modul-modul pembelajaran lainnya terkait ekspor di 
                <a href='https://www.digitalekspor.com' target='_blank' rel='noopener noreferrer'>
                www.digitalekspor.com
                </a> 
                serta dapatkan informasi program Jasa Konsultasi
                ");
                $botman->reply(Question::create("Pertanyaan : ")
                    ->addButtons([
                        Button::create('Kembali ke menu awal')->value('halo'),
                        Button::create('Kembali ke menu sebelumnya')->value('belajar ekspor'),
                        Button::create('Program Jasa Konsultasi')->value('program jasa konsultasi'),
                    ]));
            } elseif ($message == 'program jasa konsultasi') {
                $botman->reply("Indonesia Eximbank juga menyediakan layanan Jasa Konsultasi kepada UMKM 
                untuk bisa naik kelas menjadi eksportir yang mendunia lewat beberapa program
                ");
                $botman->reply(Question::create("Pertanyaan : ")
                    ->addButtons([
                        Button::create('Coaching Program for New Eksportir (CPNE)')->value('coaching program for new eksportir'),
                        Button::create('Pembukaan Akses Pasar')->value('pembukaan akses pasar'),
                        Button::create('Paltform Digital Ekspor')->value('paltform digital ekspor'),
                        Button::create('Kembali ke menu awal')->value('halo'),
                    ]));
            } elseif ($message == 'coaching program for new eksportir') {
                $botman->reply("CPNE dalah program yang disiapkan dengan durasi sekitar 1 tahun 
                melalui tahapan seleksi pelaku UKM berorientasi ekspor, yang ingin berkembang menjadi 
                cikal bakal eksportir. Dilakukan secara hybrid (offline dan online di beberapa kota) 
                <br>
                <br>
                Klik tautan berikut untuk mendaftar CPNE 
                <a href='https://Bit.ly/daftarcpne' target='_blank' rel='noopener noreferrer'>
                Bit.ly/daftarcpne
                </a> 
                ");
                $botman->reply(Question::create("Hubungi Customer Service untuk informasi lebih lanjut ")
                    ->addButtons([
                        Button::create('Kembali ke menu awal')->value('halo'),
                        Button::create('Kembali ke menu sebelumnya')->value('program jasa konsultasi'),
                        Button::create('Customer Service')->value('customer service'),
                    ]));
            } elseif ($message == 'pembukaan akses pasar') {
                $botman->reply("Program dukungan percepatan ekspor dengan melakukan promosi 
                produk UKME salah satunya melalui global marketplace, bantuan pencarian buyer hingga 
                diterimanya pembayaran oleh UKM mitra binaan LPEI.
                ");
                $botman->reply(Question::create("Hubungi Customer Service untuk informasi lebih lanjut ")
                    ->addButtons([
                        Button::create('Kembali ke menu awal')->value('halo'),
                        Button::create('Kembali ke menu sebelumnya')->value('program jasa konsultasi'),
                        Button::create('Customer Service')->value('customer service'),
                    ]));
            } elseif ($message == 'paltform digital ekspor') {
                $botman->reply("Platform E-Learning online adalah media bagi calon eksportir untuk dapat 
                belajar pengetahuan terkait ekspor yang berisi video-video modul ekspor, data ekspor serta 
                informasi terkait lainnya
                <br>
                <br>
                Klik tautan berikut untuk mengakses Digital Ekspor 
                <a href='https://www.digitalekspor.com' target='_blank' rel='noopener noreferrer'>
                www.digitalekspor.com
                </a>
                ");
                $botman->reply(Question::create("Hubungi Customer Service untuk informasi lebih lanjut ")
                    ->addButtons([
                        Button::create('Kembali ke menu awal')->value('halo'),
                        Button::create('Kembali ke menu sebelumnya')->value('program jasa konsultasi'),
                        Button::create('Customer Service')->value('customer service'),
                    ]));
            } elseif ($message == 'customer service') {
                $botman->reply("Mohon tunggu beberapa saat, tim kami akan segera menghubungi anda.
                <br>
                <br>
                Atau dapat mengirimkan pertanyaan ke corpsec@indonesiaeximbank.go.id
                ");
            } else {
                $botman->reply("Silahkan ketik 'halo'");
            }
        });

        $botman->listen();
    }
}
