<?php
    require __DIR__ . '/definations/dbFunctions.php';
    $query = "SELECT COUNT(`category_id`) FROM `categories_decode`";
    $iterMax = runQuery($query,[],[])[0]['COUNT(`category_id`)'];
    for ($i=1; $i <= $iterMax; $i++) { 
        $query = "SELECT `blog_id` FROM `blogs` WHERE `blog_catogories` LIKE '%$i%'";
        $result = runQuery($query,[],[]);
        $updates = ["counts" => [0],"ids"=>[]];
        if(isset($result[0])){
            foreach ($result as $row) {
                array_push($updates["ids"],$row['blog_id']);
            }
            $updates['counts'] = count($result);
            $counts = $updates['counts'];
            $ids = implode(" , ",$updates['ids']);
            $query = "UPDATE `categories_decode` SET `count` = $counts, `ids` = '$ids' WHERE `category_id` = $i";
            runQuery($query,[],[]);
        }
        else {
            $query = "UPDATE `categories_decode` SET `count` = 0, `ids` = '' WHERE `category_id` = $i";
            runQuery($query,[],[]);
        }
    }
?>