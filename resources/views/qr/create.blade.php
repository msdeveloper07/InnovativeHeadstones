@include('layouts.header')
<!-- QR Section -->
<section class="user-detail-sec">
    <div class="container">
        <div class="user-detail-sec-main">
            <div class="hs-store-heading">
                <h1 class="common-heading">
                    QR Details
                </h1>
            </div>

            <div class="user-detail-form">
                <div class="user-detail-form-grid">
                    <form class="row g-3" id="qrcode_detail" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label for="inputBio" class="form-label">Select Audio</label>
                            <div class="audio-grid">

                                <div class="radio-container">
                                    <div class="audio-container">
                                        <audio class="audio-element" src="./assets/audio/audio-1.mp3"></audio>
                                    </div>
                                    <div class="radio-content">
                                        <input type="radio" name="audio" id="audio1" class="audio-radio" value="1" checked="checked">
                                        <label class="radio-container-label" for="audio1">Audio 1</label>
                                    </div>
                                </div>

                                <div class="radio-container">
                                    <div class="audio-container">
                                        <!-- <div class="audio-gradient"></div> -->
                                        <audio class="audio-element" src="./assets/audio/audio-2.mp3"></audio>
                                    </div>
                                    <div class="radio-content">
                                        <input type="radio" name="audio" id="audio2" class="audio-radio" value="2">
                                        <label class="radio-container-label" for="audio2">Audio 2</label>
                                    </div>
                                </div>

                                <div class="radio-container">
                                    <div class="audio-container">
                                        <audio class="audio-element" src="./assets/audio/audio-3.mp3"></audio>
                                    </div>
                                    <div class="radio-content">
                                        <input type="radio" name="audio" id="audio3" class="audio-radio" value="3">
                                        <label class="radio-container-label" for="audio3">Audio 3</label>
                                    </div>
                                </div>

                                <div class="radio-container">
                                    <div class="audio-container">
                                        <audio class="audio-element" src="./assets/audio/audio-4.mp3"></audio>
                                    </div>
                                    <div class="radio-content">
                                        <input type="radio" name="audio" id="audio4" class="audio-radio" value="4">
                                        <label class="radio-container-label" for="audio4">Audio 4</label>
                                    </div>
                                </div>

                                <div class="radio-container">
                                    <div class="audio-container">
                                        <audio class="audio-element" src="./assets/audio/audio-5.mp3"></audio>
                                    </div>
                                    <div class="radio-content">
                                        <input type="radio" name="audio" id="audio5" class="audio-radio" value="5">
                                        <label class="radio-container-label" for="audio5">Audio 5</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <label for="" class="form-label">Label *</label>

                            <input type="text" class="form-control user-detail-input" id="qrlabel" name="label">
                            <div id="errorqalabelMessage" style="color: red;"></div>

                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Select Headstone Type *</label>
                            <select name="is_new" id="is_new" class="checkout-input">
                                <option value="new">New</option>
                                <option value="existing">Existing</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="formFile" class="form-label">Profile Image</label>
                            <input class="form-control user-detail-input" type="file" id="profile_image" name="profile_image" accept="image/*">
                            <div id="errorProMessage" style="color: red;"></div>
                        </div>

                        <div class="col-12">
                            <label for="formFile" class="form-label">Background Image</label>
                            <input class="form-control user-detail-input" type="file" id="bg_image" name="bg_image" accept="image/*">
                            <div id="errorBgMessage" style="color: red;"></div>
                        </div>

                        <div class="col-12">
                            <label for="formFile" class="form-label">Gallery Images <span id="gallery-img" class="limit-span"></span></label>
                            <input class="form-control user-detail-input" type="file" id="uploadimages" name="uploadimages[]" accept="image/*" multiple>
                            <div id="errorMessage" style="color: red;"></div>
                        </div>
                        <div class="col-12 preview">
                            <input type="hidden" value="0" id="img-data-count">
                            <label class="form-label">Previews</label>
                            <div class="preview-grid">
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="formFile2" class="form-label">Gallery Videos <span id="gallery-vid" class="limit-span"></span></label>
                            <input class="form-control user-detail-input" type="file" id="video" name="video[]" accept="video/*" multiple>
                            <div id="errorVideoMessage" style="color: red;"></div>
                        </div>
                        <div class="col-12 video-preview">
                            <input type="hidden" value="0" id="vid-data-count">
                            <label class="form-label">Previews</label>
                            <div class="vid-previews-grid">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control user-detail-input" id="firstName" name="first_name">
                            <div id="errorfnameMessage" style="color: red;"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control user-detail-input" id="lastName" name="last_name">
                            <div id="errorlnameMessage" style="color: red;"></div>
                        </div>
                        <div class="col-12">
                            <label for="inputBio" class="form-label">Biography</label>
                            <textarea class="form-control user-detail-input" id="inputBio" placeholder="biography..." rows="5" cols="33" name="biography"></textarea>
                            <p id="limitshow" style="display:none;">Character count: <span id="charCount">0</span>/<span id="show_count"></span></p>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input type="checkbox" class="input-fields login-input form-check-input" name="confirmation">
                                <label class="form-check-label" for="remember">After its creation, the information on the headstone will remain unchanged.</label>
                            </div>
                            <div id="errorCheckMessage" style="color: red;"></div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary save-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>

