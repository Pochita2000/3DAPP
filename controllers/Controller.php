<?php
class Controller
{
    public $load;
    public $model;

    function __construct($pageURI = null)
    {
        $this->load = new Load();
        $this->model = new Model();
        $this->$pageURI();
    }
    function home()
    {
        $data = $this->model->get_model3D_info();
        try {
            $this->model->initModel();
        } catch (Exception $e) {
        };
        $this->load->view('homePage', $data);
    }
    function apiCreateTable()
    {
        // echo "Create table function";
        $data = $this->model->createTable();
        $this->load->view('viewMessage', $data);
    }
    function apiInsertData($inseartData)
    {
        $data = $this->model->insert('Model_3D', $inseartData);
        $this->load->view('viewMessage', $data);
    }
    function initProject()
    {
        try {
            $this->model->initModel();
        } catch (Exception $e) {
        };
        $this->load->view('homePage');
    }
    function homePageJSONapi()
    {
        return 'test';
        // return json_encode($this->model->get_model3D_info());
    }
}
