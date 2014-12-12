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

    $cal=cal_month(2014,12);
    for($i=1;$i<=6;$i++){
        for($j=1;$j<=7;$j++){
            print("".$cal[7*($i-1)+$j]);
        }
        print("<br>");
    }
    
    
?>

hello,world
</body>

</html>
