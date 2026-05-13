<?php
include("../../config.php");
$OBJ = new pskt();
if($_GET['page'])
{
    $array = array();
    $page = $_GET['page'];
    $cur_page = $page;
    $page -= 1;
    $per_page = 1;
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;
    $start = $page * $per_page;
    $sophieu = $_GET['sophieu'];

    $query_pag_data = "SELECT * from chitiet_pskt where sophieu=".$sophieu." LIMIT $start, $per_page";
    $result_pag_data = $OBJ->re_query($query_pag_data);
    $msg = "";
    while ($row = $OBJ->re_fetch($result_pag_data)) {
        $array = $row;
    }
    /* --------------------------------------------- */
    $query_pag_num = "SELECT COUNT(*) AS count FROM chitiet_pskt where sophieu=".$sophieu;
    $result_pag_num = $OBJ->re_query($query_pag_num);
    $row = $OBJ->re_fetch($result_pag_num);
    $count = $row['count'];
    $no_of_paginations = ceil($count / $per_page);

    /* ---------------Calculating the starting and endign values for the loop----------------------------------- */
    if ($cur_page >= 7) {
        $start_loop = $cur_page - 3;
        if ($no_of_paginations > $cur_page + 3)
            $end_loop = $cur_page + 3;
        else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
            $start_loop = $no_of_paginations - 6;
            $end_loop = $no_of_paginations;
        } else {
            $end_loop = $no_of_paginations;
        }
    } else {
        $start_loop = 1;
        if ($no_of_paginations > 7)
            $end_loop = 7;
        else
            $end_loop = $no_of_paginations;
    }
    /* ----------------------------------------------------------------------------------------------------------- */
    $msg .= "<div class='pagination'><ul>";

// FOR ENABLING THE FIRST BUTTON
    if ($first_btn && $cur_page > 1) {
        $array['dautrang'] = 1;
    } else if ($first_btn) {
        $array['dautrang'] = 0;
    }

// FOR ENABLING THE PREVIOUS BUTTON
    if ($previous_btn && $cur_page > 1) {
        $pre = $cur_page - 1;
        $array['vetruoc'] = $pre;
    } else if ($previous_btn) {
        $array['vetruoc'] = 0;
    }

// TO ENABLE THE NEXT BUTTON
    if ($next_btn && $cur_page < $no_of_paginations) {
        $nex = $cur_page + 1;
        $array['ketiep'] = $nex;
    } else if ($next_btn) {
        $array['ketiep'] = 0;
    }

// TO ENABLE THE END BUTTON
    if ($last_btn && $cur_page < $no_of_paginations) {
        $array['cuoitrang'] = $no_of_paginations;
    } else if ($last_btn) {
        $array['cuoitrang'] = 0;
    }

    $array['tranghientai'] = $cur_page;
    echo json_encode($array);
}
?>