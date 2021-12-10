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
const User = document.querySelector('.user');
const Categoria = document.querySelector('#categoria');
const InputProducto = document.querySelector('#producto');
const Venta = document.querySelector('#formularioVenta');
const Detalles = document.querySelector('#detallesBody');
const Cancelar = document.querySelector('.btn-cancelar');
let TotalDetalle = 0;
let TotalVenta = 0;
let SpendingData = [];
let InfoProducto = [];
let Id;
let view;
let ProductosDonas;
let DetalleVenta = [];
let InfoDetalle = [];
let objVenta = {
  id: '', 
  nombre_producto = '', 
  descripcion_producto = '',
  precioVenta_producto = ''
};
/* ***EVENT LISTENERS*** */
document.addEventListener('DOMContentLoaded', async () => {
  try {
    UserRol();
    const Parametro = new URLSearchParams(window.location.search);
    Id = parseInt(Parametro.get('id'));
    const Vista = new URLSearchParams(window.location.search);
    view = parseInt(Vista.get('View'));
    closeBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("open");
      menuBtnChange();
    });
    await GetSpending().then((x)=>{
      SpendingData.push(...x.resultado);
    }).catch(error => {
      console.log(error);
    });
    if(view === 8){
      ModalAdd.addEventListener('click', ModalView);
      Modal.addEventListener('submit', addSpending);
      BtnUpdateSpending.forEach((updateSpending) => {
        updateSpending.addEventListener('click', getId);
      });
      DeleteSpending.forEach((Delete) => {
        Delete.addEventListener('submit', deleteSpen);
      });
      CloseModal.addEventListener('click', ClassUpdate);
      CalcPrevisto();
    }
    Logout.addEventListener('click', Alert);
    if(view === 9){
      ObtenerCategoria();
      Categoria.addEventListener('change', categoriaSeleccionada);
      Venta.addEventListener('submit', MostrarDetalleVenta);
      TotalPago();
      Cancelar.addEventListener('click', CancelarVenta)
    }
  } catch (error) {
    console.log(error);
  }
});

/* ***FUNCIONES*** */
function UserRol(){
  if(User){
    User.remove();
  }
}
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

/* ***PUNTO DE VENTA*** */

async function ObtenerCategoria(){
  try {
    const url = "http://localhost:3000/Dashboard/venta";
    const respuesta = await fetch(url, {
      method: 'GET'
    });
    const resultado = await respuesta.json();
    for(let i=0; i<resultado.resultado.length; i++){
      const {id, nombre_categoria} = resultado.resultado[i];
      MostrarCategoria(id, nombre_categoria);
    }
  } catch (error) {
    console.log(error);
  }
}

function MostrarCategoria(id, nombre_categoria ){
  const OpcionCategoria = document.createElement('OPTION');
  OpcionCategoria.value = id;
  OpcionCategoria.textContent = nombre_categoria;
  Categoria.appendChild(OpcionCategoria);
}

async function categoriaSeleccionada(e){
  e.preventDefault();
  let Indice = e.target.selectedIndex;
  let TextoEscogido = e.target.options[Indice].text;
  await ProductoSeleccionado().then(x => {
    InfoProducto.push(...x.resultado);
  }).catch(error => {
    console.log(error);
  });

  //https://es.stackoverflow.com/questions/41202/eliminar-un-array-de-objetos-duplicados-en-javascript/41206
  let set = new Set( InfoProducto.map( JSON.stringify ) )
  let arrSinDuplicaciones = Array.from( set ).map( JSON.parse );
  ProductosDonas = arrSinDuplicaciones.filter(producto => parseInt(producto.cvecategoria_producto) === Indice);
  MostrarProductos(ProductosDonas);
}

async function ProductoSeleccionado(){
  const url = "http://localhost:3000/Dashboard/producto";
  const TodosProductos = await fetch(url, {
    method: 'GET'
  });
  const ResultadoProductos = await TodosProductos.json();
  return ResultadoProductos;
}

