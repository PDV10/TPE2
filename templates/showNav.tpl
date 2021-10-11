<nav>
    <ul class="categorie-list">
        {foreach from=$genres item=$genre }
            <li class="items-nav"><a href="categories/{$genre->id}">{$genre->genero}</a></li>
        {/foreach}
    </ul>
</nav>