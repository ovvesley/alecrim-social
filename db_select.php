<?php

function db_select_post()
{
    header("content-type:image/jpeg");
    $select = "select * from postagem";
    $res = query_dataBase("alecrim_social", $select);
    return $res;
}

// if ($row = mysql_fetch_array($var)) {
//     $image_name = $row["imagename"];
//     $image_content = $row["imagecontent"];
// }
// echo $image;
