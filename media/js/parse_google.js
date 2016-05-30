$(function(){
	$.ajaxSetup({	
		url: 'ajax_parse.php',
		type: 'POST',
		success: function(data){
			$('.result').html (data);
		},
		error: function(msg){
			$('.result').html (msg);
		},
		beforeSend: function(){
			$('.result').html ("<img src='/media/img/loader.gif'>");
		}
	});
	$('#google_search').click(function(e){
		e.preventDefault();
		$.ajax();
	});
});