/* ***VARIABLES*** */
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
const Logout = document.querySelector('#logout');
const BtnUpdateSpending = document.querySelector('.btn-gasto');
const Modal = document.querySelector('#modal-gasto');
const DeleteSpending = document.querySelectorAll('#btn-eliminar');

/* ***EVENT LISTENERS*** */
document.addEventListener('DOMContentLoaded', () => {
  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();
  });
  Logout.addEventListener('click', Alert);
  BtnUpdateSpending.addEventListener('click', getId);
  DeleteSpending.forEach((Delete) => {
    Delete.addEventListener('submit', deleteSpen);
  });
  Modal.addEventListener('submit', Errores);
});

/* ***FUNCIONES*** */
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
 }
}
function getId(e){
  e.preventDefault();
  let buttonId;
  switch(e.target.nodeName){
    case 'path':
      buttonId = e.target.parentElement.parentElement.id; 
      break;
    case 'svg':
      buttonId = e.target.parentElement.id;
      break;
    default:
      buttonId = e.target.id;
      break;
  }
  buttonId = document.querySelector('#idmodal').value;
}
async function Errores(e){
  try{
    e.preventDefault();
    const descripcion_gasto = document.querySelector('#descripcion').value,
    previsto_gasto = document.querySelector('#previsto').value;
    const id = document.querySelector('#idmodal').value;
    if(descripcion_gasto === '' || previsto_gasto === ''){
      ImprimirAlerta('Descripción y/o Gasto previsto Obligatorio');
      return;
    }
    const Formulario = new FormData(Modal);
   
    const url = 'http://localhost:3000/Dashboard/modal';
    const resultado = await fetch(url, {
      method: 'POST',
      body: Formulario
    });
    const respuesta = await resultado.json();
    if(respuesta.resultado){
      Swal.fire({
        icon: 'success',
        title: 'Gasto agregado',
        text: 'Tu gasto fue agregado correctamente',
        button: 'OK'
      }).then( () => {
        setTimeout(() => {
            window.location.href = `http://localhost:3000/Dashboard/dashboard?View=8&id=${id}`;
        }, 1000);
      });
    }
  }catch(error){
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'Hubo un error al guardar tu gasto'
    });
  }
}
async function deleteSpen(e){
  try{
    e.preventDefault();
    const id = document.querySelector('#eliminar-gasto').value;
    const Formulario = new FormData();
    Formulario.append('id',id);
    const url = 'http://localhost:3000/Dashboard/eliminar-gasto';
    const respuesta = await fetch(url, {
      method: 'POST',
      body: Formulario
    });
    const resultado = await respuesta.json();
    if(resultado.guardado){
      Swal.fire({
        icon: 'success',
        title: 'Gasto Eliminado',
        text: 'Tu gasto fue eliminado correctamente',
        button: 'OK'
      }).then( () => {
        window.location.reload();
      });
    }
  }catch(error){
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'Hubo un error al guardar tu gasto'
    });
  }
}
function ImprimirAlerta(mensaje){
  const AlertaP = document.querySelector('.errores-modal');
  if(!AlertaP.classList.contains('error-alerta')){
    AlertaP.textContent = mensaje;
    AlertaP.classList.add('error-alerta');
  }
  setTimeout(()=>{
    AlertaP.classList.remove('error-alerta');
    AlertaP.textContent = '';
  },5000);
}
/* ***SWEET ALERT*** */
function Alert(e){
  e.preventDefault();
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  });
  swalWithBootstrapButtons.fire({
    title: '¿Estas seguro de cerrar sesión?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, seguro!',
    cancelButtonText: 'No, cancelar!',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = '/logout';
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      Swal.close();
    }
  })
}

