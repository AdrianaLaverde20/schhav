<?php
    require_once("../../Models/conexionDB.php");
    require_once("../../Models/consultarUserAdmin.php");
    require_once("../../Models/verificarUser.php");

  function cargarUser($tipoUsuario = 'todos') {
      $objConsultas = new ConsultasUserAdmin();
      $result = $objConsultas->ConsultarUser($tipoUsuario); // Pasar el parámetro a ConsultarUser
  
      if (empty($result)) {
          echo "<h2>No hay usuarios</h2>";
      } else {
          foreach ($result as $f) {
              echo '<tr>
                  <td scope="col"><img src="../../uploads/Usuarios/' . $f['foto_perfil'] . '" style="width:100px"> </td>
                  <td scope="col">' . $f['identificacion'] . '</td>
                  <td scope="col">' . $f['nombre'] . ' ' . $f['apellido'] . '</td>
                  <td scope="col">' . $f['email'] . '</td>
                  <td scope="col">' . $f['rol'] . '</td>
                  <td scope="col">' . $f['estado'] . '</td>
                  <td>
                      <a href="consultarProdVend.php?identificacion=' . $f['identificacion'] . '" class="btn btn-primary">Ver</a>
                      <a href="editar_user.php?identificacion=' . $f['identificacion'] . '" class="btn btn-primary">Editar</a>
                      <a href="../../Controllers/administrador/eliminarUser.php?identificacion=' . $f['identificacion'] . '" class="btn btn-primary">Eliminar</a>
                  </td>
              </tr>';
          }
      }
  }

  function cargarProdVend($usuario_id,$tipoProducto = 'todos') {
    $objConsultas = new ConsultasUserAdmin();
    $result = $objConsultas->ConsultarProdVend($tipoProducto, $usuario_id); // Pasar el parámetro a ConsultarUser

    if (empty($result)) {
        echo "<h2>No hay Productos</h2>";
    } else {
        foreach ($result as $f) {
          echo'<tr>
          <td scope="col"><img  src="../../uploads/productos/'.$f['producto_foto'] .' " style="width:100px"> </td>
          <td scope="col">'.$f['producto_codigo'].'</td>
          <td scope="col">'.$f['producto_nombre'].'</td>
          <td scope="col">'.$f['producto_tipo'].'</td>
          <td scope="col">'.$f['producto_talla'].'</td>
          <td scope="col">'.$f['producto_precio'].'</td>
          <td scope="col">'.$f['producto_stock'].'</td>
          <td scope="col">'.$f['categoria_nombre'].'</td>
          <td scope="col">'.$f['nombre'].'</td>
          <td scope="col">'.$f['fecha'].'</td>
          <td>
      <a href="editar_prod.php?producto_codigo='.$f['producto_codigo'].'" class="btn btn-primary ">Editar</a>
      <a href="../../Controllers/administrador/eliminarProd.php?producto_codigo='.$f['producto_codigo'].'" class="btn btn-primary ">Eliminar</a>
      </td>
        </tr>';
        }
    }
}

function cargarProd(){

  $objConsultas= new ConsultasUserAdmin(); 
  $result = $objConsultas->ConsultarProd();

   if(!isset($result)){
      echo"<h2>No hay Productos</h2>";
    }else{
      foreach ($result as $f){
          echo'<tr>
          <td scope="col"><img  src="../../uploads/productos/'.$f['producto_foto'] .' " style="width:100px"> </td>
          <td scope="col">'.$f['producto_codigo'].'</td>
          <td scope="col">'.$f['producto_nombre'].'</td>
          <td scope="col">'.$f['producto_tipo'].'</td>
          <td scope="col">'.$f['producto_talla'].'</td>
          <td scope="col">'.$f['producto_precio'].'</td>
          <td scope="col">'.$f['producto_stock'].'</td>
          <td scope="col">'.$f['categoria_nombre'].'</td>
          <td scope="col">'.$f['nombre'].'</td>
          <td scope="col">'.$f['fecha'].'</td>
          <td>
      <a href=""class="btn btn-primary "> Ver</a>
      <a href="editar_prod.php?producto_codigo='.$f['producto_codigo'].'" class="btn btn-primary ">Editar</a>
      <a href="../../Controllers/administrador/eliminarProd.php?producto_codigo='.$f['producto_codigo'].'" class="btn btn-primary ">Eliminar</a>
      </td>
        </tr>';
      }
  }


}

