<br>
<div class="container">
<div class="row">

<div class="col-md-12">

<form action="<?php echo site_url(); ?>/clientes/guardarCliente"
  method="post"
  id="frm_nuevo_cliente"
  enctype="multipart/form-data"
  >
    <br>
    <br>
    <label for="">PAÍS</label>
    <select class="form-control" name="fk_id_pais" id="fk_id_pais"
    required >
        <option value="">--Seleccione un país--</option>
        <?php if ($listadoPaises): ?>
          <?php foreach ($listadoPaises->result() as $paisTemporal): ?>
              <option value="<?php echo $paisTemporal->id_pais; ?>">
                <?php echo $paisTemporal->nombre_pais; ?>
              </option>
          <?php endforeach; ?>
        <?php endif; ?>
    </select>

    <br>
    <br>
    <label for="">IDENTIFICACIÓN</label>
    <input class="form-control"  type="number" name="identificacion_cli" id="identificacion_cli" placeholder="Por favor Ingrese la Identificacion">
    <br>
    <br>
    <label for="">APELLIDO</label>
    <input class="form-control"  type="text" name="apellido_cli" id="apellido_cli" placeholder="Por favor Ingrese el apellido">
    <br>
    <br>
    <label for="">NOMBRE</label>
    <input class="form-control"  type="text" name="nombre_cli" id="nombre_cli" placeholder="Por favor Ingrese el nombre">
    <br>
    <br>
    <label for="">TELEFONO</label>
    <input class="form-control"  type="number" name="telefono_cli" id="telefono_cli" placeholder="Por favor Ingrese el telefono">
    <br>
    <br>
    <label for="">DIRECCIÓN</label>
    <input class="form-control"  type="text" name="direccion_cli" id="direccion_cli" placeholder="Por favor Ingrese la dirección">
    <br>
    <br>
    <label for="">CORREO ELECTRÓNICO</label>
    <input class="form-control"  type="email" name="email_cli" id="email_cli" placeholder="Por favor Ingrese el correo">
    <br>
    <br>
    <label for="">ESTADO</label>
    <select class="form-control" name="estado_cli" id="estado_cli">
        <option value="">--Seleccione--</option>
        <option value="ACTIVO">ACTIVO</option>
        <option value="INACTIVO">INACTIVO</option>
    </select>
    <br>
    <br>
    <label for="">FOTOGRAFIA</label>
    <input type="file" name="foto_cli"
    accept="image/*"
    id="foto_cli"  value="" >
    <br>
    <br>
    <button type="submit" name="button" class="btn btn-primary">
      GUARDAR
    </button>
    &nbsp;&nbsp;&nbsp;
    <a href="<?php echo site_url(); ?>/clientes/index"
      class="btn btn-warning">
      <i class="fa fa-times"> </i>
      CANCELAR
    </a>

</form>
</div>
</div>
</div>
<script type="text/javascript">
    $("#frm_nuevo_cliente").validate({
      rules:{
        fk_id_pais:{
          required:true
        },
        identificacion_cli:{
          required:true,
          minlength:10,
          maxlength:10,
          digits:true
        },
        apellido_cli:{
          letras:true,
          required:true
        }
      },
      messages:{
        fk_id_pais:{
          required:"Por favor seleccione el pais"
        },
        identificacion_cli:{
          required:"Por favor ingrese el número de cédula",
          minlength:"La cédula debe tener mínimo 10 digitos",
          maxlength:"La cédula debe tener máximo 10 digitos",
          digits:"La cédula solo acepta números"
        },
        apellido_cli:{
          letras:"Apellido Incorrecto",
          required:"Por favor ingrese el apellido"
        }
      }
    });
</script>

<script type="text/javascript">
      $("#foto_cli").fileinput({
        allowedFileExtensions:["jpeg","jpg","png"],
        dropZoneEnabled:true
      });
</script>









<!--  -->
