<?php

/**
 * Artist
 *
 * @author Kuba
 * @version $Id$
 * @copyright __MyCompanyName__, 11 October, 2010
 * @package default
 **/

class Artist_Container
{
  
  public $id;
  public $name;
    
  function __construct($params, $full = false)
  {
    $this->id = $params['id'];
    $this->name = $params['name'];
  }
  
  public function url($canonical = false)
  {
    return Hhbd_Seo::$artistUrl . Tools_Url::createUrl($this->name) . ',' . $this->id . Hhbd_Seo::$suffix;
  }
}