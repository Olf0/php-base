<?php;

class HomeController
{
    
    public function inicio()
    {
        global $rutas, $home, $base;

        # Aca hacemos una lista de las rutas que tienen nombre
        # para mostrarlas como tarjetas en la home. Si el titulo
        # de la ruta contiene "//" va a dividirlo en secciones,
        # de lo contrario va a usar la seccion por defecto

        $data = array();
        foreach ($rutas as $ruta) {

            if ($ruta['name'] !== '') {

                $image = 'App/Views/_assets/images/notfound.jpg';
                
                if (file_exists('App/Views/_assets/images/'.$ruta['name'].'.jpg'))
                    $image = 'App/Views/_assets/images/'.$ruta['name'].'.jpg';

                $seccion = SECCION_BASE;
                $titulo = $ruta['name'];

                if (count(explode('//', $ruta['name'])) > 1) {
                    $seccion = array_shift(explode('//', $ruta['name']));
                    $titulo = array_shift(explode('//', $ruta['name']));
                }
                
                $arr = array(
                    'titulo' => $titulo,
                    'url' => $base . $ruta['url'],
                    'image' => $image
                );
                $data[$seccion][] = $arr;
            }
        }

        
        $mapa = array(
            'Inicio' => '#'
        );
        
        showTemplate('index', compact('mapa', 'data'));

    }

    public function error404()
    {
        #echo "Error 404: Pagina inexistente";
        global $home;

        $mapa = array(
            'Inicio' => $home
        );

        showTemplate('404', compact('mapa', 'data'));

    }

}
