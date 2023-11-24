<br>
<center>
  <h2>LISTADO DE USUARIOS</h2>
</center>
<hr>
<br>

<?php if ($listadoUsuarios): ?>
  <table class="table" id="tbl-usuarios">
        <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">USERNAME</th>
              <th class="text-center">PASSWORD</th>
              <th class="text-center">EMAIL</th>
              <th class="text-center">NOMBRE</th>
              <th class="text-center">APELLIDO</th>
              <th class="text-center">ROL</th>
              <th class="text-center">ESTADO</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listadoUsuarios->result()
            as $filaTemporal): ?>
                  <tr>
                    <td class="text-center">
                      <?php echo $filaTemporal->id_user; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $filaTemporal->username_user; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $filaTemporal->password_user; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $filaTemporal->email_user; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $filaTemporal->first_name_user; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $filaTemporal->last_name_user; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $filaTemporal->role_user; ?>
                    </td>
                    <td class="text-center">
                      <?php if ($filaTemporal->is_approved_user=="1"): ?>
                        <div class="alert alert-success">
                          <?php echo $filaTemporal->is_approved_user; ?>
                        </div>
                      <?php else: ?>
                        <div class="alert alert-danger">
                          <?php echo $filaTemporal->is_approved_user; ?>
                        </div>
                      <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <a href="<?php echo site_url(); ?>/usuarios/editar/<?php echo $filaTemporal->id_user; ?>" class="btn btn-warning">
                          <i class="fa fa-pen"></i>
                        </a>

                          <a href="javascript:void(0)"
                           onclick="confirmarEliminacion('<?php echo $filaTemporal->id_user; ?>');"
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
        No se encontraron Usuarios Registrados
    </div>
<?php endif; ?>
<script type="text/javascript">
  function eliminarUsuario(id_usu){

    iziToast.question({
    timeout: 20000,
    close: false,
    overlay: true,
    displayMode: 'once',
    id: 'question',
    zindex: 999,
    title: 'Hey',
    message: 'Are you sure about that?',
    position: 'center',
    buttons: [
                ['<button><b>YES</b></button>', function (instance, toast) {

                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    $.ajax({
                        url:"<?php echo site_url('usuarios/eliminarUsuario'); ?>",
                        type:"post",
                        data:{"id_usu":id_usu},
                        success:function(data){
                          cargarListadoUsuarios();
                          alert(data);
                        }
                    });

                }, true],
                ['<button>NO</button>', function (instance, toast) {

                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                }],
            ],
            onClosing: function(instance, toast, closedBy){
                console.info('Closing | closedBy: ' + closedBy);
            },
            onClosed: function(instance, toast, closedBy){
                console.info('Closed | closedBy: ' + closedBy);
            }
        });


  }
</script>

<script type="text/javascript">
    //Deber incorporar botones de EXPORTACION
    $("#tbl-usuarios").DataTable();
</script>