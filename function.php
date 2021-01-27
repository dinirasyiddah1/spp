<?php
//koneksi db
$conn = mysqli_connect("localhost", "root", "", "perbaikan");

//function
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows= [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function query_siswa($query1){
    global $conn;
    $result1 = mysqli_query($conn, $query1);
    $rows1= [];
    while($row1 = mysqli_fetch_assoc($result1)){
        $rows1[] = $row1;
    }
    return $rows1;
}

function cari($keyword){
    $query = "SELECT * FROM siswa
            INNER JOIN kelas ON siswa.kelas = kelas.kelas
                WHERE
                NIS = '$keyword' OR
                nama_siswa like '%$keyword%'
                ";
    return query($query);
}

function cari2($keyword){
    $query = "SELECT * FROM pembayaran
            INNER JOIN bulan ON pembayaran.id_bulan = bulan.id_bulan
                WHERE
                NIS = '$keyword' 
                ";
    return query($query);
}


function tambah($data){
    global $conn;

    $NIS = $_POST["NIS"];
    $bulan = $_POST["id_bulan"];
    $tagbayar = $_POST["tagbayar"];
    $jumbayar = $_POST["jumbayar"];
    $keterangan = $_POST["keterangan"];
    $tajaran = $_POST["id_tahun_ajaran"];

    $query="INSERT INTO pembayaran
                VALUES
                ('$NIS', '$bulan', '$tagbayar', '$jumbayar', '$keterangan','$tajaran')
                ";
    mysqli_query($conn,$query);


    
    return mysqli_affected_rows($conn);
}

function input($data){
    global $conn;

    $NIS = $_POST["NIS"];
    $nama_siswa = $_POST["nama_siswa"];
    $kelas = $_POST["kelas"];
   

    $query="INSERT INTO siswa
                VALUES
                ('$NIS', '$nama_siswa', '$kelas')
                ";
    mysqli_query($conn,$query);


    
    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE NIS=$id");

    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;

    $NIS = $_POST["NIS"];
    $nama_siswa = $_POST["nama_siswa"];
    $kelas = $_POST["kelas"];
   

    $query="UPDATE siswa SET
            NIS ='$NIS',
            nama_siswa = '$nama_siswa',
            kelas = '$kelas'
            WHERE NIS='$NIS'
            ";
    mysqli_query($conn,$query);

    
    
    return mysqli_affected_rows($conn);
    
    return query($query);
}

function rupiah($angka){
    $hasil_rupiah = "Rp ". number_format($angka,2,',','.');
    return $hasil_rupiah;
}



?>