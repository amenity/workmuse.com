(function($) {
	$(document).ready( function() {

	//Roll my own matchHeight
	$('.hexCenter').each(function() {	
		var h = $(this).height();
		$(this).parent('.columns').css('height', h).siblings('.columns').css('height', h);
	});
	
	//Center internal content


	//Move the damn modal out of the sidebar
	//Resize the shit when the content is visible
	$('#myModal').appendTo('#container');
	$("a.modalReveal").click(function() {
      $("#myModal").reveal({
      	'opened': function() {
      		var h = $('#myModal .hexCenter').height();
      		$('#myModal .hexCenter').parent('.columns').css('height', h).siblings('.columns').css('height', h);
      	}
      });
    });

	});
	$(window).load( function() {
		
	
	$('.centerIt').each(function() {
		var h = $(this).height();
		var parent = $(this).parents('.columns');
		var ph = parent.height();
		$(this).css('padding-top', (ph - h) / 2 );
	});
	$('.innerFix').each(function() {
		var iFh = $(this).height();
		var ph = $(this).parent().height();
		$(this).css('padding-top', (ph - iFh) / 2);
	});
});
})(jQuery);