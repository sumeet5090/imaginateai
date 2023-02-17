<?php

require_once 'functions.php';

$url = 'https://api.openai.com/v1/images/generations';
$apikey = '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';

if ($_POST['createImg']) {
    echo getImageCreated(['prompt' => (string)$_POST['prompt']]);
    die();
}

if ($_POST['action'] == 'download' && !empty($_POST['url'])) {
    $imageUrl = $_POST["url"];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $imageUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);

    header("Content-Type: image/jpeg");
    header("Content-Disposition: attachment; filename=image.jpg");
    echo $data;
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap-grid.min.css" integrity="sha512-a+PObWRxNVh4HZR9wijCGj84JgJ/QhZ8dET09REfYz2clUBjKYhGbOmdy9KEHilYKgbMSIHNQEsonv/r75mHXw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="assets/js/script.js"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7">
                <img id="openaiImg" class='w-100' src="<?php echo getImageCreated() ?>" alt="" srcset="">
            </div>
            <div class="col-xl-5 d-flex flex-column justify-content-center">
                <input type="text" id="prompt" class="form-control" name="prompt" rows=5>
                <button type="button" id="changeImg" class="btn btn-primary btn-lg btn-block">Change</button>
                <button type="button" id="downloadImg" class="btn btn-secondary btn-lg btn-block">Download</button>
            </div>
        </div>
    </div>
</body>

</html>