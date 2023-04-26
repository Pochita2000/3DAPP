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
    public function getHomePageInfo()
    {
    // homePage data
        return array(
            'name'=>'Coco Cola',
            'intro'=>'Coca-Cola (or Coke for short) is a type of coke produced by the Coca-Cola Company, which was born on 8 May 1886 in Atlanta, Georgia, USA, when pharmacist John Pemberton created a flavoured syrup and brought it to his neighbourhood pharmacy, where he mixed it with soft drinks to create a distinctive soft drink that could be sold over the counter. His partner and accountant, Frank Robinson, named the drink \'Coca-Cola\' and designed the distinctive lettering that is still used today. Coca-Cola is now the market leader in most countries, with 1.9 billion servings sold worldwide each day.
            <br> --Cited from Wikipedia'
        );
    }
    // find data in db
    public function find($table)
    {
        $results = $this->db->query("SELECT * FROM $table");
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
    public function insert($table, $cols='x3dModelTitle, x3dCreationMethod, modelTitle, modelSubtitle, modelDescription', $values=null)
    {
        try {
                // echo $values;
            // echo " INSERT INTO $table ($cols) VALUES ($values); ";
        $result = $this->db->query(" INSERT INTO $table ($cols) VALUES ($values); ");
    } catch (Exception $e) {
        echo $e->getMessage();
        $result= $e->getMessage();
    }
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

            $this->db->query("CREATE TABLE $table ($data)");
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
        // $this->db = NULL;
        // Send the response back to the view
        return $result;
    }
    public function initModel()
    {
        // echo '1111';
        try{
            // need to be designed futher 
            $this->createTable('Model_3D','ModelId INTEGER PRIMARY KEY AUTOINCREMENT, x3dModelTitle TEXT, x3dCreationMethod TEXT, modelTitle TEXT, modelSubtitle TEXT, modelDescription TEXT');
            $this->createTable('Model_info','InfoId INTEGER PRIMARY KEY AUTOINCREMENT, ModelId INTEGER NOT NULL REFERENCES Model_3D(ModelID)');
            $this->insert('Model_3D','x3dModelTitle, x3dCreationMethod, modelTitle, modelSubtitle, modelDescription','"Coke Can 3D Image 1","Coke Can 3D Image 1", "Coke Can 3D Image 1", "Coke Can 3D Image 1", "Coke Can 3D Image 1"');
            $modelID=$this->db->lastInsertId();
            $this->insert('Model_3D','x3dModelTitle, x3dCreationMethod, modelTitle, modelSubtitle, modelDescription','"Coke Can 3D Image 1","Coke Can 3D Image 1", "Coke Can 3D Image 1", "Coke Can 3D Image 1", "Coke Can 3D Image 1"');
            $this->insert('Model_3D','x3dModelTitle, x3dCreationMethod, modelTitle, modelSubtitle, modelDescription', '"Coke Can 3D Image 1","Coke Can 3D Image 1", "Coke Can 3D Image 1", "Coke Can 3D Image 1", "Coke Can 3D Image 1"');

        }catch{};
        
    }   
}
