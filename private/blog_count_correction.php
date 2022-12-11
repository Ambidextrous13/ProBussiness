<?php
require __DIR__ . '/definations/dbFunctions.php';

function worker($table_name,$id_col,$where_col,$id){
    $query = "SELECT `$id_col` FROM `$table_name` WHERE `$where_col` LIKE '% $id %'";
        $result = runQuery($query, [], []);
        $updates = ["counts" => [0], "ids" => []];
        if (isset($result[0])) {
            foreach ($result as $row) {
                array_push($updates["ids"], $row[$id_col]);
            }
            $updates['counts'] = count($result);
            $_counts_ = $updates['counts'];
            $_ids_ = implode(" , ", $updates['ids']);
            $query = "UPDATE `categories_decode` SET `count` = $_counts_, `ids` = '$_ids_' WHERE `category_id` = $id";
            runQuery($query, [], []);
        } else {
            $query = "UPDATE `categories_decode` SET `count` = 0, `ids` = '' WHERE `category_id` = $id";
            runQuery($query, [], []);
        }
}


$query = "SELECT `category_id` FROM `categories_decode`";
$ids = runQuery($query, [], []);
foreach ($ids as $idArr) {
    $id = $idArr['category_id'];
    if ($id >= 0 && $id <= 99) {
       
        worker('blogs','blog_id','blog_catogories',$id);
    }
    elseif ($id>=100 && $id<=199) {
        worker('projects','project_id','project_category',$id);
    }
}

 // $query = "SELECT `blog_id` FROM `blogs` WHERE `blog_catogories` LIKE '%$id%'";
        // $result = runQuery($query, [], []);
        // $updates = ["counts" => [0], "ids" => []];
        // if (isset($result[0])) {
        //     foreach ($result as $row) {
        //         array_push($updates["ids"], $row['blog_id']);
        //     }
        //     $updates['counts'] = count($result);
        //     $_counts_ = $updates['counts'];
        //     $_ids_ = implode(" , ", $updates['ids']);
        //     $query = "UPDATE `categories_decode` SET `count` = $_counts_, `ids` = '$_ids_' WHERE `category_id` = $id";
        //     runQuery($query, [], []);
        // } else {
        //     $query = "UPDATE `categories_decode` SET `count` = 0, `ids` = '' WHERE `category_id` = $id";
        //     runQuery($query, [], []);
        // }