document.write('строка');
console.log('вывод текста в консоль');
console.error('Вывод сообщения в виде ошибки');
//let - по ES6 стандарту запрещает переопределение
let str = "3";
const cStr = "4";
let count = 0;
console.log("Сумма" + Number(cStr) + Number(str));

//Условные операторы
if (str === "ssss") {
    //switch
    switch (str) {
        case "3":
            console.log("looo");
            break;
        case 6:
            console.log(str);
            break;
    }
}

//массивы
let arr1 = new Array(1, 2, 4, 5);
let arr2 = [4, 5, 6, 5, 6,];
console.log(arr2.length);
//n - мерный массив
let arrN = [[], [], []];


//продолжить или отмена
let data = confirm("Продолжить или отмена?");
if (data === true) {
    alert('Вы выбрали прододжить');
} else if (data === false) {
    alert('Вы выбрали отмена');
}
console.log(data);

//Использование атрибутов
function Press(button) {
    //так же можно обратиться к любому css свойству
    button.style.backgroundColor = 'red';
    console.log(button.innerHTML);
    count += 1;
    //вывод атрибута элемента
    console.log(button.onclick + "Вы нажали на кнопку " + count);
}

//выводит в ответ на ввод слова Привет в поле input - alert("И тебе привет");
function InputProcess(el) {
    if (el.value === "Привет") {
        alert("И тебе привет");
    }
}