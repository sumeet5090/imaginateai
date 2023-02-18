<body>
    <?php renderView('top_navigation'); ?>
    <div class="alert alert-warning alert-dismissible fade show d-none" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="container-fluid">
        <div id="notice-container"></div>
        <div class="row">
            <div class="col-xl-7">
                <img id="openaiImg" class='w-100' src="" alt="" srcset="">
            </div>
            <div class="col-xl-5 d-flex flex-column justify-content-center">
                <input type="text" id="prompt" class="form-control" name="prompt" rows=5>
                <button type="button" id="changeImg" class="btn btn-primary btn-lg btn-block">Change</button>
                <button type="button" id="downloadImg" class="btn btn-secondary btn-lg btn-block">Download</button>
            </div>
        </div>
    </div>
</body>