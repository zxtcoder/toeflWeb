<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="css/main.css" />

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

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

  function docReady(){
    hideUP();
    hideExp();
  }

  function hideUP(){
    $("#upFile").hide();
  }

  function showUP(){
    $("#upFile").show();
  }

  function hideExp(){
    $("#explorer").hide();
  }

  function showExp(){
    $("#explorer").show();
  }

  $(document).ready(docReady);

</script>

</head>

<body>

<div id="upFile">
  <table  cellspacing="0" width="510px" border="0">
    <tr bgcolor="#1111ff" style="color:#ffffff"><td> Upload File</td>
      <td width="32px"><img width="32px" src="images/close.png" onclick="hideUP()"/></td>
    </tr>
    <tr bgcolor="#cccccc"><td colspan="2">
      <?php
        printf("<iframe id=\"ifUpload\" src=\"upload.php?date=%s&name=%s\"></iframe>",$_GET["date"],$_GET["name"]);
      ?>
    </td></tr>
  </table>
</div>

<div id="explorer">
  <table  cellspacing="0" width="510px" border="0">
    <tr bgcolor="#1111ff" style="color:#ffffff"><td> Explorer</td>
      <td width="32px"><img width="32px" src="images/close.png" onclick="hideExp()"/></td>
    </tr>
    <tr bgcolor="#cccccc"><td colspan="2">
      <?php
      ?>
    </td></tr>
  </table>
</div>

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
        printf("<a href=\"cal.php\"><img style=\"width:30px\" src=\"images/back.png\"></img></a>&nbsp;&nbsp;&nbsp;");
        printf("<a href=\"javascript:showUP()\"><img style=\"width:30px\" src=\"images/upload.png\"></img></a>&nbsp;&nbsp;");
        printf("<a href=\"javascript:showExp()\"><img style=\"width:30px\" src=\"images/explorer.png\"></img></a>");
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
