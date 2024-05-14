<?php
class Controller {
    public $load;
    public $model;

    function __construct($pageMethod = null) {
        $this->load = new Load();
        $this->model = new Model();
        if (method_exists($this, $pageMethod)) {
            $this->$pageMethod();
        } else {
            $this->$home();
        }
    }

    function home() {
        $this->load->view('mainPage');
    }

    function homeContent() {
        $data = $this->model->homeContentData();
        $this->load->view('homeContent', $data);
    }

    function modelContent() {
        $data = null;
        if (array_key_exists('brand_id', $_GET)) {
            $data = $this->model->getBrandModel($_GET['brand_id'])
        } else {
            $data = $this->model->getBrandModel(1);
        }
        $this->load->view('modelDisplay', $data);
    }
}
?>