function cargarVent(){

  $objConsultas= new ConsultasUserAdmin(); 
  $result = $objConsultas->ConsultarVent();

  if(!isset($result)){
      echo"<h2>No hay Venta</h2>";
  }else{
      foreach ($result as $f){
          echo'<tr>
          <td scope="col">'.$f['venta_id'].'</td>
          <td scope="col">'.$f['factura_id'].'</td>
          <td scope="col">'.$f['producto_cod'].'</td>
          <td scope="col">'.$f['cantidad'].'</td>
          <td scope="col">'.$f['precio'].'</td>
          <td scope="col">'.$f['usuario_nombre'].'</td>
          <td scope="col">'.$f['usuario_id'].'</td>
          <td>
      <a href=""class="btn btn-primary "> Ver</a>
      <a href="editar_vent.php?venta_id='.$f['venta_id'].'" class="btn btn-primary ">Editar</a>
      <a href="../../Controllers/administrador/eliminarVent.php?venta_id='.$f['venta_id'].'" class="btn btn-primary ">Eliminar</a>
      </td>
        </tr>';
      }
  }


}

function cargarUserEdit(){
    $id_user = $_GET['identificacion'];

    $objConsultas = new ConsultasUserAdmin();
    $result = $objConsultas->ConsultarUserEdit($id_user);

    foreach($result as $f){
        echo '
        <form class="row g-3 needs-validation" method="post" action="../../Controllers/Administrador/editarUser.php" enctype="multipart/form-data">

        <div class="col-12">
      <label for="yourName" class="form-label">Foto Perfil:  </label>
      <img src="../../uploads/Usuarios/'.$f['foto_perfil'].' ?>" style="width:100px">
      <input type="text" name="foto_perfil" class="form-control" id="yourName" value="'.$f['foto_perfil'].'" readonly >
      <div class="invalid-feedback">Please, enter your name!</div>
      </div>
        <div class="mb-2">
            <label for="inputNumber" class="col-sm-2 col-form-label">Seleccionar Foto</label>
            <div class="col-sm-10">
              <input class="form-control" name="producto_foto" type="file" accept=".png, .jpg, .gif" id="formFile">
            </div>
        </div>
        
          <div class="col-12">
            <label for="yourName" class="form-label">Identificacion</label>
            <input type="text" name="identificacion" class="form-control" id="yourName" value="'.$f['identificacion'].'" readonly>
            <div class="invalid-feedback">Please, enter your name!</div>
          </div>

          <div class="col-md-6">
            <label for="yourName" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="yourName" value="'.$f['nombre'].'" required>
            <div class="invalid-feedback">Please, enter your name!</div>
          </div>

          <div class="col-md-6">
            <label for="yourName" class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" id="yourName" value="'.$f['apellido'].'" required>
            <div class="invalid-feedback">Please, enter your name!</div>
          </div>

          <div class="col-md-12">
            <label for="yourUsername" class="form-label">Email</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="email" value="'.$f['email'].'" placeholder="Example@example.com" aria-label="Email" aria-describedby="basic-addon2">
              <span class="input-group-text" id="basic-addon2">@example.com</span>
            </div>
          </div>

          <div class="mb-1">
            <label class="col-sm-2 col-form-label">Estado</label>
            <div class="col-sm-10">
              <select class="form-select" name="rol" aria-label="Default select example">
                <option value="'.$f['rol'].'">'.$f['rol'].'</option>
                <option value="Administrador">Admin</option>
                <option value="Cliente">Cliente</option>
                <option value="Vendedor">Vendedor</option>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label class="col-sm-2 col-form-label">Rol</label>
            <div class="col-sm-10">
              <select class="form-select" name="estado" aria-label="Default select example">
                <option value="'.$f['rol'].'">'.$f['rol'].'</option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
                <option value="Pendiente">Pendiente</option>
              </select>
            </div>
          </div>

          <div class="col-12">
            <input type="submit" class="submit" value="Enviar" name="regAdm_user">
          </div>
          <div class="col-12">
            <p class="small mb-0">Ya tienes uan cuenta? <a href="pages-login.html">Log in</a></p>
          </div>
        </form>
        ';

    }
}

