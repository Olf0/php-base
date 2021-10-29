<?php

	# Definir zoma horaria, posiblemente solo sea necesario para Docker
	date_default_timezone_set('America/Argentina/Buenos_Aires');


	global $home, $base;
	
	# Crear carpetas necesarias para Smarty (templates)
	# NOTA: la carpeta App/_system debe tener permisos 777, de lo
	# contrario la aplicacion va a mostrar siempre paginas en blanco
	if ( !file_exists('App/Views/_system/compiled') ) 
		mkdir ('App/Views/_system/compiled', 0777);   
	if ( !file_exists('App/Views/_system/config') )
		mkdir ('App/Views/_system/config', 0777);   
	if ( !file_exists('App/Views/_system/cache') )
		mkdir ('App/Views/_system/cache', 0777);  

	require_once('App/Lib/smarty/libs/Smarty.class.php');

	$smarty = new Smarty();
	$smarty->template_dir = 'App/Views';
	$smarty->compile_dir = 'App/Views/_system/compiled';
	$smarty->config_dir = 'App/Views/_system/config';
	$smarty->cache_dir = 'App/Views/_system/cache';
	$smarty->assign('WWW_TEMPLATES', WWW_TEMPLATES);
	$smarty->assign('site_title', SITE_TITLE);
	$smarty->assign('page_title', SITE_TITLE);
	$smarty->assign('baseurl', $base);

	function showTemplate()
	{
		$args = func_get_args();
		$tpl = array_shift($args);

		global $smarty;
		foreach ($args[0] as $key => $value)
			$smarty->assign($key, $value);

		$smarty->display($tpl.'.tpl');
	}


?>