$(function(){
	$('.home-hero').parallax();
});

var slider = function(){
	$(function(){
		$('.hero-slider').iosSlider({
			snapToChildren: true,
			snapSlideCenter: true,
			tabToAdvance: true,
			desktopClickDrag: true,
			keyboardControls: true,
			infiniteSlider: true,
			onSlideComplete: slideComplete,
			onSliderLoaded: sliderLoaded,
			onSlideChange: slideChange,
			navPrevSelector: $('.prev'),
			navNextSelector: $('.next')
		});
	});
	function slideChange(args) {
		$('.hero-slider-wrap .item').removeClass('selected');
		$('.hero-slider-wrap .item:eq(' + (args.currentSlideNumber - 2) + ')').addClass('selected');
		$('.hero-slider-wrap .item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
		$('.hero-slider-wrap .item:eq(' + (args.currentSlideNumber) + ')').addClass('selected');
		return false;
	}
	function slideComplete(args) {
		$(".next").removeClass("pulse");
		if(!args.slideChanged) return false;
		$(args.sliderObject).find('.content-left, .content-right').attr('style', '');
		$(args.currentSlideObject).find('.content-left').animate({
			marginLeft: '2%',
			opacity: '1'
		}, 700, 'easeOutQuint');
		$(args.currentSlideObject).find('.content-right').animate({
			marginRight: '2%',
			opacity: '1'
		}, 700, 'easeOutQuint');
	}
	function sliderLoaded(args) {
		$(args.sliderObject).find('.content-left, .content-right').attr('style', '');
		$(args.currentSlideObject).find('.content-left').animate({
			marginLeft: '2%',
			opacity: '1'
		}, 700, 'easeOutQuint');
		$(args.currentSlideObject).find('.content-right').animate({
			marginRight: '2%',
			opacity: '1'
		}, 700, 'easeOutQuint');
		slideChange(args);
	};
};

enquire.register("screen and (min-width: 780px)", {
    match : function() {
        slider();
        window.onorientationchange = detectIPadOrientation;
		function detectIPadOrientation () {
		    if ( orientation == 0 ||  orientation == 180) {
				$(function(){
					$('.hero-slider').iosSlider('destroy');
				});
		    }
		    else if ( orientation == 90 ||  orientation == -90){
		       slider();
		    }
		 }
    }
});
