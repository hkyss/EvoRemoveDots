<?php
if(!defined('MODX_BASE_PATH')) die('What are you doing? Get out of here!');

global $template;
if(empty($template)) {
  $template = $doc['template'];
}

$include_tpl = trim($include_tpl);
$fields = trim($fields);

include_once MODX_BASE_PATH.'assets/lib/MODxAPI/modResource.php';
$modResource = new modResource($modx);
$modResource->edit((int)$id);

function ProcessFields($fields, $modResource) {
  if(!empty($fields)) {
    $fields = explode(',',$fields);

    foreach($fields as $item) {
      $value = $modResource->get($item);

      if(!empty($value)) {
        $value = str_replace('.','',$value);
        $modResource->set($item, $value);

        unset($value);
      }
    }
  }

  return $modResource;
}

if($modx->event->name == 'OnDocFormSave') {
  if(!empty($include_tpl)) {
    $include_tpl = explode(',',$include_tpl);

    foreach($include_tpl as $item) {
      if((int)$item === (int)$template) {
        $modResource = ProcessFields($fields,$modResource);
      }
    }
  }
  else {
    $modResource = ProcessFields($fields,$modResource);
  }

  $modResource->save(false,false);
  $modResource->close();
}
?>