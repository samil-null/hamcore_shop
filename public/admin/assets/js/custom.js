var userId;
console.log('is work');
$('.destroy-user-btn').click(function() {
    userId = $(this).attr('data-destroy-id');
    // /removeUserId.val(userId);
});

$('#final-step-destroy-user').click(function() {
    if (userId) {
        $.get('/_admin/users/destroy/' + userId );
        document.location.reload(true);
    }
});

$('.file-loader-btn').click(function() {
    var fileInput = $(this).parent().find('.file-input');
    fileInput.trigger('click');
    console.log(fileInput.val());
});
