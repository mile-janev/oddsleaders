<script type="text/javascript">
    $('.loaded').live('click', function(){
        id = $(this).attr('data-id');

        setRemoveMyLeagues(id);

        $(this).removeClass('loaded');
        $(this).addClass('load');
        
        $('#'+id).slideUp('fast');
        return false;
    });

    $('.load').live('click', function()
    {    
        id = $(this).attr('data-id');

        $(this).removeClass('load');
        $(this).addClass('loaded');

        setRemoveMyLeagues(id);
        
        $('.loader').show();
        $.ajax(
        {
            type: 'POST',
            url: '<?php echo $this->createUrl('stack/getmatches'); ?>',
            data: {'id' : id},
            dataType: "html",
            success: function(response)
            {
                $('.loader').hide();
                $('#main .load_matches').prepend(response);
            }
        });

        return false;
    });
    
</script>