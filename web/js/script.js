$(document).ready(function(){
	$(".sort span").click(function(){
		var id = $(this).attr('id');    // this - обращение к текущему элементу по которому было выполнено нажатие, attr('id') -читааем содержимое аттрибута id="cheap" 
		// alert(id);
		
		
			$.ajax ({
 				url: '/catalogue?sort_id='+id,
				type: 'GET',
				success: function(html){
					// $('#aaa').text(html);
					 $('#tovar').html(html).hide().fadeIn(2000);


				}
	 		});
		
	});
});

