<?php
/**
 * Album Api
 *
 * @author Kuba
 * @version $Id$
 * @copyright __MyCompanyName__, 12 October, 2010
 * @package hhbd
 **/

require_once(LIBRARY_DIRECTORY . '/Db/Mysql.php');
require_once(LIBRARY_DIRECTORY . '/Hhbd/Config.php');
require_once(MODELS_DIRECTORY . '/Album/Container.php');
require_once(MODELS_DIRECTORY . '/MyList.php');

class Album_Api
{
  public $db;
  
  function __construct()
  {
    $this->db = new Db_Mysql();
  }
  
  public function find($id, $full = false)
  {
    $query = 'select *, t1.id as alb_id
      from albums t1, album_artist_lookup t2, artists t3
      where t3.id=t2.artistid and t2.albumid=t1.id and t1.id=' . $id;
    $result = $this->db->query($query);
    $params = mysql_fetch_array($result);
    $item = new Album_Container($params, $full);
    return $item;
  }
  
  public function getList($query)
  {
    $result = $this->db->query($query);
    $albums = new MyList();
    
    while ($params = mysql_fetch_array($result)) {
      $albums->add(new Album_Container($params));
    } 
    
    return $albums;
  }
  
  public function getLike($like = '')
  {
    $query = 'SELECT *, t3.id as alb_id ' .
      'FROM artists AS t1, album_artist_lookup AS t2, albums AS t3, labels AS t4 ' .
      'WHERE (t3.title LIKE "' . $like . '" AND t1.id=t2.artistid AND t2.albumid=t3.id AND t4.id=t3.labelid AND t3.year' . '<="' . date('Y-m-d') . '") ' . 
      'ORDER BY t3.year DESC';
      
    return $this->getList($query);
  }
  
  public function getMostPopular()
  {
    $query = 'SELECT *, t3.id as alb_id ' .
      'FROM artists AS t1, album_artist_lookup AS t2, albums AS t3, labels AS t4 ' .
      'WHERE (t1.id=t2.artistid AND t2.albumid=t3.id AND t4.id=t3.labelid AND t3.year' . '<="' . date('Y-m-d') . '") ' . 
      'ORDER BY t3.viewed DESC ' . 
      'LIMIT ' . HHbd_Config::$defaultPackSize;

    return $this->getList($query);
  }
  
  public function getNewest()
  {
    $query = 'SELECT *, t3.id as alb_id  ' .
      'FROM artists AS t1, album_artist_lookup AS t2, albums AS t3, labels AS t4 ' .
      'WHERE (t1.id=t2.artistid AND t2.albumid=t3.id AND t4.id=t3.labelid AND t3.year' . '<="' . date('Y-m-d') . '") ' . 
      'ORDER BY t3.year DESC ' . 
      'LIMIT ' . HHbd_Config::$defaultPackSize;

    return $this->getList($query);
  }
}
