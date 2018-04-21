<?php
    if ($_GET["page"] == "dashboard") {
        echo "<label class='label label-info'>Dashboard</label>";
    }else if ($_GET["page"] == "mod_admin") {
        echo "<label class='label label-info'>Data Admininstrator</label>";
    }else if ($_GET["page"] == "mod_anggota") {
        echo "<label class='label label-info'>Data Anggota</label>";
    }else if ($_GET["page"] == "mod_ska") {
        echo "<label class='label label-info'>Data SKA</label>";
    }else if ($_GET["page"] == "mod_iptb") {
        echo "<label class='label label-info'>Data IPTB</label>";
    }else if ($_GET["page"] == "mod_acpe") {
        echo "<label class='label label-info'>Data ACPE</label>";
    }else if ($_GET["page"] == "mod_download") {
        echo "<label class='label label-info'>Download Data</label>";
    }
?>
