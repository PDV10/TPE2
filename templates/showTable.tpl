{include file="templates/showHeader.tpl"}
{include file="templates/showNav.tpl"}
{include file="templates/showModal.tpl"}

    <div class="container-fluid justify-content-center w-50 mt-4 d-flex">
        <form action="filtro" class="d-flex w-50">
            <input type="hidden" name="id" value="{$id}">
            <input class="form-control me-2" name="filtro" type="search" placeholder="Search">
            <button type="submit" class="btn btn-secondary" >Buscar</button>
        </form>
        {if isset($smarty.session.USER_ID)}
            <a href="showFormAddSong" class="btn btn-secondary ms-1" >Agregar</a>
        {/if}
    </div>
    <div class="container mt-4" id="global">
        <table class="table table-dark table-striped text-center">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>artista</th>
                    <th>album</th>
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>
                    {foreach from=$musicForGenre item=$music}
                        <tr class="fila">
                            <td class="table-dark ">{$music->nombreCancion}</td>
                            <td class="table-dark ">{$music->artista}</td>
                            <td class="table-dark ">{$music->album}</td>
                            <td class="table-dark w-25 ps-3">
                            {if isset($smarty.session.USER_ID)}
                                <a href="addFav/{$music->id_musica}" class="me-2 corazon">💜</a><a href="delete/{$music->id_musica}" class="btn bg-danger me-2">X</a><a href="update/{$music->id_musica}" class="btn bg-warning">modificar</a>
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