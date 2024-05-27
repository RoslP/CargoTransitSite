document.addEventListener("DOMContentLoaded", function () {
    //Далее кнопка отмены заказа
    let cancelButton = document.getElementById('cancel-order');
    //Далее конока выполнения заказа
    let completeOrder = document.getElementById('complete-order');
    let cancelArray = {
        action: 'cancel_order',
        playload: {}
    };
    let completeArray = {
        action: 'complete-order',
        playload: {}
    };
    //Далее ссылки в сайдаре
    let ToggleStations = document.getElementById('ToggleStations');
    let ToggleOrders = document.getElementById('ToggleOrders');
    let ToggleUsers = document.getElementById('ToggleUsers');
    //Далее блоки загруженые на форму
    let TableManagerBlock = document.getElementById('IdTableManager');
    let IdFormStationsManager = document.getElementById('IdFormStationsManager');

    //обработка комнаты менеджера
    if (window.location.pathname === '/src/Lk/Admin/ManagerRoom.php') {
        $(document).ready(function () {

            $.ajax({
                url: '/src/assets/json/order.json',
                dataType: 'json',
                success: function (data) {
                    // Очищаем существующее содержимое таблицы
                    $('.ManagerCargosTable tbody').empty();

                    // Предполагая, что в файле JSON содержится массив объектов
                    // Проходим по каждому объекту
                    data.forEach(function (item) {
                        // Создаем новый элемент tbody
                        let newTbody = $('<tbody>');

                        // Создаем новую строку tr
                        let newRow = $('<tr>').addClass('CellsContentOfTableCargos col-12');

                        // Создаем ячейки и добавляем данные
                        $('<td>').addClass('tableElement').attr('id', item.order_id).text(item.order_id).appendTo(newRow);
                        $('<td>').addClass('tableElement').text(item.user_name).appendTo(newRow);
                        $('<td>').addClass('tableElement').text(item.cargo_name).appendTo(newRow);
                        $('<td>').addClass('tableElement').text(item.cargo_weight).appendTo(newRow);
                        $('<td>').addClass('tableElement').text(item.packing).appendTo(newRow);
                        $('<td>').addClass('tableElement').text(item.total_price).appendTo(newRow);
                        $('<td>').addClass('tableElement').text(item.station_name).appendTo(newRow);
                        $('<td>').addClass('tableElement').text(item.station_city).appendTo(newRow);
                        $('<td>').addClass('tableElement').text(item.status).appendTo(newRow);
                        $('<td>').addClass('tableElement').html('<input type="checkbox">').appendTo(newRow);

                        // Добавляем строку в новый tbody
                        newRow.appendTo(newTbody);

                        // Добавляем новый tbody в таблицу
                        $('.ManagerCargosTable').append(newTbody);
                    });
                }
            });
        });

        //Далее логика показа контента
        ToggleStations.addEventListener('click', function () {
            event.preventDefault();//предотвращает переход по ссылке
            if (TableManagerBlock.style.display === 'block') {
                TableManagerBlock.style.display = 'none';
                IdFormStationsManager.style.display = 'block';
            }
        })

        ToggleOrders.addEventListener('click', function () {
            event.preventDefault();//предотвращает переход по ссылке
            if (TableManagerBlock.style.display === 'none') {
                TableManagerBlock.style.display = 'block';
                IdFormStationsManager.style.display = 'none';
            }

        })
        ToggleUsers.addEventListener('click', function () {
            event.preventDefault();//предотвращает переход по ссылке
        })

        //Далее отмена заказа
        cancelButton.addEventListener('click', function () {
            let checkboxes = document.querySelectorAll('input[type="checkbox"]:checked'); // Находим все выбранные чекбоксы

            checkboxes.forEach(function (checkbox) {
                let parentRow = checkbox.closest('tr'); // Находим ближайший родительский элемент <tr>
                let orderId = parentRow.querySelector('[id]').getAttribute('id'); // Получаем значение из элемента с атрибутом "id"
                cancelArray.playload[orderId] = orderId;

            });
            $.ajax(
                {
                    url: '/src/App/Call/Call.php',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(cancelArray),

                    success: function () {
                        location.reload();
                    }
                }
            );
        });
        //Далее выполнение заказа
        completeOrder.addEventListener('click', function () {
            let checkboxes = document.querySelectorAll('input[type="checkbox"]:checked'); // Находим все выбранные чекбоксы

            checkboxes.forEach(function (checkbox) {
                let parentRow = checkbox.closest('tr'); // Находим ближайший родительский элемент <tr>
                let orderId = parentRow.querySelector('[id]').getAttribute('id'); // Получаем значение из элемента с атрибутом "id"
                completeArray.playload[orderId] = orderId;

            });
            $.ajax(
                {
                    url: '/src/App/Call/Call.php',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(completeArray),

                    success: function () {
                        location.reload();
                    }
                }
            );
        });

    }

})