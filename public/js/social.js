// jQuery xSocial
(function($) {
    $.fn.xSocial = function(options) {
        var options = $.extend({
            type: 'POST',
            url: '',
        }, options);
        
        $(this).on('click', function() {
            var data_object_id = $(this).attr('data-object-id'),
                data_object_type = $(this).attr('data-object-type');
                
            $.ajax({
                type: options.type,
                url: options.url,
                data: {
                    object_id: data_object_id,
                    object_type: data_object_type,
                },
                success: function(data, textStatus, jqXHR) {
                    $('.x-container').html(data);
                    $('.x-container .modal').modal('show');
                },
                complete: function(jqXHR, textStatus) {
                    var xRedirect = jqXHR.getResponseHeader('X-Redirect');
                    if (xRedirect != null) {
                        $.ajax({
                            url: xRedirect,
                            success: function(data, textStatus, jqXHR) {
                                $('.x-container').html(data);
                                $('.x-container .modal').modal('show');
                            },
                            complete: function(jqXHR, textStatus) {
                                // complete here ...
                            },
                        });
                        return true;
                    }
                    
                    if (textStatus == 'error') {
                        alert('Ошибка ' + jqXHR.status + ': ' + jqXHR.statusText + '.');
                    }
                },
            });
            
            return false;
        });
    };
}(jQuery));

jQuery(function($) {
    $('.si-add-like').xSocial({
        url: '/frontend/like/create',
    });
    $('.si-add-favorite').xSocial({
        url: '/frontend/favorite/create',
    });
});