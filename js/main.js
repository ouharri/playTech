let menu = document.getElementById('menU');
let navBar = document.getElementById('nav-bar');
// menu.onclick = () => {
//     menu.classList.toggle('bx-x');
//     navBar.classList.toggle('open');
// };

if(menu){
    menu.addEventListener('click',() => {
        navBar.classList.add('open');
    }
    )
}

console.log("hhhh");