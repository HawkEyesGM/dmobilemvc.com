<?


class Db
{
    public $dbc;
    protected $result;
    function __construct()
    {
        $this->dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
        if ($this->dbc->connect_error){
            die();
        }
    }

    public function makeQuery($query)
    {
        $this->result = $this->dbc->query($query);
        if (!$this->result) {
            var_dump($query);
            die();
        }
        return (is_bool($this->result)) ? $this->result : Lib::mysqli_fetch_all_my($this->result);
    }

    public function makeGoods($query,$id)
    {
        $this->result = $this->dbc->query($query);
        $this->good_id = $id;
        if (!$this->result) {
            var_dump($query);
            die();
        }
        return (is_bool($this->result)) ? $this->result : Lib::get_goods($this->result, $this->good_id);
    }

    public function getRow($query)
    {
        $this->result = $this->dbc->query($query);
        if (!$this->result) {
            var_dump($query);
            die();
        }
        $row = mysqli_fetch_assoc($this->result);
        return $row;
    }

    public function getLastId(){
        return mysqli_insert_id($this->dbc);
    }

    public function real_escape_string($name){
        return $mysqli->real_escape_string($name);
    }

    function __destruct()
    {
        $this->dbc->close();
    }
}