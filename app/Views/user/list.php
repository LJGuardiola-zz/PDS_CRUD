<?= $this->extend('templates\main') ?>

<?= $this->section('content') ?>

<div class="uk-card uk-card-default">
    <div class="uk-card-header uk-flex uk-flex-between uk-flex-middle">
        <h3 class="uk-card-title" style="margin: 0">Listado de usuarios</h3>
        <a href="<?= site_url('users/new') ?>" class="uk-button uk-button-primary">Nuevo</a>
    </div>
    <div class="uk-card-body">
        <table class="uk-table uk-table-small uk-table-striped uk-table-middle">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de usuario</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->username ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->role_name ?></td>
                    <td>
                        <a href="<?= site_url("users/$user->id") ?>" class="uk-icon-button" uk-icon="icon: arrow-right" uk-tooltip="title: Ver detalle"></a>
                        <a onclick="remove(<?= $user->id ?>, '<?= $user->username ?>')" class="uk-icon-button" uk-icon="icon: trash" uk-tooltip="title: Eliminar"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="uk-card-footer">
        <?= $pager->links() ?>
    </div>
</div>

<div id="modal-confirm-delete" uk-modal>
    <div class="uk-modal-dialog uk-margin-auto-vertical">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Cuidado!</h2>
        </div>
        <div class="uk-modal-body">
            <p>¿Seguro desea eliminar a <b id="confirm-delete-name"></b>?</p>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
            <button id="confirmed-deletion" class="uk-button uk-button-danger" type="button">Eliminar</button>
        </div>
    </div>
</div>

<form id="deleteForm" action="" method="post">
    <input type="hidden" name="_method" value="DELETE" />
</form>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        const remove = (id, name) => {
            document.getElementById('confirm-delete-name').textContent = name;
            UIkit.modal(
                document.getElementById('modal-confirm-delete')
            ).show().then(() => {
                document.getElementById('confirmed-deletion').addEventListener('click', ev => {
                    const deleteForm = document.getElementById('deleteForm');
                    deleteForm.setAttribute('action', '/users/' + id);
                    deleteForm.submit();
                })
            });
        }
    </script>
<?= $this->endSection() ?>
