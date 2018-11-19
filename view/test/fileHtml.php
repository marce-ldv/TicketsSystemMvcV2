<?php include URL_VIEW . "navbar.php" ?>

<h1>sadas</h1>


<form action="<?= FRONT_VIEW ?>/file/upload2/" method="post">

    <div class="form-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="profilePicture">
        <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
    </div>
    </div>

<input type="submit" value="Registrarse" class="btn btn-outline-light btn-block">
</form>