document.addEventListener("DOMContentLoaded", function () {
    if (window.location.pathname === '/src/Lk/Users/UserRoom.php') {
        $(document).ready(function () {
            $.ajax(
                {
                    url : '/src/assets/json/users.json',
                    dataType: 'json',
                    success: function (data) {
                        $('.UserData').empty();
                        let newBlock = $('<div>').addClass('col12 userInfo').html(`<h3>Данные пользователя</h3>`).appendTo('.UserData');
                        data.forEach(function (item) {
                            $('<p>').addClass('UserParam').html(`Логин <b>${data[0].login}</b>`).appendTo(newBlock);
                            $('<p>').addClass('UserParam').html(`Имя <b>${data[0].first_name}</b>`).appendTo(newBlock);
                            $('<p>').addClass('UserParam').html(`Фамилия <b>${data[0].second_name}</b>`).appendTo(newBlock);
                            $('<p>').addClass('UserParam').html(`Отчесвто <b>${data[0].patronymic}</b>`).appendTo(newBlock);
                            $('<p>').addClass('UserParam').html(`Адрес <b>${data[0].address}</b>`).appendTo(newBlock);
                            $('<p>').addClass('UserParam').html(`Телефон <b>${data[0].phone_number}</b>`).appendTo(newBlock);
                            $('<p>').addClass('UserParam').html(`Компания <b>${data[0].company}</b>`).appendTo(newBlock);
                        })
                    }

                }
            );
            $.ajax({
                url : '/src/assets/json/ordersToCurrentUser.json',
                dataType: 'json',

                success: function (data) {
                    $('.UserCargosTable tbody').empty();
                    data.forEach(function (item) {
                        let newTbody = $('<tbody>');
                        let newRow = $('<tr>').addClass('CellsContentOfTableCargos col-12');
                        $('<td>').addClass('UserTableElement').text(item.order_id).appendTo(newRow);
                        $('<td>').addClass('UserTableElement').text(item.cargo_name).appendTo(newRow);
                        $('<td>').addClass('UserTableElement').text(item.cargo_weight).appendTo(newRow);
                        $('<td>').addClass('UserTableElement').text(item.packing).appendTo(newRow);
                        $('<td>').addClass('UserTableElement').text(item.total_price).appendTo(newRow);
                        $('<td>').addClass('UserTableElement').text(item.station_name).appendTo(newRow);
                        $('<td>').addClass('UserTableElement').text(item.station_city).appendTo(newRow);
                        $('<td>').addClass('UserTableElement').text(item.status).appendTo(newRow);
                        newRow.appendTo(newTbody);
                        $('.UserCargosTable').append(newTbody);
                    })
                }
            })
        })
    }
})