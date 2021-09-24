<?php helper('html') ?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta name="charset" content="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>CRUD - Proyecto de Software</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?= link_tag('css/uikit.min.css') ?>

    <?= $this->renderSection('styles') ?>

</head>

<body>

<div class="uk-container">
    <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
        <nav class="uk-navbar" uk-navbar style="position: relative; z-index: 980;">
            <div class="uk-navbar-left">

                <a class="uk-navbar-item uk-logo" href="<?= site_url() ?>">UNRN</a>

                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href="<?= site_url('users') ?>">Usuarios</a></li>
                </ul>

            </div>
        </nav>
    </div>
    <?= $this->renderSection('content') ?>
</div>

<?= script_tag('js/uikit.min.js') ?>
<?= script_tag('js/uikit-icons.min.js') ?>
<?= $this->renderSection('scripts') ?>
<?php if (session('notify')) : ?>
<script>
    UIkit.notification({
        message: "<?= session('notify')['message'] ?>",
        status: "<?= session('notify')['type'] ?>",
        pos: 'bottom-center'
    });
</script>
<?php endif ?>
</body>
</html>