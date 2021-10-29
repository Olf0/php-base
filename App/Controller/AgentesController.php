<?php;

require_once('App/Model/AgentesModel.php');
require_once('App/Lib/fpdf/fpdf.php');

class AgentesController
{
    private $model;

    public function __construct()
    {
        $this->model = new AgentesModel();
    }


    public function inicio()
    {

        if (isset($_GET['legajo']))
            self::verAgente($_GET['legajo']);

        elseif ($_GET['export']=='pdf') 
            self::generarPDF();

        else
            self::verAgentes();
        
    }


    private function verAgentes($mensaje = null)
    {
        $data = array();
        
        if ($_GET['buscar']) {
            $datos = $this->model
                ->select('legajo, nombre, nro_doc as documento, ubic_fisica_1 as ubicacion')
                ->find('nombre,nro_doc,legajo' , $_GET['buscar'])
                ->order('legajo asc')
                ->paginate(20);
        }
        else
        {
            $datos = $this->model
                ->select('legajo, nombre, nro_doc as documento, ubic_fisica_1 as ubicacion')
                ->order('legajo asc')
                ->paginate(20);
        }

        #$data = $this->model->exec('SELECT * from migweba LIMIT 0, 10');

        $data = $datos['datos'];
        $filtros = $datos['filtros'];

        $buscar = $_GET['buscar']? $_GET['buscar'] : null;

        global $home;
        $mapa = array(
            'Inicio' => $home,
            'Agentes' => '#'
        );

        showTemplate('agentes', compact('mapa', 'buscar', 'data', 'filtros', 'mensaje'));

    }

    public function editarAgente($mensaje = null)
    {
        $legajo = $_GET['legajo'];
        $result = $this->model->where('legajo', $legajo)->first();

        $data = array(
            'Nº de legajo' => $result['legajo'],
            'Nombre' => $result['nombre'],
            'Documento' => $result['nro_doc'],
            'Fecha de nacimiento' => $result['fecha_nacimiento'],
            'Direccion' => $result['dom_calle'],
            'Numero' => $result['dom_nro_puerta'],
            'Localidad' => $result['localidad'],
            'Sexo' => $result['sexo']='M'? 'Masculino' : 'Femenino',
            'Estado civil' => $result['estado_civil'],
            'Nacionalidad' => $result['nacionalidad'],
            'Ubicacion' => $result['ubic_fisica_1'],
            'Fecha de ingreso' => $result['fecha_ingreso']
        );

        global $home;
        $mapa = array(
            'Inicio' => $home,
            'Agentes' => $home .'agentes',
            'Editar Agente' => '#'
        );

        showTemplate('modificaragente', compact('mapa', 'data', 'mensaje'));

    }


    public function modificarAgente()
    {
        $legajo = $_POST['Nº_de_legajo'];

        $result = $this->model->set(array(
            'nombre' => $_POST['Nombre'],
            'nro_doc' => $_POST['Documento'],
            'fecha_nacimiento' => $_POST['Fecha_de_nacimiento'],
            'dom_calle' => $_POST['Direccion'],
            'dom_nro_puerta' => $_POST['Numero'],
            'sexo' => $_POST['Sexo']=='Masculino'? 'M':'F',
            'localidad' => $_POST['Localidad'],
            'estado_civil' => $_POST['Estado_civil'],
            'nacionalidad' => $_POST['Nacionalidad'],
            'ubic_fisica_1' => $_POST['Ubicacion'],
            'fecha_ingreso' => $_POST['Fecha_de_ingreso']
        ))
        ->where('legajo', $legajo)
        ->update();

        $mensaje = array(
            'type' => $result==''? 'success' : 'danger',
            'text' => $result==''? 'Se guardaron los datos del Agente '.$user : 'ERROR: ' . $result
        );


        $_GET['legajo'] = $legajo;
        $this->editarAgente($mensaje);

    }


