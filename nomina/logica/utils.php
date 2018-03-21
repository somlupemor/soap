<?php
function getParameter($parameter){
if(isset($_GET[$parameter])){
  return $_GET[$parameter];
}
else if(isset($_POST[$parameter])){
  return $_POST[$parameter];
}
else{
  return null;
}

}
?>
