<?php /* Smarty version 2.6.25-dev, created on 2021-10-29 10:55:02
         compiled from common/header.tpl */ ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="NewRolIT">

    <title><?php echo $this->_tpl_vars['site_title']; ?>
</title>

   
    <link href="<?php echo $this->_tpl_vars['WWW_TEMPLATES']; ?>
/_assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->
    <link href="<?php echo $this->_tpl_vars['WWW_TEMPLATES']; ?>
/_assets/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo $this->_tpl_vars['WWW_TEMPLATES']; ?>
/_assets/css/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo $this->_tpl_vars['WWW_TEMPLATES']; ?>
/_assets/css/jquery.modalLink-1.0.0.css" rel="stylesheet">
    <link href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS CUSTOM -->
    <link href="<?php echo $this->_tpl_vars['WWW_TEMPLATES']; ?>
/_assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo $this->_tpl_vars['WWW_TEMPLATES']; ?>
/_assets/css/cards.css" rel="stylesheet">

    <script src="<?php echo $this->_tpl_vars['WWW_TEMPLATES']; ?>
/_assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $this->_tpl_vars['WWW_TEMPLATES']; ?>
/_assets/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- FIN HEADER -->
  <body>
    <nav class="navbar-custom navbar-static-top">
      <div class="container_navbar">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Esconder navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>


        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="navbar-brand"><?php echo $this->_tpl_vars['page_title']; ?>
</li>
          </ul>

        </div><!--/.nav-collapse -->


      </div>
    </nav>

    <?php if ($this->_tpl_vars['mapa']): ?>
    <ol class="breadcrumb">
      <?php $_from = $this->_tpl_vars['mapa']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <?php if ($this->_tpl_vars['value'] == '#'): ?>
        <li><?php echo $this->_tpl_vars['key']; ?>
</li>
        <?php else: ?>
        <li><a href="<?php if ($this->_tpl_vars['value'] == ''): ?>/<?php else: ?><?php echo $this->_tpl_vars['value']; ?>
<?php endif; ?>"><?php echo $this->_tpl_vars['key']; ?>
</a></li>
        <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
    </ol>
    <?php endif; ?>