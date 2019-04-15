window.addEventListener('load', function() {
    window._token = $('#csrf-token').attr('content');
    var amountCart = $('#amount-products-cart');

    $('.add-to-cart').click(function() {

        var product = $(this);

        $.ajax({
            url:'/cart/add',
            method:'post',
            data:{
                id:product.attr('data-product-id'),
                amount:product.attr('data-amount'),
                _token:window._token
            },
            success: function(data) {
                if (data.success) {
                    amountCart.text(data.amount);
                }
            }
        });
    });

    $('.remove-product').click(function(e) {

        var product = $(this);

        e.preventDefault();

        console.log(this);

        var productId = product.attr('data-product-id');

        $.ajax({
            url:'/cart/remove',
            method:'post',
            data:{
                id:productId,
                _token:window._token
            },
            success: function(data) {
                if (data.success) {
                    $('[data-wrap-product-id="'+ productId +'"]').remove();
                }
            }
        });
     
    });

});




