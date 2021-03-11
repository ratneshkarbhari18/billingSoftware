<?php

namespace App\Controllers;
use App\Models\ItemsModel;

class PageLoader extends BaseController
{

	private function page_loader($viewName,$data){
		echo view("templates/header",$data);
		echo view("pages/".$viewName,$data);
		echo view("templates/footer",$data);
	}

	public function dashboard(){
		$session = session();

		$logged_in = $session->get("logged_in");

		if(!isset($logged_in)){
			return redirect()->route('login');
		}

		$data = array("title"=>"Dashboard");
		
		$this->page_loader("dashboard",$data);
	}

	public function login($error=""){
		$data = array(
			"title" => "Login",
			"error" => $error
		);
		$this->page_loader("login",$data);
	}

	public function manage_items($success="",$error=""){
		
		$session = session();

		$logged_in = $session->get("logged_in");

		if(!isset($logged_in)){
			return redirect()->route('login');
		}

		$itemsModel = new ItemsModel();
		$allItems = $itemsModel->findAll();

		$data = array(
			"title" => "Manage Items",
			"items" => array_reverse($allItems),
			"success" => $success,
			"error" => $error
		);

		$this->page_loader("manage_items",$data);

	}

	public function add_new_item($success="",$error=""){
		
		$session = session();

		$logged_in = $session->get("logged_in");

		if(!isset($logged_in)){
			return redirect()->route('login');
		}

		$data = array(
			"title" => "Add New Item",
			"success" => $success,
			"error" => $error
		);

		$this->page_loader("add_new_item",$data);

	}

}
