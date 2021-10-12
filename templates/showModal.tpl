<div class="modal fade bg-secondary.bg-gradient" id="exampleModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="login" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Usuario:</label>
            <input type="text" name="user" class="form-control">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Contraseña:</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
