<?php 
class Employee { //class utama
    public $nama;
    public $gaji;
    public $masaKerja;

    function __construct($nama,$gaji,$masaKerja){
        $this->nama = $nama;
        $this->gaji = $gaji;
        $this->masaKerja = $masaKerja;
    }

    
    function hitungGaji(){
        return $this->gaji;
    }
}

//class programmer (inherit employed)
class Programmer extends Employee{

    function hitungGaji(){

        if($this->masaKerja < 1){
            return $this->gaji;
        }
        elseif($this->masaKerja >=1 && $this->masaKerja <=10){
            $bonus = 0.01 * $this->masaKerja * $this->gaji;
            return $this->gaji + $bonus;
        }
        else{
            $bonus = 0.02 * $this->masaKerja * $this->gaji;
            return $this->gaji + $bonus;
        }
    }

}

// CLASS DIREKTUR (INHERIT EMPLOYEE)
class Direktur extends Employee{

    function hitungGaji(){

        $bonus = 0.5 * $this->masaKerja * $this->gaji;
        $tunjangan = 0.1 * $this->masaKerja * $this->gaji;

        return $this->gaji + $bonus + $tunjangan;
    }

}


// CLASS PEGAWAI MINGGUAN
class PegawaiMingguan extends Employee{

    public $hargaBarang;
    public $stok;
    public $terjual;

    function __construct($nama,$gaji,$hargaBarang,$stok,$terjual){

        $this->nama = $nama;
        $this->gaji = $gaji;
        $this->hargaBarang = $hargaBarang;
        $this->stok = $stok;
        $this->terjual = $terjual;
    }

    function hitungGaji(){

        $target = 0.7 * $this->stok;

        if($this->terjual > $target){
            $bonus = 0.10 * $this->hargaBarang * $this->terjual;
        }
        else{
            $bonus = 0.03 * $this->hargaBarang * $this->terjual;
        }

        return $this->gaji + $bonus;
    }

}


// MEMBUAT OBJECT
$programmer = new Programmer("Andi",5000000,5);
$direktur = new Direktur("Budi",10000000,12);
$pegawai = new PegawaiMingguan("Citra",2000000,50000,100,80);

?>

<!DOCTYPE html>
<html>
<head>
<title>Data Gaji Karyawan</title>
<style>
table{
border-collapse:collapse;
width:70%;
margin:auto;
}

th,td{
border:1px solid black;
padding:10px;
text-align:center;
}

th{
background-color:blue;
color:white;
}
</style>
</head>

<body>

<h2 align="center">Perhitungan Gaji Karyawan</h2>

<table>
<tr>
<th>Nama</th>
<th>Jabatan</th>
<th>Gaji Akhir</th>
</tr>

<tr>
<td><?php echo $programmer->nama ?></td>
<td>Programmer</td>
<td><?php echo $programmer->hitungGaji() ?></td>
</tr>

<tr>
<td><?php echo $direktur->nama ?></td>
<td>Direktur</td>
<td><?php echo $direktur->hitungGaji() ?></td>
</tr>

<tr>
<td><?php echo $pegawai->nama ?></td>
<td>Pegawai Mingguan</td>
<td><?php echo $pegawai->hitungGaji() ?></td>
</tr>

</table>

</body>
</html>