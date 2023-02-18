<?php

switch ($_POST['action']) {

    case 'generateImg':
        $response = generateImage(['prompt' => (string)$_POST['prompt']]);
        if (!$errText = isApiError($response)) {
            $url = json_decode($response)->data[0]->url;
            $result['url'] = $url;
        }else{
            $result['error'] = $errText;
        }
        echo json_encode($result);
        break;

    case 'downloadImg':
        $response = downloadImage(['prompt' => (string)$_POST['prompt']]);
        echo $response;
        break;
    
    default:
        break;
}

die();
