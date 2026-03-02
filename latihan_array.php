<?php

function cekKelulusan($nilai) {
    if ($nilai >= 70) {
        return "Lulus Kuis";
    } else {
        return "Tidak Lulus Kuis";
    }
}

$mahasiswa = [
    [
        "nama" => "Nazira",
        "kelas" => "SI A",
        "mata_kuliah" => "Pemrograman Berorientasi Objek",
        "nilai" => 90
    ],
    [
        "nama" => "Neyla",
        "kelas" => "SI A",
        "mata_kuliah" => "Pemrograman Berorientasi Objek",
        "nilai" => 80
    ],
    [
        "nama" => "Bintang",
        "kelas" => "SI A",
        "mata_kuliah" => "Pemrograman Berorientasi Objek",
        "nilai" => 60
    ]
];

echo "<h2>Data Nilai PBO Mahasiswa</h2>";
echo "<hr>";

foreach ($mahasiswa as $data) {
    echo "Nama : " . $data["nama"] . "<br>";
    echo "Kelas : " . $data["kelas"] . "<br>";
    echo "Mata Kuliah : " . $data["mata_kuliah"] . "<br>";
    echo "Nilai : " . $data["nilai"] . "<br>";
    echo cekKelulusan($data["nilai"]);
    echo "<hr>";
}

?>