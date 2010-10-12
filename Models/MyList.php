<?php

/**
 * List
 *
 * @author Kuba
 * @version $Id$
 * @copyright __MyCompanyName__, 11 October, 2010
 * @package hhbd
 **/

class MyList
{
  public $items;
  
  function __construct()
  {
    $this->items = array();
  }
  
  public function add($item)
  {
    $this->items[] = $item;
  }
}
