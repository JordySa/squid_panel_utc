<br>
<center>
  <h2>LISTADO DE USUARIOS</h2>
</center>
<hr>
<br>
<center>
    <a href="<?php echo site_url(); ?>/users/nuevo" class="btn btn-primary">
      <i class="fa fa-plus-circle"></i>
      Agregar Nuevo
    </a>
</center>

<?php if ($listadoUsers): ?>
  <table class="table" id="tbl-users">
        <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">USERNAME</th>
              <th class="text-center">PASSWORD</th>
              <th class="text-center">EMAIL</th>
              <th class="text-center">ESTADO</th>
              <th class="text-center">FECHA CREACION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listadoUsers->result()
            as $filaTemporal): ?>
                  <tr>
                    <td class="text-center">
                      <?php echo $filaTemporal->id; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $filaTemporal->username; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $filaTemporal->password_use; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $filaTemporal->email; ?>
                    </td>

                    <td class="text-center">
                      <?php if ($filaTemporal->is_verified=="1"): ?>
                        <div class="alert alert-success">
                          <?php echo $filaTemporal->is_verified; ?>
                        </div>
                      <?php else: ?>
                        <div class="alert alert-danger">
                          <?php echo $filaTemporal->is_verified; ?>
                        </div>
                      <?php endif; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $filaTemporal->created_at; ?>
                    </td>
                    <td class="text-center">
                        <a href="<?php echo site_url(); ?>/users/editar/<?php echo $filaTemporal->id; ?>" class="btn btn-warning">
                          <i class="fa fa-pen"></i>
                        </a>
                          <a href="javascript:void(0)"
                           onclick="confirmarEliminacion('<?php echo $filaTemporal->id; ?>');"
                           class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                          </a>

                    </td>
                  </tr>
            <?php endforeach; ?>
        </tbody>
  </table>
<?php else: ?>
<div class="alert alert-danger">
    <h3>No se encontraron usuarios registrados</h3>
</div>
<?php endif; ?>

<script type="text/javascript">
    function confirmarEliminacion(id){
          iziToast.question({
              timeout: 20000,
              close: false,
              overlay: true,
              displayMode: 'once',
              id: 'question',
              zindex: 999,
              title: 'CONFIRMACIÓN',
              message: '¿Esta seguro de eliminar el usuario de forma pernante?',
              position: 'center',
              buttons: [
                  ['<button><b>SI</b></button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                      window.location.href=
                      "<?php echo site_url(); ?>/users/procesarEliminacion/"+id;

                  }, true],
                  ['<button>NO</button>', function (instance, toast) {

                      instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                  }],
              ]
          });
    }
</script>

<script type="text/javascript">
    //Deber incorporar botones de EXPORTACION
    $("#tbl-users").DataTable();
</script>










<!--  -->
