<?php require_once ('inc/inc.php'); ?>
<?php require_once('template-parts/header.php'); ?>

    <!--<link rel="stylesheet" href="assets/css/site.css">-->
    <link rel="stylesheet" href="assets/css/upload.css">

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <!-- Compiled JS -->
    <!--<script src="assets/js/core.js"></script>
    <script src="assets/js/upload.js"></script>-->
    <script src="assets/plugins/fileUpload/fileUpload.min.js"></script>
    <script src="assets/plugins/fileUpload/upload.js"></script>
<div class="fs-grid demo_page demo_content">
    <div class="fs-row">
        <div class="fs-cell">
            <h1 id="upload-demo">Upload Demo</h1>
            <p class="back_link">
                <a href="https://formstone.it/components/upload">View Documentation</a>
            </p>
            <!-- START: DEMO -->
            <h4>Basic</h4>

            <!-- START: FIRSTDEMO -->

            <style>
                .filelists {
                    margin: 20px 0;
                }

                .filelists h5 {
                    margin: 10px 0 0;
                }

                .filelists .cancel_all {
                    color: red;
                    cursor: pointer;
                    clear: both;
                    font-size: 10px;
                    margin: 0;
                    text-transform: uppercase;
                }

                .filelist {
                    margin: 0;
                    padding: 10px 0;
                }

                .filelist li {
                    background: #fff;
                    border-bottom: 1px solid #ECEFF1;
                    font-size: 14px;
                    list-style: none;
                    padding: 5px;
                }

                .filelist li:before {
                    display: none;
                }

                .filelist li .file {
                    color: #455A64;
                }

                .filelist li .fs-progress {
                    color: #B0BEC5;
                    float: right;
                    margin: 0;
                    background: transparent;
                    box-shadow: none;
                    -webkit-box-shadow: none;
                    font-size: 10px;
                    text-transform: uppercase;
                }

                .filelist li .cancel,
                .filelist li .remove-file {
                    color: red;
                    cursor: pointer;
                    float: right;
                    font-size: 10px;
                    margin: 0 0 0 10px;
                    text-transform: uppercase;
                }

                .filelist li.error .fs-progress {
                    color: red;
                }

                .filelist li.error .cancel {
                    display: none;
                }
            </style>

            <!--<script>
                $(document).ready(function() {
                    $(".upload").upload();
                });

            </script>-->

            <script>
                jQuery(document).ready(function($) {
                    $(".upload").upload({
                        maxSize: 5242880, //5 MB
                        beforeSend: onBeforeSend
                    }).on("start.upload", onStart)
                        .on("complete.upload", onComplete)
                        .on("filestart.upload", onFileStart)
                        .on("fileprogress.upload", onFileProgress)
                        .on("filecomplete.upload", onFileComplete)
                        .on("fileerror.upload", onFileError)
                        .on("queued.upload", onQueued);

                    $(".filelist.queue").on("click", ".cancel", onCancel);
                    $(".cancel_all").on("click", onCancelAll);
                    $(".filelist.complete").on("click", ".remove-file", removeFile);
                });
            </script>

            <div class="demo_container">
                <div class="demo_example">
                    <form action="#" method="POST" class="form demo_form">
                        <div class="upload" data-upload-options='{"action":"target/target-upload.php"}'></div>
                        <div class="filelists">
                            <h5>Complete</h5>
                            <ol class="filelist complete">
                            </ol>
                            <h5>Queued</h5>
                            <ol class="filelist queue">

                            </ol>
                            <span class="cancel_all">Cancel All</span>
                        </div>
                        <input type="submit" name="submit" class="btn-submit" value="Submit">
                    </form>
                </div>
                <!--<div class="demo_code">
                    <pre><code class="language-html">&lt;div class=&quot;upload&quot;&gt;&lt;/div&gt;</code></pre>
							<pre><code class="language-javascript">$(".upload").upload({
                                    action: "//example.com/handle-upload.php"
                                    });</code></pre>
                </div>-->
                
            </div>
        </div>
    </div>
</div>
</body>
</html>