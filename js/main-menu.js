main_menu = document.getElementById("main-menu");
open_buttons = document.getElementsByClassName("main-menu-open-btn");
close_buttons = document.getElementsByClassName("main-menu-close-btn");


function open_menu() {
    main_menu.style.visibility = "visible";
    main_menu.style.opacity = 1;
}

function close_menu() {
    main_menu.style.visibility = "hidden";
    main_menu.style.opacity = 0;
}

for (let btn of open_buttons) {
    btn.onclick = open_menu;
}

for (let btn of close_buttons) {
    btn.onclick = close_menu;
}

main_menu.onclick = close_menu