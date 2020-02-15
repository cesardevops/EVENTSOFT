var loadFile = function (event) {
    var output = document.getElementById('change-profile-pic');
    output.src = URL.createObjectURL(event.target.files[0]);
    $('#change-profile-pic').cropper("destroy");

    var $previews = $('.preview');
    $('#change-profile-pic').cropper({
        ready: function () {
            var $clone = $(this).clone().removeClass('cropper-hidden');
            $clone.css({
                display: 'block',
                width: '100%',
                minWidth: 0,
                minHeight: 0,
                maxWidth: 'none',
                maxHeight: 'none'
            });
            $previews.css({
                width: '100%',
                overflow: 'hidden'
            }).html($clone);
        },
        aspectRatio: 1 / 1,
        crop: function (e) {

            var imageData = $(this).cropper('getImageData');
            var croppedCanvas = $(this).cropper('getCroppedCanvas');
            $('#profile-result').html('<img src="' + croppedCanvas.toDataURL() + '" >');

            $('#save-profile').click(function () {
                $('#loading').show();
                $.ajax({
                    type: 'POST',
                    url: URL_EVENTSOFT + '/my-profile/photo-new',
                    data: {
                        url: croppedCanvas.toDataURL()
                    },
                    success: function (response) {
                        console.log(response);
                        if (response == "success") {

                        }

                    }
                });
            });

            var previewAspectRatio = e.width / e.height;
            $previews.each(function () {
                var $preview = $(this);
                var previewWidth = $preview.width();
                var previewHeight = previewWidth / previewAspectRatio;
                var imageScaledRatio = e.width / previewWidth;
                $preview.height(previewHeight).find('img').css({
                    width: imageData.naturalWidth / imageScaledRatio,
                    height: imageData.naturalHeight / imageScaledRatio,
                    marginLeft: -e.x / imageScaledRatio,
                    marginTop: -e.y / imageScaledRatio
                });
            });


        }

    });

};