<section class="chat">
    <div class="container">
        <div class="chat-main">
            <a class="chat-link" href="">
                Chat With Us
            </a>
        </div>
    </div>
</section>

<div class="loader" style="display:none;">
    <div class="loader-inner">
        <div class="loader-inner-div">
            <img src="./assets/images/loader-img.gif" alt="">
            <p class="loader-text">
                Please wait, We are generating QR code...
            </p>
        </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="{{asset('/assets/js/custom-audio.js')}}"></script>
<script>
    function cancelImgPrev(id) {
        $('#cancel-prev-' + id).remove();

        var imgPrevCount = $('#img-data-count').attr('value');
        var arr = imgPrevCount.split(",")
        var index = arr.indexOf(String(id))
        arr.splice(index, 1);
        $('#img-data-count').attr('value', arr.toString())
    }

    function cancelVidPrev(id) {
        $('#cancel-vid-prev-' + id).remove();

        var imgPrevCount = $('#vid-data-count').attr('value');
        var arr = imgPrevCount.split(",")
        var index = arr.indexOf(String(id))
        arr.splice(index, 1);
        $('#vid-data-count').attr('value', arr.toString())
    }

    $(document).ready(function() {
        var plan_id = localStorage.getItem('plan_id');
        if (plan_id == 1) {

            $('#gallery-img').html('(Max 10 images)')
            $('#gallery-vid').html('(Max 1 videos)')

            // Set the maximum character limit for the textarea
            var maxCharacters = 300;
            $("#show_count").text(maxCharacters);
        } else {


            $('#gallery-img').html('(Max 40 images)')
            $('#gallery-vid').html('(Max 3 videos)')

            var maxCharacters = 1000;
            $("#show_count").text(maxCharacters);
        }
        var $textarea = $('#inputBio');
        var $charCount = $('#charCount');

        // $textarea.on('input', function() {
        //     var currentText = $textarea.val();
        //     var remainingCharacters = maxCharacters - currentText.length;
        //     $("#limitshow").css('display', 'block');
        //     if (remainingCharacters >= 0) {
        //         $charCount.text(currentText.length);
        //     } else {
        //         // Truncate the text to the maximum allowed characters
        //         $textarea.val(currentText.substr(0, maxCharacters));
        //     }
        // });
        var plan_id = localStorage.getItem('plan_id');
        if (plan_id == 1) {
            var minFiles = 1;
            var maxFiles = 10;
            var minVideo = 1;
            var maxVideo = 1;
        } else {
            var minFiles = 1;
            var maxFiles = 40;
            var minVideo = 1;
            var maxVideo = 3;
        }
        $('.col-12.preview').hide()
        $('.preview-grid').html('')
        var imgInp = $('#uploadimages');
        $('#uploadimages').on('change', function(event) {
            var arr = [];

            $('.preview-grid').html('');
            var imgFiles = imgInp.prop('files');
            // $('.col-12.preview label.form-label').html('Previews ('+imgFiles.length+')');
            if (imgFiles.length < minFiles || imgFiles.length > maxFiles) {
                displayError(`Your plan allow max ${maxFiles} image to upload.`);
                return;

            } else {
                displayError('');
                if (imgFiles.length > 0) {
                    $('.col-12.preview').show()
                    for (var i = 0; i < imgFiles.length; i++) {
                        arr.push(i);
                        var prevUrl = URL.createObjectURL(imgFiles[i])
                        $('.preview-grid').append(`<div id="cancel-prev-` + i + `" class="preview-grid-item"><img src="` + prevUrl + `" alt=""> <span class="cancel-icon" onclick="cancelImgPrev(` + i + `)"><i class="fa-solid fa-circle-xmark"></i></span></div>`);
                    }
                    $('#img-data-count').attr('value', arr.toString())
                }
            }
        });

        $('.col-12.video-preview').hide()
        $('.vid-rpeviews-grid-item').html('')
        var vidInp = $('#video');
        $('#video').on('change', function(event) {
            var arr = [];

            $('.vid-previews-grid').html('');
            var vidFiles = vidInp.prop('files');
            // $('.col-12.preview label.form-label').html('Previews ('+imgFiles.length+')');
            if (vidFiles.length < minVideo || vidFiles.length > maxVideo) {
                displayVideoError(`Your plan allow max ${maxVideo} image to upload.`);
                return;

            } else {
                displayVideoError('');
                if (vidFiles.length > 0) {
                    $('.col-12.video-preview').show()
                    for (var i = 0; i < vidFiles.length; i++) {
                        arr.push(i);
                        var prevUrl = URL.createObjectURL(vidFiles[i])
                        $('.vid-previews-grid').append(`<div id="cancel-vid-prev-` + i + `" class="vid-rpeviews-grid-item">
                                    <span class="cancel-icon" onclick="cancelVidPrev(` + i + `)"><i class="fa-solid fa-circle-xmark"></i></span>
                                    <video width="150" height="100" controls>
                                        <source src="` + prevUrl + `" id="video_here">
                                        Your browser does not support HTML5 video.
                                    </video>
                                </div>`);
                    }
                    $('#vid-data-count').attr('value', arr.toString())
                }
            }
        });

        $('input[name=confirmation]').on('change', function(event) {
            if ($(this).is(":checked") == false) {
                displaylCheckError('*Please select this checkbox')
                return;
            } else {
                displaylCheckError('')
            }
        });
        $('#qrcode_detail').on('submit', function(event) {
            event.preventDefault();

            var qrlabel = $("#qrlabel").val();
            if (qrlabel == "" || qrlabel == "undefined") {
                displaylQaCheckError("Label is required.");
                return;
            }

            var fileInput = $('#uploadimages');
            var files = fileInput.prop('files');

            var fileVideo = $('#video');
            var f_video = fileVideo.prop('files');

            var plan_id = localStorage.getItem('plan_id');
            if (plan_id == 1) {
                var minFiles = 1;
                var maxFiles = 10;
                var minVideo = 1;
                var maxVideo = 1;
            } else {
                var minFiles = 1;
                var maxFiles = 40;
                var minVideo = 1;
                var maxVideo = 3;
            }

            // Check if any files are selected
            if (files.length === 0) {
                displayError("Please select at least one image.");
                return;
            }

            // Check if the number of selected files is within the specified range
            if (files.length < minFiles || files.length > maxFiles) {
                if (plan_id == 1) {
                    displayError(`Your plan allow max ${maxFiles} image to upload.`);
                    return;
                } else {
                    // displayError(`Please select between ${minFiles} and ${maxFiles} images.`);
                    displayError(`Your plan allow max ${maxFiles} image to upload.`);
                    return;
                }

            }

            // Check if all selected files are images
            for (var i = 0; i < files.length; i++) {
                if (!files[i].type.startsWith('image/')) {
                    displayError("Please select only valid image files.");
                    return;
                }
            }

            // Video Validations
            // if (f_video.length === 0) {
            //     displayVideoError("Please select at least one video.");
            //     return;
            // }

            if (f_video.length > 0) {
                // Check if the number of selected files is within the specified range
                if (f_video.length < minVideo || f_video.length > maxVideo) {
                    if (plan_id == 1) {
                        displayVideoError(`your plan allow max ${maxVideo} video to upload.`);
                        return;
                    } else {
                        displayVideoError(`your plan allow max ${maxVideo} video to upload.`);
                        // displayVideoError(`Please select between ${minFiles} and ${maxFiles} videos.`);
                        return;
                    }

                }

                // Check if all selected files are images
                for (var i = 0; i < f_video.length; i++) {
                    if (!f_video[i].type.startsWith('video/')) {
                        displayVideoError("Please select only valid video files.");
                        return;
                    }
                }

                var fileInputvideo = $("#video")[0];
                var fileSizeVideo = fileInputvideo.files[0].size; // in bytes

                var maxSize = 200 * 1024 * 1024; // 100 MB in bytes

                if (fileSizeVideo > maxSize) {
                    displayVideoError("File size exceeds the maximum limit of 200 MB.");
                    return;
                }
            } else {
                displayVideoError("Please select at least one video.");
                return;
            }



            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();

            if (firstName == "" || firstName == "undefined") {
                displayfnameError("First Name is required.");
                return;
            }

            if (lastName == "" || lastName == "undefined") {
                displaylnameError("Last Name is required.");
                return;
            }


            if ($('input[name=confirmation]').is(":checked") == false) {
                displaylCheckError('*Please select this checkbox')
                return;
            } else {
                displaylCheckError('')
            }
            // If the validation passes, you can proceed with the image upload process
            // Add your upload logic here

            // Reset the error message
            $('#errorMessage').text('');
            $('#errorVideoMessage').text('');
            var imgFileKeys = $('#img-data-count').attr('value');
            var vidFileKeys = $('#vid-data-count').attr('value');
            var audio_id = $('input[name="audio"]:checked').val();
            var form = $('#qrcode_detail')[0];
            var formData = new FormData(form);
            formData.append('plan_id', plan_id);
            formData.append('audio_id', audio_id);
            formData.append('img_file_keys', imgFileKeys);
            formData.append('vid_file_keys', vidFileKeys);

            $('.loader').css('display', 'block');
            $.ajax({
                url: "{{ route('qr.submit') }}", // The route to handle the form submission
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    $('.loader').css('display', 'none');
                    // Handle the success response
                    var id = response.data;
                    var url = "{{ url('qr-detail-view') }}" + '/' + id;
                    window.location.href = url;

                },
                error: function(xhr, status, error) {
                    $('.loader').css('display', 'none');
                    // Handle the error response
                    console.log(xhr.responseText);
                    alert(xhr.responseText)
                }
            });
        });

        function displayError(message) {
            $('#errorMessage').text(message);
        }

        function displayVideoError(message) {
            $('#errorVideoMessage').text(message);
        }

        function displayfnameError(message) {
            $('#errorfnameMessage').text(message);
        }

        function displaylnameError(message) {
            $('#errorlnameMessage').text(message);
        }

        function displaylCheckError(message) {
            $('#errorCheckMessage').text(message);
        }

        function displaylQaCheckError(message) {
            $('#errorqalabelMessage').text(message);
        }
    });
</script>

@include('layouts.footer')