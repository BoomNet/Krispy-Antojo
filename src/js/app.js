/* ***VARIABLES*** */
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");
const Logout = document.querySelector('#logout');
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
  Logout.addEventListener('click', Alert);
  ConsultarAPI();
});

/* ***FUNCIONES*** */
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
 }
}

/* ***API*** */

async function ConsultarAPI(){
  try{
    const url = 'http://localhost:3000/Api/usuario';
    const Respuesta = await fetch(url);
    const Usuarios = await Respuesta.json();
    ImprimirUsuarios(Usuarios);
  }catch(error){
    console.log(error);
  }
}

function ImprimirUsuarios(usuarios){
  const tableUser = document.querySelector('#table-user');
  usuarios.forEach(usuario => {
    const {id, nombre_usuario, apellidopa_usuario, apellidoma_usuario, usuario_usuario, rol} = usuario;

    const tr = document.createElement('TR');

    const tdId = document.createElement('TD');
    tdId.textContent = id;
    const tdNombre = document.createElement('TD');
    tdNombre.textContent = nombre_usuario;
    const tdApellidopa = document.createElement('TD');
    tdApellidopa.textContent = apellidopa_usuario;
    const tdApellidoma = document.createElement('TD');
    tdApellidoma.textContent = apellidoma_usuario;
    const tdUsuario = document.createElement('TD');
    tdUsuario.textContent = usuario_usuario;
    const tdRol = document.createElement('TD');
    tdRol.textContent = rol;

    const tdAcciones = document.createElement('TD');
    tdAcciones.classList.add('acciones-edit');
    const aEdit = document.createElement('A');
    aEdit.href = `/Dashboard/dashboard?View=4&id=${id}`;
    aEdit.innerHTML = `
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
      </svg>
    `;
    const form = document.createElement('FORM');
    form.action = '/Dashboard/eliminar';
    form.method = 'POST';
    const input = document.createElement('INPUT');
    input.type = 'hidden';
    input.name = 'id';
    input.value = id;
    
    const button = document.createElement('BUTTON');
    button.type = 'submit';
    button.classList.add('btn');
    button.classList.add('eliminar');
    button.innerHTML = `
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
    </svg>
    `;
    form.appendChild(input);
    form.appendChild(button);
    console.log(form);
    tdAcciones.appendChild(aEdit);
    tdAcciones.appendChild(form);

    tr.appendChild(tdId);
    tr.appendChild(tdNombre);
    tr.appendChild(tdApellidopa);
    tr.appendChild(tdApellidoma);
    tr.appendChild(tdUsuario);
    tr.appendChild(tdRol);
    tr.appendChild(tdAcciones);

    tableUser.appendChild(tr);

  });
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
