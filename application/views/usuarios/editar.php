<br>
<div class="container">
<div class="row">

<div class="col-md-12">

<form
action="<?php echo site_url(); ?>/users/procesarActualizacion"
  method="post"
  >
  <input type="hidden" name="id" id="id"
   value="<?php echo $user->id; ?>">
    <br>
    <br>
    <th class="text-center">ID</th>
              <th class="text-center">USERNAME</th>
              <th class="text-center">PASSWORD</th>
              <th class="text-center">EMAIL</th>
              <th class="text-center">ESTADO</th>
              <th class="text-center">FECHA CREACION</th>
    <br>
    <br>
    <label for="">USERNAME</label>
    <input class="form-control"
    value="<?php echo $user->username; ?>"
    type="text" name="username"
    id="username"
    placeholder="Por favor Ingrese el usuario">
    <br>
    <br>
    <label for="">APELLIDO</label>
    <input class="form-control"
    value="<?php echo $cliente->apellido_cli; ?>"
    type="text" name="apellido_cli"
    id="apellido_cli"
    placeholder="Por favor Ingrese el apellido">
    <br>
    <br>
    <label for="">NOMBRE</label>
    <input class="form-control" value="<?php echo $cliente->nombre_cli; ?>"   type="text" name="nombre_cli" id="nombre_cli" placeholder="Por favor Ingrese el nombre">
    <br>
    <br>
    <label for="">TELEFONO</label>
    <input class="form-control" value="<?php echo $cliente->telefono_cli; ?>"    type="number" name="telefono_cli" id="telefono_cli" placeholder="Por favor Ingrese el telefono">
    <br>
    <br>
    <label for="">DIRECCIÓN</label>
    <input class="form-control" value="<?php echo $cliente->direccion_cli; ?>"    type="text" name="direccion_cli" id="direccion_cli" placeholder="Por favor Ingrese la dirección">
    <br>
    <br>
    <label for="">CORREO ELECTRÓNICO</label>
    <input class="form-control" value="<?php echo $cliente->email_cli; ?>"    type="email" name="email_cli" id="email_cli" placeholder="Por favor Ingrese el correo">
    <br>
    <br>
    <label for="">ESTADO</label>
    <select class="form-control" name="estado_cli" id="estado_cli">
        <option value="">--Seleccione--</option>
        <option value="ACTIVO">ACTIVO</option>
        <option value="INACTIVO">INACTIVO</option>
    </select>
    <br>
    <button type="submit" name="button" class="btn btn-primary">
      GUARDAR
    </button>
    &nbsp;&nbsp;&nbsp;
    <a href="<?php echo site_url(); ?>/clientes/index"
      class="btn btn-warning">
      <i class="fa fa-times"> </i> CANCELAR
    </a>

</form>
</div>
</div>
</div>

<script type="text/javascript">
   //Activando  el pais seleccionado para el cliente
   $("#fk_id_pais")
   .val("<?php echo $cliente->fk_id_pais; ?>");

   $("#estado_cli")
   .val("<?php echo $cliente->estado_cli; ?>");

</script>
