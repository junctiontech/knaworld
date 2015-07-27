/* Fix for iPhone Scale Bug */

$(function(){
	window.VS = window.VS || {};

	// Fix for iPhone viewport scale bug
	VS.viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]');
	VS.ua = navigator.userAgent;

	VS.scaleFix = function () {
		if (VS.viewportmeta && /iPhone|iPad/.test(VS.ua) && !/Opera Mini/.test(VS.ua)) {
		  VS.viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
		  document.addEventListener("gesturestart", VS.gestureStart, false);
		}
	};
	VS.gestureStart = function () {
	VS.viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";
	};


	VS.hideUrlBar = function () {
		/iPhone/.test(VS.ua) && !pageYOffset && !location.hash && setTimeout(function () {
			window.scrollTo(0, 1);
		}, 10000);
	};

});

/* Retina Image Handling */

// Set pixelRatio to 1 if the browser doesn't offer it up.
function highdpi_init() {
	if(jQuery('.retina')) {
		var els = jQuery("img.retina").get();
		for(var i = 0; i < els.length; i++) {
			var src = els[i].src
			src = src.replace(".png", "@2x.png");
			els[i].src = src;
		}
	}
}
jQuery(document).ready(function() {
	highdpi_init();
});
 
/* Form Focus */

$(function(){
	$("input,textarea").focus(function(){
		$(this).addClass("focus");
	})
});
$(function(){
	$("input,textarea").blur(function(){
		$(this).removeClass("focus");
	});
});

/* Nav Toggle */

$(function(){
    var toggle_cookie = $.cookie('toggle_cookie');
    var list = ('.primary-nav .current_page_item, .primary-nav .post-parent, .current-menu-item');
    var nav_cookie = $.cookie('nav_cookie');
    if(toggle_cookie) {
        $(".toggle").attr('class', toggle_cookie);
    }
    if(nav_cookie) {
        $(".primary-nav li").not(list).attr('class', nav_cookie);
    }
    $(".toggle").click(function() {
        $(this).toggleClass("active");
        $('.primary-nav li').not(list).animate({width: 'toggle', opacity: 'toggle',easing: 'easein'}, 400);
        $('.primary-nav li').not(list).toggleClass("hide");
        $.cookie('toggle_cookie', $(".toggle").attr('class'));
        $.cookie('nav_cookie', $(".primary-nav li").not(list).attr('class'));
    });
});

/* Careers Toggle */

$(function(){ 
	$('#careers-filters a').click(function(){
		$('#careers-filters a').removeClass('active'); 	
		$(this).addClass('active'); 	
	})  
});

$(function(){ 
	$('.careers-toggle').click(function(){  
		$(this).hide();  
		$('#careers-filters ul').addClass('active');    
	});
	
	$('#careers-filters a').click(function(){ 
		$('#careers-filters ul.active').removeClass('active'); 
		$('.careers-toggle').show();
	})
});

/* File Upload Replacement */

var wrapper = $('<div/>').css({height:0,width:0,'overflow':'hidden'});
var fileInput = $(':file').wrap(wrapper);

fileInput.change(function(){
    $this = $(this);
    $('#file').text($this.val());
})

$('#file').click(function(){
    fileInput.click();
}).show();

/* Team Toggle */

$(function(){ 
	$('.team-toggle').click(function(){  
		var tab_id = $(this).attr('data-tab');  
		  
		$('.team-toggle').removeClass('active');  
		$('.team-content').removeClass('active');  
		  
		$(this).addClass('active');  
		$("#"+tab_id).addClass('active');  
	})  
});

/* Map Toggle */

$(function(){ 
	$('.location-toggle').click(function(){  
		$(this).hide();  
		$('#map-toggle ul').addClass('active');    
	});
	
	$('#map-toggle a').click(function(){ 
		$('#map-toggle ul.active').removeClass('active'); 
		$('.location-toggle').show();
	})
});

/* Post Single Footer */

$(function(){
	$("#post-prev").hover(function() {
		$('#post-footer .active').fadeToggle();	
		return false;
	})
});

/* Scroll Effect Header */

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 150) {
        $("#header").addClass("scrolled");
    }
    else{
	    $("#header").removeClass("scrolled");
    }
});

/* Next Button Pulse */

$(function(){
	var pulse_cookie = $.cookie('pulse_cookie');
	if(pulse_cookie) {
        $(".next").attr('class', pulse_cookie);
    }
	$(".next").hover(function(){
		$(this).removeClass("pulse");
		$.cookie('pulse_cookie', $(".next").attr('class'));
	});
});

/* Mobile Navigation */

$(function(){
    $(".mobile-toggle").click(function() {
		$(this).addClass('mobile-toggle-active');
		$(this).removeClass('mobile-toggle');
        //set the width of primary content container -> content should not scale while animating
        var contentWidth = jQuery('#content').width();

        //set the content with the width that it has originally
        $('.content').css('width', contentWidth);
       
        $('#blank,.mobile-nav-close').addClass('mobile-nav-active');
        $('.primary-nav').addClass('primary-nav-active');
        $('#footer').addClass('footer-active');

        $('.mobile-nav-active').bind('touchmove', function(e){e.preventDefault()});
        $("#wrapper").addClass('primary-content-active');
    });

	$("#blank,.mobile-nav-close").click(function() {
	    $("#wrapper").removeClass('primary-content-active');	
	    $('.mobile-nav-active').unbind('touchmove');
	    
	    $('#footer').removeClass('footer-active');
	    $('.primary-nav').removeClass('primary-nav-active');
	    $('#blank,.mobile-nav-close').removeClass('mobile-nav-active');
	    
        $('.content').css('width', 'auto');
        
		$('.mobile-toggle-active').addClass('mobile-toggle');
		$('.mobile-toggle-active').removeClass('mobile-toggle-active');
    });
});