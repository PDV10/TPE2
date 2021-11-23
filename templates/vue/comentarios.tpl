    
    {literal}
   
        <div class="d-flex flex-column w-100" id="cajaComentarios">
            <button v-on:click="order('ASC')" class="btn btn-outline-primary text-center fs-5">⬆️</button>
                
                <div v-if="coments != ''" class="ScrollComentarios">
                    <ul v-for="coment in coments" class="mt-5 list-group list-group-horizontal">
                        <li class="list-group-item list-group-item-action d-flex justify-content-between w-75 ms-5">{{coment.comentario}} <span class="spanComentario"> {{coment.puntaje}}</span> 
                    {/literal}

                    {if isset($smarty.session.USER_PERMISSIONS) && $smarty.session.USER_PERMISSIONS == 1}
                        
                        {literal}
                            <li class="list-group-item">
                                <button class="badge bg-danger rounded-pill" v-on:click="eliminar(coment.id_comentarios)" class="btn btn-danger btnEliminar">X</button> </li>        
                            </li>
                        {/literal}

                    {/if}
                    
                    {literal}

                    </ul>
                </div>
                <div v-else >
                    <p> no hay comentarios en esta cancion </p>
                </div>
            
            
            <button v-on:click="order('DESC')" class="btn btn-outline-primary fs-5">⬇️</button>
        </div>
    {/literal}