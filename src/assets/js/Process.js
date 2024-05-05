document.addEventListener('DOMContentLoaded', function () {
    //сохраняем переменную формы в form
    let form = document.getElementById('RegistrationForm');
    //метод добавляет обработчик события к форме с идентификатором form
    //которая будет вызвана, когда произойдет событие submit
    form.addEventListener('submit', RegistrationForm);
});

//проверка
function RegistrationForm(event) {
    //если форма не возвращает true
    if (!FormRegCheck()) {
        event.preventDefault(); // Блокируем отправку формы только если проверка не пройдена
    } else {
        // Здесь можете добавить дополнительную логику, если форма прошла проверку
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
