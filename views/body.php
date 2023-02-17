
<body>
    <?php renderView('top_navigation'); ?>
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