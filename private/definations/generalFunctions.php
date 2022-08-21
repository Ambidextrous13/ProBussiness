<?php
    function intToMonthName($int){
       switch ($int){
       case 1:
       return 'Jan';break;
       case 2:
       return 'Feb';break;
       case 3:
       return 'Mar';break;
       case 4:
       return 'Apr';break;
       case 5:
       return 'May';break;
       case 6:
       return 'Jun';break;
       case 7:
       return 'Jul';break;
       case 8:
       return 'Aug';break;
       case 9:
       return 'Sep';break;
       case 10:
       return 'Oct';break;
       case 11:
       return 'Nov';break;
       case 12:
       return 'Dec';break;
       default:
       return 'Error';
       break;
       }
    }

    function noData(){
        echo '<h2>
                <a class = "blog_medium post_meta h2">No Data Found</a>
                <br><br>
            </h2>';
    }
