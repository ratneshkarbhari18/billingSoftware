<?php

namespace App\Controllers;

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
}
