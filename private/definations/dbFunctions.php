<?php
    require dirname(__DIR__).'\creds\dbCreds.php';  

    function dbConnect(){
        global $db_host,$db_name,$db_username,$db_password;
        try{  
            $dbConn = new PDO("mysql:host=$db_host;dbname=$db_name",$db_username,$db_password);   
            return $dbConn;
        } catch(Exception $e){  
            Echo "Connection failed" . $e->getMessage();  
        }  
    }
    
    function runQuery($query,$arg,$type,$exclusive=false){
        if ($query != '') {
            $dbconn = dbConnect();
            $sql = $dbconn->prepare($query);
            if ($exclusive) {
                for ($i=0; $i < count($arg[0]); $i++) { 
                    $sql->bindParam($arg[0][$i],$arg[1][$i],$type[$i]); 
                }
            }
            else{
                for ($i=1; $i <= count($arg); $i++) { 
                    $sql->bindParam($i,$arg[$i-1],$type[$i-1]);    
                }
            }
            $sql->execute();
            $dbconn=null;
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else {
            return '';
        }
    }

    

    
?>