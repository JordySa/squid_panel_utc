<div>
    <h2>Panel de Control de Páginas Permitidas</h2>
    
    <!-- Formulario para agregar página permitida -->
    <?php echo form_open('pages/agregarACL'); ?>
    <label for="url_agregar">Agregar Página Permitida:</label>
    <input type="text" name="url_allowed" id="url_allowed" required>
    <button type="submit">Agregar</button>
    <?php echo form_close(); ?>

    <br>