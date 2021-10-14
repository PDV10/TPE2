{include file="templates/showHeader.tpl"}
{include file="templates/showNav.tpl"}
{include file="templates/showModal.tpl"}
{include file="templates/formFiltro.tpl"}
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
                    {foreach from=$musicForGenre item=$music}
                        <tr class="fila">
                            <td class="table-dark ">{$music->nombreCancion|truncate:20}</td>
                            <td class="table-dark ">{$music->artista|truncate:20}</td>
                            <td class="table-dark ">{$music->album|truncate:20}</td>
                            <td class="table-dark ">{$music->genero}</td>
                            <td class="table-dark w-100 d-flex justify-content-evenly">
                            {if isset($smarty.session.USER_ID)}
                                <a href="addFav/{$music->id_musica}" class="corazon">💜</a>
                                <a href="delete/{$music->id_musica}" class="btn bg-danger">X</a>
                                <a href="update/{$music->id_musica}" class="btn bg-warning">modificar</a>
                            {/if}
                                <a href="verMas/{$music->id_musica}" class="btn btn-primary">Ver mas</a>
                            </td>
                        </tr>
                    {/foreach}
            </tbody>
        </table>
    </div>
{include file="templates/audio.tpl"}
{include file="templates/showFooter.tpl"}