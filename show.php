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
            foreach($dataArray as $line){
                $tmpLine=$line;
                $cha=mb_detect_encoding($line);
                $tmpLine=mb_convert_encoding($tmpLine,"utf-8",$cha);
                if(substr($tmpLine,0,4)=="<img" || substr($tmpLine,0,2)=="<a")
                    printf($tmpLine);
                else
                    printf(nl2br(str_replace(" ","&nbsp",$tmpLine)));
            }
        }
    }

?>

<table style="word-break:break-all;word-wrap:break-all;" width="100%" cellspacing="1" border="0" align="center">
  <tr height="50px" valign="middle" align="left">
    <td width="50px"><img width=50px src="images/sqicon.jpg"></img></td>
    <td align="left" width="400px">
    <?php
      $rDate=$_GET["date"];
      printf($rDate."<br><br>"." <a href=\"edit.php?cmd=show&name=sq&date=".$rDate."\"".">"."<img style=\"width:30px\"src=\"images/edit.png\"></img></a>");
    ?>
    <a href="cal.php"><img style="width:30px" src="images/back.png"></img></a>
    </td>
    <td width="50px"><img width=50px src="images/zxticon.jpg"></img></td>

    <td align="left" width="400px">
    <?php
      $rDate=$_GET["date"];
      printf($rDate."<br><br>"." <a href=\"edit.php?cmd=show&name=zxt&date=".$rDate."\"".">"."<img style=\"width:30px\"src=\"images/edit.png\"></img></a>");
    ?>
    <a href="cal.php"><img style="width:30px" src="images/back.png"></img></a>
    </td>
  </tr>

  <tr height="800" align="left" valign="top">
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
  </tr>

</table>
</body>

</html>
