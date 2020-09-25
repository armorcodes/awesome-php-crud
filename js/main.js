// raiz 
const root = "http://localhost/crud/";

// almacena el resultado de la peticion ajax
let data = [];

// almacena la posicion del registro que se va a manipular
let indexData = false;

// realiza peticiones post usando fetch
function ajax(query) {
   fetch(query.url, {
      method: 'POST',
      body: query.data
   }).then((res) => {
      return res.ok ? res.json() : Promise.reject(res)
   }).then((json) => {
      //console.log(json);
      query.success(json)
   }).catch((err) => {
      query.error(err);
   });
}

// construye la estructura <tr> con los datos del usuario 
function rowData(user, index) {
   return `<tr>
            <th>${index + 1}</th>
            <td>${user["user_name"]}</td>
            <td>${user["user_email"]}</td>
            <td>${user["user_password"]}</td>
            <td><button data-id="${index}" data-toggle="modal" data-target="#updateUser" class="btn btn-success btn-sm">Editar</button><button data-id="${index}" data-toggle="modal" data-target="#deleteUser" class="btn btn-danger btn-sm ml-2">Borrar</button></td>
            </tr>`;
}

// asigna el resultado de la peticion ajax a la variable gobal data
function setData(json) {
   data = json;
}

// asigna el indice del registro a trabajar mediante el evento click a todos los botones de la tabla
function setButtonEvent() {
   document.querySelectorAll("table tbody tr td button, header button").forEach(btn => {
      btn.addEventListener("click", () => {
         indexData = parseInt(btn.getAttribute("data-id"));
         idTag = btn.getAttribute("data-target");
         loadInputContent(idTag, indexData);
      })
   })
}

// agrega cada estructura <tr> a la tabla
function writeData(data) {
   document.querySelector("h2 small").innerHTML = `(${data.length})`;
   const tbody = document.querySelector("table tbody");
   tbody.innerHTML = "";
   data.forEach((obj, index) => {
      const tr = document.createElement("tr");
      tr.innerHTML = rowData(obj, index);
      tbody.appendChild(tr);
   });
}

// muestra y oculta el icono de cargando
function loading(bool = true) {
   const loading = document.querySelector("#loading");
   if (bool) {
      loading.style.display = "inline-block";
   } else {
      setTimeout(() => {
         loading.style.display = "none";
      }, 500);
   }
}

// desabilita todos los botones
function disableSendButtons(bool = true) {
   bool = bool ? true : false;
   document.querySelectorAll("button").forEach(btn => {
      btn.disabled = bool;
   })
}

// muestra un alerta persolanizada
function showErrorAlert(message) {
   setTimeout(() => {
      alert(message);
   }, 200);
}

// cierra el cualquier modal abierto
function hideModal() {
   $(".modal.show").modal("hide");
}

// carga el contenido de los input en el modal
function loadInputContent(idTag, indexData) {
   if (idTag === "#updateUser" || idTag === "#deleteUser") {
      document.querySelector(`${idTag} input[type="hidden"]`).value = data[indexData]["user_id"];
      document.querySelector(`${idTag} input[type="text"]`).value = data[indexData]["user_name"];
      document.querySelector(`${idTag} input[type="email"]`).value = data[indexData]["user_email"];
      document.querySelector(`${idTag} input[type="password"]`).value = data[indexData]["user_password"];
   } else if (idTag === "#createUser") {
      document.querySelector(`${idTag} input[type="text"]`).value = "";
      document.querySelector(`${idTag} input[type="email"]`).value = "";
      document.querySelector(`${idTag} input[type="password"]`).value = "";
   } else {
      console.log("InputContent argument invalid");
   }
}

// crea un registro de usuario
function createUser() {
   document.querySelector("#createUser form").addEventListener("submit", (event) => {
      event.preventDefault();
      loading(true);
      disableSendButtons(true);
      hideModal();
      const dataPost = new FormData(document.querySelector("#createUser form"));
      ajax({
         url: `${root}php/create.php`,
         data: dataPost,
         success: function(json) {
            readUser();
            console.log(`\nUsuarios creados: ${json}`);
         },
         error: function(err) {
            showErrorAlert("¡Oops! No se pudo crear al usuario. Por favor, asegúrese de no ingresar un email ya existente o inténtelo nuevamente");
            loading(false);
            disableSendButtons(false);
            console.log(`Error ${err.status}: La petición devolvió un error en createUser().`);
         }
      });
   });
}

// realiza peticion para obtener a todos los usuarios
function readUser() {
   ajax({
      url: `${root}php/read.php`,
      success: function(json) {
         setData(json);
         writeData(json);
         setButtonEvent();
         disableSendButtons(false);
         loading(false);
         console.log(`Usuarios listados: ${json.length}`);
      },
      error: function(err) {
         showErrorAlert("¡Oops! No se pudo listar a los usuarios. Por favor, refresque la página.");
         loading(false);
         disableSendButtons(false);
         console.log(`Error ${err.status}: La petición devolvió un error en readUser().`);
      }
   });
}

// actualiza un registro de usuario
function updateUser() {
   document.querySelector("#updateUser form").addEventListener("submit", (event) => {
      event.preventDefault();
      loading(true);
      disableSendButtons(true);
      hideModal();
      const dataPost = new FormData(document.querySelector("#updateUser form"));
      ajax({
         url: `${root}php/update.php`,
         data: dataPost,
         success: function(json) {
            readUser();
            console.log(`\nUsuarios actualizados: ${json}`);
         },
         error: function(err) {
            showErrorAlert("¡Oops! No se pudo actualizar los datos del usuario. Por favor, asegúrese de no ingresar un email ya existente o inténtelo nuevamente");
            loading(false);
            disableSendButtons(false);
            console.log(`Error ${err.status}: La petición devolvió un error en updateUser().`);
         }
      });
   });
}

// elimina un registro de usuario
function deleteUser() {
   document.querySelector("#deleteUser form").addEventListener("submit", (event) => {
      event.preventDefault();
      loading(true);
      disableSendButtons(true);
      hideModal();
      const dataPost = new FormData();
      dataPost.append("user_id", document.querySelector("#deleteUser input[type='hidden']").value);
      ajax({
         url: `${root}php/delete.php`,
         data: dataPost,
         success: function(json) {
            readUser();
            console.log(`\nUsuarios eliminados: ${json}`);
         },
         error: function(err) {
            showErrorAlert("¡Oops! No se pudo eliminar al usuario. Por favor, inténtelo de nuevo");
            loading(false);
            disableSendButtons(false);
            console.log(`Error ${err.status}: La petición devolvió un error en deleteUser().`);
         }
      });
   });
}

// inicia el programa despues que todos los elementos de la pagina se cargaron
window.addEventListener("load", () => {
   createUser();
   readUser();
   updateUser();
   deleteUser();
});