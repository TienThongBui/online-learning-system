<!--
> Muaz Khan     - www.MuazKhan.com
> MIT License   - www.WebRTC-Experiment.com/licence
> Documentation - github.com/muaz-khan/RecordRTC
> and           - RecordRTC.org
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>RecordRTC Audio+Video Recording & Uploading to PHP Server</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- <link rel="stylesheet" href="https://www.webrtc-experiment.com/style.css"> -->

    <style>
        audio {
            vertical-align: bottom;
            width: 20em;
        }

        .header{
            display: none;
        }

        .button{
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
            /* margin: 0; */
            /* margin-bottom: 10px; */
        }

        .recordrtc button i {
            
            font-size: 30px;
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

    <script src="https://www.webrtc-experiment.com/RecordRTC.js"></script>
    <script src="https://www.webrtc-experiment.com/gif-recorder.js"></script>
    <script src="https://www.webrtc-experiment.com/getScreenId.js"></script>
    <script src="https://www.webrtc-experiment.com/DetectRTC.js"> </script>

    <!-- for Edige/FF/Chrome/Opera/etc. getUserMedia support -->
    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>

    <script src="https://kit.fontawesome.com/528e435c1a.js" crossorigin="anonymous"></script>
</head>

<body>



    <div class="container">
        <div class="row d-flex">
            <section class="experiment recordrtc">
                <h2 class="header">
                    <select class="recording-media">

                        <option value="record-audio">Audio</option>

                    </select>

                   
                    <select class="media-container-format">
                        <option>WebM</option>

                        <option>Gif</option>
                    </select>

                   
                </h2>

                
                <div class="row">
                    <button><i class="fa-solid fa-microphone"></i></button>
                    <audio controls autoplay muted=false volume=1></audio>
                </div>

            </section>
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





    <!-- commits.js is useless for you! -->
    <!-- <script>
        window.useThisGithubPath = 'muaz-khan/RecordRTC';
    </script>
    <script src="https://www.webrtc-experiment.com/commits.js" async></script> -->
</body>

</html>