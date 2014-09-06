$(document).ready(function() {

    $(document).on('click', '#add_item', function() {
        window.location = 'items/add';
    });

    $(document).on('click', '.edit-item', function() {
        window.location = 'items/edit/' + $(this).data('id');
    });

    $(document).on('click', '#btn_delete', function() {

        if (confirm('Are you sure')) {
            $('form').attr('action', '/admin/items/delete/' + $(this).data('id') );
            $('form').submit();
        }

    });
});

