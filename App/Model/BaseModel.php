<?php;

# -------------------------------------------------------------------------
# Clase para manejo de base da datos, estilo Eloquent low cost
# -------------------------------------------------------------------------
# 
# Opciones disponibles:
# -------------------------------------------------------------------------
# 
# - select()        Para seleccionar las columnas
#                   Ej: select(nombre,dni,direccion)
#
# - where()         Para filtrar (se puede anidar)
#                   Ej: where(nombre, 'JUAN')  where(nombre, '!=', 'JUAN')
#
# - orWhere()       Para anidar al where cuando se quiere usar OR
#                   Ej: where(nombre, 'JUAN')->orWhere(nombre, 'PEDRO')
#
# - find()          Para buscar en varias columnas al mismo tiempo
#                   Ej: find('nombre,dni,legajo', 'JUAN')
#
# - order()         Para configuar el orden de los registros
#                   Ej: orden('dni asc')
#
# - limit()         Para configurar limit y offset
#                   Ej: limit('20')  limit('1, 25')
#
# - set()           Asigna los valores de registros (acepta arrays o key/value)
#                   Ej: set('nombre', 'JUAN')  
#                       set(array('nombre' => 'Juan, 'dni' => '12345678'))
#
#
#
# Una vez configuradas las opciones hay que utilizar la funcion:
# -------------------------------------------------------------------------
#
# - get()           Realiza el query de los registros solicitados
#                   Devuelve el array 'data' con los registros
#
# - first()         Funciona igual que get() para un solo registro
#                   Devuelve el registro en 'data'
#
# - get()           Funciona igual que get() pero incluye paginacion
#                   Devuelve dos dentro de 'data': 'datos' y 'filtros'
#
# - insert()        Inserta un registro en la base de datos
#                   Devuelve 'result' con el error sql (vacio si esta ok)
#
# - update()        Modifica uno o varios registros de la base de datos
#                   Devuelve 'result' con el error sql (vacio si esta ok)
#
# - updateAll()     Modifica todos los registros de la base de datos
#                   Devuelve 'result' con el error sql (vacio si esta ok)
#
# - delete()        Elimina uno o varios registros de la base de datos
#                   Devuelve 'result' con el error sql (vacio si esta ok)
#
# - deleteAll()     Elimina todos los registros de la base de datos
#                   Devuelve 'result' con el error sql (vacio si esta ok)
#
# -------------------------------------------------------------------------

class BaseModel
{
    private $db;
    public $table = '';
    private $method = 'SELECT * FROM';
    private $where = '';
    private $limit = '';
    private $order = '';
    private $keys = array();
    private $values = array();
    

