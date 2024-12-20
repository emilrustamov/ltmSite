function deleteProject(id, lang) {
    if (confirm('Are you sure you want to delete this project?')) {
        console.log($('meta[name="csrf_token"]'));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            url: '/' + lang + '/admin/delete-project',
            method: 'POST',
            dataType: 'json',
            data: {
                id: id,
                //     // _token: $('meta[name="csrf-token"]').attr('content'), 
            //     // _token: "{{ csrf_token() }}", 
            },
            success: function(result) {
                console.log(result);
                if (result==true) {
                    // alert('Project deleted successfully');
                    location.reload();
                } else {
                    alert('Error in deleting project');
                }
            }
        });
    }
}
