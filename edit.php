<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />
<title>Fight for TOEFL!!!</title>

<?php
  $rDate=$_GET["date"]; $name=$_GET["name"]; 
  $cmd=$_GET["cmd"]; $pwd=$_POST["pwd"];
  if($cmd=="submit"){

      //if(($name=="sq" && $pwd=="shengqian") || ($name=="zxt" && $pwd="1qaz2wsx")){
      {

          $rData=$_POST["rData"];
          $cha=mb_detect_encoding($rData);
          $rData=mb_convert_encoding($rData,"utf-8",$cha);
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
                printf($line);
        }
    }

?>
<table width="800"  border="0" align="center">
  <tr height="100" valign="middle">
    <td width="100" align="center" valign="middle">
      <?php
        $rDate=$_GET["date"];
        $name=$_GET["name"];
        printf("<form action=\"edit.php?name=%s&date=%s&cmd=submit\" method=\"POST\">",$name,$rDate);
        printf("<img src=\"images/".$name."icon.jpg\"></img>");
        printf("</td><td>");
        printf("Name:%s <br>Date:%s <br><br>Password:<input name=\"pwd\" type=\"password\"></input> <input value=\"submit\" type=\"submit\"></input>",$name,$rDate);
        printf("</td>");
        printf("<tr>");
        printf("<td>");
        printf("<a href=\"cal.php\"><img style=\"width:30px\" src=\"images/back.png\"></img></a>");
        printf("</td>");
        printf("</tr>");
        printf("<tr height=\"500\"><td colspan=2>");
        printf("<textarea name=\"rData\" style=\"border-style:solid;border-color:#000000;resize:none;width:800px;height:500px;background-color:#ccccff\">");
        outFile("data/".$rDate."/".$name.$rDate.".note");
        printf("</textarea></form>");
        printf("</td></tr>");
      ?>
 
</table>

</body>

</html>
