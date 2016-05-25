<?php
function db_fetch_data($db_connect, $query, $params)
{
    if (($stmt = mysqli_prepare($db_connect, $query)) === false) {
        throw new Exception('Error SQL prepare');
    }
    foreach ($params as $p) {
        mysqli_stmt_bind_param($stmt, 's', $p);
    }
    mysqli_stmt_execute($stmt);
    $result_data = mysqli_stmt_get_result($stmt);
    mysqli_stmt_fetch($stmt);

    print_r($result_data);
//    while ($row = mysqli_fetch_assoc($data_query)) {
//        $result_data[] = $row;
//    };

    mysqli_stmt_free_result($stmt);
    return $result_data;
}

