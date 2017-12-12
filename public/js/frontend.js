// jQuery plugins
(function($) {
    // xSubmit plugin
    $.fn.xSubmit = function(options) {
        var element = $(this),
            options = $.extend({
                updateSelector: '',
            }, options);
        
        element.on('click', function() {
            var form = element.closest('form');
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                success: function(data, textStatus, jqXHR) {
                    if (options.updateSelector) {
                        $('.x-container').find(options.updateSelector).html(
                            $(data).find(options.updateSelector).html()
                        );
                    }
                },
                complete: function(jqXHR, textStatus) {
                    var xRedirect = jqXHR.getResponseHeader('X-Redirect');
                    if (xRedirect != null) {
                        window.location = xRedirect;
                    }
                },
            });
            
            return false;
        });
    };
    
    // xRequest plugin
    $.fn.xRequest = function(options) {
        var element = $(this),
            options = $.extend({
                url: $(this).attr('data-url'),
                data: {},
                requestUrls: [],
                redirectUrls: [],
            }, options);
            
        // set options from element    
        if (element.attr('data-url'))
            options.url = element.attr('data-url');
        if (element.attr('data-data'))
            options.data = $.parseJSON(element.attr('data-data'));
            
        // set handler    
        element.on('click', function() {
            $.ajax({
                url: options.url,
                data: options.data,
                success: function(data, textStatus, jqXHR) {
                    $('.x-container').html(data);
                    $('.x-container .modal').modal('show');
                },
                complete: function(jqXHR, textStatus) {
                    // x redirect
                    var xRedirect = jqXHR.getResponseHeader('X-Redirect');
                    if (xRedirect != null) {
                        window.location = xRedirect;
                        /*
                        for (var i in options.requestUrls) {
                            if (options.requestUrls[i].url === xRedirect) {
                                var requestUrl = options.requestUrls[i];
                                $.ajax({
                                    url: requestUrl.url,
                                    success: function(data, textStatus, jqXHR) {
                                        $('.x-container').html(data);
                                        $('.x-container .modal').modal('show');
                                    },
                                    complete: function(jqXHR, textStatus) {
                                        // to do ...
                                    },
                                });
                                break;
                            }
                        }
                        console.log(xRedirect);
                        */
                    }
                },
            });
            
            return false;
        });
    };
})(jQuery);

// centerThumbnail plugin
(function($){
    $.fn.centerThumbnail = function(options){
        function center(){
            console.log('image loaded' + $(this).attr('src'));
            var thumbnailContainer,
                thumbnailWidth = $(this).width() ? $(this).width() : this.width,
                thumbnailHeight = $(this).height() ? $(this).height() : this.height;
                
            if($(this).attr('container') && $(this).closest($(this).attr('container')).length){
                thumbnailContainer = $(this).closest($(this).attr('container')).first();
            }else{
                thumbnailContainer = $(this).parent().first();
            }
            
            var thumbnailContainerWidth = thumbnailContainer.width(),
                thumbnailContainerHeight = thumbnailContainer.height();
            
            $(this).css({
                'position': 'relative',
                'left': parseInt((thumbnailContainerWidth - thumbnailWidth) / 2),
                'top': parseInt((thumbnailContainerHeight - thumbnailHeight) / 2),
            });
        };
        
        $(this).each(center);
        $(this).on('load', center);
    };
})(jQuery);

(function($, undefined){
    $.fn.centerfill = function () {
        return this.each(function () {
            var iWidth = $(this).width();
            var iHeight = $(this).height();

            var parent = $(this).parent();
            parent.css('position', 'relative');
            var pWidth = $(parent).width();
            var pHeight = $(parent).height();
            var scaleW = iWidth / pWidth;
            var scaleH = iHeight / pHeight;
            var scale = Math.min(scaleW, scaleH);
            var rWidth = iWidth / scale;
            var rHeight = iHeight / scale;
            $(this).width(rWidth).height(rHeight).css({
                'position': 'absolute',
                'left': (rWidth - pWidth) / -2,
                'top': (rHeight - pHeight) / -2
            });
        });
    };
})(jQuery);

// Auto Hiding Navbar Plugin
(function($) {
    $.fn.autoHidingNavbar = function(options) {
        var settings = $.extend({
            fixedClass: 'navbar-fixed-top',
        }, options);
        
        var navbar = $(this),
            navbarTopOffset = navbar.offset().top,
            scrollTopOffset = $(window).scrollTop();
            
        $(window).scroll(function() {
            if ($(this).scrollTop() > navbarTopOffset)
                navbar.addClass(settings.fixedClass);
            else
                navbar.removeClass(settings.fixedClass);
        });
        
        return this;
    };
}(jQuery));

