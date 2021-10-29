<?php;

class Router
{
   
    # Agregar una ruta
    # ----------------
    # Parametros:
    # 1- method: metodo (GET, POST, PUT, etc)
    # 2- url: direccion asignada a la ruta
    # 3- controller: controlador que se va a cargar
    # 4- func: funcion que se va a llamar en el controlador
    # 5- name: (opcional) si se incluye se usa en Home->inicio()
    #          tambien divide en secciones si se utiliza //
    #          por ejemplo: 'Herramientas//Informes"
    public function addRoute($method, $url, $controller, $func, $name)
    {
        $arr = array(
            'method' => $method,
            'url' => $url,
            'controller' => $controller,
            'func' => $func,
            'name' => $name
        );
        global $rutas;
        array_push($rutas, $arr);
    }


    public function getCurrentRoute()
    {

        global $rutas;
        $ruta = '';

        # Buscador de rutas
        # Es necesaria ya que la funcion array_filter no existe
        function buscar($array, $var, $val = '/')
        {
            $result = array();
            foreach ($array as $res) {
                if (strcasecmp($res[$var], $val)==0)
                    array_push($result, $res);
            }
            return $result;
        }

        # Array para devolver error 404 (pagina no encontrada)
        $arrayNull = array(
            'controller' => 'HomeController',
            'func' => 'error404'
        );

        # Buscamos la ruta, devolvemos array de error 404 si no existe
        $result = buscar($rutas, 'url', rtrim($_GET['ruta'],'/'));
        if (count($result) == 0) 
            $ruta = $arrayNull;

        # Chequeamos si el metodo es correcto, devolvemos 404 si no existe
        $result = buscar($result, 'method', $_SERVER['REQUEST_METHOD']);
        if (count($result) == 0)
            $ruta = $arrayNull;
        else
            $ruta = $result[0];

        $controlador = $ruta['controller'];
        $funcion = $ruta['func'];
        require_once('App/Controller/'.$controlador.'.php');
        $controller = new $controlador();
        $controller->$funcion();

    }

}

?>