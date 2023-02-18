<?php

function renderView($viewName)
{
    include_once 'views/' . $viewName . '.php';
}

function generateImage($data = [])
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

    // return json_decode($response)->data[0]->url;
    return $response;
}

function downloadImage($imageUrl)
{
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $imageUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    header("Content-Type: image/jpeg");
    header("Content-Disposition: attachment; filename=image.jpg");

    return $response;
}

function d($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function dd($var)
{
    d($var);
    die();
}

function isApiError($rawResponse)
{
    global $error;
    try {
        $response = json_decode($rawResponse);
        
        if (preg_match('/(invalid)|(invalid_api)|(invalid_api_key)/', $response->error->code)) {
            throw new Exception($error['apiTokenExpired']);
        }
        return false;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
