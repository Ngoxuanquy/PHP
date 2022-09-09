<?php
        $connet = mysqli_connect("localhost", "root" ,"" ,"vay");

        if($connet){
            mysqli_query($connet , "SET NAMES 'UTF8' ");
            // echo "ket noi thanh cong";
        }
        else {
            echo "ket noi that bai";
        }

?>