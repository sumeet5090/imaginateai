<?php


function getImageCreated($data = [])
{
    global $url, $apikey;

    $post['prompt'] = empty($data['prompt']) ? 'a portrait of majestic male lion in jungle sitting and watching' : (string)$data['prompt'];
    $post['n'] = empty($data['n']) || $data['n'] > 10 ? 1 : (int)$data['n'];
    $post['size'] = empty($data['size']) ? '1024x1024' : (string)$data['size'];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . $apikey,
        'Content-Type: application/json',
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response)->data[0]->url;
}

function downloadImage(){
    $imageUrl = $_GET["url"];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $imageUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    
    header("Content-Type: image/jpeg");
    header("Content-Disposition: attachment; filename=image.jpg");
    echo $data;
}