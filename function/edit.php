<?php
    session_start();
    include ("../config/koneksi.php");

    $aksi = $_GET['aksi'];

    if ($aksi == "edit_admin") {
        $id_admin       = $_POST['id_admin'];
        $fullname       = $_POST['fullname'];
        $username       = $_POST['username'];
        $password       = $_POST['password'];
        $password2      = md5($password);
        $pass_new       = $_POST['password_baru'];
        $pass_conf      = $_POST['password_conf'];
        $pass_conf_2    = md5($pass_conf);
        $level          = $_POST['level'];
        $status         = $_POST['status'];

        $query          = mysqli_query($koneksi,("SELECT * FROM tb_admin WHERE id_admin = '$id_admin'"));
        $row            = mysqli_fetch_array($query);

        if ($password == "") {
            mysqli_query($koneksi,("UPDATE tb_admin SET fullname = '$fullname', username = '$username',
                                           level = '$level', status = '$status'
                                           WHERE id_admin = '$id_admin'")) or die(mysql_errno());
            echo "<script language='javascript'>alert('update berhasil')</script>";
            echo "<script language='javascript'>window.location = '../administrator'</script>";
        } else if ($password2 == $row['password']) {
            if ($pass_new == "") {
                mysqli_query($koneksi,("UPDATE tb_admin SET fullname = '$fullname', username = '$username',
                                               level = '$level', status = '$status'
                                               WHERE id_admin = '$id_admin'")) or die(mysql_errno());
                echo "<script language='javascript'>alert('update berhasil')</script>";
                echo "<script language='javascript'>window.location = '../administrator'</script>";
            } else if ($pass_conf == $pass_new) {
                mysqli_query($koneksi,("UPDATE tb_admin SET fullname = '$fullname', username = '$username',
                                               password = '$pass_conf_2', level = '$level', status = '$status'
                                               WHERE id_admin = '$id_admin'")) or die(mysql_errno());
                echo "<script language='javascript'>alert('update berhasil')</script>";
                echo "<script language='javascript'>window.location = '../administrator'</script>";
            }else {
                echo "<script language='javascript'>alert('update gagal')</script>";
                echo "<script language='javascript'>window.location = '../administrator'</script>";
            }
        }
        else{
            echo "<script language='javascript'>alert('update gagal')</script>";
            echo "<script language='javascript'>window.location = '../administrator'</script>";
        }
    }

    else if ($aksi == "edit_anggota") {
        $id_agt         = $_POST['id_agt'];
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
        $row            = mysqli_num_rows($query);

        if ($row > 0) {
            mysqli_query($koneksi,("UPDATE tb_anggota SET nama = '$nama', nama_perusahaan = '$perusahaan',
                                           alamat_perusahaan = '$alamat_pr', telpon_perusahaan = '$telpon_pr', fax = '$fax',
                                           email_perusahaan = '$email_pr', alamat_rumah = '$alamat_rm', handphone = '$hp', email = '$email', 
                                           keanggotaan = '$keanggotaan', status = '$status', masa_berlaku = '$masa_berlaku'
                                           WHERE id_agt = '$id_agt'")) or die(mysql_errno());
            //echo "<script>alert('Nomer Anggota $no_anggota telah terdaftar')</script>";
            echo "<script>window.location = '../anggota'</script>";
        }else{
            mysqli_query($koneksi,("UPDATE tb_anggota SET no_anggota = '$no_anggota', nama = '$nama', nama_perusahaan = '$perusahaan',
                                           alamat_perusahaan = '$alamat_pr', telpon_perusahaan = '$telpon_pr', fax = '$fax',
                                           email_perusahaan = '$email_pr', alamat_rumah = '$alamat_rm', handphone = '$hp', email = '$email',
                                           keanggotaan = '$keanggotaan', status = '$status', masa_berlaku = '$masa_berlaku'
                                           WHERE id_agt = '$id_agt'")) or die(mysql_errno());

            echo "<script>alert('update berhasil')</script>";
            echo "<script>window.location = '../anggota'</script>";
        }
    }

    else if ($aksi == "edit_ska") {
        $id_ska         = $_POST['id_ska'];
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

        $query          = mysqli_query($koneksi,("SELECT * FROM tb_ska WHERE id_agt = '$id_agt'"));
        $row            = mysqli_num_rows($query);

        if ($row > 0) {
            mysqli_query($koneksi,("UPDATE tb_ska SET thk_ska_401 = '$thk_ska_401', thk_ska_405 = '$thk_ska_405',
                                           thk_ska_406 = '$thk_ska_406', pemegang_ska = '$pemegang_ska', status = '$status',
                                           ska_401 = '$ska_401', ska_405 = '$ska_405', ska_406 = '$ska_406', berakhir_ska_401 = '$berakhir_ska_401',
                                           berakhir_ska_405 = '$berakhir_ska_405', berakhir_ska_406 = '$berakhir_ska_406'
                                           WHERE id_ska = '$id_ska'")) or die(mysql_errno());
            echo "<script>window.location = '../ska'</script>";
        }else{
            mysqli_query($koneksi,("UPDATE tb_ska SET id_agt = '$id_agt', thk_ska_401 = '$thk_ska_401', thk_ska_405 = '$thk_ska_405',
                                           thk_ska_406 = '$thk_ska_406', pemegang_ska = '$pemegang_ska', status = '$status',
                                           ska_401 = '$ska_401', ska_405 = '$ska_405', ska_406 = '$ska_406', berakhir_ska_401 = '$berakhir_ska_401',
                                           berakhir_ska_405 = '$berakhir_ska_405', berakhir_ska_406 = '$berakhir_ska_406'
                                           WHERE id_ska = '$id_ska'")) or die(mysql_errno());

            echo "<script>alert('update berhasil')</script>";
            echo "<script>window.location = '../ska'</script>";
        }
    }

    else if ($aksi == "edit_iptb") {
        $id_iptb        = $_POST['id_iptb'];
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

        $query          = mysqli_query($koneksi,("SELECT * FROM tb_iptb WHERE id_agt = '$id_agt'"));
        $cek            = mysqli_num_rows($query);

        if ($cek > 0) {
            mysqli_query($koneksi,("UPDATE tb_iptb SET perencana_lak = '$perencana_lak', masa_berlaku_perencana_lak = '$mb_prc_lak ', pengawas_lak = '$pengawas_lak',
                                           masa_berlaku_pengawas_lak = '$mb_pns_lak', pengkaji_lak = '$pengkaji_lak', masa_berlaku_pengkaji_lak = '$mb_png_lak',
                                           perencana_lal = '$perencana_lal', masa_berlaku_perencana_lal = '$mb_prc_lal', pengawas_lal = '$pengawas_lal',
                                           masa_berlaku_pengawas_lal = '$mb_pns_lal', pengkaji_lal = '$pengkaji_lal', masa_berlaku_pengkaji_lal = '$mb_png_lal'
                                           WHERE id_iptb = '$id_iptb'")) or die(mysql_errno());
            echo "<script>window.location = '../iptb'</script>";
        }else{
            mysqli_query($koneksi,("UPDATE tb_iptb SET id_agt = '$id_agt', perencana_lak = '$perencana_lak', masa_berlaku_perencana_lak = '$mb_prc_lak ', pengawas_lak = '$pengawas_lak',
                                           masa_berlaku_pengawas_lak = '$mb_pns_lak', pengkaji_lak = '$pengkaji_lak', masa_berlaku_pengkaji_lak = '$mb_png_lak',
                                           perencana_lal = '$perencana_lal', masa_berlaku_perencana_lal = '$mb_prc_lal', pengawas_lal = '$pengawas_lal',
                                           masa_berlaku_pengawas_lal = '$mb_pns_lal', pengkaji_lal = '$pengkaji_lal', masa_berlaku_pengkaji_lal = '$mb_png_lal'
                                           WHERE id_iptb = '$id_iptb'")) or die(mysql_errno());

            echo "<script>alert('update berhasil')</script>";
            echo "<script>window.location = '../iptb'</script>";
        }
    }
    
    else if ($aksi == "edit_acpe") {
        $id_acpe        = $_POST['id_acpe'];
        $id_agt         = $_POST['id_agt'];
        $acpe           = $_POST['acpe'];
        $lpjk           = $_POST['asesor_lpjk'];
        $keterangan     = $_POST['keterangan'];

        $query          = mysqli_query($koneksi,("SELECT * FROM tb_acpe WHERE id_agt = '$id_agt'"));
        $cek            = mysqli_num_rows($query);

        if ($cek > 0) {
            mysqli_query($koneksi,("UPDATE tb_acpe SET acpe = '$acpe', asesor_lpjk = '$lpjk', keterangan = '$keterangan'
                                           WHERE id_acpe = '$id_acpe'")) or die(mysql_errno());
            echo "<script>window.location = '../acpe'</script>";
        }else{
            mysqli_query($koneksi,("UPDATE tb_acpe SET id_agt = '$id_agt', acpe = '$acpe', asesor_lpjk = '$lpjk', keterangan = '$keterangan'
                                           WHERE id_acpe = '$id_acpe'")) or die(mysql_errno());

            echo "<script>alert('update berhasil')</script>";
            echo "<script>window.location = '../acpe'</script>";
        }
    }
?>
