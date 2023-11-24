
    <!-- Formulario para quitar página permitida -->
    <?php echo form_open('pages/quitarACL'); ?>
    <label for="url_quitar">Quitar Página Permitida:</label>
    <input type="text" name="url_blocked" id="url_blocked" required>
    <button type="submit">Quitar</button>
    <?php echo form_close(); ?>
</div>