<?php
require_once('Smarty.class.php');

class SmartyDir extends Smarty {
	function SmartyDir() {
		$this->Smarty();
		
		$this->template_dir = './szablony/';
		$this->template_dir = './templates/';
		$this->compile_dir = './smarty/templates_c/';
		//$this->config_dir = './smarty/configs/';
		//$this->cache_dir = './smarty/cache/'; 
		
		$this->caching = false;
	}
}
?>