<?php
    session_start();
    include ("../config/koneksi.php");

    $aksi = $_GET['aksi'];

    if ($aksi == "add_admin") {
        $fullname   = $_POST['fullname'];
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $password2  = md5($password);
        $level      = $_POST['level'];
        $status     = $_POST['status'];
        $query      = mysqli_query($koneksi,("SELECT username FROM tb_admin WHERE username = '$username'"));
        $cek        = mysqli_num_rows($query);

        if ($cek > 0) {
            echo "<script language='javascript'>alert('data telah tersedia')</script>";
      		echo "<script language='javascript'>window.location = '../administrator'</script>";
        }else {
            mysqli_query($koneksi,("INSERT INTO tb_admin VALUES (NULL,'$username','$password2','$fullname',NOW(),'$level','$status')")) or die(mysql_errno());
            header('location:../administrator');
        }
    }

    else if ($aksi == "add_anggota") {
        $no_anggota     = $_POST['no_anggota'];
        $nama           = $_POST['nama'];
        $perusahaan     = $_POST['nama_perusahaan'];
        $alamat_pr      = $_POST['alamat_perusahaan'];
        $telpon_pr      = $_POST['telpon_perusahaan'];
        $fax            = $_POST['fax_perusahaan'];
        $email_pr       = $_POST['email_perusahaan'];
        $alamat_rm      = $_POST['alamat_rumah'];
        $hp             = $_POST['handphone'];
        $email          = $_POST['email'];
        $keanggotaan    = $_POST['keanggotaan'];
        $status         = $_POST['status'];
        $masa_berlaku   = $_POST['masa_berlaku'];
        $query          = mysqli_query($koneksi,("SELECT * FROM tb_anggota WHERE no_anggota = '$no_anggota'"));
        $cek            = mysqli_num_rows($query);

        if ($cek > 0) {
            echo "<script language='javascript'>alert('Nomer Anggota $no_anggota telah terdaftar')</script>";
      		echo "<script language='javascript'>window.location = '../anggota'</script>";
        }else{
            mysqli_query($koneksi,("INSERT INTO tb_anggota VALUES (NULL,'$no_anggota','$nama','$perusahaan','$alamat_pr',
                                                                   '$telpon_pr','$fax','$email_pr','$alamat_rm',
                                                                   '$hp','$email','$keanggotaan','$status','$masa_berlaku')")) or die(mysql_errno());
            header('location:../anggota');
        }
    }

    else if ($aksi == "add_ska") {
        error_reporting(0);
        $id_agt         = $_POST['id_agt'];
        $thk_ska_401    = $_POST['thk_ska_401'];
        $thk_ska_405    = $_POST['thk_ska_405'];
        $thk_ska_406    = $_POST['thk_ska_406'];
        $pemegang_ska   = $_POST['pemegang_ska'];
        $status         = $_POST['status'];
        //$keanggotaan    = $_POST['keanggotaan'];
        $ska_401        = $_POST['ska_401'];
        $ska_405        = $_POST['ska_405'];
        $ska_406        = $_POST['ska_406'];
        $berakhir_ska_401   = $_POST['berakhir_ska_401'];
        $berakhir_ska_405   = $_POST['berakhir_ska_405'];
        $berakhir_ska_406   = $_POST['berakhir_ska_406'];

        $query          = mysqli_query($koneksi,("SELECT id_agt FROM tb_ska WHERE id_agt = '$id_agt'"));
        $cek            = mysqli_num_rows($query);

        if ($cek > 0) {
            echo "<script>alert('Anggota telah terdaftar di SKA silahkan pilih yang lain')</script>";
      		echo "<script>window.location = '../ska'</script>";
        }else{
            mysqli_query($koneksi,("INSERT INTO tb_ska VALUES (NULL,'$id_agt','$thk_ska_401','$thk_ska_405','$thk_ska_406',
                                                              '$pemegang_ska','$status','$ska_401','$ska_405',
                                                              '$ska_406','$berakhir_ska_401','$berakhir_ska_405','$berakhir_ska_406')")) or die(mysql_errno());
            header('location:../ska');
        }
    }

    else if ($aksi == "add_iptb") {
        $id_agt         = $_POST['id_agt'];
        $perencana_lak  = $_POST['perencana_lak'];
        $mb_prc_lak     = $_POST['masa_berlaku_perencana_lak'];
        $pengawas_lak   = $_POST['pengawas_lak'];
        $mb_pns_lak     = $_POST['masa_berlaku_pengawas_lak'];
        $pengkaji_lak   = $_POST['pengkaji_lak'];
        $mb_png_lak     = $_POST['masa_berlaku_pengkaji_lak'];

        $perencana_lal  = $_POST['perencana_lal'];
        $mb_prc_lal     = $_POST['masa_berlaku_perencana_lal'];
        $pengawas_lal   = $_POST['pengawas_lal'];
        $mb_pns_lal     = $_POST['masa_berlaku_pengawas_lal'];
        $pengkaji_lal   = $_POST['pengkaji_lal'];
        $mb_png_lal     = $_POST['masa_berlaku_pengkaji_lal'];

        /*$anggota        = $_POST['anggota'];
        $acpe           = $_POST['acpe'];
        $lpjk           = $_POST['asesor_lpjk'];*/

        $query          = mysqli_query($koneksi,("SELECT id_agt FROM tb_iptb WHERE id_agt = '$id_agt'"));
        $cek            = mysqli_num_rows($query);

        if ($cek > 0) {
            echo "<script>alert('Anggota telah terdaftar di IPTB silahkan pilih yang lain')</script>";
      		echo "<script>window.location = '../iptb'</script>";
        }else{
            mysqli_query($koneksi,("INSERT INTO tb_iptb VALUES (NULL,'$id_agt','$perencana_lak','$mb_prc_lak ','$pengawas_lak',
                                                              '$mb_pns_lak','$pengkaji_lak','$mb_png_lak','$perencana_lal','$mb_prc_lal','$pengawas_lal',
                                                              '$mb_pns_lal','$pengkaji_lal','$mb_png_lal')")) or die(mysql_errno());
            header('location:../iptb');
        }
    }
    
    else if ($aksi == "add_acpe") {
        $id_agt         = $_POST['id_agt'];
        $anggota        = $_POST['anggota'];
        $acpe           = $_POST['acpe'];
        $lpjk           = $_POST['asesor_lpjk'];
        $keterangan     = $_POST['keterangan'];

        $query          = mysqli_query($koneksi,("SELECT id_agt FROM tb_acpe WHERE id_agt = '$id_agt'"));
        $cek            = mysqli_num_rows($query);

        if ($cek > 0) {
            echo "<script>alert('Anggota telah terdaftar di ACPE silahkan pilih yang lain')</script>";
      		echo "<script>window.location = '../acpe'</script>";
        }else{
            mysqli_query($koneksi,("INSERT INTO tb_acpe VALUES (NULL,'$id_agt','$acpe','$lpjk','$keterangan')")) or die(mysql_errno());
            header('location:../acpe');
        }
    }
?>
