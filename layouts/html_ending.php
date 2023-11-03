
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	$(function() {
		$('.popup-container').click(function(){
			$('.popup-container').fadeOut();
		})

		
		$(document).mouseup(function (e) {
		    var container = $('.popup');

		    if (!container.is(e.target) // if the target of the click isn't the container...
		        && container.has(e.target).length === 0) // ... nor a descendant of the container
		    {
		        $('.popup-container').fadeOut();
		    }
		});

		$(window).scroll(function(){
			var sticky = $('.bg-offiwhite'), scroll = $(window).scrollTop();

			if (scroll >= 100) {
				sticky.addClass('fixed');
				$(".menu .nav li a").css({"color": "black"});
				$(".menu .nav li a > .active").css({"border-top": "2px solid white"});
			}
			else {
				sticky.removeClass('fixed');
				$(".menu .nav li a").css({"color": "#67c18c;"});
				$(".menu .nav li a > .active").css({"border-top": "2px solid #67c18c"});
			}
		});
	});
</script>
<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$("area[rel^='prettyPhoto']").prettyPhoto();
				
	$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
	$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
	$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
		custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
		changepicturecallback: function(){ initialize(); }
	});

	$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
		custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
		changepicturecallback: function(){ _bsap.exec(); }
	});
});
</script>

<!-- for nav bar active -->
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		var url = document.location.href;
		var qs = url.substring(url.indexOf('?') + 1).split('&');
		for(var i = 0, result = {}; i < qs.length; i++){
	        qs[i] = qs[i].split('=');
	        result[qs[i][0]] = decodeURIComponent(qs[i][1]);
	    }
		$("."+result.page).addClass("active");
		if(result.page==undefined){
			$(".home").addClass("active");
		}
	});
</script>
</html>
