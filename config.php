<?php
    //$server = "localhost:3306";
    $server = "localhost";
    //$user = "ummuhafi_root";
    $user = "root";
    //$password = "Fayani12121976";
    $password = "";
    //$database = "ummuhafi_presensi";
    $database = "db_aquawatch";

    $koneksi = mysqli_connect($server, $user, $password, $database);
    // if ($koneksi){
    //     echo "Konek";
    // }else {
    //     echo "tidak  konek";
    // }
?>