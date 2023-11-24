<body>

    <h2>Squid Control Panel</h2>

    <p>Estado actual de Squid: <?php echo $squid_status; ?></p>

    <form action="<?php echo site_url('squidcontrol/startSquid'); ?>" method="post">
        <button type="submit">Encender Squid</button>
    </form>

    <form action="<?php echo site_url('squidcontrol/stopSquid'); ?>" method="post">
        <button type="submit">Apagar Squid</button>
    </form>

</body>


