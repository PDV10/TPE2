<div class="container">
       <form action="updateMusic" method="POST">
                <legend>Usted quiere modificar la cancion "{$nombre|upper}"</legend>
                <div class="mb-3">
                    <input type="hidden" name="id" value="{$id}" class="form-control">
                    <label class="form-label">Nombre de la cancion</label>
                    <input type="text" name="nombre" class="form-control" value="{$nombre}">
                    <label class="form-label">Nombre del artista</label>
                    <input type="text" name="artista" class="form-control" value="{$artista}">
                    <label class="form-label">Nombre del album</label>
                    <input type="text" name="album" class="form-control" value="{$album}">
                    <label class="form-label">año de la canion</label>
                    <input type="text" name="anio" class="form-control" value="{$anio}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Genero de la cancion</label>
                    <select class="form-select">
                        {foreach from=$genres item=$genre}
                            <option name="genre" value="{$genre->genero}">{$genre->genero}</option>
                        {/foreach}
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
</div>
