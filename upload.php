<html>
<head></head>
<body bgcolor="#cccccc">
 <form method="post" enctype="multipart/form-data" action="upload.php">
   <input type="file" id="file1" name="file1" value="" /><br /><br />
   <input type="file" id="file2" name="file2" value="" /><br /><br />
   <input type="file" id="file3" name="file3" value="" /><br /><br />
   <input type="file" id="file4" name="file4" value="" /><br /><br />
   <input type="file" id="file5" name="file5" value="" /><br /><br />
   <input type="submit" id="submit" name="submit" value="upload" />
   <?php
     printf("<input id=\"date\" name=\"date\" type=\"hidden\" value=\"".$_GET["date"]."\" />");
     printf("<input id=\"name\" name=\"name\" type=\"hidden\" value=\"".$_GET["name"]."\" />");
   ?>
 </form>

<?php
  $name=$_POST["name"];
  $date=$_POST["date"];

  $desPath="data/".$date."/";
  if(is_uploaded_file($_FILES["file1"]["tmp_name"])){
      $result=move_uploaded_file($_FILES["file1"]["tmp_name"],$desPath.$_FILES["file1"]["name"]);
  }

  if(is_uploaded_file($_FILES["file2"]["tmp_name"])){
      $result=move_uploaded_file($_FILES["file2"]["tmp_name"],$desPath.$_FILES["file2"]["name"]);
  }

  if(is_uploaded_file($_FILES["file3"]["tmp_name"])){
      $result=move_uploaded_file($_FILES["file3"]["tmp_name"],$desPath.$_FILES["file3"]["name"]);
  }

  if(is_uploaded_file($_FILES["file4"]["tmp_name"])){
      $result=move_uploaded_file($_FILES["file4"]["tmp_name"],$desPath.$_FILES["file4"]["name"]);
  }

  if(is_uploaded_file($_FILES["file5"]["tmp_name"])){
      $result=move_uploaded_file($_FILES["file5"]["tmp_name"],$desPath.$_FILES["file5"]["name"]);
  }
?>

</body>
</html>
