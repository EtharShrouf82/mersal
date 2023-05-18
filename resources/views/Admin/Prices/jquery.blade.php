<script>
    $("#screen_type_id").change(function (e) {
        e.preventDefault();
        const id = $(this).val();
        $.ajax({
            url: '/getPlans/'+id,
            type: 'get',
            beforeSend: function () {
                $('#plans span').html('<img style="max-width: 20px" src="{{ asset('/Front/assets/images/loading.gif') }}">');
            },
            complete: function () {
                $('#plans span').html('');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            },
            success: function (data) {
                if (data != null) {
                    var ForumCat = '<select class="form-control" name="plan_id" "><option value="">الرجاء إختيار الخطة</option><span></span>';
                    $.each(data, function (k, v) {
                        console.log(v);
                        ForumCat += '<option value="'+v.id+'">'+v['default_translation']['title']+' - '+v['num_views']+' Views</option>';
                    });
                    ForumCat +='</select>';
                    $("#plans").html(ForumCat);
                }
            },
        });
    })
</script>
