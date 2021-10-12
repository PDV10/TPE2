<div class="container modificar">
    <form action="updateMusic" method="POST">
        <legend>Usted quiere modificar la cancion "{$nombre|upper}"</legend>
            <div class="mb-3">
                <input type="hidden" name="id" value="{$id}" class="form-control">
                <div class="pt-3">
                    <label class="form-label">Nombre de la cancion</label>
                    <input type="text" name="nombre" class="form-control" value="{$nombre}">
                </div>
                <div class="pt-3">
                    <label class="form-label">Nombre del artista</label>
                    <input type="text" name="artista" class="form-control" value="{$artista}">
                </div>
                <div class="pt-3">
                    <label class="form-label">Nombre del album</label>
                    <input type="text" name="album" class="form-control" value="{$album}">
                </div>
                <div class="pt-3 w-5">
                    <label class="form-label">año de la cancion</label>
                    <input type="date" name="anio" class="form-control" value="{$anio}">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Genero de la cancion</label>
                <select name="genre" class="form-select">
                    {foreach from=$genres item=$genre}
                        <option value="{$genre->id}">{$genre->genero}</option>
                    {/foreach}
                </select>
            </div>

        <button type="submit" class="btn btn-primary">Modificar</button>
    </form>
</div>