// Center Image Plugin
(function($) {
    $.fn.centerImage = function(options) {
        // set default options
        var settings = $.extend({
            stretchWidth: false,
            stretchHeight: false,
            stretchInside: false,
            stretchOutside: false,
        }, options);
        // set default stretch
        if (!settings.stretchWidth && !settings.stretchHeight && !settings.stretchInside && !settings.stretchOutside) {
            settings.stretchInside = true;
        }
        // center
        function center() {
            var imageContainer,
                image = $(this),
                imageWidth = image.prop('naturalWidth'), //image.width() ? image.width() : this.width,
                imageHeight = image.prop('naturalHeight'); // image.height() ? image.height() : this.height;
                
            //console.log('center image' + $(this).attr('src'));
            //console.log(imageWidth);
            //console.log(imageHeight);
            
            if (image.attr('data-container') && image.closest(image.attr('data-container')).length)
                imageContainer = image.closest(image.attr('data-container')).first();
            else
                imageContainer = image.parent().first();
                
            var width,
                height,
                imageContainerWidth = imageContainer.width(),
                imageContainerHeight = imageContainer.height();
                //imageContainerWidth = imageContainer.outerWidth(),
                //imageContainerHeight = imageContainer.outerHeight();
                
            //console.log('container width:' + imageContainerWidth);
            //console.log('container height:' + imageContainerHeight);
            
            var imageRatio = imageWidth / imageHeight,
                imageContainerRatio = imageContainerWidth / imageContainerHeight;
            //console.log('image ratio:' + imageRatio);
            //console.log('image container ratio:' + imageContainerRatio);
            //console.log(settings);
            
            // stretch by width
            if (settings.stretchWidth || (settings.stretchInside && imageRatio >= imageContainerRatio) || (settings.stretchOutside && imageRatio < imageContainerRatio)) {
                //console.log('by width');
                width = imageContainerWidth;
                height = parseInt(width / imageRatio);
            }
            
            // stretch by height
            if (settings.stretchHeight || (settings.stretchInside && imageRatio < imageContainerRatio) || (settings.stretchOutside && imageRatio >= imageContainerRatio)) {
                //console.log('by height');
                height = imageContainerHeight;
                width = parseInt(height * imageRatio);
            }
            
            image.css({
                'width': width,
                'max-width': 'none',
                'height': height,
                'max-height': 'none',
                'position': 'relative',
                'left': parseInt((imageContainerWidth - width) / 2),
                'top': parseInt((imageContainerHeight - height) / 2),
            });
        };
        
        $(this).each(center);
        $(this).on('load', center);
    };
}(jQuery));

// Dyn Contacts Plugin
(function($) {
    $.fn.dynContacts = function(options) {
        var element = $(this);
        var options = $.extend({
            url: '/user/dyn-contacts',
            data: {},
        }, options);
        
        if (element.attr('data-uid')) {
            options.data.uid = element.attr('data-uid');
        }
        
        element.on('focusin', function() {
            if (!element.attr('loaded')) {
                $.ajax({
                    type: 'GET',
                    url: options.url,
                    data: options.data,
                    success: function(data, textStatus, jqXHR) {
                        var jqData = $(data);
                        element.popover({
                            html: true,
                            trigger: 'manual',
                            placement: 'top',
                            title: jqData.find('.popover-title').html(),
                            content: jqData.find('.popover-content').html(),
                            template: data,
                        });
                        element.popover('show');
                        element.attr('loaded', true);
                    },
                });
            } else {
                element.popover('show');
            }
        });
        element.on('focusout', function() {
            element.popover('hide');
        });
    };
})(jQuery);

// userContact plugin
(function($){
    $.fn.userContact = function(options){
        var defaultOptions = {
            contactTemplate: 'contact-popover-template',
        };
        options = $.extend({}, defaultOptions, options);
        
        $(this).on('focusin', function(){
            var element = $(this);
            
            if(!element.attr('is-loaded')){
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: element.attr('data-url'),
                    success: function(data, textStatus, jqXHR){
                        if(data instanceof Object){
                            element.popover({
                                html: true,
                                trigger: 'manual',
                                content: template(options.contactTemplate, data),
                            });
                            element.popover('show');
                            element.attr('is-loaded', true);
                        }
                    },
                });
            }else{
                element.popover('show');
            }
        });
        $(this).on('focusout', function(){
            $(this).popover('hide');
        });
    };
})(jQuery);

/**
 * A jQuery plugin for keeping the aspect ratio
 * https://github.com/loonkwil/jquery.keep-ratio
 *
 * Date: Sept 14 2014
 */
(function(window) {
    'use strict';

    var $ = window.jQuery;
    var raf = window.requestAnimationFrame;

    /**
     * @type {{ratio: number, calculate: string}}
     */
    var defaultOptions = { ratio: 4 / 3, calculate: 'height' };

    /**
     * @param {jQuery} $el
     * @param {{ratio: number, calculate: string}} options
     * @param {boolean=} forceRendering
     * @return {jQuery}
     */
    var resize = function($el, options, forceRendering) {
        var resizeFunction;
        if (options.calculate === 'height') {
            var width = $el.width();
            resizeFunction = function() {
                $el.height(Math.round(width / options.ratio));
            };
        } else {
            var height = $el.height();
            resizeFunction = function() {
                $el.width(Math.round(height * options.ratio));
            };
        }

        if (forceRendering) {
            resizeFunction();
        } else {
            raf(resizeFunction);
        }

        return $el;
    };

    /**
     * @param {jQuery} $els
     * @param {{ratio: number, calculate: string}} options
     * @param {boolean=} forceRendering
     * @return {jQuery}
     */
    var resizeAll = function($els, options, forceRendering) {
        return $els.each(function() {
            resize($(this), options, forceRendering);
        });
    };


    /**
     * @param {{ratio: number, calculate: string}} options
     * @return {jQuery}
     */
    $.fn.keepRatio = function(options) {
        options = $.extend({}, defaultOptions, options);

        var $boxes = $(this);

        $(window).on('resize', function() {
            resizeAll($boxes, options);
        });

        return resizeAll($boxes, options, true);
    };
}(window));