// bg imgs.
var img = ["bg1.jpg", "bg2.jpg"];

$(function()
{
	$(".caption").css("opacity", 0);
	
	$(".portfolio-link").mouseenter(function()
	{
		$(this).children(".caption").css("opacity", 100);
	});
	$(".portfolio-link").mouseleave(function()
	{
		$(this).children(".caption").css("opacity", 0);
	});
	
	// get height and set bg height.
	var sheight = $("#section2").css("height");
	
	// jquery smooth script.
	$("a").on('click', function(event)
	{
		if (this.hash !== "") {
			event.preventDefault();
			
			var hash = this.hash;

			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 800, function(){
				window.location.hash = hash;
			});
		}
	});
	
	// bg parameter & function.
	var cnt = 0;
	$(".bg").css("background-image", "url(img/bg/" + img[cnt] + ")");
	$(".bg").css("height", sheight);
	$(".blank").css("height", sheight);
	
	
	setInterval(function()
	{
		cnt++;
		
		if(cnt == img.length)
		{
			cnt = 0;
		}
		
		$(".bg").fadeOut("slow", function()
		{
			$(this).css("background-image", "url(img/bg/" + img[cnt] + ")");
			$(this).fadeIn("slow");
		});
	}, 6000);
});