    public function __construct()
    {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->db->set_charset("utf8");
        if (!$this->db) {
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
    }


    public function clear()
    {
        $this->method = 'SELECT * FROM';
        $this->where = '';
        $this->limit = '';
        $this->order = '';
        $this->keys = array();
        $this->values = array();
    }


    public function select($val = '*')
    {
        $this->method = 'SELECT ' . $val . ' FROM';

        return $this;
    }


    public function where($col, $cond, $val='')
    {
        if ($val=='')
        {
            $val = $cond;
            $cond = '=';
        }

        if ($this->where == '')
            $this->where = 'WHERE ' . $col . ' ' . $cond . ' "'.$val.'"';
        else
            $this->where .= ' AND ' . $col . ' ' .$cond . ' "'.$val.'"';

        return $this;
    }


    public function orWhere($col, $cond, $val='')
    {
        if ($val=='')
        {
            $val = $cond;
            $cond = '=';
        }

        if ($this->where == '')
            $this->where = 'WHERE ' . $col . ' ' . $cond . ' "'.$val.'"';
        else
            $this->where .= ' OR ' . $col . ' ' .$cond . ' "'.$val.'"';

        return $this;
    }


    public function find($var, $val)
    {
        $var = 'CONCAT (' . str_replace(',','," ",',$var) . ')';

        if ($this->where == '')
            $this->where = 'WHERE ' . $var . ' LIKE "%' . $val . '%"';
        else
            $this->where .= ' OR FIELD LIKE "%' . $val . '%" IN (' . $var . ')';

        return $this;
    }


    public function order($val)
    {
        $this->order = ' ORDER BY ' . $val;
        
        return $this;
    }


    public function limit($val)
    {
        $this->limit = 'LIMIT ' . $val;
        
        return $this;
    }


    public function set($key, $val=null)
    {
        if (is_array($key))
        {
            foreach ($key as $k => $v)
            {
                array_push($this->keys, $k);
                array_push($this->values, "'".$v."'");
            }
        }
        else
        {
            array_push($this->keys, $key);
            array_push($this->values, "'".$val."'");
        }
        
        return $this;
    }


    public function insert()
    {
        $sql = 'INSERT INTO ' . $this->table . ' (' . implode(', ', $this->keys) . ')'
                . ' VALUES (' . implode(', ', $this->values) . ')';

        $query = $this->db->query($sql);

        $this->clear();
        
        return $this->db->error;
    }


    public function update()
    {
        if ($this->where == '')
            return 'WHERE no asignado. Utilice updateAll() si desea modificar todos los registros';

        $valores = array();

        for ($i=0; $i < count($this->keys); $i++) {
            array_push($valores, $this->keys[$i] . "=" . $this->values[$i]);
        }

        $sql = 'UPDATE ' . $this->table . ' SET ' . implode(', ', $valores) . ' ' . $this->where;

        $query = $this->db->query($sql);

        $this->clear();
        
        return $this->db->error;
    }


    public function updateAll()
    {
        $valores = array();

        for ($i=0; $i < count($this->keys); $i++) {
            array_push($valores, $this->keys[$i] . "=" . $this->values[$i]);
        }

        $sql = 'UPDATE ' . $this->table . ' SET ' . implode(', ', $valores);

        $query = $this->db->query($sql);

        $this->clear();
        
        return $this->db->error;
    }


    public function delete()
    {
        if ($this->where == '')
            return 'WHERE no asignado. Utilice deleteAll() si desea eliminar todos los registros';

        $sql = 'DELETE FROM ' . $this->table . ' ' . $this->where;

        $query = $this->db->query($sql);

        $this->clear();
        
        return $this->db->error;
    }


    public function deleteAll()
    {
        $sql = 'DELETE FROM ' . $this->table;

        $query = $this->db->query($sql);

        $this->clear();
        
        return $this->db->error;
    }


    public function first()
    {
        $this->limit = 'LIMIT 1,0';

        $sql = $this->method . ' ' . $this->table . ' ' . $this->where . ' LIMIT 0, 1';

        $query = $this->db->query($sql);

        if (!$query) {
            return $arraySQL;
        }

        $this->clear();
        
        return $query->fetch_assoc();
    }


    public function get()
    {
        $arraySQL = array();

        $sql = $this->method . ' ' . $this->table . ' ' . $this->where . $this->order . ' ' . $this->limit;
        
        #echo $sql;
        $query = $this->db->query($sql);

        if (!$query) {
            return $arraySQL;
        }
        
        while( $r = $query->fetch_assoc() )
        {
            $arraySQL[] = $r;
        }

        $this->clear();

        return $arraySQL;
    }

    
    public function paginate($cant = 10)
    {
        $filtros = $_GET;

        $pagina = $filtros['pagina']>0? $filtros['pagina'] : 1;
        $offset = ($pagina-1) * $cant; 

        $arraySQL = array();

        $sql = $this->method . ' ' . $this->table . ' ' . $this->where . $this->order . 
            ' LIMIT ' . $offset . ', ' . $cant;
            $records = 'SELECT COUNT(*) AS total FROM ' . $this->table . ' ' . $this->where;
            
        $query = $this->db->query($sql);
        
        if (!$query) {
            return $arraySQL;
        }
        
        while( $r = $query->fetch_assoc() )
        {
            $arraySQL[] = $r;
        }
        
        $query = $this->db->query($records)->fetch_assoc();
        $pages = ceil($query['total'] / $cant);

        unset($filtros['ruta']);

        $otros = $filtros;
        unset($otros['pagina']);
        foreach($filtros as $key => $value)
            if (!$value) unset($otros[$key]);

        $filtros['otros'] = http_build_query($otros,'','&');
        $filtros['pagina'] = $pagina;
        $filtros['paginas'] = $pages;

        $this->clear();

        return array(
            'datos' => $arraySQL,
            'filtros' => $filtros
        );
    }


    public function exec($sql=false)
    {
        $arraySQL = array();
        $query = $this->db->query($sql);

        if (!$query) {
            return $arraySQL;
        }
        
        while( $r = $query->fetch_assoc() )
        {
            $arraySQL[] = $r;
        }
        return $arraySQL;
    }


}
