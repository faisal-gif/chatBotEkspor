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
                    Button::create('Pembiayaan Ekspor')->value('pembiayaan ekspor'),
                    Button::create('Belajar Ekspor')->value('belajar ekspor'),
                    Button::create('Program Jasa Konsultasi')->value('program jasa konsultasi'),
                    Button::create('Customer Service')->value('customer service'),
                ]));
            } elseif ($message == 'tentang indonesia eximbank') {
                $botman->reply(Question::create("Indonesia Eximbank berkomitmen untuk terus mendukung kinerja ekspor, meningkatkan nilai 
                                tambah dan daya saing komoditi ekspor dalam menghadapi tantangan global melalui penyediaan 
                                Pembiayaan, Penjaminan, Asuransi serta Jasa Konsultasi ")
                    ->addButtons([
                        Button::create('Pembiayaan Ekspor')->value('pembiayaan ekspor'),
                        Button::create('Penjaminan ekspor')->value('penjaminan ekspor'),
                        Button::create('Asuransi ekspor')->value('asuransi ekspor'),
                        Button::create('Program Jasa Konsultasi')->value('tentang indonesia eximbank'),
                        Button::create('Kembali ke menu awal')->value('halo'),
                    ]));
            } elseif ($message == 'pembiayaan ekspor') {
                $botman->reply(Question::create("Pembiayaan diberikan dalam bentuk Modal Kerja Ekspor maupun Investasi Kerja Ekspor kepada badan usaha, yang berbentuk badan hukum yang berdomisili 
                                didalam maupun diluar wilayah Negara Republik Indonesia, termasuk perorangan.
                                Untuk lebih lengkapnya, klik tautan berikut 
                                https://www.indonesiaeximbank.go.id/id/products-services
                                ")
                    ->addButtons([
                        Button::create('Kembali ke menu awal')->value('halo'),
                        Button::create('Kembali ke menu sebelumnya')->value('tentang indonesia eximbank'),
                    ]));
            } elseif ($message == 'penjaminan ekspor') {
                $botman->reply(Question::create("Program Penjaminan Kredit Indonesia Eximbank untuk Lembaga Keuangan memberikan 
                                jaminan bagi bisnis yang ingin mendapatkan pembiayaan dari bank dan lembaga keuangan 
                                lainnya, jika mereka gagal membayar kembali fasilitas pembiayaan.
                                Untuk lebih lengkapnya, klik tautan berikut https://www.indonesiaeximbank.go.id/id/products-services
                                ")
                    ->addButtons([
                        Button::create('Kembali ke menu awal')->value('halo'),
                        Button::create('Kembali ke menu sebelumnya')->value('tentang indonesia eximbank'),
                    ]));
            } elseif ($message == 'asuransi ekspor') {
                $botman->reply(Question::create("Layanan asuransi Indonesia Eximbank dirancang untuk memberikan kenyamanan 
                                transaksional dengan melindungi bisnis dari risiko kegagalan ekspor, gagal bayar pinjaman, kegagalan investasi yang 
                                dilakukan oleh perusahaan Indonesia di luar negeri, dan risiko politik di negara tujuan ekspor.
                                Untuk lebih lengkapnya, klik tautan berikut https://www.indonesiaeximbank.go.id/id/products-services
                                ")
                    ->addButtons([
                        Button::create('Kembali ke menu awal')->value('halo'),
                        Button::create('Kembali ke menu sebelumnya')->value('tentang indonesia eximbank'),
                    ]));
            } else {
                $botman->reply("Silahkan ketik 'halo'");
            }
        });

        $botman->listen();
    }
}
