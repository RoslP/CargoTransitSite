document.addEventListener("DOMContentLoaded", function() {
    //обработка комнаты менеджера
    if (window.location.pathname === '/src/Lk/Admin/ManagerRoom.php') {
        $(document).ready(function () {
            $.ajax({
                url: '/src/assets/json/requestStations.json',
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
                        $('<td>').addClass('tableElement').attr('id', 'LId').text(item.station_id).appendTo(newRow);
                        $('<td>').addClass('tableElement').attr('id', 'LStation').text(item.name).appendTo(newRow);
                        $('<td>').addClass('tableElement').attr('id', 'LCity').text(item.city).appendTo(newRow);
                        $('<td>').addClass('tableElement').html('Заказ обрабатывается').appendTo(newRow);
                        $('<td>').addClass('tableElement').html('<input type="checkbox">').appendTo(newRow);

                        // Добавляем строку в новый tbody
                        newRow.appendTo(newTbody);

                        // Добавляем новый tbody в таблицу
                        $('.ManagerCargosTable').append(newTbody);
                    });
                }
            });
        });
        //Далее ссылки в сайдаре
        let ToggleStations = document.getElementById('ToggleStations');
        let ToggleOrders = document.getElementById('ToggleOrders');
        let ToggleUsers = document.getElementById('ToggleUsers');
        //Далее блоки загруженые на форму
        let TableManagerBlock = document.getElementById('IdTableManager');
        let IdFormStationsManager = document.getElementById('IdFormStationsManager');

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

        //отмена заказа
        document.addEventListener('DOMContentLoaded', function () {
            const cancelButton = document.querySelector('.btn-danger'); // Находим кнопку "Отменить заказ"

            cancelButton.addEventListener('click', function () {
                const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked'); // Находим все выбранные чекбоксы

                checkboxes.forEach(function (checkbox) {
                    const parentRow = checkbox.closest('tr'); // Находим ближайший родительский элемент <tr>
                    const orderId = parentRow.querySelector('#LId').textContent; // Получаем значение из элемента с id "LId"
                    console.log('Заказ отменен для ID:', orderId);
                });
            });
        });
    }

})