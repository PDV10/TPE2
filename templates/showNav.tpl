
<nav>
    <div class="container-fluid justify-content-center w-25">
        <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <a class="btn btn btn-outline-secondary" href="#" >Buscar</a>
        </form>
  </div>
    <ul class="categorie-list">
        {foreach from=$genres item=$genre }
            <li class="items-nav"><a href="categories/{$genre->id}">{$genre->genero}</a></li>
        {/foreach}
    </ul>
</nav>