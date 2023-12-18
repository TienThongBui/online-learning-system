<?php
require_once '../includes/config_session.inc.php';
require_once '../includes/db_connection.php';
require_once '../functions/common_function.php';
// error_reporting(0);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/528e435c1a.js" crossorigin="anonymous"></script>
    <script src="https://www.webrtc-experiment.com/RecordRTC.js"></script>
    <script src="https://www.webrtc-experiment.com/gif-recorder.js"></script>
    <script src="https://www.webrtc-experiment.com/getScreenId.js"></script>
    <script src="https://www.webrtc-experiment.com/DetectRTC.js"> </script>

    <!-- for Edige/FF/Chrome/Opera/etc. getUserMedia support -->
    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>


    <title>Lecttue Detail</title>
    <script src="../js/comments.js"></script>
    <link rel="stylesheet" href="../css/lecttucesV2.css">
    <link rel="stylesheet" href="../css/headNav.css">

    <link rel="stylesheet" href="../css/comments.css">
</head>
<style>
    audio {
        vertical-align: bottom;
        width: 30em;
        margin-left: 10px;
        /* padding: 20px; */

    }

    .header {
        display: none;
    }

    .button {
        display: none;
        height: 200px;
        width: 200px;
    }

    .recordrtc button {
        vertical-align: middle;
        line-height: 1;
        padding: 2px 5px;
        height: 30px;
        width: 30px;
        /* font-size: inherit; */
        margin: 0;
        margin-bottom: 10px;
    }

    .recordrtc button i {

        font-size: 25px;
        margin: 0;

    }

    .recordrtc select {
        display: none;
        vertical-align: middle;
        line-height: 1;
        padding: 2px 5px;
        height: auto;
        font-size: inherit;
        margin: 0;
        margin-bottom: 10px;
    }
</style>

