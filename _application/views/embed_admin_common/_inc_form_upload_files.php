<div class="row">

    <div class="col-md-12">

        <div class="gridlock demo" style="margin: 0 10px;">

            <article class="row page">
                <div class="mobile-full tablet-full desktop-8 desktop-push-2">
                    <form action="#" class="demo_form">
                        <div class="dropped"></div>

                        <div class="filelists">
                            <h5>Complete</h5>
                            <ol class="filelist complete">
                            </ol>
                            <h5>Queued</h5>
                            <ol class="filelist queue">
                            </ol>
                        </div>
                    </form>

                </div>
            </article>

        </div>

    </div>

</div>


<script>
    var $filequeue,
        $filelist;
    var tf = 'x_<?=$temp_folder;?>';
    $(document).ready(function() {
        $filequeue = $(".demo .filelist.queue");
        $filelist = $(".demo .filelist.complete");


        $(".demo .dropped").dropper({
            action: "<?=_index_url;?>form/upload_photo",
            maxSize: 2097152,
            label: "Drag and drop image or click to select",
            maxQueue: 4,
            postData: {
                'x__token' : $('#x__token').val(),
                '_tmp_' : tf
            }

        }).on("start.dropper", onStart)
            .on("complete.dropper", onComplete)
            .on("fileStart.dropper", onFileStart)
            .on("fileProgress.dropper", onFileProgress)
            .on("fileComplete.dropper", onFileComplete)
            .on("fileError.dropper", onFileError);

        $(window).one("pronto.load", function() {
            $(".demo .dropped").dropper("destroy").off(".dropper");
        });
    });

    function onStart(e, files) {
        console.log("Start");

        var html = '';

        for (var i = 0; i < files.length; i++) {
            html += '<li data-index="' + files[i].index + '"><span class="file">' + files[i].name + '</span><span class="progress">Queued</span></li>';
        }

        $filequeue.append(html);
    }

    function onComplete(e) {
        console.log("Complete");
        // All done!
    }

    function onFileStart(e, file) {

        $filequeue.find("li[data-index=" + file.index + "]")
            .find(".progress").text("0%");
    }

    function onFileProgress(e, file, percent) {


        $filequeue.find("li[data-index=" + file.index + "]")
            .find(".progress").text(percent + "%");
    }

    function onFileComplete(e, file, response) {
        var response = JSON.parse(response);



        if (response.msg != 'ok') {
            var $target = $filequeue.find("li[data-index=" + file.index + "]");
                $target.addClass("error").find(".progress").remove();
                $target.append(response.msg);
        } else {
            var $target = $filequeue.find("li[data-index=" + file.index + "]");

            $target.find(".file").text(file.name);
            $target.find(".progress").remove();
            //$target.appendTo($filelist).append('<img src="'+_base_url+'upload/'+response+'">');
            $target.appendTo($filelist).append('<br/><img src="'+_base_url+'upload/'+tf+'/'+response.filename+'">');
        }
    }

    function onFileError(e, file, error) {

        $filequeue.find("li[data-index=" + file.index + "]").addClass("error")
            .find(".progress").text("Error: " + error);
    }
</script>