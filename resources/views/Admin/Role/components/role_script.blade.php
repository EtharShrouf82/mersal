<script type="text/javascript">
    function checkParent(id) {
        $(".perm"+id+"").unbind().change(function(){
            const selector = $("#checkId"+id+"");
            const checked = selector.is(':checked');
            const thsCheck = $(this).is(':checked');
            if(!checked){
                selector.prop('checked',true);
            }
            if(!thsCheck){
                $('#id'+id+'').prop('checked',false);
            }
        });
    }

    function checkUnCheck(id) {
        $(".p"+id+"").unbind().change(function(){
            var checked = $(this).is(':checked');
            if(checked){
                $(".perm"+id+"").each(function() {
                    $(this).prop('checked',true);
                });
            }else{
                $(".perm"+id+"").each(function() {
                    $(this).prop('checked',false);
                });
            }
        });
    }

    function checkChecked(id) {
        $('#checkId'+id+'').unbind().change(function(){
            var v = $(this);
            var checked = v.is(':checked');
            // var ch = false;
            if(checked === false){
                $(".perm"+id+"").each(function() {
                   if($(this).is(':checked')){
                       $(this).prop('checked',false);
                   }
                   $('#id'+id+'').prop('checked',false);
                });
            }
            // if(ch === false){
            //     v.prop('checked',false);
            // }
        });
    }

    $("#checkAll").change(function(){
        var checked = $(this).is(':checked'); // Checkbox state
        if(checked){
            $('input:checkbox').each(function() {
                $(this).prop('checked',true);
            });
        }else{
            // Deselect All
            $('input:checkbox').each(function() {
                $(this).prop('checked',false);
            });
        }

    });
</script>
