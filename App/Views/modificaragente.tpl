{include file="common/header.tpl"}


<div class="container" style="margin-top: 16px;">

    {if $mensaje}
    <div class="alert alert-{$mensaje.type} alert-dismissible" role="alert">{$mensaje.text}
        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    {/if}
    
    <div class="panel panel-primary">
        <div class="panel-heading">{$data.Nombre}</div>
        <div class="panel-body">
            <form action="../agentes/editar" method="post">
                {foreach from=$data item=value key=key}
                <div class="form-group row" style="margin-right: 0px;">
                    <label for="staticEmail" class="col-md-3 col-form-label">{$key}</label>
                    <input type="text" class="form-control-plaintext col-md-9" id="staticEmail" 
                    name="{$key}" {if $key eq "Nº de legajo"}readonly{/if} value="{$value}">
                </div>
                {/foreach}
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </div>

</div>



</body>
</html>