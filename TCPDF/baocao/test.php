<?php
foreach ($DATACISONHATKY as $k_matk => $itemTK) {// Duyet vao tk

    $tygiadauky = $_SESSION["DSDAUKY"][$k_matk]["tygia"];
    $nguyenteDK = $_SESSION["DSDAUKY"][$k_matk]["sotiennt"];
    $SoTienVNDK = $_SESSION["DSDAUKY"][$k_matk]["tienno"] - $_SESSION["DSDAUKY"][$k_matk]["tienco"];


    $nodk = $_SESSION["DSDAUKY"][$k_matk]["tienno"];
    $codk = $_SESSION["DSDAUKY"][$k_matk]["tienco"];

    foreach ($itemTK as $kthang => $itemTHANG) {

        foreach ($itemTHANG as $itemCT) {

            $nguyenteDK = ($nguyenteDK + $itemCT["tienntno"]);
            $SoTienVNDK = ($SoTienVNDK + $itemCT["tienno"]);

            $tygiadauky = round(($SoTienVNDK / ($nguyenteDK)));

            $tienvnxuat = round($tygiadauky * $itemCT["tienntco"]);

            if ($itemCT["tienntco"] != 0) {
                $nguyenteDK = ($nguyenteDK - $itemCT["tienntco"]);
                $SoTienVNDK = $SoTienVNDK - $tienvnxuat;
            }

        }
    }
}