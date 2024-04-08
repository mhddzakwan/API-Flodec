<?php 
    include "config.php";
    
    //AMBIL DATA KETINGGIAN DAN STATUS BANJIR
    $queryStatus = "SELECT ketinggian_air,status FROM tb_ketinggianrt WHERE id=1";
    $resultStatus = $koneksi->query($queryStatus);
    //skrip deteksi error
    // if(!$resultStatus){
    //     echo "Error: " . mysqli_error($koneksi);
    // }
    if (mysqli_num_rows($resultStatus) == 1){
        $rowStatus = mysqli_fetch_assoc($resultStatus);
        if ($rowStatus['status'] == "1"){
            $response['status'] = "Banjir";
        }else {
            $response['status'] = "Tidak Banjir";
        }
        $response['ketinggian'] = $rowStatus['ketinggian_air'];
    }else{
        $response['status'] = "null";
        $response['ketinggian'] = 0;
    }

    //AMBIL DATA INTENSITAS HUJAN PER MENIT
    $queryCurah = "SELECT curah_menit FROM tb_curahrt where id=1";
    $resultCurah = $koneksi->query($queryCurah);
    if(mysqli_num_rows($resultCurah) == 1){
        $rowCurah = mysqli_fetch_assoc($resultCurah);
        $response['curah'] = $rowCurah['curah_menit'];
    }else {
        $response['curah'] = 0;
    }

    echo json_encode($response);

?>