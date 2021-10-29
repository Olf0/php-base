<?php /* Smarty version 2.6.25-dev, created on 2021-10-29 10:55:02
         compiled from agentes.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container">

    <?php if ($this->_tpl_vars['mensaje']): ?>
    <div class="alert alert-<?php echo $this->_tpl_vars['mensaje']['type']; ?>
 alert-dismissible" role="alert"><?php echo $this->_tpl_vars['mensaje']['text']; ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    
    <div class="row">
      <div class="col-xs-6"><h2>Lista de Agentes</h2></div>
      <div class="col-auto text-right" style="margin-top: 15px; margin-right: 15px;">
          <a type="button" class="btn btn-rounded btn-success" href="<?php echo $this->_tpl_vars['base']; ?>
agentes/crear">
          <i class="fa fa-plus" aria-hidden="true"></i> Agregar Agente</a>
          
          <a type="button" class="btn btn-rounded btn-warning" target="_blank" href="<?php echo $this->_tpl_vars['base']; ?>
agentes?export=pdf">
          <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Exportar a PDF</a>
      </div>
    </div>

    <form action="agentes" method="GET">
      <div class="form-group has-feedback has-search">
        <span class="glyphicon glyphicon-search form-control-feedback"></span>
        <input type="text" class="form-control" placeholder="Buscar por Nombre, DNI o Legajo"
          id="buscar" name="buscar" value=<?php echo $this->_tpl_vars['filtros']['buscar']; ?>
>
      </div>
    </form>
    <br>


    <?php if ($this->_tpl_vars['data']): ?>
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
          <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
          <tr>
            <th style="padding-top:14px;"><?php echo $this->_tpl_vars['value']['legajo']; ?>
</th>
            <td style="padding-top:14px;"><?php echo $this->_tpl_vars['value']['nombre']; ?>
</td>
            <td class="text-right" style="padding-top:14px;"><?php echo $this->_tpl_vars['value']['documento']; ?>
</td>
            <td style="padding-top:14px;"><?php echo $this->_tpl_vars['value']['ubicacion']; ?>
</td>
            <td class="text-right"> 
                <a href="<?php echo $this->_tpl_vars['base']; ?>
agentes?legajo=<?php echo $this->_tpl_vars['value']['legajo']; ?>
" 
                class="btn btn-rounded btn-info btn-sm m-0"><i class="fa fa-eye"></i></a>

                <a href="<?php echo $this->_tpl_vars['base']; ?>
agentes/editar?legajo=<?php echo $this->_tpl_vars['value']['legajo']; ?>
" 
                class="btn btn-rounded btn-warning btn-sm m-0"><i class="fa fa-edit"></i></a>

                <a class="btn btn-rounded btn-danger btn-sm m-0" 
                onclick="window.confirm('Esta seguro que desea eliminar al agente?')?
                (document.getElementById('legajo').setAttribute('value','<?php echo $this->_tpl_vars['value']['legajo']; ?>
') &
                document.getElementById('form-id').submit())
                :''">
                <i class="fa fa-trash"></i></a>
            </td>
          </tr>
          <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>
    <?php else: ?>
        No se encontraron agentes. 
    <?php endif; ?>

    <?php if ($this->_tpl_vars['filtros']['paginas']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/pagination.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

    <br>

</div>

<form id="form-id" method="post" action="<?php echo $this->_tpl_vars['base']; ?>
agentes">
<input type="hidden" name="legajo" id="legajo" value="variable">
</form>
  


</body>
</html>