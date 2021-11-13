/* ***VARIABLES*** */
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

const NavList = document.querySelector('#Navegacion');
const SectionMain = document.querySelector('.section-main');
const ViewsNav = ['usuario', 'roles', 'productos', 'gastos', 'ventas'];
/* ***EVENT LISTENERS*** */
document.addEventListener('DOMContentLoaded', () => {
  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();
  });
  searchBtn.addEventListener("click", ()=>{ 
    sidebar.classList.toggle("open");
    menuBtnChange();
  });

  NavList.addEventListener('click', ChangeView);
});

/* ***FUNCIONES*** */
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
 }
}

function ChangeView(e){
  e.preventDefault();
  console.log(SectionMain.childNodes);
  ViewsNav.forEach((view, index) => {
    if(e.target.classList.contains(view)){
      if(SectionMain.childNodes[index + 1].classList.contains('activo')){
        SectionMain.childNodes[index + 1].classList.remove('activo');
        SectionMain.childNodes[index + 1].classList.add('ocultar');
        SectionMain.childNodes[(index + 1) + 2].classList.remove('ocultar');
        SectionMain.childNodes[(index + 1) + 2].classList.add('activo');
      }
    }
  });
}
