//  <script src="/jquery.js"></script> 
$("#js-file").change(function(){
	if (window.FormData === undefined) {
		alert('В вашем браузере загрузка файлов не поддерживается');
	} else {
		var formData = new FormData();
		$.each($("#js-file")[0].files, function(key, input){
			formData.append('imagess[]', input);
		});
 alert(formData);
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
				// msg.forEach(function(row) {
				// 	$('.img-list').append('<div class="img-item"><img src="/storage/'+row+'"><a herf="#" class="remove-img" onclick="remove_image(this); return false;">x</a><input type="hidden" name="imagess[]" value="'+row+'"></div>');
				// });
				// $("#js-file").val('');
                console.log(msg); 
			}
			// success: function(msg){
			// 	msg.forEach(function(row) {
			// 		$('.img-list').append('<div class="img-item"><img src="/storage/'+row+'"><a herf="#" class="remove-img" onclick="remove_image(this); return false;">x</a><input type="hidden" name="imagess[]" value="'+row+'"></div>');
			// 	});
			// 	$("#js-file").val('');
            //     console.log(msg); 
			// }
		});
	}
});
 
/* Удаление загруженной картинки */

function remove_img(target){
    if(confirm('Are you sure you want to delete this image?')) {
        var imageId = $(target).data('id'); // Retrieve the data-id attribute
        // Create a hidden input to record the ID of the image to be deleted
        $('<input>').attr({
            type: 'hidden',
            name: 'deleteImages[]', // This will be an array of IDs to delete
            value: imageId
        }).appendTo('form'); // Append to the form

        $(target).parent().fadeOut(300, function() { $(this).remove(); }); // Visually remove the image
    }
}

function remove_image(target){
	$(target).parent().remove();
}