
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
				$(".menu .nav li a").css({"color": "white"});
				$(".menu .nav li a > .active").css({"border-top": "2px solid white"});
				$(".bg-offiwhite").css({"opacity": "1"});
				// $(".menu .nav li a").hover(function(){
				// 	$(this).css({"border-top": "2px solid red"});
				// 	console.log("yeah");
				// });
				$(".bg-offiwhite").css({"opacity": "1"});
					$(".dropdown-menu li a").css({"background-color": "white", "color": "black"});
			}
			else {
				sticky.removeClass('fixed');
				$(".menu .nav li a").css({"color": "white"});
				$(".menu .nav li a > .active").css({"border-top": "2px solid white"});
				// $(".menu .nav li a > .active").css({"border-top": "2px solid #67c18c"});
				$(".bg-offiwhite").css({"opacity": "0.8"});

				$(".menu .nav li a").hover(function(){
					$(".bg-offiwhite").css({"opacity": "1"});
					$(".dropdown-menu li a").css({"background-color": "white", "color": "black"});
				});
			}
		});

		$('.header-bar-icon').click(function(e){
			e.preventDefault();
			var resaction=$(this).attr('res-action');
			if(resaction=="y"){
				$(".menu .nav").css('display', 'grid');
				$(".menu .nav").addClass('hideshow-resnav');
				$(".menu .nav").css('top', '75px');
				$(".menu .nav").css('background', '#63c090');
				$(".dropdown-1st").css({'position': 'absolute', 'left':'-20%'});
				$(".dropdown-2nd").css({'position': 'absolute', 'left':'-105%'});
				$(".dropdown-3rd").css({'position': 'absolute', 'left':'-118%'});
				// $(".menu .nav .dropdown-menu").css('left', '-105%');
                $(this).removeAttr('res-action');
				$(this).attr('res-action', 'u');
			}else{
				$(".menu .nav").css('display', 'none');
                $(this).removeAttr('res-action');
				$(this).attr('res-action', 'y');
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

		// for programme page content show as per url
		if(result.page=="programme"){
			$('.programme-sub-title-header').hide();
			$('.programme-sub-title-main').hide();
			if(result.programme=="orphan-sponsorship-programme"){
				$('.orphanspopro').show();
				$('.orphanspopromain').show();
			}else if(result.programme=="educational-programme"){
				$('.edupro').show();
				$('.edupromain').show();
			}else if(result.programme=="food-programme"){
				$('.foodpro').show();
			}else{
				$('.emergencyrel').show();
			}
		}
	});
</script>
</html>
