<?php

class Router {
	//the config class
	public $config;
	
	//current class name
	public $class	= '';

	//current method name
	public $method	= '';

	//default controller
	public $default_controller;

	public function __construct(){
		$this->config	= & load_class('config', 'core');
	}

	public function init(){
		
	}

	//load the components and controller floder
	public function auto_load($module){
		//allow the componenets no exists
		if(is_dir(APPPATH.'/'.$module.'/components')){
			$file_arr	= get_file(APPPATH.'/'.$module.'/components');
			if(count($file_arr) > 0){
				foreach($file_arr as $file_name){
					load_class($file_name, 'compenents', $module);
				}
			}
		}

		if(!is_dir(APPPATH.'/'.$module.'/controller')){
			exit($module.' controller directory does not exists ');
		}else{
			$controller_arr	= get_file(APPPATH.'/'.$module.'/controller');
			if(count($controller_arr) > 0){
				foreach($controller_arr as $controller){
					load_class($controller, 'controller', $module);
				}
			}
		}


	}

	

}