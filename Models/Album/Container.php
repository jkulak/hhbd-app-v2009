<?php

/**
 * Album
 *
 * @author Kuba
 * @version $Id$
 * @copyright __MyCompanyName__, 11 October, 2010
 * @package default
 **/

require_once(MODELS_DIRECTORY . '/Label/Api.php');
require_once(MODELS_DIRECTORY . '/Album/Api.php');
require_once(MODELS_DIRECTORY . '/Artist/Api.php');
require_once(LIBRARY_DIRECTORY . '/Tools/Url.php');
require_once(LIBRARY_DIRECTORY . '/Tools/Date.php');
require_once(LIBRARY_DIRECTORY . '/Hhbd/Seo.php');
require_once(LIBRARY_DIRECTORY . '/Hhbd/Config.php');

class Album_Container
{
  
  public $id;
  public $title;
  public $artist;
  public $releaseDate;
  public $cover;
  
  function __construct($params, $full = false)
  {

    // print_r($params);

    $this->id = $params['alb_id'];
    $this->title = $params['title'];
    $artistApi = new Artist_Api();
    $this->artist = $artistApi->find($params['artistid'], $full);
    $this->legal = ($params['legal']=='y')?true:false;
    
    $labelApi = new Label_Api();
    $this->label = $labelApi->find($params['labelid'], $full);
    
    $this->releaseDate = Tools_Date::getNormalDate($params['year']);
    $this->cdCatalogNumber = $params['media_cd'];
    
    if ($full and isset($params['epfor'])) {
      $albumApi = new Album_Api();
      $this->epFor = $albumApi->find($params['epfor'], $full);
    }
    
    $this->ep = $params['singiel'];
    // TODO: users api
    $this->addedBy = $params['addedby'];
    $this->added = $params['added'];
    $this->updated = $params['updated'];
    $this->views = $params['viewed'];
    $this->cover = Hhbd_Config::$albumThumbnailPath . substr($params['cover'], 0, -4) . Hhbd_Config::$albumThumbnailSuffix;
    if ($full) $this->description = $params['description'];
    $this->updated = $params['updated'];
    $this->status = $params['status'];
  }
  
  public function url($canonical = false)
  {
    return Hhbd_Seo::$albumUrl . Tools_Url::createUrl($this->artist->name . ' - ' . $this->title) . ',' . $this->id . Hhbd_Seo::$suffix;
  }
}
     // [premier] => 
     // [media_mc] => 1
     // [catalog_mc] => 
     // [media_cd] => 1
     // [media_lp] => 0
     // [catalog_lp] => 
     // [artistabout] => 
     // [notes] => 