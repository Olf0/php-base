<?php /* Smarty version 2.6.25-dev, created on 2021-10-22 16:43:32
         compiled from usuarios.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container">

    <h2>Lista de Agentes</h2>

    <form action="/usuarios" method="GET">
      <div class="form-group has-feedback has-search">
        <span class="glyphicon glyphicon-search form-control-feedback"></span>
        <input type="text" class="form-control" placeholder="Buscar por Nombre, DNI o Legajo"
          name="buscar" value=<?php echo $this->_tpl_vars['buscar']; ?>
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
            <th scope="col">Seccional</th>
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
            <td class="text-right" style="padding-top:14px;"><?php echo $this->_tpl_vars['value']['nro_doc']; ?>
</td>
            <td style="padding-top:14px;"><?php echo $this->_tpl_vars['value']['ubic_fisica_3']; ?>
</td>
            <td class="text-right"> 
                <a href="/usuarios?legajo=<?php echo $this->_tpl_vars['value']['legajo']; ?>
" class="btn btn-sm m-0"><i class="fa fa-eye"></i></a>
            </td>
          </tr>
          <?php endforeach; endif; unset($_from); ?>
        </tbody>
    </table>
    <?php else: ?>
        No se encontraron usuarios. 
    <?php endif; ?>

</div>

</body>
</html>