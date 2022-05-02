const display = document.querySelector('.calc__input');

document.querySelectorAll('.calc__number').forEach(element => {
    element.addEventListener('click', event => {
        event.preventDefault();

        display.value += event.currentTarget.textContent;
    });
});

document.querySelector('.calc__remove').addEventListener('click', event => {
    event.preventDefault();
    display.value = display.value.slice(0, -1);
});

document.querySelector('.calc__delete').addEventListener('click', event => {
    event.preventDefault();
    display.value = "";
});