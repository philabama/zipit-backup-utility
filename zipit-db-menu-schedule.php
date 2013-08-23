<?php 
###############################################################
# Zipit Backup Utility
###############################################################
# Developed by Jereme Hancock for Cloud Sites
# Visit http://zipitbackup.com for updates
###############################################################

// include password protection
    require("zipit-login.php"); 

$db_dir = "./dbs"; //change this if the script is in a different dir that the files you want 
$show = array( '.php'); //Type of files to show 

$select = "<form name = \"db_form_schedule\"><select name=\"db_select_schedule\" onchange = \"display_Schedule();\"><option value='Select Database to Backup'>Select Database to Backup</option>\n"; 

$dh = @opendir( $db_dir ); 
while( false !== ( $file = readdir( $dh ) ) ){ 
    $ext=substr($file,-4,4); 
        if(in_array( $ext, $show )){       
            $file = str_replace("-config.php", "", $file);   
               if ($file != "index.php") {
                  $select .= "<option value='$file'>$file</option>\n"; 
               }
    } 
}   

$select .= "</select><a href='#' class='update_db_menu_schedule' id='update_db_menu_schedule' onclick='updateDbMenuSchedule();' style='margin-left:10px;position:relative;top:5px;' title='Refresh Database Menu'><img src='images/refresh.png'/></a></form><br/>"; 
closedir( $dh ); 

echo "$select"; 
?>
