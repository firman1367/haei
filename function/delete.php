<?php
    session_start();
    include ("../config/koneksi.php");

    //ambil variable
    error_reporting(0);
    $aksi           = $_GET['aksi'];
    $id_admin       = $_GET['id_admin'];
    $id_agt         = $_GET['id_agt'];
    $id_ska         = $_GET['id_ska'];
    $id_iptb        = $_GET['id_iptb'];
    $id_acpe        = $_GET['id_acpe'];

    if ($aksi == "del_admin") {
        mysqli_query($koneksi,("DELETE FROM tb_admin WHERE id_admin = '$id_admin'")) or die(mysql_errno("gagal"));
        header("location:../administrator");
    }else if ($aksi == "del_anggota") {
        mysqli_query($koneksi,("DELETE FROM tb_anggota WHERE id_agt = '$id_agt'")) or die(mysql_errno("gagal"));
        header("location:../anggota");
    }else if ($aksi == "del_ska") {
        mysqli_query($koneksi,("DELETE FROM tb_ska WHERE id_ska = '$id_ska'")) or die(mysql_errno("gagal"));
        echo "<script>alert('data ska telah dihapus')</script>";
        echo "<script>window.location='../ska'</script>";
    }else if ($aksi == "del_iptb") {
        mysqli_query($koneksi,("DELETE FROM tb_iptb WHERE id_iptb = '$id_iptb'")) or die (mysql_errno("gagal"));
        echo "<script>alert('data iptb telah dihapus')</script>";
        echo "<script>window.location='../iptb'</script>";
    }else if ($aksi == "del_acpe") {
        mysqli_query($koneksi,("DELETE FROM tb_acpe WHERE id_acpe = '$id_acpe'")) or die (mysql_errno("gagal"));
        echo "<script>alert('data acpe telah dihapus')</script>";
        echo "<script>window.location='../acpe'</script>";
    }
?>
