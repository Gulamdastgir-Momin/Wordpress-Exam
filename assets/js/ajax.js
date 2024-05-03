jQuery(document).ready(function(){
    jQuery('#load-more').on('click',function(){
        jQuery.ajax({
            type: 'post',
            dataType: 'json',
            url: ajax_object.ajax_url,
            data: {
                action: 'load_more_posts'
            },
            success: function(response){
                jQuery('.listing').append(response)
                jQuery('#load-more').hide();
            },
            error: function(err){
                console.log(err);
            }
        })
    })
})