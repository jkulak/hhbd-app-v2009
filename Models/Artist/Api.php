<?php
/**
 * Artist Api
 *
 * @author Kuba
 * @version $Id$
 * @copyright __MyCompanyName__, 12 October, 2010
 * @package hhbd
 **/

require_once(LIBRARY_DIRECTORY . '/Db/Mysql.php');
require_once(MODELS_DIRECTORY . '/Artist/Container.php');

class Artist_Api
{
  public $db;
  
  function __construct()
  {
    $this->db = new Db_Mysql();
  }
  
  public function find($id, $full)
  {
    $query = 'select * from artists where id=' . $id;
    $result = $this->db->query($query);
    $params = mysql_fetch_array($result);
    $item = new Artist_Container($params, $full);
    return $item;
  }
}
