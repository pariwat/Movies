<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MovieService
 *
 * @author sorn
 */
require_once './manage/config.inc.php';
require_once './modules/db/Database.class.php';

class MovieService {

    private $db;

    public function __construct() {
        $this->db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
        $this->db->connect();
    }

    public function __destruct() {
        if ($this->db) {
            $this->db->close();
        }
    }

    public function addMovie($category, $title, $cover, $desc, $videoLink) {
        $data = array(
            'name' => $title,
            'description' => $desc,
            'createdate' => 'now()',
            'lastupdate' => 'now()'
        );
        $id = $this->db->insert('movies_item', $data);
        $cat = array(
            'cid' => $category,
            'mid' => $id,
            'createdate' => 'now()',
            'lastupdate' => 'now()'
        );
        $this->db->insert('movies_itemcategories', $cat);
    }

    public function categories() {
        $id = $this->db->query('SELECT * FROM movies_categories');
        $rs = array();
        while ($row = $this->db->fetch_array($id)) {
            $r = new stdClass();
            $r->id = $row['id'];
            $r->name = $row['categories'];
            $r->display = $row['candisplay'];
            $rs[] = $r;
        }
        
        return $rs;
    }

}
