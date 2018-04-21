<?php
    if ($_GET["page"] == "dashboard") {
        echo "Dashboard";
    }else if ($_GET["page"] == "mod_admin") {
        echo "Data Administrator";
    }else if ($_GET["page"] == "mod_anggota") {
        echo "Data Anggota";
    }else if ($_GET["page"] == "mod_ska") {
        echo "Data SKA";
    }else if ($_GET["page"] == "mod_iptb") {
        echo "Data IPTB";
    }else if ($_GET["page"] == "mod_acpe") {
        echo "Data ACPE";
    }else if ($_GET["page"] == "edit_ska") {
        echo "Edit SKA";
    }else if ($_GET["page"] == "mod_download") {
        echo "Download Data";
    }
?>
