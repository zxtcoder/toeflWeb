<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />
<title>Fight for TOEFL!!!</title>
</head>

<body>

<?php
    $mDays1=array(0,31,28,31,30,31,30,31,31,30,31,30,31);
    $mDays2=array(0,31,29,31,30,31,30,31,31,30,31,30,31);
 
    function ifLeap($y){
        if($y%4==0 && $y%100!=0)return(1);
        if($y%400==0)return(1);
        return(0);
    }
    
    function cal_month($y,$m){
        global $mDays1;
        global $mDays2;

        for($i=0;$i<35;$i++){
            $mA[$i]=0;
        }
        $days=0;
        for($year=1970;$year<=$y;$year++){
            if($year==$y) $mEnd=$m-1;
            else $mEnd=12;
            for($mon=1;$mon<=$mEnd;$mon++){
                if(ifLeap($year)==1) $days=$days+$mDays2[$mon];
                else $days=$days+$mDays1[$mon];
            }
        }

        $wDay=(($days)%7 + 4)%7;
        if($wDay==0) $wDay=7;

        if(ifLeap($y)==1) $dayNum=$mDays2[$m];
        else $dayNum=$mDays1[$m];

        for($i=1;$i<=42;$i++) $calDay[$i]=0;
        for($i=$wDay;$i<=$wDay+$dayNum-1;$i++) $calDay[$i]=$i-$wDay+1;

        return($calDay);
    }
?>

<table border="0" width="500" height="400" align="center">
  <tr height="30" bgcolor="#ffffff"><td align="center" colspan="7"><img src="images/ml201412.jpg" style="width:300px"></img></td></tr>
  <tr bgcolor="#ffbbff" height="30" align="center">
    <td width="50">Mon</td> <td width="50">Tue</td> <td width="50">Wed</td>
    <td width="50">Thu</td> <td width="50">Fri</td> <td width="50">Sat</td> <td width="50">Sun</td>
    <?php
      $cal=cal_month(2014,12);
      $nowDate=date("Ymd");
      for($i=1;$i<=6;$i++){
          if($i!=1 && $cal[7*($i-1)+1]==0)break;
          print("<tr align=\"center\" bgcolor=\"#ffffff\">");
          for($j=1;$j<=7;$j++){
              $dayNum=$cal[7*($i-1)+$j];
              if($dayNum!=0){
                  if($dayNum<10) $dayTmp="0".$dayNum;
                  else $dayTmp=$dayNum;
                  $tmpDate="201412".$dayTmp;
                  if($tmpDate>$nowDate)
                      print("<td bgcolor=\"#aabbff\">".$dayNum."</td>");
                  else if($tmpDate==$nowDate)
                      print("<td bgcolor=\"#ff1111\"><a href=\"show.php?date=".$tmpDate."\">".$dayNum."</a></td>");
                  else 
                      print("<td bgcolor=\"#bbbbbb\"><a href=\"show.php?date=".$tmpDate."\">".$dayNum."</a></td>");
              }
              else print("<td></td>");
          }
          print("</tr>");
      }
    ?>
  </tr>
</table>
<br><br><br>
<table border="0" width="500" height="400" align="center">
  <tr height="30" bgcolor="#ffffff"><td align="center" colspan="7"><img src="images/ml201501.jpg" style="width:300px"></img></td></tr>
  <tr bgcolor="#ffbbff" height="30" align="center">
    <td width="50">Mon</td> <td width="50">Tue</td> <td width="50">Wed</td>
    <td width="50">Thu</td> <td width="50">Fri</td> <td width="50">Sat</td> <td width="50">Sun</td>
    <?php
      $cal=cal_month(2015,1);
      $nowDate=date("Ymd");
      for($i=1;$i<=6;$i++){
          if($i!=1 && $cal[7*($i-1)+1]==0)break;
          print("<tr align=\"center\" bgcolor=\"#ffffff\">");
          for($j=1;$j<=7;$j++){
              $dayNum=$cal[7*($i-1)+$j];
              if($dayNum!=0){
                  if($dayNum<10) $dayTmp="0".$dayNum;
                  else $dayTmp=$dayNum;
                  $tmpDate="201501".$dayTmp;
                  if($tmpDate>$nowDate)
                      print("<td bgcolor=\"#aabbff\">".$dayNum."</td>");
                  else if($tmpDate==$nowDate)
                      print("<td bgcolor=\"#ff1111\"><a href=\"show.php?date=".$tmpDate."\">".$dayNum."</a></td>");
                  else 
                      print("<td bgcolor=\"#bbbbbb\"><a href=\"show.php?date=".$tmpDate."\">".$dayNum."</a></td>");
              }
              else print("<td></td>");
          }
          print("</tr>");
      }
    ?>
  </tr>
</table>

</body>

</html>
