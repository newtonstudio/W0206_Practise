<?php
function slug($content){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $content);
   return $slug;
}
?>