function cargarProdEdit(){
  $id_prod = $_GET['producto_codigo'];

  $objConsultas = new ConsultasUserAdmin();
  $result = $objConsultas->ConsultarProdEdit($id_prod);

  foreach($result as $f){
      echo '
      <form class="row g-3 needs-validation" method="post" action="../../Controllers/Administrador/editarProd.php" enctype="multipart/form-data">

        <div class="col-12">
          <label for="yourName" class="form-label">Producto codigo</label>
          <input type="text" name="producto_codigo" class="form-control" id="yourName" value="'.$f['producto_codigo'].'" readonly>
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-md-12">
          <label for="yourName" class="form-label">Producto Nombre</label>
          <input type="text" name="producto_nombre" class="form-control" id="yourName" value="'.$f['producto_nombre'].'" required>
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-md-6">
          <label for="yourName" class="form-label">Producto Precio</label>
          <input type="text" name="producto_precio" class="form-control" id="yourName" value="'.$f['producto_precio'].'" required>
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-md-6">
          <label for="yourUsername" class="form-label">Producto Stock</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="producto_stock" value="'.$f['producto_stock'].'" placeholder="Example@example.com" aria-label="Email" aria-describedby="basic-addon2">
          </div>
        </div>

        <div class="col-12">
          <input type="submit" class="submit" value="Enviar" name="regAdm_user">
        </div>
      </form>
      ';

  }
}

function cargarCatEdit(){
  $id_catE = $_GET['categoria_id'];

  $objConsultas = new ConsultasUserAdmin();
  $result = $objConsultas->ConsultarCatEdit($id_catE);

  foreach($result as $f){
      echo '
      <form class="row g-3 needs-validation" method="post" action="../../Controllers/Administrador/editarCat.php" enctype="multipart/form-data">

      <div class="col-12">
          <label for="yourName" class="form-label">Producto codigo</label>
          <input type="text" name="categoria_id" class="form-control" id="yourName" value="'.$f['categoria_id'].'" readonly>
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>  
      
      <div class="col-12">
          <label for="yourName" class="form-label">Producto Nombre</label>
          <input type="text" name="categoria_nombre" class="form-control" id="yourName" value="'.$f['categoria_nombre'].'" >
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-12">
          <label for="yourName" class="form-label">Vendedor</label>
          <input type="text" name="categoria_usuario" class="form-control" id="yourName" value="'.$f['categoria_usuario'].'" readonly>
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-12">
          <input type="submit" class="submit" value="Enviar" name="regAdm_user">
        </div>
      </form>
      ';

  }
}

function cargarVentEdit(){
  $id_vent = $_GET['venta_id'];

  $objConsultas = new ConsultasUserAdmin();
  $result = $objConsultas->ConsultarVentEdit($id_vent);

  foreach($result as $f){
      echo '
      <form class="row g-3 needs-validation" method="post" action="../../Controllers/Administrador/editarVent.php" enctype="multipart/form-data">

      <div class="col-12">
          <label for="yourName" class="form-label">Codigo Venta</label>
          <input type="text" name="venta_id" class="form-control" id="yourName" value="'.$f['venta_id'].'" readonly>
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>  
      
      <div class="col-12">
          <label for="yourName" class="form-label">Codigo Factura</label>
          <input type="text" name="factura_id" class="form-control" id="yourName" value="'.$f['factura_id'].'" >
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-12">
          <label for="yourName" class="form-label">COdigo Producto</label>
          <input type="text" name="categoria_usuario" class="form-control" id="yourName" value="'.$f['producto_cod'].'" readonly>
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-12">
          <label for="yourName" class="form-label">Cantidad</label>
          <input type="text" name="categoria_usuario" class="form-control" id="yourName" value="'.$f['cantidad'].'" readonly>
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-12">
          <label for="yourName" class="form-label">Precio</label>
          <input type="text" name="categoria_usuario" class="form-control" id="yourName" value="'.$f['precio'].'" readonly>
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-12">
          <label for="yourName" class="form-label">Vendedor</label>
          <input type="text" name="categoria_usuario" class="form-control" id="yourName" value="'.$f['usuario_nombre'].'" readonly>
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-12">
          <label for="yourName" class="form-label">Vendedor</label>
          <input type="text" name="categoria_usuario" class="form-control" id="yourName" value="'.$f['usuario_id'].'" readonly>
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-12">
          <input type="submit" class="submit" value="Enviar" name="regAdm_user">
        </div>
      </form>
      ';

  }
}

