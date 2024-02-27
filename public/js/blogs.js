$(document).ready(function() {
    loadBlogsList();
    $('#search').on('keyup', loadBlogsList);

    $('#createBlogForm').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/blogs',
            data: $(this).serialize(),
            success: function(response) {
                if(response.success){
                    toastr.success(response.message);
                    $('#createBlogForm')[0].reset();
                    loadBlogsList();
                }
            },
            error: function(er){
                let res = JSON.parse(er.responseText);
                $.each(res.errors, function (key, val) {
                    toastr.error(val[0]);
                });
            }
        });
    });
});

$(document).on('click', '.edit-btn', function(){
    $('#blog_id').val($(this).data('blog_id'));
    $('#title').val($(this).data('title'));
    $('#content').val($(this).data('content'));
});

$(document).on('click', '.delete-btn', function(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'DELETE',
        url: '/blogs/' + $(this).data('blog_id'),
        success: function(response) {
            toastr.success(response.message);
            loadBlogsList();
        }
    });
});

function loadBlogsList() {
    $.ajax({
        type: 'GET',
        url: '/blogs',
        data: {search: $('#search').val()},
        success: function(response) {
            $('#blogListing').html(response.html);
        }
    });
}