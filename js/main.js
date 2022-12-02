const navBar = document.getElementById('nav-bar')
const menu = document.getElementById('menU')
menu.onclick = () => {
  menu.classList.toggle('bx-x')
  navBar.classList.toggle('open')
}

function toggle() {
  const toggle = document.querySelector('.toggle')
  const banner = document.querySelector('.banner')
  toggle.classList.toggle('active')
  banner.classList.toggle('active')
}

function toggle() {
  const toggle = document.querySelector('#menU')
  const banner = document.querySelector('.banner')
  toggle.classList.toggle('active')
  banner.classList.toggle('active')
}

function checkdelet(msj) {
  // swal({
  //   title: "Are you sure?",
  //   text: "Once deleted, you will not be able to recover this imaginary file!",
  //   icon: "warning",
  //   buttons: true,
  //   dangerMode: true,
  // })
  // .then((willDelete) => {
  //   if (willDelete) {
  //     swal("Poof! Your imaginary file has been deleted!", {
  //       icon: "success",
  //     });
  //     return true;
  //   } else {
  //     swal("Your imaginary file is safe!");
  //     return false;
  //   }
  // });

  return confirm(`vous etes sure de suprimer ${msj}`)
}
