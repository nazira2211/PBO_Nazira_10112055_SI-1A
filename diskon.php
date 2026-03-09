<?php

class Pembeli {

    // Property
    public $nama;
    public $member;
    public $belanja;
    public $diskon;
    public $totalBayar;

    // Constructor
    public function __construct($nama, $member, $belanja){
        $this->nama = $nama;
        $this->member = $member;
        $this->belanja = $belanja;
    }

    // Method untuk menghitung diskon
    public function hitungDiskon(){

        $this->diskon = 0;

        if($this->member == true){

            if($this->belanja > 500000){
                $this->diskon = 50000;
            }
            else if($this->belanja > 100000){
                $this->diskon = 15000;
            }

        }else{

            if($this->belanja > 100000){
                $this->diskon = 5000;
            }

        }

        $this->totalBayar = $this->belanja - $this->diskon;
    }

    // Method menampilkan data
    public function tampilkan($no){

        $status = $this->member ? "Memiliki" : "Tidak Memiliki";

        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>$this->nama</td>";
        echo "<td>$status</td>";
        echo "<td>$this->belanja</td>";
        echo "<td>$this->diskon</td>";
        echo "<td>$this->totalBayar</td>";
        echo "</tr>";
    }
}

// Membuat object
$p1 = new Pembeli("Pembeli 1", true, 200000);
$p2 = new Pembeli("Pembeli 2", true, 570000);
$p3 = new Pembeli("Pembeli 3", false, 120000);
$p4 = new Pembeli("Pembeli 4", false, 90000);

// Menyimpan object dalam array
$dataPembeli = [$p1,$p2,$p3,$p4];

echo "<h2>Data Pembelian</h2>";

echo "<table border='1' cellpadding='8'>";
echo "<tr>
<th>No</th>
<th>Pembeli</th>
<th>Kartu Member</th>
<th>Total Belanja</th>
<th>Diskon</th>
<th>Biaya yang dikeluarkan</th>
</tr>";

$no = 1;

foreach($dataPembeli as $p){

    $p->hitungDiskon();
    $p->tampilkan($no);
    $no++;

}

echo "</table>";

?>