<?php

class belanja { //ini adalah class Belanja
    public string $namapembeli="Alya"; // variable atau poperty
    public string $namabarang="ciki";
    public int $hargabarang=2000;
    public int $jumlahbarang=5;
    public float $totalbayar;
    public float $Diskon;

    public static float $pajak = 0.02; 

    public function __construct ($namapembeli){ //method
        $this->namapembeli = $namapembeli;
    }

    public function hitungtotal(): float
    {
        $subtotal = $this->hargabarang * $this->jumlahbarang; //operator aritmatika

        return $subtotal; 
    }
    public function tampilrincian ($namapembeli): void{ //method                            
        echo "Nama Pembeli : " . $this->namapembeli . "<br>";
        echo "Nama Barang : " . $this->namabarang . "<br>";
        echo "Harga Barang : " . $this->hargabarang . "<br>";
        echo "Jumlah Barang : " . $this->jumlahbarang . "<br>";
        echo "Total Bayar : " . $this->hitungtotal() . "<br>";


    }

}

$belanja1 = new Belanja(namapembeli: "Alya"); // object
$belanja1->tampilrincian(namapembeli: $belanja1->namapembeli);

