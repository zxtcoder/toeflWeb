<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />
<title>Fight for TOEFL!!!</title>

<?php
  $rDate=$_GET["date"]; $name=$_GET["name"]; 
  $cmd=$_GET["cmd"]; $pwd=$_POST["pwd"];
  if($cmd=="submit"){

      if(($name=="sq" && $pwd=="shengqian") || ($name=="zxt" && $pwd="1qaz2wsx")){

          $rData=$_POST["rData"];
          if(!file_exists("data/".$rDate))mkdir("data/".$rDate);
          $fp=fopen("data/".$rDate."/".$name.$rDate.".note","w");
          fwrite($fp,$rData);
          fclose($fp);
      }
      header("Location: show.php?date=".$rDate);
  }
    
?>

</head>

<body>

<?php

    function outFile($fileName){
        if(file_exists($fileName)){
            $dataArray=file($fileName);
            foreach($dataArray as $line)
                print($line);
        }
    }

?>
<table width="800"  border="1" align="center">
  <tr height="500">
    <td>
      <?php
        $rDate=$_GET["date"];
        $name=$_GET["name"];
        printf("<form action=\"edit.php?name=%s&date=%s&cmd=submit\" method=\"POST\">",$name,$rDate);
        printf("Name:%s Date:%s Password:<input name=\"pwd\" type=\"password\"></input> <input value=\"submit\" type=\"submit\"></input>",$name,$rDate);
        printf("<textarea name=\"rData\" style=\"resize:none;width:800px;height:600px\">");
        outFile("data/".$rDate."/".$name.$rDate.".note");
        printf("</textarea>");
      ?>
 
      </form>
    </td>
  </tr>
</table>

</body>

</html>
