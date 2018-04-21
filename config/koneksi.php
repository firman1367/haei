<?php

    $host   = "localhost";
    $user   = "root";
    $pass   = "";
    $db     = "db_haei";

    $koneksi    = mysqli_connect($host,$user,$pass);
    $sl_db      = mysqli_select_db($koneksi,$db);

    /* if ($koneksi) {
        echo "sukses";
    }else {
        echo "gagal";
    } */

?>
