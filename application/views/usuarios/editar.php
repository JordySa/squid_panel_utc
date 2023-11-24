
<br>
<div class="container">
<div class="row">

<div class="col-md-12">

<form
action="<?php echo site_url(); ?>/usuarios/actualizarUsuarioAjax"
  method="post"
  >
  <input type="hidden" name="id_user" id="id_user"
   value="<?php echo $usuario->id_user; ?>">
    <br>
    <br>
    <label for="">USERNAME</label>
    <input class="form-control"
    value="<?php echo $usuario->username_user ?>"
    type="text" name="username_user"
    id="username_user"
    placeholder="" disable>
    <br>
    <br>
    <label for="">PASSWORD</label>
    <input class="form-control"
    value="<?php echo $usuario->password_user ?>"
    type="text" name="password_user"
    id="password_user"
    placeholder="" disable>
    <br>
    <br>
    <label for="">NOMBRE</label>
    <input class="form-control"
    value="<?php echo $usuario->first_name_user; ?>"
    type="text" name="first_name_user"
    id="first_name_user"
    placeholder="" disable>
    <br>
    <br>
        <label for="">APELLIDO</label>
    <input class="form-control"
    value="<?php echo $usuario->last_name_user; ?>"
    type="text" name="last_name_user"
    id="last_name_user"
    placeholder="" disable>
    <br>
    <br>
    <label for="">CORREO ELECTRÓNICO</label>
    <input class="form-control" value="<?php echo $usuario->email_user; ?>"    type="email" name="email_user" id="email_user" placeholder="Por favor Ingrese el correo" disable>
    <br>
    <br>
    <label for="">ROL</label>
    <select class="form-control" name="role_user" id="role_user">
        <option value="">--Seleccione--</option>
        <option value="admin">ADMINISTRADOR</option>
        <option value="user">USUARIO</option>
    </select>
    <br>
    <label for="">ESTADO</label>
    <select class="form-control" name="is_approved_user" id="is_approved_user">
        <option value="">--Seleccione--</option>
        <option value="1">ACTIVO</option>
        <option value="0">INACTIVO</option>
    </select>
    <br>
    <button type="submit" name="button" class="btn btn-primary">
      GUARDAR
    </button>
    &nbsp;&nbsp;&nbsp;
    <a href="<?php echo site_url(); ?>/usuarios/index"
      class="btn btn-warning">
      <i class="fa fa-times"> </i> CANCELAR
    </a>

</form>
</div>
</div>
</div>

<script type="text/javascript">
   //Activando  el pais seleccionado para el cliente
   $("#role_user")
   .val("<?php echo $usuario->role_user; ?>");
   $("#is_approved_user")
   .val("<?php echo $usuario->is_approved_user; ?>");


</script>


