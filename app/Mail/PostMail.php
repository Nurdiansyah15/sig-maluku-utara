<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
  
  	//ADA DUA PARAMETER YANG AKAN KITA TERIMA, PERTAMA ADALAH JUDUL ARTIKEL DAN YANG KEDUA ADALAH NAMA PENERIMA
    public $nama;
    public $hp;
    public $alamat;
    public $jenis;
    public $lokasi;
    public $maps;
    public $foto;
    
    public function __construct($nama, $hp,$alamat,$jenis,$lokasi,$maps,$foto)
    {
        $this->nama = $nama;
        $this->hp = $hp;
        $this->alamat = $alamat;
        $this->jenis = $jenis;
        $this->lokasi = $lokasi;
        $this->maps = $maps;
        $this->foto = $foto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Laporan Masyarakat via SIAP')->view('emails.post');
    }
}
