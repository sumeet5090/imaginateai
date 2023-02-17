<?php

switch ($_POST['action']){
    
    case 'generateImg':
        echo getImageCreated(['prompt' => (string)$_POST['prompt']]);
    
    case 'downloadImg':
        $imageUrl = $_POST["url"];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $imageUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        header("Content-Type: image/jpeg");
        header("Content-Disposition: attachment; filename=image.jpg");
        echo $data;
    
    default:
}

die();
