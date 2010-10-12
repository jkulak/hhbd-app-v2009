<?php
/**
 * Date
 *
 * @author Kuba
 * @version $Id$
 * @copyright __MyCompanyName__, 12 October, 2010
 * @package Tools
 **/
 
class Tools_Date
{
  public static $months = array(1 => 'stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia');
  
  function __construct()
  {
    # code...
  }
  
  public function getNormalDate($date)
  {    
    $day = ((int)substr($date, 8, 2)<>0)?(int)substr($date, 8, 2) . ' ':'';
    $month = self::$months[(int)substr($date, 5, 2)];
    $year = substr($date, 0, 4);
  	return $day . $month . ' ' . $year;
  }
}
