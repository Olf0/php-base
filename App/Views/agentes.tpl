{include file="common/header.tpl"}

<div class="container">

    {if $mensaje}
    <div class="alert alert-{$mensaje.type} alert-dismissible" role="alert">{$mensaje.text}
        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    {/if}
    
    <div class="row">
      <div class="col-xs-6"><h2>Lista de Agentes</h2></div>
      <div class="col-auto text-right" style="margin-top: 15px; margin-right: 15px;">
          <a type="button" class="btn btn-rounded btn-success" href="{$base}agentes/crear">
          <i class="fa fa-plus" aria-hidden="true"></i> Agregar Agente</a>
          
          <a type="button" class="btn btn-rounded btn-warning" target="_blank" href="{$base}agentes?export=pdf">
          <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Exportar a PDF</a>
      </div>
    </div>

    <form action="agentes" method="GET">
      <div class="form-group has-feedback has-search">
        <span class="glyphicon glyphicon-search form-control-feedback"></span>
        <input type="text" class="form-control" placeholder="Buscar por Nombre, DNI o Legajo"
          id="buscar" name="buscar" value={$filtros.buscar}>
      </div>
    </form>
    <br>


    {if $data}
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Legajo</th>
            <th scope="col">Nombre</th>
            <th scope="col" class="text-right">Documento</th>
            <th scope="col">Ubicacion</th>
            <th scope="col" class="text-right">Acciones</th>
          </tr>
        </thead>
        <tbody>
          {foreach from=$data item=value}
          <tr>
            <th style="padding-top:14px;">{$value.legajo}</th>
            <td style="padding-top:14px;">{$value.nombre}</td>
            <td class="text-right" style="padding-top:14px;">{$value.documento}</td>
            <td style="padding-top:14px;">{$value.ubicacion}</td>
            <td class="text-right"> 
                <a href="{$base}agentes?legajo={$value.legajo}" 
                class="btn btn-rounded btn-info btn-sm m-0"><i class="fa fa-eye"></i></a>

                <a href="{$base}agentes/editar?legajo={$value.legajo}" 
                class="btn btn-rounded btn-warning btn-sm m-0"><i class="fa fa-edit"></i></a>

                <a class="btn btn-rounded btn-danger btn-sm m-0" 
                onclick="window.confirm('Esta seguro que desea eliminar al agente?')?
                (document.getElementById('legajo').setAttribute('value','{$value.legajo}') &
                document.getElementById('form-id').submit())
                :''">
                <i class="fa fa-trash"></i></a>
            </td>
          </tr>
          {/foreach}
        </tbody>
    </table>
    {else}
        No se encontraron agentes. 
    {/if}

    {if $filtros.paginas}
      {include file="common/pagination.tpl"}
    {/if}

    <br>

</div>

<form id="form-id" method="post" action="{$base}agentes">
<input type="hidden" name="legajo" id="legajo" value="variable">
</form>
  


</body>
</html>