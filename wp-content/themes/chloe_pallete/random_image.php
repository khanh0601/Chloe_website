<?php 
session_start();
create_image(); 
exit(); 

function create_image() 
{ 
    $color = isset($_GET["color"])? $_GET["color"] :"";
    $form = isset($_GET["form"])? $_GET["form"] :"";
    



    $md5_hash = md5(rand(0,999)); 
    $security_code = substr($md5_hash, 15, 5);
    if(!empty($form) && $form =="genuine"){
        $_SESSION["security_code_".$form] = $security_code;
    }
    else{
        $_SESSION["security_code"] = $security_code;
    }
    

    if($color=="dark"){
        $width = 130; 
        $height = 44;  
        $image = ImageCreate($width, $height);  
        $white = ImageColorAllocate($image, 255, 255, 255); 
        $black = ImageColorAllocate($image, 128, 128, 129); 
        ImageFill($image, 0, 0, $black); 
        ImageString($image, 5, 40, 13, $security_code, $white); 
    }
    else{
        $width = 145; 
        $height = 50;  
        $image = ImageCreate($width, $height);  
        $white = ImageColorAllocate($image, 104, 105, 107); 
        $black = ImageColorAllocate($image, 210, 211, 211); 
        ImageFill($image, 0, 0, $black); 
        ImageString($image, 5, 45, 15, $security_code, $white); 
    }

    
    header("Content-Type: image/jpeg"); 
    ImageJpeg($image); 
    ImageDestroy($image); 
} 
?>