<body>
    <?php
    include "../partitials/header.php";
    ?>
    <div class="main">
        <div class="container-fluid py-3 px-3">

            <div class="container">
                <div class="uni justify-content-center">
                    <div class="row">

                        <div class="col-2">
                            <div class="dropdown">
                                <h5>Skill</h5>
                                <div class="dropdown-content">
                                    <?php
                                    get_category();
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="dropdown">
                                <h5>Level</h5>
                                <div class="dropdown-content">
                                    <?php
                                    get_level();
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">

                            <div class="dropdown">
                                <h5><a href="select_exam.php">Exam</a></h5>

                            </div>


                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <?php
                    search_lecttuces();
                    get_uni_lecttuces();
                    get_uni_category();
                    get_uni_level();
                    ?>

                    <div class="row my-3 d-flex justify-content-around text-center my-3">
                        <div class="col-md-2">
                            <?php
                            pre_btn();
                            ?>
                        </div>
                        <div class="col-md-2">
                            <?php
                            next_btn();
                            ?>
                        </div>
                    </div>

                    <div class="row my-3 justify-content-around bg-light">
                        <?php
                        quick_quiz();
                        ?>

                    </div>

                    <div class="row my-3 justify-content-around">
                        <?php
                        audio_record();
                        ?>

                    </div>

                    <div class="row my-3 justify-content-around">
                        <?php
                        writing_check();
                        ?>

                    </div>

                    <div class="row py-2 pb-5 justify-content-center">
                        <h5>More lesson:</h5>
                        <?php
                        more_lesson();
                        ?>
                    </div>

                    <div class="row py-2 pb-5 justify-content-center">
                        <h5>Leave a comment:</h5>

                        <div class='col-5 mb-5'>
                            <?php
                            $lecttuces_id = $_GET["id"];
                            ?>

                            <form action='' method='post' id='commentForm'>
                                <input type="hidden" name="lecttuces_id" value="<?php echo $id ?>">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="Enter Name" required />
                                </div>
                                <div class="form-group">
                                    <textarea name="comment" id="comment" class="form-control"
                                        placeholder="Enter Comment" rows="5" required></textarea>
                                </div>

                                <br>
                                <div class="form-group">
                                    <input type="submit" name="post_comment" id="post_comment" class="btn btn-primary"
                                        value="Post Comment" />
                                </div>
                            </form>


                            <?php

                            insert_comments();

                            $commentFetch = "select * from comments where lecttuces_id = $lecttuces_id";
                            $commentResult = mysqli_query($conn, $commentFetch);
                            $comments = array();

                            while ($row = mysqli_fetch_object($commentResult)) {
                                array_push($comments, $row);
                            }

                            //loop through each comments
                            foreach ($comments as $comment_key => $comment) {
                                $replies = array();

                                // check if it is a comment to post, not a reply to comment
                                if ($comment->reply_of == 0) {

                                    //loop through all comnments agian
                                    foreach ($comments as $reply_key => $reply) {

                                        //check if comment is a reply
                                        if ($reply->reply_of == $comment->id) {

                                            //add in replies array
                                            array_push($replies, $reply);

                                            // remove from comments array
                                            unset($comments[$reply_key]);
                                        }
                                    }
                                }

                                // assign replies to comments object
                                $comment->replies = $replies;
                            }


                            ?>

                        </div>

                        <!-- Comments displayed -->
                        <div class="row">
                            <?php foreach ($comments as $comment): ?>
                                <div class="col-md-12">

                                    <div class="comments">
                                        <div class="body">
                                            <h4 class="comments-heading">
                                                <?php echo $comment->username ?>
                                            </h4>
                                            <p>
                                                <?php echo $comment->comment ?>
                                            </p>

                                            <ul class="list-unstyled list-inline media-detail pull-left">
                                                <li><i class="fa fa-calendar"></i>
                                                    <?php echo date("F d,Y h:i a", strtotime($comment->created_at)); ?>
                                                </li>

                                            </ul>
                                            <ul class="list-unstyled list-inline media-detail pull-right">

                                                <li><button data-id="<?php echo $comment->id; ?>"
                                                        onclick="showReplyForm(this);"
                                                        class="btn btn-outline-info">Reply</button>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="replies">
                                            <?php foreach ($comment->replies as $reply): ?>

                                                <div class="body bg-light">
                                                    <h4 class="replies-heading">
                                                        <?php echo $reply->username; ?>
                                                    </h4>
                                                    <p>
                                                        <?php echo $reply->comment; ?>
                                                    </p>

                                                    <ul class="list-unstyled list-inline media-detail pull-left">
                                                        <li><i class="fa fa-calendar"></i>
                                                            <?php echo date("F d,Y h:i a", strtotime($reply->created_at)); ?>
                                                        </li>

                                                    </ul>
                                                    <ul class="list-unstyled list-inline media-detail pull-right">

                                                        <li><button onclick="showReplyForReplyForm(this);"
                                                                data-name="<?php echo $reply->username; ?>"
                                                                data-id="<?php echo $comment->id; ?>"
                                                                class="btn btn-outline-primary">Reply</button>
                                                        </li>
                                                    </ul>
                                                </div>

                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <form action="" method="post" id="form-<?php echo $comment->id; ?>"
                                        style="display: none;">

                                        <input type="hidden" name="reply_of" value="<?php echo $comment->id; ?>" required>
                                        <input type="hidden" name="lecttuces_id" value="<?php echo $lecttuces_id; ?>"
                                            required>

                                        <div class="form-group">
                                            <input type="text" name="username" id="username" class="form-control"
                                                placeholder="Enter Name" required />
                                        </div>
                                        <div class="form-group">
                                            <textarea name="comment" id="comment" class="form-control"
                                                placeholder="Enter Comment" rows="5" required></textarea>
                                        </div>

                                        <br>
                                        <div class="form-group">
                                            <input type="submit" name="do_reply" id="do_reply"
                                                class="btn btn-outline-primary" value="Reply Comment" />
                                        </div>
                                    </form>

                                </div>
                            <?php endforeach; ?>
                        </div>





                        <?php
                        reply_comments();
                        ?>



                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        (function () {
            var params = {},
                r = /([^&=]+)=?([^&]*)/g;

            function d(s) {
                return decodeURIComponent(s.replace(/\+/g, ' '));
            }

            var match, search = window.location.search;
            while (match = r.exec(search.substring(1))) {
                params[d(match[1])] = d(match[2]);

                if (d(match[2]) === 'true' || d(match[2]) === 'false') {
                    params[d(match[1])] = d(match[2]) === 'true' ? true : false;
                }
            }

            window.params = params;
        })();
    </script>

    <script>
        var recordingDIV = document.querySelector('.recordrtc');
        var recordingMedia = recordingDIV.querySelector('.recording-media');
        var recordingPlayer = recordingDIV.querySelector('audio');
        var mediaContainerFormat = recordingDIV.querySelector('.media-container-format');

        recordingDIV.querySelector('button').onclick = function () {
            var button = this;

            if (button.innerHTML === '<i class="fa-solid fa-pause"></i>') {
                button.disabled = true;
                button.disableStateWaiting = true;
                setTimeout(function () {
                    button.disabled = false;
                    button.disableStateWaiting = false;
                }, 2 * 1000);

                // button.innerHTML = 'Start Recording';
                button.innerHTML = '<i class="fa-solid fa-microphone"></i>'

                function stopStream() {
                    if (button.stream && button.stream.stop) {
                        button.stream.stop();
                        button.stream = null;
                    }
                }

                if (button.recordRTC) {
                    if (button.recordRTC.length) {
                        button.recordRTC[0].stopRecording(function (url) {
                            if (!button.recordRTC[1]) {
                                button.recordingEndedCallback(url);
                                stopStream();
                            }

                            button.recordRTC[1].stopRecording(function (url) {
                                button.recordingEndedCallback(url);
                                stopStream();
                            });
                        });
                    }
                    else {
                        button.recordRTC.stopRecording(function (url) {
                            button.recordingEndedCallback(url);
                            stopStream();
                        });
                    }
                }

                return;
            }

            button.disabled = true;

            var commonConfig = {
                onMediaCaptured: function (stream) {
                    button.stream = stream;
                    if (button.mediaCapturedCallback) {
                        button.mediaCapturedCallback();
                    }

                    button.innerHTML = '<i class="fa-solid fa-pause"></i>';
                    button.disabled = false;
                },
                onMediaStopped: function () {
                    button.innerHTML = '<i class="fa-solid fa-microphone"></i>';

                    if (!button.disableStateWaiting) {
                        button.disabled = false;
                    }
                },
                onMediaCapturingFailed: function (error) {
                    if (error.name === 'PermissionDeniedError' && !!navigator.mozGetUserMedia) {
                        InstallTrigger.install({
                            'Foo': {
                                // https://addons.mozilla.org/firefox/downloads/latest/655146/addon-655146-latest.xpi?src=dp-btn-primary
                                URL: 'https://addons.mozilla.org/en-US/firefox/addon/enable-screen-capturing/',
                                toString: function () {
                                    return this.URL;
                                }
                            }
                        });
                    }

                    commonConfig.onMediaStopped();
                }
            };


            if (recordingMedia.value === 'record-audio') {
                captureAudio(commonConfig);

                button.mediaCapturedCallback = function () {
                    button.recordRTC = RecordRTC(button.stream, {
                        type: 'audio',
                        bufferSize: typeof params.bufferSize == 'undefined' ? 0 : parseInt(params.bufferSize),
                        sampleRate: typeof params.sampleRate == 'undefined' ? 44100 : parseInt(params.sampleRate),
                        leftChannel: params.leftChannel || false,
                        disableLogs: params.disableLogs || false,
                        recorderType: DetectRTC.browser.name === 'Edge' ? StereoAudioRecorder : null
                    });

                    button.recordingEndedCallback = function (url) {
                        var audio = new Audio();
                        audio.src = url;
                        audio.controls = true;
                        recordingPlayer.parentNode.appendChild(document.createElement('hr'));
                        recordingPlayer.parentNode.appendChild(audio);

                        if (audio.paused) audio.play();

                        audio.onended = function () {
                            audio.pause();
                            audio.src = URL.createObjectURL(button.recordRTC.blob);
                        };
                    };

                    button.recordRTC.startRecording();
                };
            }

        };



        function captureAudio(config) {
            captureUserMedia({ audio: true }, function (audioStream) {
                recordingPlayer.srcObject = audioStream;

                config.onMediaCaptured(audioStream);

                audioStream.onended = function () {
                    config.onMediaStopped();
                };
            }, function (error) {
                config.onMediaCapturingFailed(error);
            });
        }

        function captureUserMedia(mediaConstraints, successCallback, errorCallback) {
            navigator.mediaDevices.getUserMedia(mediaConstraints).then(successCallback).catch(errorCallback);
        }

        function setMediaContainerFormat(arrayOfOptionsSupported) {
            var options = Array.prototype.slice.call(
                mediaContainerFormat.querySelectorAll('option')
            );

            var selectedItem;
            options.forEach(function (option) {
                option.disabled = true;

                if (arrayOfOptionsSupported.indexOf(option.value) !== -1) {
                    option.disabled = false;

                    if (!selectedItem) {
                        option.selected = true;
                        selectedItem = option;
                    }
                }
            });
        }

        recordingMedia.onchange = function () {
            if (this.value === 'record-audio') {
                setMediaContainerFormat(['WAV', 'Ogg']);
                return;
            }
            setMediaContainerFormat(['WebM', /*'Mp4',*/ 'Gif']);
        };

        if (DetectRTC.browser.name === 'Edge') {
            // webp isn't supported in Microsoft Edge
            // neither MediaRecorder API
            // so lets disable both video/screen recording options

            console.warn('Neither MediaRecorder API nor webp is supported in Microsoft Edge. You cam merely record audio.');

            recordingMedia.innerHTML = '<option value="record-audio">Audio</option>';
            setMediaContainerFormat(['WAV']);
        }

        if (DetectRTC.browser.name === 'Firefox') {
            // Firefox implemented both MediaRecorder API as well as WebAudio API
            // Their MediaRecorder implementation supports both audio/video recording in single container format
            // Remember, we can't currently pass bit-rates or frame-rates values over MediaRecorder API (their implementation lakes these features)

            recordingMedia.innerHTML = '<option value="record-audio-plus-video">Audio+Video</option>'
                + '<option value="record-audio-plus-screen">Audio+Screen</option>'
                + recordingMedia.innerHTML;
        }

        // disabling this option because currently this demo
        // doesn't supports publishing two blobs.
        // todo: add support of uploading both WAV/WebM to server.
        if (false && DetectRTC.browser.name === 'Chrome') {
            recordingMedia.innerHTML = '<option value="record-audio-plus-video">Audio+Video</option>'
                + recordingMedia.innerHTML;
            console.info('This RecordRTC demo merely tries to playback recorded audio/video sync inside the browser. It still generates two separate files (WAV/WebM).');
        }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
</body>

</html>