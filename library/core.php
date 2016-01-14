<?php
abstract class Core
{

    public static $_config;

    public static function run($params)
    {

        // //获取配置文件
        // self::$_config = $config;

         //自动加载核心类  
        self::autoLoad();

        //获取路由信息
        // $params = self::_parseUrl();
        if (!isset($params['c'])) $params['c'] = 'index';
        if (!isset($params['a'])) $params['a'] = 'index';
        
         //调用控制器及其方法
        self::initController($params);

    }

    private static function _parseUrl() 
    {

    }

    public static function initController($router)
    {
        static $codeAr = array();//定义静态变量储存数组，类似单例模式，这里用来存储控制方法逻辑
        $key = $router['c'] . "_" . $router['a'];
        
        $controller = $router['c'] . "Controller";
        $action = $router['a'] . "Action";

        //加载控制器文件
        $controller_path = CONTROLLER_PATH . $controller . ".php";
        self::loadFile($controller_path);

        //创建控制器
        $object = new $controller($router);
        if(method_exists($object, $action)){
            $codeAr[$key] = $object->$action();
        }else{
            self::error("控制器方法不存在！");
        }

        return $codeAr[$key];

    }

    public static function autoLoad() {
        self::loadFile(LIBRARY_PATH . "smarty/Smarty.class.php");
        self::loadFile(LIBRARY_PATH . "smarty/view_smarty.php");
        self::loadFile(CONTROLLER_PATH . "baseController.php");
    }


    public static function loadFile($path) {
        if(empty($path))
        {
            var_dump("{$path}参数错误！");
        }
        else if( !file_exists($path) ) 
        {
            var_dump($path . "文件不存在！");
        }
        else 
        {
            include( $path );
        }
        
    }
}
