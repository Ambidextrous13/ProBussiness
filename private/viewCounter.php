<?php
require_once dirname(__DIR__).'\private\viewCounter.php';
    function viewCounter(){
        if(isset($_GET['blog_id'])){
            $id = $_GET['blog_id'];
            $query ='UPDATE `blogs` SET `views`= `views`+1 WHERE `blog_id` = ?';
            runQuery($query,[$id],[PDO::PARAM_STR]);
        }
    }
?>