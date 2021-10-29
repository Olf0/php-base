{include file="common/header.tpl"}


<div class="container" style="margin-top: 16px;">

    {if $mensaje}
    <div class="alert alert-{$mensaje.type} alert-dismissible" role="alert">{$mensaje.text}
        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    {/if}


    <form action="crear" method="post">
        <div class="form-group">
          <label for="inputNombre">Nombre</label>
          <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>


</div>



</body>
</html>