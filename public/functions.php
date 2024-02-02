<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "jwd");

function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}



function tambah($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $no_ktp = htmlspecialchars($data["ktp"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jadwal = htmlspecialchars($data["jadwal"]);
    $penumpang_muda = htmlspecialchars($data["penumpang_muda"]);
    $penumpang_lansia = htmlspecialchars($data["penumpang_lansia"]);
    $total = htmlspecialchars($data["ttl"]);
    
    $query = "INSERT INTO pesan_tiket
                VALUES
                ('', '$nama', '$no_ktp', '$no_hp', '$kelas', '$jadwal', '$penumpang_muda', '$penumpang_lansia'
                , '$total')
                ";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}
?>