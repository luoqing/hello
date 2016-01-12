<?php

require_once MODEL_PATH . "dataModel.php" ;

class dataController extends baseController
{

    function __construct($params)
    {
        // 这个需要考虑view，model-----依照最简单的去写
       parent::__construct($params);
       $this->model = new dataModel();
    }

    // @override
    public function indexAction()
    {
        $params = $this->mParams;
        $tbData = $this->model->queryDB();
        if (!empty($tbData))
        {
            echo json_encode($tbData);
        }
        else
        {
            echo "no data\n";
        }
    }

   

}
