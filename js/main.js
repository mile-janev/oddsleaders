
$(document).ready(function(){
	$('.services li').click(function(){
		$(this).find('ul').show();
		$(this).mouseleave(function(){
			$(this).find('ul').hide();
		});
	});

	$('.more, #more').click(function(){
		$(this).parent("div").next().slideToggle();
	});

	function side_toggle(obj)
	{
	    if (obj.attr('class') != 'active')
		{
	      $('#sports li ul').slideUp();
	      obj.next().slideToggle();
	      $('#sports li a').removeClass('active');
	      obj.addClass('active');
	    }	
	};

		$(".toggler").click(function()
		{
			side_toggle($(this));
			return false;
		});

	$('.nano').nanoScroller({
	preventPageScrolling: true
	});
});