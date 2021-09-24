<?= $this->extend('templates\main') ?>

<?= $this->section('content') ?>
<?php $errors = session('errors') !== null ? session('errors') : [] ?>
<div class="uk-card uk-card-default">
    <div class="uk-card-header">
        <h3 class="uk-card-title">Crear un usuario</h3>
    </div>
    <div class="uk-card-body">
        <form id="create-form" method="post" action="<?= site_url('users') ?>" class="uk-form-horizontal uk-margin-large">

            <div class="uk-margin">
                <label class="uk-form-label" for="first_name">Nombre</label>
                <div class="uk-form-controls">
                    <input class="uk-input <?= isset($errors['first_name']) ? 'uk-form-danger' : '' ?>" id="first_name" name="first_name" type="text" value="<?= old('first_name') ?>">
                    <?php if (isset($errors['first_name'])): ?>
                        <span class="uk-label uk-label-danger"><?= $errors['first_name'] ?></span>
                    <?php endif ?>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="last_name">Apellido</label>
                <div class="uk-form-controls">
                    <input class="uk-input <?= isset($errors['last_name']) ? 'uk-form-danger' : '' ?>" id="last_name" name="last_name" type="text" value="<?= old('last_name') ?>">
                    <?php if (isset($errors['last_name'])): ?>
                        <span class="uk-label uk-label-danger"><?= $errors['last_name'] ?></span>
                    <?php endif ?>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="username">Nombre de usuario</label>
                <div class="uk-form-controls">
                    <input class="uk-input <?= isset($errors['username']) ? 'uk-form-danger' : '' ?>" id="username" name="username" type="text" value="<?= old('username') ?>">
                    <?php if (isset($errors['username'])): ?>
                        <span class="uk-label uk-label-danger"><?= $errors['username'] ?></span>
                    <?php endif ?>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="email">Email</label>
                <div class="uk-form-controls">
                    <input class="uk-input <?= isset($errors['email']) ? 'uk-form-danger' : '' ?>" id="email" name="email" type="email" value="<?= old('email') ?>">
                    <?php if (isset($errors['email'])): ?>
                        <span class="uk-label uk-label-danger"><?= $errors['email'] ?></span>
                    <?php endif ?>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="password">Contraseña</label>
                <div class="uk-form-controls">
                    <input class="uk-input <?= isset($errors['password']) ? 'uk-form-danger' : '' ?>" id="password" name="password" type="password">
                    <?php if (isset($errors['password'])): ?>
                        <span class="uk-label uk-label-danger"><?= $errors['password'] ?></span>
                    <?php endif ?>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="role">Rol</label>
                <div class="uk-form-controls">
                    <select class="uk-select <?= isset($errors['role_id']) ? 'uk-form-danger' : '' ?>" id="role" name="role">
                        <option>Seleccione un rol</option>
                        <?php foreach ($roles as $role): ?>
                            <option value="<?= $role->id ?>" <?= old('role') == $role->id ? 'selected' : '' ?>>
                                <?= $role->name ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <?php if (isset($errors['role_id'])): ?>
                        <span class="uk-label uk-label-danger"><?= $errors['role_id'] ?></span>
                    <?php endif ?>
                </div>
            </div>

        </form>
    </div>
    <div class="uk-card-footer">
        <a href="<?= site_url('users') ?>" class="uk-button uk-button-default">Cancelar</a>
        <a onclick="document.getElementById('create-form').submit()" class="uk-button uk-button-primary uk-align-right">Guardar</a>
    </div>
</div>

<?= $this->endSection() ?>

