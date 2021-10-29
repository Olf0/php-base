<?php /* Smarty version 2.6.25-dev, created on 2021-10-28 15:19:40
         compiled from common/pagination.tpl */ ?>

<?php if ($this->_tpl_vars['filtros']['paginas'] > 1): ?>
<ul class="pagination">
    <li class="<?php if ($this->_tpl_vars['filtros']['pagina'] <= 1): ?>disabled<?php endif; ?>">
        <?php if ($this->_tpl_vars['filtros']['pagina'] <= 1): ?><a>Primera</a><?php else: ?>
        <a href="?<?php if ($this->_tpl_vars['filtros']['otros']): ?><?php echo $this->_tpl_vars['filtros']['otros']; ?>
&<?php endif; ?>pagina=1">Primera</a><?php endif; ?>
    </li>
    <li class="<?php if ($this->_tpl_vars['filtros']['pagina'] <= 1): ?>disabled<?php endif; ?>">
        <?php if ($this->_tpl_vars['filtros']['pagina'] <= 1): ?><a>Anterior</a><?php else: ?>
        <a href="?<?php if ($this->_tpl_vars['filtros']['otros']): ?><?php echo $this->_tpl_vars['filtros']['otros']; ?>
&<?php endif; ?>pagina=<?php echo $this->_tpl_vars['filtros']['pagina']-1; ?>
">Anterior</a><?php endif; ?>
    </li>
    <li class="<?php if ($this->_tpl_vars['filtros']['pagina'] >= $this->_tpl_vars['filtros']['paginas']): ?>disabled<?php endif; ?>">
        <?php if ($this->_tpl_vars['filtros']['pagina'] >= $this->_tpl_vars['filtros']['paginas']): ?><a>Siguiente</a><?php else: ?>
        <a href="?<?php if ($this->_tpl_vars['filtros']['otros']): ?><?php echo $this->_tpl_vars['filtros']['otros']; ?>
&<?php endif; ?>pagina=<?php echo $this->_tpl_vars['filtros']['pagina']+1; ?>
">Siguiente</a><?php endif; ?>
    </li>
    <li class="<?php if ($this->_tpl_vars['filtros']['pagina'] == $this->_tpl_vars['filtros']['paginas']): ?>disabled<?php endif; ?>">
        <?php if ($this->_tpl_vars['filtros']['pagina'] >= $this->_tpl_vars['filtros']['paginas']): ?><a>Ultima</a><?php else: ?>
        <a href="?<?php if ($this->_tpl_vars['filtros']['otros']): ?><?php echo $this->_tpl_vars['filtros']['otros']; ?>
&<?php endif; ?>pagina=<?php echo $this->_tpl_vars['filtros']['paginas']; ?>
">Ultima</a></li><?php endif; ?>
</ul>
<?php endif; ?>