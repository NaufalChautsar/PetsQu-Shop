// Menu
const menu = document.getElementById('menu');
const navMenu = document.getElementById('nav-menu');

menu.addEventListener('click', function() {
    menu.classList.toggle('menu-active');
    navMenu.classList.toggle('hidden');
})

// Navbar
window.onscroll = function() {
    const header = document.querySelector('header');
    const navFixed  = header.offsetTop;

    if(window.pageYOffset > navFixed) {
        header.classList.add('navbar-fixed');
    } else {
        header.classList.remove('navbar-fixed');
    }
}

// Jumlah Pesanan
var item = 0;
var plus = document.getElementById('plus');
var minus = document.getElementById('minus');
var jumlah = document.getElementById('jumlah').value = item;

plus.addEventListener('click', function() {
    item++;
    jumlah.value = item;
})

minus.addEventListener('click', function() {
    if(item >= 1) {
        item--;
        jumlah.value = item;
    }
})