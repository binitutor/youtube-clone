<?php
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
   echo $_FILES['fileToUpload']['name'];
 }
?>