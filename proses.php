<?php

class Pegadaian {

    public $pinjaman;
    public $bunga;
    public $lama;
    public $telat;

    public function totalPinjaman() { // Method hitung total pinjaman + bunga
        return $this->pinjaman + ($this->pinjaman * $this->bunga / 100);
    }

    public function angsuranPerBulan() { // Method hitung angsuran per bulan
        return $this->totalPinjaman() / $this->lama;
    }

    public function denda() { // Method hitung denda (0.15% per hari dari angsuran)
        return $this->angsuranPerBulan() * 0.0015 * $this->telat;
    }

    public function totalBayar() { // Method total bayar jika telat
        return $this->angsuranPerBulan() + $this->denda();
    }
}

$data = new Pegadaian(); // Membuat object

// Mengambil data dari form
$data->pinjaman = htmlspecialchars($_POST['pinjaman']);
$data->bunga    = htmlspecialchars($_POST['bunga']);
$data->lama     = htmlspecialchars($_POST['lama']);
$data->telat    = htmlspecialchars($_POST['telat']);

echo "<h2>Hasil Perhitungan</h2>";
echo "Total Pinjaman : Rp " . number_format($data->totalPinjaman()) . "<br>";
echo "Besaran Angsuran : Rp " . number_format($data->angsuranPerBulan()) . "<br>";
echo "Denda Keterlambatan : Rp " . number_format($data->denda()) . "<br>";
echo "Total Pembayaran : Rp " . number_format($data->totalBayar());

?>