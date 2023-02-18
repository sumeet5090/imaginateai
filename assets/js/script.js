$(document).ready(function () {

    function notice(text, warningTypeText) {
        var asdf = '<div class="alert alert-' + warningTypeText + ' alert-dismissible fade show" role="alert">' + text + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        $('#notice-container').html(asdf);
    }

    $('#changeImg').click(function () {
        $.ajax({
            url: window.location.origin + '?api=1',
            type: 'POST',
            data: {
                action: 'generateImg',
                prompt: $('#prompt').val(),
            },
            dataType: 'json',
            success: function (response) {
                if(response['error']){
                    notice(response['error'], 'warning');
                }else{
                    $('#openaiImg').attr('src', '');
                    $('#openaiImg').attr('src', response['url']);
                }
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    });

    $("#downloadImg").click(function () {
        var imgSrc = $("#openaiImg").attr("src");
        var filename = imgSrc.substring(imgSrc.lastIndexOf('/') + 1);

        $.ajax({
            url: window.location.origin + '?api=1',
            method: "POST",
            data: {
                action: 'downloadImg',
                url: imgSrc,
            },
            xhrFields: {
                responseType: "blob"
            },
            success: function (data) {
                console.log(window.URL.createObjectURL(data));
                var link = $("<a></a>");
                link.attr("href", window.URL.createObjectURL(data));
                link.attr("download", filename);
                link.appendTo("body");
                link[0].click();
                link.remove();
            },
            error: function (xhr, status, error) {
                console.log("Error downloading image:", error);
            }
        });
    });
});

