jQuery(function($) {
    $('.ajax-query').click(function(e) {

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
                //$.LoadingOverlay("show", {
                    //color: "rgba(51,51,51,0.8)",
                //});    
            },
            complete: function() {                
                //$.LoadingOverlay("hide");
                $("#modal-footer").modal();
            }
        }); 
       
    });
});