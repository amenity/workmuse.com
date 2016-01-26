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
      		var h = $('#myModal .centerIt').height();
      		$('#myModal .centerIt').parent('.columns').css('height', h).siblings('.columns').css('height', h);
      		var if2 = $('#myModal .innerFix2');
      		var iFh = if2.outerHeight();
      		var ph = if2.parent().outerHeight();
      		if2.css('padding-top', (ph - iFh) / 2);
      	}
      });
    });

	});
	$(window).load( function() {
		
	
	$('.centerIt').each(function() {
		var h = $(this).outerHeight();
		var parent = $(this).parents('.columns');
		var ph = parent.outerHeight();
		//console.log("CenterIt: Element Height:" + h + ' Parent Height: ' + ph  + 'Final Padding: ' + (ph-h)/2);
		$(this).css('padding-top', (ph - h) / 2 );
	});
	$('.innerFix').each(function() {
		var iFh = $(this).outerHeight();
		var ph = $(this).parent().outerHeight();
		console.log("innerFix: Element Height:" + iFh + ' Parent Height: ' + ph + 'Final Padding: ' + (ph-iFh)/2);
		$(this).css('padding-top', (ph - iFh) / 2);
	});
});
})(jQuery);