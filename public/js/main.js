$(document).ready(function() {
    // SelectBox
    $('select').selectBox();
       
    // Cart
    $(function() {
	$('#cart_nav').hover(
            function(){
                var self = this;
                this.hoverAnimationTimeout = setTimeout(function () {
                    $(self).find('.cart_li').transition({ background: '#eb6445', color: '#fff', paddingRight: '10px'});
                    $(self).find('.cart_cont').fadeIn();
                    $(self).find('.view_cart').transition({ left: '0' });
                    $(self).find('.checkout').transition({ left: '0', delay: 200 });
                }, 200);
	    }, function(){
                clearTimeout(this.hoverAnimationTimeout);
                $(this).find('.cart_li').transition({ background: 'none', color: '#444', paddingRight: '0' });
                $(this).find('.cart_cont').fadeOut();
                $(this).find('.view_cart').transition({ left: '315px', delay: 400 });
                $(this).find('.checkout').transition({ left: '147px', delay: 400 });
	});
    });
    
    //Top menu
    $(function(){
        $(".menu-open").click(function(){
            if ($(window).width() <= 547) {
                var show = $("#top .grid_9").width() == 65;
                $("#top .grid_9").animate({
                    width: show ? "97.4%" : "65px"
                }, 500);
                $("#top .grid_3").animate({
                    marginLeft: show ? "-97.4%" : "1.3%"
                }, 500);
            }
        });
    });
    
    //Search
    $(function(){
        $("form.search").focusin(function(){
            if ($(window).width() <= 547) {
                $("form.search").animate({
                    width: "100%"
                }, 500);
                $("form.search .search_form").animate({
                    width: "100%"
                }, 500);
                $("#cart_nav").animate({
                    width: "0"
                }, 500);
            }
        }).focusout(function () {
            if ($(window).width() <= 547) {
                $("form.search").animate({
                    width: "49.5%"
                }, 500);
                $("form.search .search_form").animate({
                    width: "134px"
                }, 500);
                $("#cart_nav").animate({
                    width: "49.5%"
                }, 500);
            }
        });
    });
    
    //Primary menu
    $('.parent').hover(function(){
        if ($(window).width() >= 1008){
            var self = this;
            this.hoverAnimationTimeout = setTimeout(function() {
                $(self).find('.sub').slideDown();
            }, 200);
        }
    }, function(){
        if ($(window).width() >= 1008){
            clearTimeout(this.hoverAnimationTimeout);
            $(this).find('.sub').slideUp();
        }
    });
        
    (function(){
        $('.primary .menu-select').toggle(function(){
            $('.primary > ul').slideDown('slow');
            $(this).addClass('minus');
        }, function() {
            $('.primary > ul').slideUp('slow');
            $(this).removeClass('minus');
        });

        $('.primary .sub').parent('li').addClass('plus');
        $('.primary .sub').prev('a').click(function (event) {
            if ($(window).width() <= 1007) {
                $(this).next('ul.sub').slideToggle('slow');
                $(this).parent().toggleClass('minus');
                return false;
            }
            else if (is_touch_device()) {
                var $submenu = $(this).next('ul.sub');

                $('.primary > ul.sub').not($submenu[0]).slideUp('fast');

                if ($submenu.is(':visible')) {
                    event.stopPropagation();
                    return true;
                }
                else {
                    $submenu.slideDown('slow');
                    return false;
                }
            }
        });

        $("body").on('click', ':not(#nav a)', function () {
            $('.primary > ul.sub').slideUp('fast');
        });
    })();

    // Social
    $('.soc a').hover(function(){
        var self = this;
        this.hoverAnimationTimeout = setTimeout(function() {
            $(self).transition({ rotate: '360', x: 0 });
        }, 200);
     }, function(){
            clearTimeout(this.hoverAnimationTimeout);
            $(this).transition({ rotate: '0' });
    });

    // Carousel
    $(function() {
        $('#listing').carouFredSel({
            prev: '#prev_c1',
            next: '#next_c1',
            scroll: 1,
            auto: false,
            swipe: {
                onMouse: true,
                onTouch: true
            }
        });
        $('#list_banners').carouFredSel({
            prev: '#ban_next',
            next: '#ban_prev',
            pagination  : "#ban_pagination",
            scroll: 1,
            auto: false,
            swipe: {
                onMouse: true,
                onTouch: true
            }
        });
        $('#thumblist').carouFredSel({
	    prev: '#img_prev',
	    next: '#img_next',
            pagination  : '#pagination',
	    auto: false,
            swipe: {
                onMouse: true,
                onTouch: true
            }
	});
        $(window).resize();
    });
    
    // Zoomer
    $('.jqzoom').jqzoom({
	zoomType: 'standard',
	lens:true,
	preloadImages: true,
	alwaysOn:false
    });
    
    // Tabs
    $('#wrapper_tab a').click(function() {
	if ($(this).attr('class') != $('#wrapper_tab').attr('class') ) {
	    $('#wrapper_tab').attr('class',$(this).attr('class'));
	}
        return false;
    });
    
    // Animations product
    $(function() {
	$(".article").hover(
            function(){
                var self = this;
                this.hoverAnimationTimeout = setTimeout(function () {
                    $(self).find(".price").transition({ left: 0, textAlign:'left'});
                    $(self).find(".bay").transition({ rotate: 360, opacity: 1, delay: 200 });
                    $(self).find(".compare").transition({ left: '110px', delay: 400 });
                    $(self).find(".wishlist").transition({ left: '144px', delay: 500 });
                }, 280);
	    }, function(){
                clearTimeout(this.hoverAnimationTimeout);
                $(this).find(".wishlist").transition({ left: '244px' });
                $(this).find(".compare").transition({ left: '220px' });
                $(this).find(".bay").transition({ rotate: 0, opacity: 0 });
                $(this).find(".price").transition({ left: '60px', textAlign:'center' });
	});
    });
    
    //Slider Home
    $(function(){
	$('#slider').anythingSlider({
	    enableArrows        : true,
	    buildStartStop      : false,
	    autoPlay            : false,
	    delay               : 4000,
	    pauseOnHover        : false,
            startPanel          : 1,
            
            onInitialized: function(e, slider) {
                $(slider.el).swipe({
                    swipeLeft: function() { slider.goForward() },
                    swipeRight: function() { slider.goBack() }
                });
            }
	})
	.anythingSliderFx({
    		'.slid_content h2' : [ 'caption-Left', '100' ],
		'.slid_content p' : [ 'caption-Left', '610px', '600' ],
		'.slid_content .buy_now' : [ 'caption-Left', '1220px', '1000' ]
	});
	
        var gridWidth = $(".container_12 .grid_12").outerWidth();
	$('#slider_body .anythingSlider').css({
		'max-height': gridWidth/2.66 + 'px'
                
	});
    });
   
});
