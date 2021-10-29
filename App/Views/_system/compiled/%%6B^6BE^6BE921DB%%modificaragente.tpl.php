<?php /* Smarty version 2.6.25-dev, created on 2021-10-28 15:19:25
         compiled from modificaragente.tpl */ ?>
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
    
    <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $this->_tpl_vars['data']['Nombre']; ?>
</div>
        <div class="panel-body">
            <form action="../agentes/editar" method="post">
                <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
                <div class="form-group row" style="margin-right: 0px;">
                    <label for="staticEmail" class="col-md-3 col-form-label"><?php echo $this->_tpl_vars['key']; ?>
</label>
                    <input type="text" class="form-control-plaintext col-md-9" id="staticEmail" 
                    name="<?php echo $this->_tpl_vars['key']; ?>
" <?php if ($this->_tpl_vars['key'] == "Nº de legajo"): ?>readonly<?php endif; ?> value="<?php echo $this->_tpl_vars['value']; ?>
">
                </div>
                <?php endforeach; endif; unset($_from); ?>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </div>

</div>



</body>
</html>