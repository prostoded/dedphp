$(function(){ //Перед этой строкой ничего не писать
	var fx={ //Создаем функцию для проверки модального окна
		"initModal":function(){
			if($(".modal-window").length==0){
				$('<div>').attr('id', 'jquery-overlay').appendTo('body');
				return $('<div>').addClass('modal-window').fadeIn(1500).appendTo('body'); //Создали DIV, добавили ему класс MODAL_WINDOW и разместили его перед закрывающим тегом BODY
			}else{	
				return $(".modal-window");
			}
		}
	}
				
				
		
	$('.products a').bind('click', function(e){ //Прослушка нажатия
		e.preventDefault();
		data=$(this).attr('data_id');
		//console.log(data);
		modal=fx.initModal();
		$('<a>').attr('href', '#').addClass('modal-close-btn').html('&times;').click(function(e){
			e.preventDefault();
			//$('#jquery-overlay').remove();
			modal.fadeOut(1500, function(){
				$(this).remove();
			});
			$('#jquery-overlay').fadeOut(1500, function(){
				$(this).remove();
			});
			
			}).appendTo(modal);
			
		$.ajax({
			type: 'POST', 
			url: 'ajax.php',
			data: 'id='+data, //равноценно $_POST['']=data
			success: function(data){
				modal.append(data);
			},
			error: function(msg){
				modal.append(msg);
			}	
			//beforeSend: function(){} используется в том случае, если Аякс будет долго работать. В бефор сэнде можем вывести заглушку или часики, показывающие, что работа идет
			//$<'img'>.attr('src', 'путь').appendTo(modal);
		});
	});
	
	
	
	
	
	
//За последним ограничителем ничего не писать	
});