function cargarPerfil(){

  
  // session_start();
  $id_user = $_SESSION['id'];

  $objConsultas = new ConsultasUserAdmin();
  $result = $objConsultas->ConsultarUserEdit($id_user);

  foreach($result as $f){
    echo ' <li class="nav-item dropdown pe-3">

    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
      <img class="rounded-circle" alt="Profile" src="../Extras/img/usuarios/'.$f['foto_perfil'].'">
      <span class="d-none d-md-block dropdown-toggle ps-2">'.$f['nombre'].'  '.$f['apellido'].'</span>
    </a><!-- End Profile Iamge Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
      <li class="dropdown-header">
        <h6></h6>
        <span></span>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li>
        <a class="dropdown-item d-flex align-items-center" href="../Administrador/consultarPerfil.php?identificacion=' . $f['identificacion'] . '">
          <i class="bi bi-person"></i>
          <span>Mi Perfil</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li>
        <a class="dropdown-item d-flex align-items-center" href="home.php?views=ConfPerfil">
          <i class="bi bi-gear"></i>
          <span>Configuracion</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li>
        <a class="dropdown-item d-flex align-items-center" href="home.php?views=ConfPerfil">
          <i class="bi bi-question-circle"></i>
          <span>Necesito Ayuda?</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li>
        <a class="dropdown-item d-flex align-items-center" href="../../Controllers/cerrarSesion.php">
          <i class="bi bi-box-arrow-right"></i>
          <span>Cerrar Sesion</span>
        </a>
      </li>
       ';
  
  }

}

function cargarPerfilConf(){

  
  // session_start();
  $id_user = $_SESSION['id'];

  $objConsultas = new ConsultasUserAdmin();
  $result = $objConsultas->ConsultarUserEdit($id_user);

  foreach($result as $f){
    echo '<li class="nav-item">
    <a class="nav-link collapsed" href="consultarPerfil.php?identificacion=' . $f['identificacion'] . '">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li>';
  
  }

}

function cargarPerfilInfo(){
  
  $id_user = $_GET['identificacion'];

  $objConsultas = new ConsultasUserAdmin();
  $result = $objConsultas->ConsultarUserEdit($id_user);

  foreach($result as $f){

      echo '
      <form class="row g-3 needs-validation" method="post" action="../../Controllers/Administrador/editarUserConf.php" enctype="multipart/form-data">

      <div class="col-12">
      <label for="yourName" class="form-label">Foto Perfil:  </label>
      <img src="../../uploads/Usuarios/'.$f['foto_perfil'].' ?>" style="width:100px">
      <input type="text" name="foto_perfil" class="form-control" id="yourName" value="'.$f['foto_perfil'].'" readonly >
      <div class="invalid-feedback">Please, enter your name!</div>
      </div>
        <div class="mb-2">
            <label for="inputNumber" class="col-sm-2 col-form-label">Seleccionar Foto</label>
            <div class="col-sm-10">
              <input class="form-control" name="producto_foto" type="file" accept=".png, .jpg, .gif" id="formFile">
            </div>
        </div>


        <div class="col-12">
          <label for="yourName" class="form-label">Identificacion</label>
          <input type="text" name="id" class="form-control" id="yourName" value="'.$f['identificacion'].'" readonly >
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-md-6">
          <label for="yourName" class="form-label">Nombre</label>
          <input type="text" name="nombre" class="form-control" id="yourName" value="'.$f['nombre'].'" required>
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-md-6">
          <label for="yourName" class="form-label">Apellido</label>
          <input type="text" name="apellido" class="form-control" id="yourName" value="'.$f['apellido'].'" required>
          <div class="invalid-feedback">Please, enter your name!</div>
        </div>

        <div class="col-md-12">
          <label for="yourUsername" class="form-label">Email Actual</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="email" value="'.$f['email'].'" placeholder="Example@example.com" aria-label="Email" aria-describedby="basic-addon2" >
            <span class="input-group-text" id="basic-addon2">@example.com</span>
          </div>
        </div>

        <div class="col-md-6">
          <label for="yourUsername" class="form-label">Actualizar Email</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="email1"  placeholder="Example@example.com" aria-label="Email" aria-describedby="basic-addon2" >
            <span class="input-group-text" id="basic-addon2">@example.com</span>
          </div>
        </div>

        <div class="col-md-6">
          <label for="yourUsername" class="form-label">Confirmar Email</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="email2"  placeholder="Example@example.com" aria-label="Email" aria-describedby="basic-addon2" >
            <span class="input-group-text" id="basic-addon2">@example.com</span>
          </div>
        </div>

        <div class="col-md-6">
          <label for="yourUsername" class="form-label">Actualizar Contrasena</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="clave1"  placeholder="123456" aria-label="Email" aria-describedby="basic-addon2" >
          </div>
        </div>

        <div class="col-md-6">
          <label for="yourUsername" class="form-label">Confirmar Contrasena</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="clave2"  placeholder="123456" aria-label="Email" aria-describedby="basic-addon2" >
          </div>
        </div>

        <div class="col-md-12">
          <label for="yourUsername" class="form-label">Rol</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="rol" value="'.$f['rol'].'"  aria-label="Email" aria-describedby="basic-addon2" readonly >
          </div>
        </div>

        <div class="col-md-12">
          <label for="yourUsername" class="form-label">Rol</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="estado" value="'.$f['estado'].'"  aria-label="Email" aria-describedby="basic-addon2" readonly >
          </div>
        </div>

        <div class="col-12">
          <input type="submit" class="submit" value="Actualizar Informacion" name="regAdm_user">
        </div>
      </form>
      ';

  }
}

