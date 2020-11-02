<?php
                $day=date("d");
                $monthShow=date("F");
                $month=date("m");
                $year=date("Y");
                $d=mktime(00, 00, 00, $month, 1, $year);
                $weekDay= date("N", $d);
?>

<div class="month bg-gradient-success rounded-top">      
                    <ul>
                        
                        <li>
                        <?php echo $monthShow;?><br>
                        <span style="font-size:18px"><?php echo $year; ?></span>
                        </li>
                    </ul>
                </div>

                    <ul class="weekdays" style="background: rgb(207,217,223); background: linear-gradient(333deg, rgba(207,217,223,1) 5%, rgba(226,235,240,1) 57%);">
                    <li>Mo</li>
                    <li>Tu</li>
                    <li>We</li>
                    <li>Th</li>
                    <li>Fr</li>
                    <li>Sa</li>
                    <li>Su</li>
                    </ul>

                    <ul class="days" style="background: rgb(216,222,237);background: linear-gradient(22deg, rgba(216,222,237,0.9136029411764706) 0%, rgba(207,215,198,0.9836309523809523) 16%, rgba(214,235,213,0.9836309523809523) 35%, rgba(224,238,210,0.9836309523809523) 54%, rgba(237,238,210,0.9836309523809523) 69%, rgba(238,238,210,0.9836309523809523) 78%);">  
                    <?php
                    for ($i=1; $i < $weekDay; $i++) { 
                       echo '<li>&nbsp;</li>';
                    }
                    for ($i=1; $i < (date("t")+1) ; $i++) { 
                        if ($i== $day) {
                            echo '<li><span class="active">'.$i.'</span></li>';
                        } else {
                            echo '<li>'.$i.'</li>';
                        }
                    }

                    ?>
                    </ul>
