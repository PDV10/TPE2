{literal}
    <div id="cajaComentarios" class="">
        <ul class="list-group list-group-flush"></ul>
            {foreach from=$coments item=$coment}
            <li class="list-group-item">{$coment} <span>{$coment}</span> <button class="btn btn-danger">X</button> </li>
            {/foreach}
        </ul>
    </div>
{/literal}
