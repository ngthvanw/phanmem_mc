<?php
include("../../config.php");

$OBJ = new makhachhang();
$sql = "SELECT m.makh, m.tenkh, m.diachi, m.socmnd, m.manhom, mh.tennhom
        FROM makh m
        INNER JOIN manhomkh mh ON m.manhom = mh.manhom
        WHERE (
            LOWER(mh.tennhom) LIKE '%hộ nông dân%'
            OR LOWER(mh.tennhom) LIKE '%ho nong dan%'
            OR LOWER(mh.tennhom) LIKE '%hộ nông%'
            OR LOWER(mh.tennhom) LIKE '%ho nong%'
        )
        ORDER BY m.tenkh";

$query = $OBJ->re_query($sql);
$data = array();
while ($row = $OBJ->re_fetch($query)) {
    $data[] = $row;
}

echo json_encode($data);
?>