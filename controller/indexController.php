<?php
class indexController extends baseController
{

    function __construct($params)
    {
        // 这个需要考虑view，model-----依照最简单的去写
       parent::__construct($params);
    }

    // @override
    public function indexAction()
    {
        $this->mView->display('index.html');
    }

    public function lineAction()
    {
        $this->mView->display('line_try.html');
    }

    public function chartAction()
    {
        $this->mView->display('bar_try.html');
    }

    public function detailsAction()
    {
       $this->mView->display('details.tpl');  
    }

    public function readmeAction()
    {
       $this->mView->display('readme.tpl');  
    }


}
