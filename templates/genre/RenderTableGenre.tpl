<div class="container d-flex-colum">
    <form action="addGenre" method="POST" class="d-flex" >
        <input type="text" name="newGenre" class="form-control w-25 m-2" placeholder="Ingrese un nuevo genero">
        <button type="submit" class="btn bg-info m-2 align-items-center ">Agregar</button>
    </form>
    <table class="table table-dark table-striped text-center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Genero</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
                {foreach from=$genres item=$genre}
                    <tr class="fila">
                        <td class="table-dark ">{$genre->id|truncate:20}</td>
                        <td class="table-dark ">{$genre->genero|truncate:20}</td>
                        <td class="table-dark w-25 ps-3"><a href="deleteGenre/{$genre->id}" class="btn bg-danger me-2">X</a><a href="RenderUpdateGenre/{$genre->id}" class="btn bg-warning me-2">modificar</a></td>
                    </tr>
                {/foreach}
        </tbody>
    </table>
</div>