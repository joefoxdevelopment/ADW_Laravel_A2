document.querySelector('.js-nav-hamburger').onclick = function(e) {
    var menu = document.querySelector('.js-mobile-menu');
    if (menu.classList.contains('show')) {
        menu.classList.remove('show');
    } else {
        menu.classList.add('show');
    }
}
