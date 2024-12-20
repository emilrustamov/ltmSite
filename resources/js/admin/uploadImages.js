$("#js-file").change(function(){
	if (window.FormData === undefined) {
		alert('В вашем браузере загрузка файлов не поддерживается');
	} else {
		var formData = new FormData();
		$.each($("#js-file")[0].files, function(key, input){
			formData.append('imagess[]', input);
            console.log(input);
		});

		$.ajax({
            headers: {
                'X-CSRF-TOKEN': $(this).attr('csrf')
            },
			type: 'post',
			url: '/ru/ajax-tmp',
			cache: false,
			contentType: false,
			processData: false,
			data: formData,
			dataType : 'json',
			success: function(msg){
				msg.forEach(function(row) {
					$('.img-list').append('<div class="img-item"><img src="/storage/'+row+'"><a herf="#" class="remove-img" onclick="remove_image(this); return false;">x</a><input type="hidden" name="imagess[]" value="'+row+'"></div>');
				});
				$("#js-file").val('');
                console.log(msg); 
			}
		});
	}
});
 
/* Удаление загруженной картинки */
function remove_img(target){
    if(confirm('Are you sure you want to delete this image?')) {
        var imageId = $(target).data('id'); 
        $('<input>').attr({
            type: 'hidden',
            name: 'deleteImages[]',
            value: imageId
        }).appendTo('form'); 
        $(target).parent().fadeOut(300, function() { $(this).remove(); }); 
    }
}

function remove_image(target){
	$(target).parent().remove();
}