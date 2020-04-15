jQuery(function(){
  jQuery(".menu").on("click",function(){
    jQuery(".sp-menu").slideToggle();
    jQuery(".icon-menu").toggle();
    jQuery(".icon-close").toggle();
    return false;
  })
})

(function($) {
	$(document).ready(function() {
		$('.tab_area:first').show();
		$('.tab li:first').addClass('active');
 
		$('.tab li').click(function() {
			$('.tab li').removeClass('active');
			$(this).addClass('active');
			$('.tab_area').hide();
 
			$(jQuery(this).find('a').attr('href')).fadeIn();
			return false;
		});
	});
})(jQuery);
