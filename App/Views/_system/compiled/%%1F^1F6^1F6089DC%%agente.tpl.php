<?php /* Smarty version 2.6.25-dev, created on 2021-10-28 12:41:00
         compiled from agente.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="container" style="margin-top: 16px;">

    <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $this->_tpl_vars['data']['Nombre']; ?>
</div>
        <div class="panel-body">
            <table class="table" style="border:none;">
                <tbody>
                  <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
                  <tr>
                    <th style="border:none;"><?php echo $this->_tpl_vars['key']; ?>
</th>
                    <th style="border:none;"><?php echo $this->_tpl_vars['value']; ?>
</th>
                  </tr>
                  <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
        </div>
    </div>

</div>



</body>
</html>