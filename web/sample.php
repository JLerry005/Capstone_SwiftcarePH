<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_model extends CI_Model {

    public function save_person($palitanIto)
    {
        $this->db->insert("palitanIto", $palitanIto);
    }
}