<?php

// Definisi Class untuk mengelola logika kasir
class KasirToko {
    // Properti Array untuk menyimpan data transaksi
    private $transaksi = [];

    // Method untuk memasukkan data (input) ke dalam array
    public function setData($statusKartu, $totalBelanja) {
        $this->transaksi = [
            'kartu' => $statusKartu,
            'belanja' => $totalBelanja
        ];
    }

    // Method untuk menghitung diskon berdasarkan flowchart
    private function hitungDiskon() {
        $kartu = $this->transaksi['kartu'];
        $total = $this->transaksi['belanja'];
        $diskon = 0;

        // Logika Pemilihan (Flowchart)
        if ($kartu == "ya") {
            // Jalur kanan: Memiliki kartu
            if ($total > 100000) {
                $diskon = 15000;
            }
        } else {
            // Jalur kiri: Tidak memiliki kartu
            if ($total > 500000) {
                $diskon = 50000;
            } elseif ($total > 100000) {
                $diskon = 5000;
            }
        }
        return $diskon;
    }

    // Method untuk menampilkan output akhir ke browser
    public function tampilkanRun() {
        $diskon = $this->hitungDiskon();
        $totalBayar = $this->transaksi['belanja'] - $diskon;

        echo "run:<br>";
        echo "Apakah ada kartu member: " . $this->transaksi['kartu'] . "<br>";
        echo "Total belanjaan: " . $this->transaksi['belanja'] . "<br>";
        echo "Total Bayar: Rp " . number_format($totalBayar, 0, ',', '') . "<br>";
        echo "BUILD SUCCESSFUL (total time: 11 seconds)";
    }
}

// --- Instansiasi Objek dan Eksekusi ---
$proses = new KasirToko();
$proses->setData("ya", 334000); // Input sesuai gambar
$proses->tampilkanRun();

?>