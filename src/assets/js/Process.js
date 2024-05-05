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
