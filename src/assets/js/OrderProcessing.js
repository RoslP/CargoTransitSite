document.addEventListener("DOMContentLoaded", () => {
    
//Вывод списка станций для пользователя
    if (window.location.pathname === '/src/Lk/Cargos/Cargos.php') {
        fetch('/src/assets/json/stations.json')
            //далее обещания Promise
            .then(res => res.json())
            .then(data => {
                const selectElement = document.getElementById('selectStationsInUserRoom');
                data.forEach(function (item) {
                    const station = document.createElement('option');
                    //обращение к нулевому элементу массива id
                    station.value = item.station_id;
                    station.setAttribute('name', item.name);
                    station.setAttribute('city', item.city);
                    //обращение к элементу имени массива
                    station.text = `Станция : ${item.name}. Город : ${item.city}.`;
                    selectElement.appendChild(station);
                });
            })
            .catch(err => console.error('Ошибка в коде загрузки станций из json файла ', err));
    }


    if (window.location.pathname === '/src/Lk/Cargos/Cargos.php') {
        //Начальная загрузка упаковок для пользователя
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
        let ButtonCreateOrder = document.getElementById('create-order');
        let ButtonCancelOrder = document.getElementById('cancel-order');
        let BlockOfAcceptOrDenyOrder = document.getElementById('BlockOfAcceptOrDenyOrder');
        //массивы результата
        let resultOptionsOfSelect = {};
        let resultOfInputs = {};
        //Итоговая стоимость
        let currentPrice = 0;
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
            let station = document.getElementById('selectStationsInUserRoom');
            let selectedStation = station.options[station.selectedIndex];
            resultOfInputs = {};
            resultOptionsOfSelect = {};
            currentPrice = 0;
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
                defaultSelectOption,
                selectedStation
            };
            //динамические селекты
            let selectsOptions = {};
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
            //в ручную добавляю в массив станцию и ее название
            resultOptionsOfSelect['StationId'] = selectedStation.getAttribute('value');

            let index = 1;
            for (let key in resultOptionsOfSelect) {
                //чтобы перебирал все собственные свойства и не трогал наследуемое name от прототипа
                if (resultOptionsOfSelect.hasOwnProperty(key)) {
                    //если ключ не равен "Контейнеры" и слово начинается с цифры и содержит слово value
                    if (key !== '5value' && /^\d.*value$/.test(key)) {
                        currentPrice += parseInt(resultOptionsOfSelect[key]);
                    }
                }
            }

            currentPrice *= parseInt(resultOfInputs['cargoWeightvalue']);
            if (resultOptionsOfSelect['5value'] != null) {
                currentPrice += parseInt(resultOptionsOfSelect['5value']);
            }
            //Далее вывод итоговой стоимости
            Price.innerText += ` Итоговая стоимость : ${currentPrice} рублей для груза ${resultOfInputs['cargoNamevalue']}
             \n Станция ${selectedStation.getAttribute('name')}
             \n Город ${selectedStation.getAttribute('city')}\n`;

            //Далее вывод из чего формируется цена
            for (let key in resultOptionsOfSelect) {
                if (resultOptionsOfSelect.hasOwnProperty(key)) {
                    if (key !== '5value' && /^\d.*value$/.test(key)) {
                        Price.innerText += `\n Стоимость  ${parseInt(resultOptionsOfSelect[key]) * parseInt(resultOfInputs['cargoWeightvalue'])} руб = ${resultOptionsOfSelect[key]} руб * ${resultOfInputs['cargoWeightvalue']} кг`;
                    }
                    if (key !== '5name' && /^\d.*name$/.test(key)) {
                        Price.innerText += ` упаковки в виде ${resultOptionsOfSelect[key]}\n `;
                    }
                }
            }
            if (resultOptionsOfSelect['5value'] != null) {
                Price.innerText += `\nДополнителная упаковка в контейнер ${resultOptionsOfSelect['5name']} стоимостью ${resultOptionsOfSelect['5value']}`;
            }
            BlockOfAcceptOrDenyOrder.style.display = 'block';
        });

        ButtonCreateOrder.addEventListener('click', function () {
            let data = {
                action: 'InsertIntoOrders',
                playload: {}
            };
            for (let key in resultOfInputs) {
                if (/^cargo(Namevalue|Weightvalue)/.test(key)) {
                    data.playload[key] = resultOfInputs[key];
                }
            }
            let i = 0;
            for (let key in resultOptionsOfSelect) {
                if (/^\d.*name$/.test(key)) {
                    i++;
                    data.playload[`Select${i}name`] = resultOptionsOfSelect[key];
                }
                if (key === 'StationId') {
                    data.playload[key] = resultOptionsOfSelect[key];
                }
            }
            data.playload['price'] = currentPrice;
            $.ajax(
                {
                    url: '/src/App/Call/Call.php',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(data)
                }
            )
        });

        ButtonCancelOrder.addEventListener('click', function () {

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

