<?php

namespace App\Controllers;
use App\Controllers\PageLoader;
use App\Models\AuthModel;

class Authentication extends BaseController
{
    public function login(){

        $session = session();
        $logged_in = $session->get("logged_in");
        if(isset($logged_in)){
			return redirect()->route('/');
        }

        $entered_username = $this->request->getPost("username");
        $entered_password = $this->request->getPost("password");

        $pageLoader = new PageLoader();
        $authModel = new AuthModel();

        if ($entered_username==""||$entered_password=="") {
            $pageLoader->login("Please enter both username and password");
        } else {
            $userData = $authModel->where("username",$entered_username)->first();
            if ($userData) {
                if (password_verify($entered_password,$userData["password"])) {
                    $sessionData = array(
                        "first_name" => $userData["first_name"],
                        "last_name" => $userData["last_name"],
                        "username" => $userData["username"],
                        "logged_in" => TRUE,
                    );
                    $session->set($sessionData);
                    return redirect()->route('/');
                } else {
                    $pageLoader->login("Password is incorrect");
                }
            } else {
                $pageLoader->login("Username is incorrect");
            }
        }
        
    }
    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to(site_url()); 
    }
}