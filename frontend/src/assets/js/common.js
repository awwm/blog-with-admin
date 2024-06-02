document.addEventListener('DOMContentLoaded', function() {
    const button = document.querySelector('#menu-button');
    const menu = document.querySelector('#menu');


    button.addEventListener('click', () => {
    menu.classList.toggle('hidden');
    });
});