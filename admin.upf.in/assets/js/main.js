$(document).ready(function(){
	var e=window.location.href.split(/[?#]/)[0];
	console.log(e+' 1 <br> 1');
	$("#sidebar-menu a").each(function(){
		console.log(this.href+' 2 <br> 2');
	});
});