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
class Model{
    // private member db to store the database connection
    private $db;
    // init Model and db
    function __construct(){
        $this->init_databse();
    }
    public function get_model3D_info(){
        // $model_data = file_get_contents("coke.x3d");
        // return $model_data;
        return array(
            'model1'=>'Coke Can 3D Image 1',
            'model2'=>'Coke Can 3D Image 2',
            'model3'=>'Coke Can 3D Image 3',
            'model4'=>'Coke Can 3D Image 4',
            'model5'=>'Coke Can 3D Image 5',
            'model6'=>'Coke Can 3D Image 6',
        );
    }
    // find data in db
    public function find($table, $id){
        $results = $this->db->query("SELECT * FROM $table WHERE id = $id");
        return $results->fetchArray();
    }
    // delete data in db
    public function delete($table, $id){
        $this->db->query("DELETE FROM $table WHERE id = $id");
    }
    // update data in db
    public function update($table, $id, $data){
        $this->db->query("UPDATE $table SET $data WHERE id = $id");
    }
    // insert data in db
    public function insert($table, $data){
        $this->db->query("INSERT INTO $table SET $data");
    }
    // a static function to get the database connection
    private function init_databse(){
        // echo "init database";
        $this->db = new SQLite3("data.db");
        // $results = $this->db->query("SELECT * FROM mytable");
        // while ($row = $results->fetchArray()) {
        //   echo $row["column1"] . " - " . $row["column2"] . "<br>";
        // }
        // db->close();
    }
}