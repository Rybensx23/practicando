<h1 class="text-center">Asignacion de permisos</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 bg-ñight p-3" id="formularioPermiso">
        <input type="hidden" name="permiso_id" id="permiso_id">

        <div class="row mb-3">
            <div class="col">
                <label for="permiso_usuario">Usuario</label>
                <select name="permiso_usuario" id="permiso_usuario" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php foreach($usuarios as $usuario) : ?>
                        <option value="<?= $usuario['usuario_id'] ?>"><?= $usuario['usuario_nombre'] ?></option>
                        <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="permiso_rol">Asignar Rol</label>
                <select name="permiso_rol" id="permiso_rol" class="form-control">
                    <option value="">Seleccione...</option>
                    <?php foreach($roles as $rol) : ?>
                        <option value="<?= $rol['rol_id'] ?>"><?= $rol['rol_nombre'] ?></option>
                        <?php endforeach ?>
                </select>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioPermiso" id="btnGuardar" data-saludo="hola" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btndanger w-100">Cancelar</button>
            </div>
        </div>

    </form>

    <h1>Tabla de Permisos</h1>
    <div class="row justify-content-center">
        <div class="col table-responsive">
            <table id="tablaPermisos" class="table table-bordedred table-hover">
            </table>
        </div>
    </div>
</div>

<script src="<?= asset('./build/js/permiso/index.js') ?>"></script>