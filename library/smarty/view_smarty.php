<?php
    class View_Smarty
    {
        private $_tpl = NULL;
        private $_leftDelimiter = '{';
        private $_rightDelimiter = '}';

        public function __construct($param = array())
        {
            defined('VIEW_PATH') || define('VIEW_PATH', ROOT_PATH);
            //defined('PATH_VIEW_TPC') || define('PATH_VIEW_TPC', PRJ_TMP_DIR . '/templates_c/');
            defined('VIEW_PATH') || define('VIEW_PATH', PRJ_TMP_DIR);

            $this->_tpl = new Smarty();
            $this->_tpl->template_dir = VIEW_PATH;     
            // $this->_tpl->compile_dir = PATH_VIEW_TPC;
            $this->_tpl->left_delimiter = $this->_leftDelimiter;
            $this->_tpl->right_delimiter = $this->_rightDelimiter;
            $this->_tpl->compile_locking = false;

            // defined('PATH_VIEW_CONFIG') || define('PATH_VIEW_CONFIG', PRJ_ROOT_DIR . '/htdocs/view/smarty/configs/');
            // $this->_tpl->addConfigDir(PATH_VIEW_CONFIG);

            //自动转义html标签，防止xss，不转义使用{=$data nofilter=}
            function escFilter($content, $smarty)
            {
                return htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
            }

            $this->_tpl->registerFilter('variable', 'escFilter');
        }

        public function setDelimiter($left = '{', $right = '}')
        {
            $this->_leftDelimiter = $left;
            $this->_rightDelimiter = $right;
        }

        public function __call($name, $arguments)
        {
            if (method_exists($this->_tpl, $name))
            {
                return call_user_func_array(array($this->_tpl, $name), $arguments);
            }
        }
    }