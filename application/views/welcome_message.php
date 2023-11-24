<!-- application/views/squid_control_panel.php -->

<body>

    <h2>Squid Control Panel</h2>

    <p>Estado actual de Squid: <?php echo $squid_status; ?></p>

    <form action="<?php echo site_url('welcome/startSquid'); ?>" method="post">
        <button type="submit">Encender Squid</button>
    </form>
    <form action="<?php echo site_url('welcome/restartSquid'); ?>" method="post">
        <button type="submit">Reiniciar Squid</button>
    </form>
    <form action="<?php echo site_url('welcome/stopSquid'); ?>" method="post">
        <button type="submit">Apagar Squid</button>
    </form>

</body>