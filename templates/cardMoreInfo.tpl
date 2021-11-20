<div class="container d-flex justify-content-md-center align-items-center">
  
    <div class="card shadow-lg p-3 mb-5 bg-body rounded justify-content-md-center align-items-center" style="width: 32rem;">
        <form class="input-group mb-3" action="comentarios">
          <input class="form-control m-3 d-flex text-center" type="text" placeholder="Publica un comentario" name="comentarios">
          <select class="form-select" name="puntajeComentarios" id="">
            {foreach from=$puntajes item=$puntaje}
                <option value="{$puntaje}">{$puntaje}</option>
            {/foreach}

          </select>
          <button class="btn btn-outline-secondary">Enviar</button>
        </form>
        <img src="{$imagen}" class="card-img-top imgInfoMusic" alt="{$artista}">
        <div class="card-body">
              <h5 class="card-title">{$cancion}</h5> </div>
          <ul class="list-group bg-info list-group-flush">
              <li class="list-group-item items-info">Artista: {$artista}</li>
              <li class="list-group-item items-info">Album: {$album}</li>
              <li class="list-group-item items-info">Año: {$anio}</li>
              <li class="list-group-item items-info">Genero: {$genero}</li>
          </ul>
          
          <div class="card-body ">
            <a href="home" class="card-link btn btn-outline-info">Home</a>
            <a href="categories/{$id_genero}" class="card-link btn btn-outline-info">Volver</a>
          </div>
<<<<<<< HEAD

          <div>
            <form action="api/comentario">
              <input type="text" name="comentario">
              <select name="puntaje">
                {foreach from=$puntajes item=$puntaje}
                    <option value="{$puntaje->}"></option>
                {/foreach}
              </select>
              <input type="button" value="">
            </form>
          </div>



  </div>
=======
          
         {include file="templates/vue/comentarios.tpl"}
          
    </div>
>>>>>>> pato
</div>
