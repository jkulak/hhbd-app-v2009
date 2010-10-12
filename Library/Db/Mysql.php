<?php
/**
 *DB Mysql connector
 *
 * @author Kuba
 * @version $Id$
 * @copyright __MyCompanyName__, 12 October, 2010
 * @package hhbd
 **/
 
/**
* 
*/
class Db_Mysql
{

  public $dbHost;
  public $dbUser;
  public $dbPassword;
  public $dbSchema;
  
  public $lastResult;
  
  function __construct()
  {
    $this->dbHost = 'localhost:3306';
    $this->dbUser = 'www';
    $this->dbPassword = 'www';
    $this->dbSchema = 'hhbdrebuild';
  }
  
  public function query($query)
  {
    $this->lastResult = mysql_query($query);
    return $this->lastResult;
  }

}
