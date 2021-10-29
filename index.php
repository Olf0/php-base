<?php

    session_start();

    require_once('App/config.php');
    require_once('App/globals.php');
    require_once('App/Lib/Smarty.php');
    require_once('App/Lib/Router.php');

    #ini_set('display_errors', true);
    #error_reporting(E_ALL + E_NOTICE);

    # Agregamos las rutas
    # -------------------
    # Parametros:
    # 1- metodo (GET, POST, PUT, etc)
    # 2- direccion asignada a la ruta
    # 3- controlador que se va a cargar
    # 4- funcion que se va a llamar en el controlador
    # 5- opcional para mostrar en la home (dejar vacio para deshabilitar)
    Router::addRoute('GET', '', 'HomeController', 'inicio', '');
    Router::addRoute('GET', 'agentes', 'AgentesController', 'inicio', 'Lista de Agentes');
    Router::addRoute('GET', 'agentes/crear', 'AgentesController', 'crearAgente', 'Crear Agente');
    Router::addRoute('POST', 'agentes/crear', 'AgentesController', 'guardarAgente', '');
    Router::addRoute('GET', 'agentes/editar', 'AgentesController', 'editarAgente', '');
    Router::addRoute('POST', 'agentes/editar', 'AgentesController', 'modificarAgente', '');
    Router::addRoute('POST', 'agentes', 'AgentesController', 'eliminarAgente', '');




    # Cargamos la pagina solicitada
    # Se va a cargar 404 en caso de que no figure en la lista
    Router::getCurrentRoute();


?>