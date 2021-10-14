<div class="container">
    <form action="updateGenre" method="POST" class="d-flex" >
        <input type="hidden" name="id" value="{$genre->id}">
        <input type="text" name="newGenre" value ="{$genre->genero}" class="form-control w-25 m-2">
        <button type="submit" class="btn bg-info m-2 align-items-center ">Agregar</button>
    </form>
</div>