function cargarCat() {
  $objConsultas = new ConsultasUserAdmin();
  $result = $objConsultas->ConsultarCat();

  if (!$result) {
      echo "<h2>No hay categorías</h2>";
  } else {
      echo '<div class="mb-1">
            <label class="col-sm-2 col-form-label">Categoría</label>
            <div class="col-sm-10">
              <select class="form-select" name="categoria_id" aria-label="Default select example">
                <option selected>Selecciona una Categoría</option>';
      
      foreach ($result as $categoria) {
          echo '<option value="' . $categoria['categoria_id'] . '">' . $categoria['categoria_nombre'] . '</option>';
      }

      echo '    </select>
            </div>
          </div>';
  }
}

function cargarTipo() {
  $objConsultas = new ConsultasUserAdmin();
  $result = $objConsultas->ConsultarTipo();

  if (!$result) {
      echo "<h2>No hay Tipos de producto</h2>";
  } else {
      echo '<div class="mb-1">
              <label class="col-sm-2 col-form-label">Tipo de Producto</label>
              <div class="col-sm-10">
                  <select class="form-select" id="tipoProductoSelect" name="tipo_id" aria-label="Default select example">
                      <option selected>Selecciona una Categoría</option>';
      
      foreach ($result as $tipo) {
          echo '<option value="' . $tipo['tipo_id'] . '">' . $tipo['tipo_nombre'] . '</option>';
      }

      echo '        </select>
              </div>
          </div>
          <div class="mb-1" id="tallaContainer" style="display:none;">
              <label class="col-sm-2 col-form-label">Talla</label>
              <div class="col-sm-10">
                  <select class="form-select" id="tallaSelect" name="talla_id" aria-label="Default select example">
                      <option selected>Selecciona una Talla</option>
                      <option value="S">S</option>
                      <option value="M">M</option>
                      <option value="L">L</option>
                      <option value="XL">XL</option>
                  </select>
              </div>
          </div>';
  }
}


function cargarProdSelect() {
  $objConsultas = new ConsultasUserAdmin();
  $result = $objConsultas->ConsultarProd();

  if (!$result) {
      echo "<h2>No hay productos</h2>";
  } else {
      echo '<div class="mb-1">
            <label class="col-sm-2 col-form-label">Producto</label>
            <div class="col-sm-10">
              <select class="form-select" name="producto_id" aria-label="Default select example">';
      
      foreach ($result as $categoria) {
          echo '<option value="' . $categoria['producto_id'] . '">' . $categoria['producto_nombre'] . '</option>';
      }

      echo '    </select>
            </div>
          </div>';
  }
}

function cargarCatF(){

  $objConsultas= new ConsultasUserAdmin(); 
  $result = $objConsultas->ConsultarCatF();

  if(!isset($result)){
      echo"<h2>No hay usuarios</h2>";
  }else{
      foreach ($result as $f){
          echo'<tr>
          <td scope="col">'.$f['categoria_id'].'</td>
          <td scope="col">'.$f['categoria_nombre'].'</td>
          <td scope="col">'.$f['categoria_fecha'].'</td>
          <td scope="col">'.$f['categoria_usuario'].'</td>
          <td>
      <a href=""class="btn btn-primary "> Ver</a>
      <a href="editar_cat.php?categoria_id='.$f['categoria_id'].'" class="btn btn-primary ">Editar</a>
      <a href="../../Controllers/administrador/eliminarCat.php?categoria_id='.$f['categoria_id'].'" class="btn btn-primary ">Eliminar</a>
      </td>
        </tr>';
      }
  }


}



?>