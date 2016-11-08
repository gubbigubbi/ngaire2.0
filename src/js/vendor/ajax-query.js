jQuery(function($) {
    $('.ajax-query').click(function(e) {
        var $this = $(this);
        var $offer = $this.data('offer');
        console.log($offer);
        e.preventDefault();
        
        jQuery.ajax({
            url : myAjax.ajaxurl,
            type : "post",
            dataType: "html", //unfortunately have to use html because the post object contains marked up content
            data: {
                action: 'loop_output',
                query_type: $(this).data('type'),
                postID: $(this).data('id'),
            },
            success : function( response ) {
                $("#modal-footer .modal-response").html(response);

            },
            beforeSend: function() {
                $this.button('loading');
            },
            complete: function() {                
                $this.button('reset');
                $("#modal-footer #offer").val($offer);
                $("#modal-footer").modal();
            }
        }); 
       
    });
});