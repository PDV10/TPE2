{include file="templates/showHeader.tpl"}
{include file="templates/showModalLogin.tpl"}
{include file="templates/showModalRegister.tpl"}


<table class="table table-dark table-striped text-center">
    <thead class="position-sticky top-0">
        <tr>
            <th>Id Usuario</th>
            <th>nombre</th>
            <th>administrar</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$allUsers item=$usuario}
            {if $usuario->usuario != $smarty.session.USER_EMAIL}
                <tr class="fila">
                    <td class="table-dark tdForm" >{$usuario->id_usuario}</td>
                    <td class="table-dark tdForm">{$usuario->usuario}</td>
                    <td class="table-dark tdForm">
                        <a href="deleteuser/{$usuario->id_usuario}" class="btn btn-danger">Eliminar usuario</a>
                        <a href="makeadmin/{$usuario->id_usuario}" class="btn btn-primary">Hacer admin</a>  <!-- (>‿◠)✌ -->
                    </td>
                </tr>
            {/if}
        {/foreach}
    </tbody>
</table>






{include file="templates/showFooter.tpl"}