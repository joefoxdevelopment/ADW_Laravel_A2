var icon = document.querySelector('.js-nav-hamburger');
icon.onclick = function(e) {
    var menu = document.querySelector('.js-mobile-menu');
    if (menu.classList.contains('show')) {
        menu.classList.remove('show');
    } else {
        menu.classList.add('show');
    }


    if (icon.classList.contains('show')) {
        icon.classList.remove('show');
    } else {
        icon.classList.add('show');
    }
}
