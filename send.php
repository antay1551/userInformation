<?php


class Inizialization {

    public $house;
    public $information;
    public $name;
    public $city;
    public $area;
    public $street;

    static public $con;


    function __construct( $name, $city, $area, $street, $house, $information ){
        $this->name = $name;
        $this->city = $city;
        $this->area = $area;
        $this->street = $street;
        $this->house = $house;
        $this->information = $information;

        self::$con = Connection::get_instance()->dbh;

        $this->set_name( $this->name );
        $this->set_city( $this->city );
        $this->set_area( $this->area );
        $this->set_street( $this->street );
        $this->set_house( $this->house );
        $this->set_information( $this->information );
    }

    public function set_information( $information ){
        //если логин введен, то обрабатываем, чтобы теги и скрипты не работали, мало ли что люди могут ввести
        $this->information = stripslashes($information);
        $this->information = htmlspecialchars($this->information);

        //удаляем лишние пробелы
        $this->information = trim($this->information);
    }


    public function set_house( $house ){
        //если логин введен, то обрабатываем, чтобы теги и скрипты не работали, мало ли что люди могут ввести
        $this->house = stripslashes($house);
        $this->house = htmlspecialchars($this->house);

        //удаляем лишние пробелы
        $this->house = trim($this->house);
    }


    public function set_street( $street ){
        //если логин введен, то обрабатываем, чтобы теги и скрипты не работали, мало ли что люди могут ввести
        $this->street = stripslashes($street);
        $this->street = htmlspecialchars($this->street);

        //удаляем лишние пробелы
        $this->street = trim($this->street);
    }

    public function set_area( $area ){
        //если логин введен, то обрабатываем, чтобы теги и скрипты не работали, мало ли что люди могут ввести
        $this->area = stripslashes($area);
        $this->area = htmlspecialchars($this->area);

        //удаляем лишние пробелы
        $this->area = trim($this->area);
    }


    public function set_name( $name ){
        //если логин введен, то обрабатываем, чтобы теги и скрипты не работали, мало ли что люди могут ввести
        $this->name = stripslashes($name);
        $this->name = htmlspecialchars($this->name);

        //удаляем лишние пробелы
        $this->name = trim($this->name);
    }

    public function set_city( $city ){
        //если логин введен, то обрабатываем, чтобы теги и скрипты не работали, мало ли что люди могут ввести
        $this->city = stripslashes($city);
        $this->city = htmlspecialchars($this->city);

        //удаляем лишние пробелы
        $this->city = trim($this->city);
    }


    public function get_information( ){
        return ($this->information);
    }

    public function get_house( ){
        return ($this->house);
    }

    public function get_area( ){
        return ($this->area);
    }

    public function get_street( ){
        return ($this->street);
    }


    public function get_city( ){
        return ($this->city);
    }


    public function get_name( ){
        return ($this->name);
    }


    static public function insert_into_table($city, $name, $area, $street, $house, $information ){
        $result_add_in_table_user = self::$con->prepare("INSERT INTO information (name,city,area,street,house,information) VALUES(:name,:city,:area,:street,:house,:information)");
        $result_add_in_table_user->execute(array(":name" => $name, ":city" => $city, ":area" => $area, ":street" => $street, ":house" => $house, ":information" => $information));
        //print('insert');
    }

    static public function select_from_table(){
        $sql = "SELECT name, city, area, street, house FROM information";
        $result = self::$con->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - city: " . $row["city"]. " - area" . $row["area"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }


    static public function get_all(){
        $records = [];
        $res = self::$con->query("SELECT * FROM information ORDER BY street");
        while ($row = $res->fetch(PDO::FETCH_ASSOC)){
            $records[] = $row;
        }
        return $records;
    }

    static public function update_all(){

        $result_select = self::get_all();
        print_r($result_select);
        $count = 0;
        while ($count < count($result_select)){
            //$res = self::$con->query("UPDATE information SET name = '111' WHERE id = $count");
            echo"$count";
            $count++;
        }
        //    , city= $result_select[$count]['city'], area= $result_select[$count]['area'], street= $result_select[$count]['street'], house = $result_select[$count]['house'], information = $result_select[$count]['information']

        //$res = self::$con->query("UPDATE information SET name = 'Alfred Schmidt', city= 'Frankfurt' WHERE id = 1");
        //while ($row = $res->fetch(PDO::FETCH_ASSOC)){
        //    $records[] = $row;
       // }
        //return $records;
    }
}





$name = $_POST['name'];
echo"$name\n";

$city = $_POST['city'];
echo"$city\n";

$area = $_POST['area'];
echo"$area\n";

$street = $_POST['street'];
echo"$street\n";

$house = $_POST['house'];
echo"$house\n";

$information = $_POST['information'];
echo"$information\n";


require_once 'connection.php';
if (isset($_POST['name']) && isset($_POST['city'] ) && isset($_POST['area'] )&& isset($_POST['street'] )&& isset($_POST['house'] ) && isset($_POST['information'] )  ) {
    $obj_class_Connection =  new Inizialization( $_POST['name'],  $_POST['city'] , $_POST['area'], $_POST['street'], $_POST['house'], $_POST['information'] );
}


echo"!!!!!!!!!!!!!!!!!!!!!!";
print($obj_class_Connection->get_name());
print($obj_class_Connection->get_city());
print($obj_class_Connection->get_area());
print($obj_class_Connection->get_street());
print($obj_class_Connection->get_house());
print($obj_class_Connection->get_information());
$obj_class_Connection->insert_into_table($obj_class_Connection->get_city(),
    $obj_class_Connection->get_name(),
    $obj_class_Connection->get_area(),
    $obj_class_Connection->get_street(),
    $obj_class_Connection->get_house(),
    $obj_class_Connection->get_information()
);
$obj_class_Connection->select_from_table();
echo"1111111\n";
//print_r( $obj_class_Connection->get_all() );
$res_select=Inizialization::update_all();
//session_start();

//$_SESSION["res"] =[];
//$_SESSION["res"] = $res_select;