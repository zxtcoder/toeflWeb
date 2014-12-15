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
          mkdir("data/".$rDate."/sqFiles");
          mkdir("data/".$rDate."/zxtFiles");
          $fp=fopen("data/".$rDate."/".$name.$rDate.".note","w");
          fwrite($fp,$rData);
          fclose($fp);
      }
//      header("Location: show.php?date=".$rDate);
  }
    
?>

<?php

    function outFile($fileName){
        if(file_exists($fileName)){
            $dataArray=file($fileName);
            foreach($dataArray as $line)
                printf($line);
        }
    }

?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

  function docReady(){
    hideUP();
    hideFL();
  }

  function hideUP(){
    $("#upFile").hide();
  }

  function saveSubmit(){
    $("#txtSave").submit();
  }


  function showUP(){
    $("#upFile").show();
    hideFL();
  }

  function hideFL(){
    $("#fileList").hide();
  }

  function showFL(){
    $("#fileList").show();
    hideUP();
  }

  function insertText(txt){
    $("#rData").text(txt);
    
  }

  $(document).ready(docReady);

</script>

</head>

<body>

<table width="500px"  border="0" align="center">
      <?php
        $rDate=$_GET["date"];
        $name=$_GET["name"];
        printf("<tr valign=top>");
        printf("<td colspan=2>");
        printf("<img width=50px src=\"images/".$name."icon.jpg\"></img>&nbsp;&nbsp;&nbsp;");
        printf("<a href=\"cal.php\"><img style=\"width:30px\" src=\"images/back.png\"></img></a>&nbsp;&nbsp;&nbsp;");
        printf("<a href=\"javascript:showUP()\"><img style=\"width:30px\" src=\"images/upload.png\"></img></a>&nbsp;&nbsp;");
        printf("<a href=\"javascript:showFL()\"><img style=\"width:30px\" src=\"images/explorer.png\"></img></a>&nbsp;&nbsp;");
        printf("<a href=\"javascript:saveSubmit()\"><img style=\"width:30px\" src=\"images/save.png\"></img></a>");
        printf("</td>");
        printf("</tr>");
        printf("<tr><td colspan=2>");
        printf("%s&nbsp;&nbsp;%s",$name,$rDate);
        printf("</td></tr>");
        printf("<tr height=\"500\" valign=\"top\"><td>");
        printf("<form id=\"txtSave\" action=\"edit.php?name=%s&date=%s&cmd=submit\" method=\"POST\">",$name,$rDate);
        printf("<textarea id=\"rData\" name=\"rData\" style=\"border-style:solid;border-color:#000000;resize:none;width:500px;height:500px;background-color:#ccccff\">");
        outFile("data/".$rDate."/".$name.$rDate.".note");
        printf("</textarea></form></td>");
        printf("<td width=300 valign=\"top\" bgcolor=\"#ffffff\">");

        printf("<div id=\"fileList\">");
        printf("<table cellspacing=0><tr style=\"color:#ffffff\" bgcolor=\"#5555ff\"><td>File List</td>");
        printf("<td  width=24px><img width=24px src=\"images/close.png\" onclick=\"hideFL()\" /></td>");
        printf("</tr>");
        printf("<tr><td>");
        $date=$_GET["date"];
        $name=$_GET["name"];
        $path="data/".$date."/".$name."Files/";
        $dh=opendir("data/".$date."/".$name."Files/");
        while($file=readdir($dh)){
            $fname=$file;
            $exName=strtolower(substr(strrchr($fname,"."),1));
            if($exName=="jpg" || $exName=="png" || $exName=="gif" || $exName=="bmp"){
                $imgTxt="&lt;img src=".$path.$fname." /&gt;";
                printf("<img width=\"50px\" src=\"%s\" /><br />", $path.$fname);
                printf("<input style=\"width:500px\" type=text value='%s' /><br /><br />", $imgTxt);
            }
            else if($fname!="." && $fname!=".."){
                $docTxt="&lt;a href=".$path.$fname."&gt;".$fname."&lt;/a&gt;";
                printf("%s<br />", $fname);
                printf("<input style=\"width:500px\" type=text value='%s' /><br /><br />", $docTxt);
            }
        }
        closedir($dh);
        printf("</td></tr></table>");
        printf("</div>");
      ?>
      <div id="upFile">
        <table  cellspacing="0" width="510px" border="0">
          <tr bgcolor="#5555ff" style="color:#ffffff"><td> Upload File</td>
            <td width="24px"><img width="24px" src="images/close.png" onclick="hideUP()"/></td>
          </tr>
          <tr bgcolor="#cccccc"><td colspan="2">
            <?php
              printf("<iframe id=\"ifUpload\" src=\"upload.php?date=%s&name=%s\"></iframe>",$_GET["date"],$_GET["name"]);
            ?>
          </td></tr>
        </table>
      </div>
      

      </td></tr>
 
</table>

</body>

</html>
