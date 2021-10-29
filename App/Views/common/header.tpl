<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="NewRolIT">

    <title>{$site_title}</title>

   
    <link href="{$WWW_TEMPLATES}/_assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> -->
    <link href="{$WWW_TEMPLATES}/_assets/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="{$WWW_TEMPLATES}/_assets/css/jquery.dataTables.css" rel="stylesheet">
    <link href="{$WWW_TEMPLATES}/_assets/css/jquery.modalLink-1.0.0.css" rel="stylesheet">
    <link href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS CUSTOM -->
    <link href="{$WWW_TEMPLATES}/_assets/css/custom.css" rel="stylesheet">
    <link href="{$WWW_TEMPLATES}/_assets/css/cards.css" rel="stylesheet">

    <script src="{$WWW_TEMPLATES}/_assets/js/jquery-3.2.1.min.js"></script>
    <script src="{$WWW_TEMPLATES}/_assets/js/bootstrap.min.js"></script>

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
            <li class="navbar-brand">{$page_title}</li>
          </ul>

        </div><!--/.nav-collapse -->


      </div>
    </nav>

    {if $mapa}
    <ol class="breadcrumb">
      {foreach from=$mapa key=key item=value}
        {if $value eq '#'}
        <li>{$key}</li>
        {else}
        <li><a href="{if $value eq ''}/{else}{$value}{/if}">{$key}</a></li>
        {/if}
      {/foreach}
    </ol>
    {/if}