
<?php
    if(isset($_GET['query'])){
        $query = $_GET['query'];

        switch ($query) {
            case 'Web Development Query' || 'Brand Building Query' || 'Mobile Application Query':
                header("Location: query.php?query=$query");
                break;
            default:
                header("Location: 404-page.php");
        }
    }
?>  
