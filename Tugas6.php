<?php
class BangunRuang {

    public $jenis;
    public $sisi;
    public $jari;
    public $tinggi;

    // Constructor
    public function __construct($jenis, $sisi, $jari, $tinggi){
        $this->jenis = $jenis;
        $this->sisi = $sisi;
        $this->jari = $jari;
        $this->tinggi = $tinggi;
    }

    // Method menghitung volume
    public function hitungVolume(){
        switch($this->jenis){

            case "Bola":
                return (4/3) * pi() * pow($this->jari,3);

            case "Kerucut":
                return (1/3) * pi() * pow($this->jari,2) * $this->tinggi;

            case "Limas Segi Empat":
                return (1/3) * pow($this->sisi,2) * $this->tinggi;

            case "Kubus":
                return pow($this->sisi,3);

            case "Tabung":
                return pi() * pow($this->jari,2) * $this->tinggi;

            default:
                return 0;
        }
    }
}

// Array data bangun ruang
$data = [
    new BangunRuang("Bola",0,7,0),
    new BangunRuang("Kerucut",0,14,10),
    new BangunRuang("Limas Segi Empat",8,0,24),
    new BangunRuang("Kubus",30,0,0),
    new BangunRuang("Tabung",0,7,10)
];
?>

<!DOCTYPE html>
<html>
<head>
<title>Volume Bangun Ruang</title>
<style>
table{
    border-collapse: collapse;
    width: 70%;
}
th, td{
    border:1px solid black;
    padding:8px;
    text-align:center;
}
th{
    background-color:blue;
    color:white;
}
</style>
</head>

<body>

<h2>Perhitungan Volume Bangun Ruang</h2>

<table>
<tr>
<th>Jenis Bangun Ruang</th>
<th>Sisi</th>
<th>Jari-jari</th>
<th>Tinggi</th>
<th>Volume</th>
</tr>

<?php
// Perulangan menampilkan data
foreach($data as $bangun){

    echo "<tr>";
    echo "<td>".$bangun->jenis."</td>";
    echo "<td>".$bangun->sisi."</td>";
    echo "<td>".$bangun->jari."</td>";
    echo "<td>".$bangun->tinggi."</td>";
    echo "<td>".$bangun->hitungVolume()."</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>