const navBar = document.getElementById('nav-bar');
const menu = document.getElementById('menU');
    menu.onclick = () => {
        menu.classList.toggle('bx-x');
        navBar.classList.toggle('open');
    };
// if(menu){
//     menu.addEventListener('click',() => {
//         navBar.classList.add('open');
//         menu.classList.toggle('bx-x');
//     }
//     )
// }



