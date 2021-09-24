<?= $this->extend('templates\main') ?>

<?= $this->section('content') ?>

<div class="uk-card uk-card-default">
    <div class="uk-card-header">
        <h3 class="uk-card-title">Detalle de un usuario</h3>
    </div>
    <div class="uk-card-body">
        <form class="uk-form-horizontal uk-margin-large">

            <div class="uk-margin">
                <label class="uk-form-label" for="first_name">Nombre</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="first_name" type="text" value="<?= $user->first_name ?>" disabled>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="last_name">Apellido</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="last_name" type="text" value="<?= $user->last_name ?>" disabled>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="username">Nombre de usuario</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="username" type="text" value="<?= $user->username ?>" disabled>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="email">Email</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="email" type="email" value="<?= $user->email ?>" disabled>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="role">Rol</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="role" type="text" value="<?= $user->role_name ?>" disabled>
                </div>
            </div>

        </form>
    </div>
    <div class="uk-card-footer">
        <a href="<?= site_url('users') ?>" class="uk-button uk-button-default">Volver</a>
        <a href="<?= site_url('users/'. $user->id .'/edit') ?>" class="uk-button uk-button-primary uk-align-right">Editar</a>
    </div>
</div>

<?= $this->endSection() ?>