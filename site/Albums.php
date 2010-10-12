<?php

/**
 * Albums controller
 *
 * @author Kuba
 * @version $Id$
 * @copyright __MyCompanyName__, 11 October, 2010
 * @package default
 **/

require_once(MODELS_DIRECTORY . '/Album/Api.php');
$albumApi = new Album_Api();

// if we have album page, or album list
$test = preg_match('/^.*,(.*)$/', $id, $matches);

if ($test) {
  $id = $matches[1];
  $album = $albumApi->find($id, true);
  $smarty->assign('album', $album);
  $smarty->assign('body_template', 'site/Album.tpl');
}
else
{
  switch ($id) {
    case '':
      $albums = $albumApi->getNewest();
      break;

    case 'najpopularniejsze':
      $albums = $albumApi->getMostPopular();
      break;

    default:
      $albums = $albumApi->getLike($id . '%');
      break;
  }
  
  $smarty->assign('albums', $albums);

  $smarty->assign('subtitle', 'Lista albumów' . (isset($letter)?' [' . $letter . ']':''));

  $smarty->assign('keywords', 'lista albumów');
  $smarty->assign('description', 'Lista polskich albumów hip-hopowych.');	
  $smarty->assign('title', 'Lista albumów');
  
  $smarty->assign('body_template', 'site/albums.tpl');
}