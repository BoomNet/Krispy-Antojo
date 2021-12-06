/* ***VARIABLES*** */
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
const Logout = document.querySelector('#logout');
const BtnUpdateSpending = document.querySelectorAll('.btn-gasto');
const Modal = document.querySelector('#modal-gasto');
const DeleteSpending = document.querySelectorAll('#btn-eliminar');
const IdScript = document.querySelector('#test-id');
const Update = document.querySelector('.updateSpendig');
const ModalAdd = document.querySelector('.add');
const CloseModal = document.querySelector('.btn-close');
let SpendingData = [];
let Id;
/* ***EVENT LISTENERS*** */
document.addEventListener('DOMContentLoaded', async () => {
  await GetSpending().then((x)=>{
    SpendingData.push(...x.resultado);
  }).catch(error => {
    console.log(error);
  });
  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();
  });
  Logout.addEventListener('click', Alert);
  ModalAdd.addEventListener('click', ModalView);
  Modal.addEventListener('submit', addSpending);
  BtnUpdateSpending.forEach((updateSpending) => {
    updateSpending.addEventListener('click', getId);
  });
  DeleteSpending.forEach((Delete) => {
    Delete.addEventListener('submit', deleteSpen);
  });
  CloseModal.addEventListener('click', ClassUpdate);
  const Parametro = new URLSearchParams(window.location.search);
  Id = parseInt(Parametro.get('id'));
  CalcPrevisto();
});

/* ***FUNCIONES*** */
function CalcPrevisto(){
  const diferencia = document.querySelectorAll('#diferenteTable');

  diferencia.forEach(pre => {
    if(parseInt(pre.textContent) < 0){
      pre.classList.add('text-danger');
    }else{
      pre.classList.remove('text-danger')
    }
  });
}
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
 }
}
function ModalView(e){
  e.preventDefault();
  const Descripcion = document.querySelector('#descripcion');
  const Previsto = document.querySelector('#previsto');
  const Real = document.querySelector('#real');
  Descripcion.value = '';
  Previsto.value = '';
  Real.value = '';
}
async function GetSpending(){
  const url = 'http://localhost:3000/Dashboard/getGasto';
  const respuesta = await fetch(url, {
    method: 'GET'
  });
  const resultado = await respuesta.json();
  return resultado;
}
function ClassUpdate(e){
  e.preventDefault();
  if(Modal.classList.contains('update')){
    Modal.classList.remove('update');
  }
}
function getId(e){
  e.preventDefault();
  Modal.classList.add('update');
  let buttonId = '';
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
  document.querySelector('#idgasto').value = buttonId;
  let Spend = SpendingData.find(x => x.id === buttonId);
  console.log(Spend);
  AddValues(Spend);
}
function AddValues(spend){
  document.querySelector('#descripcion').value = spend.descripcion_gasto;
  document.querySelector('#previsto').value = spend.previsto_gasto;
  document.querySelector('#real').value = spend.real_gasto || '';
}
async function addSpending(e){
  try{
    e.preventDefault();
    if(!Modal.classList.contains('update')){
      ValidarModal();
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
              window.location.href = `http://localhost:3000/Dashboard/dashboard?View=8&id=${Id}`;
          }, 1000);
        });
      }
    }else{
      updateSpendig();
    } 
  }catch(error){
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: 'Hubo un error al guardar tu gasto'
    });
  }
}
async function updateSpendig(){
  try{
    const idModal = document.querySelector('#idgasto').value;
    const url = `http://localhost:3000/Dashboard/editar-gasto`;
    const Formulario = new FormData();
    Formulario.append('id', idModal);
    Formulario.append('descripcion_previsto', document.querySelector('#descripcion').value);
    Formulario.append('previsto_gasto', document.querySelector('#previsto').value);
    Formulario.append('real_gasto', document.querySelector('#real').value);
    const respuesta = await fetch(url, {
      method: 'POST',
      body: Formulario
    });
    const resultado = await respuesta.json();
    if(resultado.resultado){
      Swal.fire({
        icon: 'success',
        title: 'Gasto Actualizado',
        text: 'Tu gasto fue actualizado correctamente',
        button: 'OK'
      }).then( () => {
        window.location.href = `http://localhost:3000/Dashboard/dashboard?View=8&id=${Id}`;
      });
      Modal.classList.remove('update');
    }
  }catch(error){
    console.log(error);
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
function ValidarModal(){
  const descripcion_gasto = document.querySelector('#descripcion').value,
      previsto_gasto = document.querySelector('#previsto').value;
  if(descripcion_gasto === '' || previsto_gasto === ''){
    ImprimirAlerta('Descripción y/o Gasto previsto Obligatorio');
    return;
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