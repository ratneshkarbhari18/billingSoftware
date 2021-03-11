<?php

namespace App\Controllers;
use App\Models\ItemsModel;

class Items extends BaseController
{

    public function add_new(){

        $session = session();

		$logged_in = $session->get("logged_in");

        if (!isset($logged_in)) {
            return redirect()->route('login');
        }

        $objToInsert = array(
            "title" => $this->request->getPost("title"),
            "price" => $this->request->getPost("price"),
            "gst" => $this->request->getPost("gst")
        );

        $itemsModel = new ItemsModel();

        $inserted = $itemsModel->insert($objToInsert);

        if ($inserted) {
            return redirect()->route('items-mgt');
        } 

    }

    public function delete(){

        $session = session();

		$logged_in = $session->get("logged_in");

        if (!isset($logged_in)) {
            return redirect()->route('login');
        }

        $itemId = $this->request->getPost("id");

        $itemsModel = new ItemsModel();
        
        $deleted = $itemsModel->delete($itemId);

        return redirect()->route('items-mgt');

    }

}