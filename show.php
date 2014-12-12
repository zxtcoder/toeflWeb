<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />
<title>Fight for TOEFL!!!</title>
</head>

<body>

<?php

    function outFile($fileName){
        if(file_exists($fileName)){
            $dataArray=file($fileName);
            foreach($dataArray as $line)
                if(substr($line,0,4)=="<img")
                    printf(nl2br($line));
                else
                    printf(nl2br(str_replace(" ","&nbsp",$line)));
        }
    }

?>

<table style="word-break:break-all;word-wrap:break-all;table-layout:fixed;" width="1000px" cellspacing="1" border="0" align="center">
  <tr height="100px" valign="middle" align="center">
    <td width="100px"><img src="images/sqicon.jpg"></img></td>
    <td align="left">
    <?php
      $rDate=$_GET["date"];
      printf($rDate."<br><br>"." <a href=\"edit.php?cmd=show&name=sq&date=".$rDate."\"".">"."Edit</a>");
    ?>
    </td>
    <td width="100px"><img src="images/zxticon.jpg"></img></td>

    <td align="left">
    <?php
      $rDate=$_GET["date"];
      print($rDate."<br><br>"." <a href=\"edit.php?cmd=show&name=zxt&date=".$rDate."\"".">"."Edit</a>");
    ?>
    </td>
  </tr>

  <tr height="400" align="left" valign="top">
    <td colspan="2" bgcolor="#ffc3c3" style="border-style:solid;border-color:#000000;border-width:1px;">
      <?php
        $rDate=$_GET["date"];
        printf("Date: ".$rDate."<br>--------------------------------<br>");
        outFile("data/".$rDate."/sq".$rDate.".note");
      ?>
    </td>
    <td colspan="2" bgcolor="#a5a5ff" style="border-style:solid;border-color:#000000;border-width:1px;">
      <?php
        $rDate=$_GET["date"];
        printf("Date: ".$rDate."<br>--------------------------------<br>");
        outFile("data/".$rDate."/zxt".$rDate.".note");
      ?>
    </td>
  </tr>
  <tr>
    <td colspan="4"><a href="index.php">Back</a></td>
  </tr>

</table>
</body>

</html>
