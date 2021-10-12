{include file="templates/showHeader.tpl"}
{include file="templates/showNav.tpl"}
{include file="templates/showModal.tpl"}
<<<<<<< HEAD
<div class="container-fluid justify-content-center w-25 mt-4">
    <form action="filtro" class="d-flex">
        <input type="hidden" name="id" value="{$id}">
        <input class="form-control me-2" name="filtro" type="search" placeholder="Search">
        <button type="submit" class="btn btn-secondary" >Buscar</button>
    </form>
</div>
=======
{include file="templates/formFiltro.tpl"}
>>>>>>> bac856cc57f7bb84d7b19c81c2c2b8c9c7f8013e

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