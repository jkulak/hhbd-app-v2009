<?php
/**
 * Url
 *
 * @author Kuba
 * @version $Id$
 * @copyright __MyCompanyName__, 12 October, 2010
 * @package Tools
 **/
 
class Tools_Url
{
  
  function __construct()
  {
    # code...
  }
  
  public function createUrl($string)
  {
    return urlencode($string);
  }
}
