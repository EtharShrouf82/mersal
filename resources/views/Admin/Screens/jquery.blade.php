<script>
    $("#city").change(function (e) {
        const id = $(this).val();
        alert(id);
    })
    $('#multiple_files').change(function () {
        var error_images = '';
        var form_data = new FormData();
        var files = $('#multiple_files')[0].files;
        if (files.length > 10) {
            error_images += 'You can not select more than 10 files';
        } else {
            for (var i = 0; i < files.length; i++) {
                var name = document.getElementById("multiple_files").files[i].name;
                var ext = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    error_images += '<p>Invalid ' + i + ' File</p>';
                }
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
                var f = document.getElementById("multiple_files").files[i];
                var fsize = f.size || f.fileSize;
                if (fsize > 4000000) {
                    error_images += '<p>' + i + ' File Size is very big</p>';
                } else {
                    form_data.append("file[]", document.getElementById('multiple_files').files[i]);
                }
            }
        }
        if (error_images == '') {
            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = ((evt.loaded / evt.total) * 100);
                            $(".progress-bar").width(percentComplete + '%');
                            $(".progress-bar").html(percentComplete+'%');
                        }
                    }, false);
                    return xhr;
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ route('uploadScreens') }}",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('#success label').html('' +
                        '<div class="alert alert-success">الرجاء الإنتظار جاري تحميل الصور.....</div>');
                },
                complete: function () {
                    $('#success label').html('');
                },
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        $("#otherImages").append('' +
                            '<div class=" col-3">' +
                            '<div class="imgBox">' +
                            '<a class="deleteIcon" id="' + data[i] + '">' +
                            '<i class="fa fa-trash" aria-hidden="true"></i>' +
                            '</a>' +
                            '<img src="/images/screens/' + data[i] + '" alt="" title="">' +
                            '</div>' +
                            '</div><input type="hidden" name="oimg[]" value="'+data[i]+'"/>')
                    }
                    // $('.progress-bar').css('width', '0%');
                }
            });
        } else {
            // $('#multiple_files').val('');
            // $('#success').html("<span class='text-danger'>" + error_images + "</span>");
            // return false;
        }
    });
</script>
