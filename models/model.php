<?php
// // 允许跨域请求
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
// header('Access-Control-Allow-Headers: Content-Type');

// // 处理GET请求
// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     // 读取x3d模型数据
//     $model_data = file_get_contents("coke.x3d");

//     // 返回x3d模型数据
//     header('Content-Type: application/x3d+xml');
//     echo $model_data;
// }

// // 处理POST请求
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // 处理从前端页面发送的数据
//     $data = json_decode(file_get_contents('php://input'), true);

//     // TODO: 处理数据并返回结果
// }
class Model
{
    // private member db to store the database connection
    private $db;
    // init Model and db
    function __construct()
    {
        $this->init_databse();
        // $this->createTable('Model_3D','Id INTEGER PRIMARY KEY, x3dModelTitle TEXT, x3dCreationMethod TEXT, modelTitle TEXT, modelSubtitle TEXT, modelDescription TEXT');

    }
    public function get_model3D_info()
    {
        // $model_data = file_get_contents("coke.x3d");
        // return $model_data;
        return array(
            'model1' => 'Coke Can 3D Image 1',
            'model2' => 'Coke Can 3D Image 2',
            'model3' => 'Coke Can 3D Image 3',
            'model4' => 'Coke Can 3D Image 4',
            'model5' => 'Coke Can 3D Image 5',
            'model6' => 'Coke Can 3D Image 6',
        );
    }
    // find data in db
    public function find($table, $id)
    {
        $results = $this->db->query("SELECT * FROM $table WHERE id = $id");
        return $results->fetchArray();
    }
    // delete data in db
    public function delete($table, $id)
    {
        $this->db->query("DELETE FROM $table WHERE id = $id");
    }
    // update data in db
    public function update($table, $id, $data)
    {
        $this->db->query("UPDATE $table SET $data WHERE id = $id");
    }
    // insert data in db
    public function insert($table, $data)
    {
        $result = $this->db->query("INSERT INTO $table SET $data");
        return $result;
    }
    // a static function to get the database connection
    private function init_databse()
    {
        //connect sqlitedb use PDO
        try {
            $this->db = new PDO('sqlite:./models/data.db', 'user', 'password', array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true
            ));
        } catch (PDOException $e) {
            echo 'can not connect to database';
            print new Exception($e->getMessage());
        }
    }
    //create Table
    public function createTable($table, $data)
    {
        try {
            $this->db->query("CREATE TABLE $table ($data)");
        } catch(PDOException $e){};
    }
    public function dbGetData()
    {
        try {
            // Prepare a statement to get all records from the Model_3D table
            $sql = 'SELECT * FROM Model_3D';
            // Use PDO query() to query the database with the prepared SQL statement
            $stmt = $this->db->query($sql);
            // Set up an array to return the results to the view
            $result = null;
            // Set up a variable to index each row of the array
            $i = -0;
            // Use PDO fetch() to retrieve the results from the database using a while loop
            // Use a while loop to loop through the rows	
            while ($data = $stmt->fetch()) {
                // Don't worry about this, it's just a simple test to check we can output a value from the database in a while loop
                // echo '</br>' . $data['x3dModelTitle'];
                // Write the database conetnts to the results array for sending back to the view
                $result[$i]['x3dModelTitle'] = $data['x3dModelTitle'];
                $result[$i]['x3dCreationMethod'] = $data['x3dCreationMethod'];
                $result[$i]['modelTitle'] = $data['modelTitle'];
                $result[$i]['modelSubtitle'] = $data['modelSubtitle'];
                $result[$i]['modelDescription'] = $data['modelDescription'];
                //increment the row index
                $i++;
            }
        } catch (PD0EXception $e) {
            print new Exception($e->getMessage());
        }
        // Close the database connection
        $this->db = NULL;
        // Send the response back to the view
        return $result;
    }
    public function initModel()
    {
        $this->createTable('Model_3D','Id INTEGER PRIMARY KEY, x3dModelTitle TEXT, x3dCreationMethod TEXT, modelTitle TEXT, modelSubtitle TEXT, modelDescription TEXT');
        $this->insert('Model_3D', 'x3dModelTitle="Coke Can 3D Image 1", x3dCreationMethod="Coke Can 3D Image 1", modelTitle="Coke Can 3D Image 1", modelSubtitle="Coke Can 3D Image 1", modelDescription="Coke Can 3D Image 1"');
        $this->insert('Model_3D', 'x3dModelTitle="Coke Can 3D Image 1", x3dCreationMethod="Coke Can 3D Image 1", modelTitle="Coke Can 3D Image 1", modelSubtitle="Coke Can 3D Image 1", modelDescription="Coke Can 3D Image 1"');
        $this->insert('Model_3D', 'x3dModelTitle="Coke Can 3D Image 1", x3dCreationMethod="Coke Can 3D Image 1", modelTitle="Coke Can 3D Image 1", modelSubtitle="Coke Can 3D Image 1", modelDescription="Coke Can 3D Image 1"');

    }   
}
