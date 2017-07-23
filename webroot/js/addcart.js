function addcart(id) {
    $(document).ready(function () {
        $.ajax({
            type: 'POST',
            url: url + '/' + id,
//                data: id,
            success: function (data) {
                $('span#cart').html(data);
            }
        });
    });
}

