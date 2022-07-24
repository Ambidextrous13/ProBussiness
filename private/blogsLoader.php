<?php
    require __DIR__ .'\definations\dbFunctions.php';


    function retriveAllBlogs(){
        $query = "SELECT * FROM `blogs`";
        $args = [];
        $type = [];
        return runQuery($query,$args,$type);
    }
    $data = retriveAllBlogs();
?>