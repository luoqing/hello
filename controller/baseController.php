<?php
class baseController
{
    protected $mDefLang = 'CN';
    protected $mView = null;
    protected $mParams = null;

    function __construct($params)
    {
        // 这个需要考虑view，model-----依照最简单的去写
        $this->mView = new View_Smarty();
        $this->mView->caching = false;
        $this->mParams = $params;
    }

    
   
}