    public function eliminarAgente()
    {
        $legajo = $_POST['legajo'];

        $result = $this->model->where('legajo', $legajo)->delete();

        $mensaje = array(
            'type' => $result==''? 'success' : 'danger',
            'text' => $result==''? 'Se elimino el agente'.$user : 'ERROR: ' . $result
        );
        
        $this->verAgentes($mensaje);

    }


    private function generarPDF()
    {
        $datos = $this->model->order('legajo asc')->get();
        

        $pdf = new FPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',8);

        $w = array(20, 55, 20, 75);

        $pdf->SetFont('Arial','',14);
        $pdf->Cell(100,0,'Lista de Agentes');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','b',8);

        $pdf->Cell($w[0],0,'Legajo','',0,'C');
        $pdf->Cell($w[1],0,'Nombre');
        $pdf->Cell($w[2],0,'Documento','',0,'C');
        $pdf->Cell($w[3],0,'Ubicacion');

        $pdf->Ln(7);

        $pdf->SetFont('Arial','',8);
        foreach($datos as $row)
        {
            $pdf->Cell($w[0],0,$row['legajo'],'',0,'C');
            $pdf->Cell($w[1],0,$row['nombre']);
            $pdf->Cell($w[2],0,$row['nro_doc'],'',0,'C');
            $pdf->Cell($w[3],0,$row['ubic_fisica_1']);
            $pdf->Ln(6);
        }

        $pdf->Output();

        
    }


    private function verAgente($legajo)
    {
	    $result = $this->model->where('legajo', $legajo)->first();

        $data = array(
            'Nº de legajo' => $result['legajo'],
            'Nombre' => $result['nombre'],
            'Documento' => $result['nro_doc'],
            'Fecha de nacimiento' => $result['fecha_nacimiento'],
            'Direccion' => $result['dom_calle'] . " " . $result['dom_nro_puerta'],
            'Localidad' => $result['localidad'],
            'Sexo' => $result['sexo']='M'? 'Masculino' : 'Femenino',
            'Estado civil' => $result['estado_civil'],
            'Nacionalidad' => $result['nacionalidad'],
            'Ubicacion' => $result['ubic_fisica_1'],
            'Fecha de ingreso' => $result['fecha_ingreso']
        );

        global $home;
        $mapa = array(
            'Inicio' => $home,
            'Agentes' => $home .'agentes',
            'Datos del Agente' => '#'
        );
        
        showTemplate('agente', compact('mapa', 'data'));

    }


    public function crearAgente()
    {

        global $home;
        $mapa = array(
            'Inicio' => $home,
            'Crear Agente' => '#'
        );

        showTemplate('crearagente', compact('mapa'));

    }


    public function guardarAgente()
    {
        # Prueba INSERT
        $result = $this->model
            ->set('legajo', '123456')
            ->set('nro_doc', '12345678')
            ->set('nombre', 'EMPLEADO DE PRUEBA')
            ->set('ubic_fisica_1', 'RAMOS MEJIA')
            ->set('ubic_fisica_5', 'RAMOS MEJIA')
            ->set('lugar_trabajo', 'HOME OFFICE')
            ->set('localidad', 'LA MATANZA')
            ->set('agrupamiento', '')
            ->set('empresa', '')
            ->set('vinculacion', '')
            ->set('puesto', '')
            ->set('ubica_cod', '')
            ->set('MWAFEE', '')
            ->set('MWAMAE', '')
            ->insert();

        # Prueba UPDATE
        /* $result = $this->model->set(array(
                'nombre' => 'EMPLEADO DE PRUEBA',
                'ubic_fisica_1' => 'MERLO',
                'ubic_fisica_5'=> 'MORON'
            ))
            ->where('legajo','123456')
            ->update(); */

        # Prueba DELETE
        #$result = $this->model->where('legajo', '123456')->delete();

        $mensaje = array(
            'type' => $result==''? 'success' : 'danger',
            'text' => $result==''? 'Se guardaron los datos del Agente '.$user : 'ERROR: ' . $result
        );

        global $home;
        $mapa = array(
            'Inicio' => $home,
            'Crear Agente' => '#'
        );
        
        showTemplate('crearagente', compact('mapa', 'mensaje'));

    }

}
