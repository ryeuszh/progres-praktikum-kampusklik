<?php

    include "koneksi.php";

    //mengambil data inputan
        $nama_mhs = $_POST['nama'];
        $prodi_mhs= $_POST['prodi'];
        $perulangan = $_POST['ulangi'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        $proses = mysqli_query($koneksi,"INSERT INTO mahasiswa (nama_mahasiswa, prodi, jenis_kelamin) 
                    VALUES ('$nama_mhs','$prodi_mhs','$jenis_kelamin') ")
        or die (mysqli_error($koneksi));

        if($proses){
            echo "
                    <script>
                        alert('Data Berhasil Disimpan');
                        window.location.href='pertemuan_12.php';
                    </script>";
        } else echo "<script>alert('Data Gagal Disimpan');
                        window.location.href='pertemuan_12.php';
                        </script>";

     
?>