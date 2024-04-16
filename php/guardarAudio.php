<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $tmp = $_FILES['audio']['tmp_name'];
        $direction = "../uploads/";
        $new_name = uniqid() . ".wav";

        if(move_uploaded_file($tmp, $direction.$new_name)){
            echo "se movio correctamente";
        }else{
            echo "no se pudo mover";
        }
        
    }
    

?>