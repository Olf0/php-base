<?php /* Smarty version 2.6.25-dev, created on 2021-10-29 09:38:58
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container">
    <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
    <div><h3><?php echo $this->_tpl_vars['key']; ?>
</h3></div>
    <div class="home-grid">
        <?php $_from = $this->_tpl_vars['val']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
        <div class="card">
            <a href="/<?php echo $this->_tpl_vars['value']['url']; ?>
">
            <div>
                <img class="card-img" src="<?php echo $this->_tpl_vars['value']['image']; ?>
" alt="<?php echo $this->_tpl_vars['value']['titulo']; ?>
">
                <h5 class="card-title" ><?php echo $this->_tpl_vars['value']['titulo']; ?>
</h5>
            </div>
            </a>
        </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <?php endforeach; endif; unset($_from); ?>
</div>

</body>
</html>