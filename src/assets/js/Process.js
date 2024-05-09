document.addEventListener("DOMContentLoaded", () => {
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

//Вывод списка станций для пользователя
    if (window.location.pathname === '/src/Lk/Cargos/Cargos.php') {
        fetch('/src/assets/json/stations.json')
            //далее обещания Promise
            .then(res => res.json())
            .then(data => {
                const selectElement = document.getElementById('selectStationsImUserRoom');
                data.forEach(function (item) {
                    const station = document.createElement('option');
                    //обращение к нулевому элементу массива id
                    station.value = item.station_id;
                    //обращение к элементу имени массива
                    station.text = `Станция : ${item.name}. Город : ${item.city}.`;
                    selectElement.appendChild(station);
                });
            })
            .catch(err => console.error('Ошибка в коде загрузки станций из json файла ', err));
    }

//Начальная загрузка упаковок для пользователя
    if (window.location.pathname === '/src/Lk/Cargos/Cargos.php') {
        fetch('/src/assets/json/packaging.json')
            .then(res => res.json())
            .then(data => {
                const selectElement = document.getElementById('defaultSelectLoad');
                data.forEach(function (item) {
                    const packing = document.createElement('option');
                    let packingName = '';
                    if (item.cargo_packing === 'Контейнеры') {
                        packingName = `${item.cargo_packing} стоимостью ${item.price_of_packing} рублей`;
                    } else {
                        packingName = `${item.cargo_packing} стоимостью ${item.price_of_packing} рублей за 1кг`;
                    }
                    packing.id = item.packing_id;
                    packing.value = item.price_of_packing;
                    packing.text = packingName;
                    //добавляем аттрибут которого по умолчанию неи в option
                    packing.setAttribute('name', item.cargo_packing);
                    selectElement.appendChild(packing);
                });
            })
            .catch(err => console.error('ошибка вывода начальных упаковок', err));
    }

    if (window.location.pathname === '/src/Lk/Cargos/Cargos.php') {
        //колличесвто кликов на добавление
        let click = 0;
        let buttonAddPacking = document.getElementById('add-packing');
        let deleteButtonOfPacking = document.getElementById('delete-earlier');
        let ButtonCalculatePrice = document.getElementById('price-calculation');

        //Дополнительная упаковка грузов
        buttonAddPacking.addEventListener('click', function () {
            if (click >= 5) {
                alert("Вы добавили максимум вариантов упаковки");
            } else {
                click++;
                $.ajax({
                    url: '/src/assets/json/packaging.json',
                    dataType: 'json',
                    success: function (data) {
                        let newSelect = $('<select>')
                            //через точку не вызов родительских методов а выполнение цепи различных общаний таких как Promise
                            .addClass("form-select form-select-sm")
                            .attr('id', `SelectNumber${click}`);
                        // Перебираем данные и добавляем опции в новый select
                        $.each(data, function (i) {
                            let optionText = '';
                            if (data[i].cargo_packing === 'Контейнеры') {
                                optionText = `${data[i].cargo_packing} стоимостью ${data[i].price_of_packing} рублей`;
                            } else {
                                optionText = `${data[i].cargo_packing} стоимостью ${data[i].price_of_packing} рублей за 1кг`;
                            }
                            newSelect.append($('<option>')
                                .attr('id', data[i].packing_id)
                                .attr('value', data[i].price_of_packing)
                                .attr('name', data[i].cargo_packing)
                                .text(optionText));
                        })
                        // Добавляем новый select внутрь элемента с id "selectContainer"
                        $('#selectContainer').append('<div class="w-100"></div>').append(newSelect);
                    }
                });
            }
        });
        //далее удаление ненужных или случайно выбранных блоков
        deleteButtonOfPacking.addEventListener('click', function () {
            if (click !== 0) {
                $(document.getElementById(`SelectNumber${click}`)).detach();
                click--;
            } else {
                //в js нету continue как в C# или php
                return 0;
            }
        });

        //Далее вывод общей стоимости заказа
        ButtonCalculatePrice.addEventListener('click', function () {
            //итоговая стоимость в label
            let Price = document.getElementById('currentPrice');
            Price.innerText = '';
            let cargoName = document.getElementById('cargoName');
            let cargoWeight = document.getElementById('cargoWeight');
            if (cargoName.value === '' || cargoWeight.value === '') {
                alert('Заполните все поля');
                return;
            }
            let defaultSelect = document.getElementById('defaultSelectLoad');
            //получаем выбранный в данный момент блок options jQuery
            let defaultSelectOption = defaultSelect.options[defaultSelect.selectedIndex];
            //статические блоки
            let htmlBlocks = {
                cargoName,
                cargoWeight,
                defaultSelectOption
            };
            //динамические селекты
            let selectsOptions = {};
            //массивы результата
            let resultOptionsOfSelect = {};
            let resultOfInputs = {};
            //Итоговая стоимость
            let currentPrice = 0;

            for (let i = click; i > 0; i--) {
                //получаем динамически созданные селекты от последнего к первому
                let dynamicSelect = document.getElementById(`SelectNumber${i}`);
                //получаем выбранный индекс селекта
                selectsOptions[`SelectNumber${i}`] = dynamicSelect.options[dynamicSelect.selectedIndex];
            }


            function addAttributesToArray(element, InputArray, OptionsOfSelectArray) {
                //здесь id внутри element.id УКАЗЫВАЕТ
                //на то что элемент будет создан внутри массива arrayName а не за его пределами как HTML object
                //такой синтаксис jQuery :(
                // Проверяем, начинается ли ключ с цифры
                if (/^\d/.test(element.id)) {
                    OptionsOfSelectArray[`${element.id}id`] = element.id;
                    OptionsOfSelectArray[`${element.id}value`] = element.value;
                    OptionsOfSelectArray[`${element.id}name`] = element.getAttribute('name');
                } else {
                    InputArray[`${element.id}id`] = element.id;
                    InputArray[`${element.id}value`] = element.value;
                }
            }

            //аналог форича в ванильном js. В ванильном js нет форича,
            //есть аналоги с jQuery типо $.each
            for (let key in htmlBlocks) {
                //если блок содержит данный аттрибут
                //hasOwnProperty используется для перебора СОБСТВЕННЫХ свойств
                //т.к. часто свойства объекта могут наследоваться
                if (htmlBlocks.hasOwnProperty(key)) {
                    let staticElement = htmlBlocks[key];
                    addAttributesToArray(staticElement, resultOfInputs, resultOptionsOfSelect);
                }
            }
            for (let key in selectsOptions) {
                if (selectsOptions.hasOwnProperty(key)) {
                    let dynamicElement = selectsOptions[key];
                    addAttributesToArray(dynamicElement, resultOfInputs, resultOptionsOfSelect);
                }
            }
            let index = 1;
            for (let key in resultOptionsOfSelect) {
                //чтобы перебирал все собственные свойства и не трогал наследуемое name от прототипа
                if (resultOptionsOfSelect.hasOwnProperty(key)) {
                    //если ключ не равен контейнеру и слово начинается с цифры и содержит слово value
                    if (key !== '5value' && /^\d.*value$/.test(key)) {
                        currentPrice += parseInt(resultOptionsOfSelect[key]);
                    }
                }
            }

            currentPrice *= parseInt(resultOfInputs['cargoWeightvalue']);
            if (resultOptionsOfSelect['5value'] != null) {
                currentPrice += parseInt(resultOptionsOfSelect['5value']);
            }

            Price.innerText += ` Итоговая стоимость : ${currentPrice} рублей для груза ${resultOfInputs['cargoNamevalue']}`;
        });
    }


    //валидация регистрации на клиенте
    if (window.location.pathname === '/src/Pages/Reg.php') {
        document.addEventListener('DOMContentLoaded', function () {
            let form = document.getElementById('RegistrationForm');
            form.addEventListener('submit', RegistrationForm);

            function RegistrationForm(event) {
                if (!FormRegCheck()) {
                    event.preventDefault();
                } else {
                    console.log("Форма отправлена успешно!");
                }
            }

            function FormRegCheck() {
                const fields = ['validationName', 'validationSecondNameInput', 'validationPatronymic', 'validationUsernameInput', 'validationPasswordInput', 'validationPasswordInput2', 'validationCompany', 'validationAddress', 'validationPhone'];

                for (let field of fields) {
                    let value = document.getElementById(field).value.trim();
                    if (value === '') {
                        alert("Пожалуйста, заполните все поля");
                        return false;
                    }
                }

                let name = document.getElementById('validationName').value;
                if (name.length < 2) {
                    alert("Длина имени слишком короткая");
                    return false;
                } else if (name.length > 12) {
                    alert("Длина имени слишком большая");
                    return false;
                }

                let password = document.getElementById('validationPasswordInput').value;
                let re_password = document.getElementById('validationPasswordInput2').value;
                if (password !== re_password) {
                    alert("Введенные пароли не совпадают");
                    return false;
                }
                return true;
            }
        });
    }
})

