<!doctype html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   <title>Usuarios</title>
</head>
<body>
<div class="container">
   <div class="row mt-3">
      <div class="col">
         <header class="overflow-hidden">
            <h2 class="float-left">Usuarios <small class="text-muted"></small></h2>
            <div class="spinner-border text-dark mt-2 ml-3" role="status" id="loading">
               <span class="sr-only">Loading...</span>
            </div>
            <div id="myalert" style="position: absolute; display: inline-block">
            </div>
            <button disabled class="btn btn-primary float-right" style="margin-top: 3px; margin-right: 3px" data-toggle="modal" data-target="#createUser">AGREGAR</button>
         </header>
         <table class="table table-hover mt-3">
            <thead>
               <tr>
                   <th scope="col">#</th>
                   <th scope="col">Nombre</th>
                   <th scope="col">Correo</th>
                   <th scope="col">Constraseña</th>
                   <th scope="col">Acciones</th>
               </tr>
            </thead>
            <tbody>
            </tbody>
         </table>
      </div>
   </div>

   <!-- modal para agregar usuario -->
   <div class="modal  fade" id="createUser">
      <div class="modal-dialog">
         <div class="modal-content">
            <form>
               <!-- Modal Header -->
               <div class="modal-header">
                 <h4 class="modal-title">Crear usuario</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                  <div class="form-group">
                     <label>Nombre:</label>
                     <input type="text" class="form-control" name="user_name">
                  </div>
                  <div class="form-group">
                     <label>Email:</label>
                     <input type="email" class="form-control" name="user_email">
                  </div>
                  <div class="form-group">
                     <label>Contraseña:</label>
                     <input type="password" class="form-control" name="user_password">
                  </div>
               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                 <button type="submit" class="btn btn-success" disabled>Crear</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- modal para actualizar usuario -->
   <div class="modal fade" id="updateUser">
      <div class="modal-dialog">
         <div class="modal-content" style="margin-top: 75px">
            <form>
               <!-- Modal Header -->
               <div class="modal-header">
                 <h4 class="modal-title">Actualizar usuario</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                  <input type="hidden" name="user_id">
                  <div class="form-group">
                     <label>Nombre:</label>
                     <input type="text" class="form-control" name="user_name">
                  </div>
                  <div class="form-group">
                     <label>Email:</label>
                     <input type="email" class="form-control" name="user_email">
                  </div>
                  <div class="form-group">
                     <label>Contraseña:</label>
                     <input type="password" class="form-control" name="user_password">
                  </div>
               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                 <button type="submit" class="btn btn-success" disabled>Guardar</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- modal para borrar usuario -->
   <div class="modal  fade" id="deleteUser">
      <div class="modal-dialog">
         <div class="modal-content">
            <form>
               <!-- Modal Header -->
               <div class="modal-header">
                 <h4 class="modal-title">Borrar usuario</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                  <input type="hidden" name="user_id">
                  <div class="form-group">
                     <label>Nombre:</label>
                     <input type="text" class="form-control" name="user_name" disabled>
                  </div>
                  <div class="form-group">
                     <label>Email:</label>
                     <input type="email" class="form-control" name="user_email" disabled>
                  </div>
                  <div class="form-group">
                     <label>Contraseña:</label>
                     <input type="password" class="form-control" name="user_password" disabled>
                  </div>
                  <p>¿Realmente desea borrar este usuario?</p>
               </div>

               <!-- Modal footer -->
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                 <button type="submit" class="btn btn-success" disabled>Borrar</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
