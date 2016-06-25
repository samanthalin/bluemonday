jQuery(function() {
	jQuery('.nav-tabs a:first').tab('show');
});
/* SEARCH BOX */

jQuery(document).ready(function(){
	jQuery(".awaken-search-button-icon").click(function(){
    	jQuery(".awaken-search-box-container").toggle('fast');
	});
	//$('#fixed-top-bar').hide();
	$(window).load(function(){
		$(window).bind('scroll resize', function(){
			var $this = $(this);
			var $this_Top=$this.scrollTop();
			//當高度小於100時，關閉區塊 
			if($this_Top < 25){
				$('#fixed-top-bar').stop().animate({top:"-50px"},{duration:200});
			}
	　　　　 if($this_Top > 25){
	　　　　		$('#fixed-top-bar').stop().animate({top:"0px"},{duration:50});
	　　　 	}
　　　　 }).scroll();
　　 });
	$('.bxslider').bxSlider({
		slideWidth: 250,
		pager: false,
    	maxSlides: 4,
    	moveSlides: 4,
    	slideMargin: 10
	});
	$(".bx-wrapper").css({'margin':''});
	$('li > div').removeClass('col-md-3');
	$('.bx-viewport').css({'height':'250px'});
	$('.cover').click(function(event) {
		$(".cover").toggle();
		$(".pop-up").toggle();
	});
	var timer = setTimeout(function(){
  		$(".cover").toggle();
		$(".pop-up").toggle();
	}, 	3000);
	
});