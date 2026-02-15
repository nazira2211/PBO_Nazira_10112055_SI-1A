<?php

class KalkulatorSuhu { // ini adalah class kalkulator suhu

    private $nilai; //variable atau poperty
    private $satuan;

    public function __construct($nilai, $satuan) { //method
        $this->nilai = $nilai;
        $this->satuan = strtoupper($satuan);
    }

    public function konversi() { //method utama untuk menentukan konversi

        if ($this->satuan == "C") { //kondisi jika satuan Celsius
            return $this->dariCelsius(); //panggil method konversi celcius
        } elseif ($this->satuan == "F") { //kondisi jika satuan fahrenheit
            return $this->dariFahrenheit(); //panggil method konversi fahrenheit
        } elseif ($this->satuan == "K") { //kondisi jika satuan kelvin
            return $this->dariKelvin(); //method konversi kelvin
        } else {  //jika input salah
            return "Satuan tidak valid!"; 
        }
    }

    private function dariCelsius() { //method celcius
        $f = ($this->nilai * 9/5) + 32; // rumus celcius -> fahrenheit ini menggunakan operator aritmatika
        $k = $this->nilai + 273.15; // rumus celcius -> kelvin

        return "Hasil konversi dari Celsius:
        <br>Fahrenheit = $f
        <br>Kelvin = $k"; //output hasil
    }

    private function dariFahrenheit() { //method fahrenheit
        $c = ($this->nilai - 32) * 5/9; //rumus fahrenheit -> celsius
        $k = $c + 273.15; //rumus celcius -> kelvin

        return "Hasil konversi dari Fahrenheit:
        <br>Celsius = $c
        <br>Kelvin = $k"; //hasil
    }

    private function dariKelvin() { //method kelvin
        $c = $this->nilai - 273.15; //rumus kelvin -> celcius
        $f = ($c * 9/5) + 32; //rumus celcius -> fahrenheit

        return "Hasil konversi dari Kelvin:
        <br>Celsius = $c
        <br>Fahrenheit = $f";// hasil
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Suhu</title> <!-- judul halaman yang muncul di browser -->
</head>
<body>

<h3>kalkulator Suhu<h3> <!-- judul utama halaman -->


<form method="post">
    Nilai Suhu:
    <input type="number" name="nilai" step="any" required><br><br>

    Satuan:
    <select name="satuan">
        <option value="C">Celsius</option>
        <option value="F">Fahrenheit</option>
        <option value="K">Kelvin</option>
    </select><br><br>

    <button type="submit" name="hitung">Hitung</button>
</form>

<hr> <!-- garis pemisah tampilan -->

<?php //mengecek apakah tombo; hitung sudah ditekan 
if(isset($_POST['hitung'])){ 
    $nilai = $_POST['nilai'];
    $satuan = $_POST['satuan'];

    $obj = new KalkulatorSuhu($nilai, $satuan); //membuat objek
    echo $obj->konversi(); //menampilkan hasil konversi
}
?>

</body>
</html>

