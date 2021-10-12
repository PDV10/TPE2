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
                <th>año</th>
                {if isset($smarty.session.USER_ID)}
                <th>acciones</th>
                {/if}
            </tr>
        </thead>
        <tbody>
                {foreach from=$musicForGenre item=$music}
                    <tr class="fila">
                        <td class="table-dark ">{$music->nombreCancion}</td>
                        <td class="table-dark ">{$music->artista}</td>
                        <td class="table-dark ">{$music->album}</td>
                        <td class="table-dark ">{$music->anio}</td>
                        {if isset($smarty.session.USER_ID)}
                            <td class="table-dark w-25 ps-3"><a href="addFav/{$music->id_musica}" class="me-2 corazon">💜</a><a href="delete/{$music->id_musica}" class="btn bg-danger me-2">X</a><a href="update/{$music->id_musica}" class="btn bg-warning">modificar</a></td>
                        {/if}
                    </tr>
                {/foreach}
        </tbody>
    </table>
</div>
{include file="templates/showFooter.tpl"}