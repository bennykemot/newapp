<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aside extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('Setting/M_Menu','Menu');
	}

	public function get_menu(){
		$parent_menu = $this->Menu->Master();
		$i=0;
		foreach($parent_menu as $p_menu){
			$parent_menu[$i]->sub = $this->get_sub_menu($p_menu->id);
			$i++;
		}
		return $parent_menu;
	}

	public function get_sub_menu($id){

	}

}
