<!--
session_start();
include "../config/config.php";
$userid = $_SESSION['userid'];
$pesan = mysql_query("SELECT * FROM tabel_pesan WHERE kepada='$userid' and sudahbaca='N'");
$j = mysql_num_rows($pesan);
if($j>0){
    echo "Messages<br/><br/><table style='background-color:white; border-bottom:1px solid rgba(0, 0, 0, 0.2);' border=0 width=100% style=\"font-size:10pt\">";
}else{
    die("<font color=red size=1>Tidak ada pesan baru yang belum dibaca</font>");
}
while($p = mysql_fetch_array($pesan)){
    echo "<tr align='center' style='border-top:1px solid rgba(0, 0, 0, 0.2);'><td onmouseover=\"this.style.backgroundColor='rgb(38, 174, 242)'\"
     onmouseout=\"this.style.backgroundColor='transparent'\">
     <a style='color:black;text-decoration:none' href=./?hal=message&no=".$p['nomor'].">Pesan dari : ".$p['dari']."<br>
     <span style='color:silver'>".$p['waktu']."</span></a></td></tr>";
}
echo "</table>";
echo "<br/><center><a href=''>See All</a></center>";
-->

					<?php
					session_start();
					include "../config/config.php";
					$userid = $_SESSION['userid'];
					$dataPerPage = 5;
					error_reporting(0);
					if(isset($_GET['page']))
					{
					$noPage = $_GET['page'];
					}
					else $noPage = 1;
					$offset = ($noPage - 1) * $dataPerPage;
					$pesan 	= mysql_query("SELECT * FROM tabel_messages WHERE kepada='$userid' and sudahbaca='N' LIMIT $dataPerPage");
					$j = mysql_num_rows($pesan);
					if($j>0){
						echo "<span style='padding:20px;'>Messages</span><table style='background-color:white; border-bottom:1px solid rgba(0, 0, 0, 0.2);' border=0 width=100% style=\"font-size:10pt\">";
					}else{
						die("<font color=red size=1>Tidak ada pesan baru yang belum dibaca</font>");
					}

					while($p = mysql_fetch_array($pesan)){
						echo "<tr align='' style='border-top:1px solid rgba(0, 0, 0, 0.2);'><td onmouseover=\"this.style.backgroundColor='#eee'\"
						 onmouseout=\"this.style.backgroundColor='transparent'\">
						 <a style='color:black;text-decoration:none;' href=./?hal=readmessages&no=".$p['nomor']."><span style='font-style:bold;'>".$p['dari']."</span><br>
						 <span style='color:#aaa;font-style:italic;'>".$p['waktu']."</span></a></td></tr>";
					}
					echo "</table>";
					echo "<br/><center><a href='?hal=seeallmessages'>See All</a></center><br/>";
					?>