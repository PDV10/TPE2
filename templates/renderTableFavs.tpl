
<h1 class="text-center text-light favoritos">💚 Favoritos 💚</h1> 
<div class="container mt-4" id="global">
    
    <table class="table table-dark table-striped text-center">
        <thead>
            <tr>
                <th>nombre</th>
                <th>artista</th>
                <th>album</th>
                <th>genero</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
                {foreach from=$songs item=$music}
                        <tr class="fila">
                        <td class="table-dark tdForm">{$music->nombreCancion|truncate:20}</td>
                        <td class="table-dark tdForm">{$music->artista|truncate:20}</td>
                        <td class="table-dark tdForm">{$music->album|truncate:20}</td>
                        <td class="table-dark tdForm">{$music->genero}</td>
                        <td class="table-dark d-flex justify-content-between tdForm">
                            <div class="w-75 p-3 d-flex justify-content-around">
                            {if isset($smarty.session.USER_ID)}
                                <form action="changeValueFav" method="POST">
                                    {if isset($genero)}
                                        <input type="hidden" name="genero" value="{$genero}">
                                    {/if} 
                                        <input type="hidden" name="musica" value="{$music->id_musica}">
                                        <button class="corazon">💚</button>
                                </form>
                                    <a href="delete/{$music->id_musica}" class="btn bg-danger">X</a>
                                    <a href="update/{$music->id_musica}" class="btn bg-warning">modificar</a>
                            {/if}
                                <a href="verMas/{$music->id_musica}" class="btn btn-primary">Ver mas</a>
                            </div>
                        </td>
                    </tr>
                {/foreach}
        </tbody>
    </table>
</div>