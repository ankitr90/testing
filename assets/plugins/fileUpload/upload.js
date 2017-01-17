function onCancel(e) {
    //console.log("Cancel");
    var index = $(this).parents("li").data("index");
    $(this).parents("form").find(".upload").upload("abort", parseInt(index, 10));
}

function onCancelAll(e) {
    //console.log("Cancel All");
    $(this).parents("form").find(".upload").upload("abort");
}

function onBeforeSend(formData, file) {
    //console.log("Before Send");
    formData.append("test_field", "test_value");
    return (file.name.indexOf(".jpg") < -1) ? false : formData; // cancel all jpgs
    //return formData;
}

function onQueued(e, files) {
    //console.log("Queued");
    var html = '';
    for (var i = 0; i < files.length; i++) {
        html += '<li data-index="' + files[i].index + '"><span class="file">' + files[i].name + '</span><span class="cancel">Cancel</span><span class="fs-progress">Queued</span></li>';
    }

    $(this).parents("form").find(".filelist.queue")
        .append(html);
}

function onStart(e, files) {
    //console.log("Start");
    $(this).parents("form").find(".filelist.queue")
        .find("li")
        .find(".fs-progress").text("Waiting");
}

function onComplete(e) {
    console.log(e);
    console.log("Complete");
    // All done!
}

function onFileStart(e, file) {
    //console.log("File Start");
    $(this).parents("form").find(".filelist.queue")
        .find("li[data-index=" + file.index + "]")
        .find(".fs-progress").text("0%");
}

function onFileProgress(e, file, percent) {
    //console.log("File Progress");
    //console.log(percent);
    $(this).parents("form").find(".filelist.queue")
        .find("li[data-index=" + file.index + "]")
        .find(".fs-progress").text(percent + "%");
}

function onFileComplete(e, file, response) {
    console.log(response);
    //console.log("File Complete");
    if (response.trim() === "" || response.toLowerCase().indexOf("error") > -1) {
        $(this).parents("form").find(".filelist.queue")
            .find("li[data-index=" + file.index + "]").addClass("error")
            .find(".fs-progress").text(response.trim());
    }
    else {
        var $target = $(this).parents("form").find(".filelist.queue").find("li[data-index=" + file.index + "]");
        var responseFile = $(response).filter("div").data("file");
        console.log(responseFile);
        $target.find(".file").text(responseFile);
        $target.find(".fs-progress").remove();
        $target.find(".cancel").remove();

        var html='';

        html += '<input type="hidden" name="uploadedFile[]" value="'+ responseFile +' "/>';
        html += '<a class="remove-file" data-file="' + responseFile + '" href"#">'+'<span class="glyphicon glyphicon-remove"></span>'+'</a>';

        $(this).parents("form")
            .find(".filelist.queue")
            .find("li[data-index=" + file.index + "]")
            .append(html);

        $target.appendTo($(this).parents("form").find(".filelist.complete"));
    }
}

function onFileError(e, file, error) {
    //console.log("File Error");
    $(this).parents("form").find(".filelist.queue")
        .find("li[data-index=" + file.index + "]").addClass("error")
        .find(".fs-progress").text("Error: " + error);
}

function removeFile() {
    //todo Remove file from S3/ElasticCache

    var file = $(this).data('file');
    $(this).parent().remove();
    console.log(file);
}