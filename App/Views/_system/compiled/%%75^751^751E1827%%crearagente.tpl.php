<?php /* Smarty version 2.6.25-dev, created on 2021-10-28 10:28:12
         compiled from crearagente.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="container" style="margin-top: 16px;">

    <?php if ($this->_tpl_vars['mensaje']): ?>
    <div class="alert alert-<?php echo $this->_tpl_vars['mensaje']['type']; ?>
 alert-dismissible" role="alert"><?php echo $this->_tpl_vars['mensaje']['text']; ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>


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