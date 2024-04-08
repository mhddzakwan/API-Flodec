<?php
    include "config.php";
    $jarak = intval($_GET['tinggi']); //jarak ini belum ketinggian banjir
    $latitude = floatval($_GET['latitude']);
    $longitude = floatval($_GET['longitude']);
    $tanggal = $_GET['tanggal'];
    $jam = $_GET['jam'];
    $menit = $_GET['menit'];
    $curah_menit = intval($_GET['curah_menit']);
    $curah_jam = intval($_GET['curah_jam']);
    $cuaca = $_GET['cuaca'];

    

    // asumsi ketinggian yang termasuk kategri banjir =10 cm
    $banjir = 10;
    $tinggi_tiang = 20;
    // ketinggian banjir saat ini: 
    $ketinggian = $tinggi_tiang - $jarak;
    // data real-time
    if ($jarak < 20){     
        $cekStatus = "SELECT ketinggian_air,status from tb_ketinggianrt WHERE id=1";
        $resultStatus = $koneksi->query($cekStatus);
        // jika data pada id=1 itu ada maka
        if (mysqli_num_rows($resultStatus) == 1){
            // ambil status dan ketinggian_air
            $row = mysqli_fetch_assoc($resultStatus);
            
            // kondisi jika status =  banjir dan pada tb = tidak banjir dan 
            // ketinggian air melewati batas banjir
            if ($row['status'] == '0' && $ketinggian > $banjir){
                $updateStatus = "UPDATE tb_ketinggianrt SET status = '1', ketinggian_air=$ketinggian WHERE id=1";
                $resultUpdate = $koneksi->query($updateStatus);
                if ($resultUpdate){
                    echo "\nbanjir";
                }else {
                    echo "\ngagal f1";
                }
                //kondisi ketika status awal adlah banjir, namun air sudah surut
                // maka set status menjadi tidak banjir
            }else if ($row['status'] == '1' && $ketinggian < $banjir){
                $updateStatus = "UPDATE tb_ketinggianrt SET status = '0', ketinggian_air=$ketinggian WHERE id=1";
                $resultUpdate = $koneksi->query($updateStatus);
                if ($resultUpdate){
                    echo "\nset tidak banjir";
                }else {
                    echo "\ngagal elseif";
                }
            }else{
                $updateStatus = "UPDATE tb_ketinggianrt SET ketinggian_air = $ketinggian WHERE id=1";
                $resultUpdate = $koneksi->query($updateStatus);
                if ($resultUpdate){
                    echo "\nset kondisis tetap";
                }else {
                    echo "\ngagal else";
                }
            }
        }


        //data banjir per-jam
        $cekData = "SELECT tanggal, jam FROM tb_ketinggian WHERE tanggal='$tanggal' AND jam='$jam'";
        $resultData = $koneksi->query($cekData);

        if ($resultData && mysqli_num_rows($resultData) == 0) {
            $setData= "INSERT INTO tb_ketinggian (latitude, longitude, tanggal, jam, ketinggian_air) VALUES ('$latitude', '$longitude', '$tanggal', '$jam', '$ketinggian')";
            $resultData = mysqli_query($koneksi, $setData);
            if (!$resultData) {
                echo "Error: " . mysqli_error($koneksi);
                echo "\n Data banjir per jam error ditambah";
            }
            echo "\n data banjir per jam berhasil ditambah";
        } else {
            echo "\nData banjir perjam sudah ada";
        }

        // kirim Rain gauge data

        //CURAH REALTIME
        $cekCurahRt = "SELECT curah_menit FROM tb_curahrt WHERE id=1";
        $resultCurahRt = $koneksi->query($cekCurahRt);
        if (mysqli_num_rows($resultCurahRt) == 1){
            $update_curahrt = "UPDATE tb_curahrt SET curah_menit = $curah_menit, curah_jam = $curah_jam, cuaca = $cuaca WHERE id='1'";
            $result_curahrt = $koneksi->query($update_curahrt);
            if ($resultUpdate){
                echo "\nCurah RT update";
            }else {
                echo "\nCurah RT gagal";
            }
        }else {
            echo "Tidak ada dara curahRT";
        }

        //CURAH HUJAN PER JAM
        $cekCurahJam = "SELECT tanggal,jam FROM tb_curahjam WHERE tanggal ='$tanggal' AND jam='$jam' ";
        $resultCurahJam = $koneksi->query($cekCurahJam);
        if(mysqli_num_rows($resultCurahJam) == 0){
            $setCurahJam = "INSERT INTO tb_curahjam (latitude,longitude,tanggal,jam,curah_jam) VALUES ('$latitude', '$longitude', '$tanggal', '$jam', '$curah_jam')";
            $resultSetCurahJam = $koneksi->query($setCurahJam);
            if($resultSetCurahJam){
                echo "\nData curah jam berhasil ditambah";
            }else {
                echo "\n Data curah jam gagal ditambah";
                echo "Error: " . mysqli_error($koneksi);
            }
        }else {
            echo "\nData curah hujan perjam sudah ada";
        }
        

        //CURAH HUJAN PER MENIT
        $cekCurahMenit = "SELECT tanggal,jam,menit FROM tb_curah WHERE tanggal ='$tanggal' AND jam='$jam' AND menit='$menit'";
        $resultCurahMenit = $koneksi->query($cekCurahMenit);
        if(mysqli_num_rows($resultCurahMenit) == 0){
            $setCurahMenit = "INSERT INTO tb_curah (latitude,longitude,tanggal,jam,menit,curah_menit) VALUES ('$latitude', '$longitude', '$tanggal', '$jam','$menit' ,'$curah_menit')";
            $resultSetCurahMenit = $koneksi->query($setCurahMenit);
            if($resultCurahMenit){
                echo "\nData curah menit berhasil ditambah";
            }else {
                echo "\nData curah menit gagal ditambah";
            }
        }else {
            echo "\nData curah hujan permenit sudah ada";
        }
    }
    function menit_format($menit){
        if (strlen($menit) == 1){
            return "0".strval($menit);
        }else {
            return strval($menit);
        }
    }

    // PREDIKSI BANJIR
    $dataCurah = array(); 
    $menit = intval($menit);
    if ($row['status'] == '0' ||  $curah_menit != 0){
        if ($menit % 3 == 0 || $menit != 0){
            for ($i=1; $i<=2; $i++){
                $menit = $menit - 1;
                $menit = menit_format($menit);
                $queryPrediksi = "SELECT curah_menit FROM tb_curah WHERE jam = '$jam' AND menit='$menit' AND tanggal = '$tanggal'";
                $resultPrediksi = $koneksi->query($queryPrediksi);
                if(mysqli_num_rows($resultPrediksi) == 1){
                    $rowPrediksi = mysqli_fetch_assoc($resultPrediksi);
                    $dataCurah[$i-1] = $rowPrediksi['curah_menit'];
                }
            }
            //HITUNG RATA-RATA CURAH HUJAN SELAMA 3 MENIT   
            $rata = round(($curah_menit + $dataCurah[0] + $dataCurah[1])/3);
    
            //Htung sisa ketinggian banjir
            $sisa_ketinggian = ($banjir - $ketinggian)*10;
    
            // Hitung waktu prediksi
            $prediksi = round($sisa_ketinggian/$rata);

            //konversi ke jam dan menit
            $prediksiJam = floor($prediksi/60);
            $prediksiMenit = $prediksi % 60;
            $queryPrediksiUpdate = "UPDATE tb_prediksi SET prediksi_jam = $prediksiJam, prediksi_menit = $prediksiMenit WHERE id='1'";
            $resultPrediksiUpdate = $koneksi->query($queryPrediksiUpdate);
            if ($resultPrediksiUpdate){
                echo "\nPrediksi : " . $prediksiJam . " jam " . $prediksiMenit . " Menit";
            }else {
                echo "\nGagal prediksi";
            }
            
        }else {
            echo "waktu belum kelipatan 3";
        }
    }else {
        echo "status sudah banjir atau tidak ada hujan"; 
    }
    


?>
