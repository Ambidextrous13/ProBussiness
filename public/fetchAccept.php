<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    $recievedJson = json_decode(file_get_contents("php://input"),true);

    require dirname(__DIR__).'/private/definations/dbFunctions.php';
    $query = "SELECT `blog_comments` FROM `blogs` WHERE `blog_id` = ?";
    $inputs = [$recievedJson["blog-id"]];
    $type = [PDO::PARAM_STR];
    $comments = json_decode(runQuery($query,$inputs,$type)[0]['blog_comments'],true);

    $temp_id = explode("-",$recievedJson["parent-id"]);
    if($temp_id[1]==0)
    {
        $workingComment = $comments[$temp_id[0].'-0-0'];
        $id = 1;
        if(isset($workingComment["replies"])){
            $id += count($workingComment["replies"]);
        }
        $com = [
            "id"=>$temp_id[0].'-'.$id.'-0',
            "name"=>$recievedJson["name"],
            "date"=>$recievedJson["date"],
            "comment"=>$recievedJson["comment"]
        ];
        $comments[$temp_id[0].'-0-0']["replies"][$temp_id[0].'-'.$id.'-0']=$com;
    }
    
    elseif ($temp_id[2]==0) {
        $workingComment = $comments[$temp_id[0].'-0-0']["replies"][$temp_id[0].'-'.$temp_id[1].'-0'];
        $id = 1;
        if(isset($workingComment["replies"])){
            $id += count($workingComment["replies"]);
        }
        $com = [
            "id"=>$temp_id[0].'-'.$temp_id[1].'-'.$id,
            "name"=>$recievedJson["name"],
            "date"=>$recievedJson["date"],
            "comment"=>$recievedJson["comment"]
        ];
        $comments[$temp_id[0].'-0-0']["replies"][$temp_id[0].'-'.$temp_id[1].'-0']["replies"][$temp_id[0].'-'.$temp_id[1].'-'.$id]=$com;
    }

    $newJson = json_encode($comments);

    $query = "UPDATE `blogs` SET `blog_comments`=? WHERE `blog_id`=?";
    $data = [$newJson,$inputs[0]];
    $type = [PDO::PARAM_STR,PDO::PARAM_STR];
    runQuery($query,$data,$type);
    echo($newJson);




    
    
?>