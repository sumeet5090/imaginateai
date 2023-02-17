$(document).ready(function () {
    $('#changeImg').click(function () {
        $.ajax({
            url: 'index.php',
            type: 'POST',
            data: {
                createImg: 1,
                prompt: $('#prompt').val(),
            },
            success: function (response) {
                $('#openaiImg').attr('src', '');
                $('#openaiImg').attr('src', response);
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
        //   console.log(filename);
        // $.get(imgSrc, function (data) {
        //     var link = $("<a></a>");
        //     link.attr("href", window.URL.createObjectURL(data));
        //     link.attr("download", filename);
        //     link.appendTo("body");
        //     link[0].click();
        //     link.remove();
        // }, "blob");
        $.ajax({
            url: 'index.php',
            method: "POST",
            data: {
                action: 'download',
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

