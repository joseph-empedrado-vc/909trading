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
    var tf = 'x_<?=str_pad(rand(0,99999),5,STR_PAD_LEFT);?>';
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
        console.log("File Start");

        $filequeue.find("li[data-index=" + file.index + "]")
            .find(".progress").text("0%");
    }

    function onFileProgress(e, file, percent) {
        console.log("File Progress");

        $filequeue.find("li[data-index=" + file.index + "]")
            .find(".progress").text(percent + "%");
    }

    function onFileComplete(e, file, response) {
        console.log(response);

        if (response.trim() === "" || response.toLowerCase().indexOf("error") > -1) {
            $filequeue.find("li[data-index=" + file.index + "]").addClass("error")
                .find(".progress").text(response.trim());
        } else {
            var $target = $filequeue.find("li[data-index=" + file.index + "]");

            $target.find(".file").text(file.name);
            $target.find(".progress").remove();
            $target.appendTo($filelist).append('<img src="'+_base_url+'upload/'+response+'">');
            //$target.appendTo($filelist).append('<img src="'+_base_url+'upload/'+tf+'/'+response+'">');
        }
    }

    function onFileError(e, file, error) {
        console.log("File Error");

        $filequeue.find("li[data-index=" + file.index + "]").addClass("error")
            .find(".progress").text("Error: " + error);
    }
</script>