function MostrarProductos(Producto){
  LimpiarOption();
  Producto.forEach(producto => {
    const {id, nombre_producto} = producto;
    
    const OpcionProducto = document.createElement('OPTION');
    OpcionProducto.value = id;
    OpcionProducto.textContent = nombre_producto;
    InputProducto.appendChild(OpcionProducto);
  });
}
function MostrarDetalleVenta(e){
  e.preventDefault();
  const Producto = document.querySelector('#producto');
  const Cantidad = document.querySelector('#cantidad').value;
  let Indice = Producto.selectedIndex;
  let TextoEscogido = Producto.options[Indice].text;
  let Detalle = ProductosDonas.filter(detalles => detalles.nombre_producto === TextoEscogido);
  let DetalleVentas = {
  }
  Detalle.forEach(idArray => {
    const {id} = idArray;
    DetalleVentas = {id, Cantidad};
  });
  DetalleVenta = [...DetalleVenta, ...Detalle];
  DetalleVenta.forEach(prueba => {
    const {id, nombre_producto, descripcion_producto, precioVenta_producto} = prueba;
    objVenta = {
      id, nombre_producto, descripcion_producto, precioVenta_producto, Cantidad
    };
    
  })
  let contador = 1;
  const Existe = InfoDetalle.some((detalle) => {
    if(parseInt(detalle.id) === parseInt(DetalleVentas.id) ){
      contador++;
      if(contador > 1){
        return true;
      }else{
        return false;
      }
    }
  }); 
  if(Existe){
    //Actualizamos la cantidad
    const indiceElemento = InfoDetalle.find(el => el.id === DetalleVentas.id);
    let Anterior = parseInt(indiceElemento.Cantidad);
    let Actual = parseInt(Cantidad)
    indiceElemento.Cantidad = Anterior + Actual;
  }else{
    InfoDetalle = [...InfoDetalle, objVenta];
  }
  ImprimirDetalle(InfoDetalle);
}
function ImprimirDetalle(detalles){
  LimpiarTabla();
  detalles.forEach(detalle => {
    const {id, nombre_producto, descripcion_producto, precioVenta_producto, Cantidad} = detalle;
    const trDetalles = document.createElement('TR');
    const tdNombreProducto = document.createElement('TD')
    tdNombreProducto.textContent = nombre_producto;
    const tdDescripcion = document.createElement('TD');
    tdDescripcion.textContent = descripcion_producto;
    const tdPrecio = document.createElement('TD');
    tdPrecio.textContent = precioVenta_producto;
    const tdCantidad = document.createElement('TD');
    tdCantidad.textContent = Cantidad;
    const Total = document.createElement('TD');
    Total.textContent = `$${precioVenta_producto * Cantidad}`;
    TotalDetalle += (precioVenta_producto * Cantidad);
    console.log(TotalDetalle);
    const tdBoton = document.createElement('TD');
    const Boton = document.createElement('BUTTON');
    Boton.onclick = () => {
      EliminarProducto(id);
    }
    Boton.innerHTML = `
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
      </svg
    `;
    
    Boton.classList.add('btn', 'eliminar');
    tdBoton.appendChild(Boton);
    trDetalles.appendChild(tdNombreProducto);
    trDetalles.appendChild(tdDescripcion);
    trDetalles.appendChild(tdPrecio);
    trDetalles.appendChild(tdCantidad);
    trDetalles.appendChild(Total);
    trDetalles.appendChild(tdBoton);
    Detalles.appendChild(trDetalles);
  });
  let TotalPagar = document.querySelector('#totalPagar') || 0;
  TotalVenta = TotalDetalle;
  TotalPagar.value = TotalVenta;
  TotalDetalle = 0; 
  Venta.reset();
}
function EliminarProducto(id){
  InfoDetalle = InfoDetalle.filter(info => info.id !== id);
  ImprimirDetalle(InfoDetalle);
}
function TotalPago(){
  const CantidadPagar = document.querySelector('#cantidadPagar');
  const Cambio = document.querySelector('#cambioPago');
  
  TotalPagar = TotalDetalle
}
function CancelarVenta(e){
  e.preventDefault();
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })
  
  swalWithBootstrapButtons.fire({
    title: '¿Estas seguro de cancelar la venta?',
    text: "Esta accion no se puede revertir!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, Borrar!',
    cancelButtonText: 'No, Cancelar!',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      InfoDetalle = [];
      swalWithBootstrapButtons.fire(
        'Borrado!',
        'Tu venta ha sido eliminada.',
        'success'
      );
      ImprimirDetalle(InfoDetalle);
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Cancelado',
        'Tu venta ha sido conservada',
        'error'
      )
    }
  })
}
function LimpiarTabla(){
  while(Detalles.firstChild){
    Detalles.removeChild(Detalles.firstChild);
  }
}
function LimpiarOption(){
  while(InputProducto.firstChild){
    InputProducto.removeChild(InputProducto.firstChild);
  }
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