<title>See All Messages</title>
      <div class="main_container" style="margin-top:20px;"> 	
          <h2 class="">Messages</h2>			
          <div class="row-fluid">
            <div class="widget span8">
              <div class="widget-header">
                <i class="icon-envelope"></i>
                <h5>Messages</h5>
              </div>
              <div class="widget-body">
                <div class="widget-tickets widget-tickets-large clearfix">
                  <ul>
			
			
			

<?php
					$dataPerPage = 5;
					error_reporting(0);
					if(isset($_GET['page']))
					{
					$noPage = $_GET['page'];
					}
					else $noPage = 1;
					$offset = ($noPage - 1) * $dataPerPage;
					$query = "SELECT * FROM tabel_messages where sudahbaca='N' order by waktu desc LIMIT $offset, $dataPerPage";
					$result = mysql_query($query) or die('Error');
					echo "";
					while($data = mysql_fetch_array($result))
					{
?>

                    <li class="priority-high">
                      <h5>Javascript error</h5>
                       "<?php echo substr($data['pesan'],0,10); ?>"
                      <div class="date"><?php echo $data['waktu']; ?></div>
                      <div class="username"><?php echo $data['dari']; ?></div>
                      <div class="settings"><a href="./?hal=readmessages&no=<?php echo $data['nomor']; ?>">Read</a><a href="#"><i class="icon-reply"></i></a><a href="#"><i class="icon-trash"></i></a><a href="#"><i class="icon-edit"></i></a></div>
                    </li>

<?php
					}
					$query = "SELECT COUNT(*) AS jumData FROM tabel_messages";
					$hasil = mysql_query($query);
					$data = mysql_fetch_array($hasil);
					$jumData = $data['jumData'];
					$jumPage = ceil($jumData/$dataPerPage);
					
					if ($noPage > 1) echo "<a href='".$_SERVER['PHP_SELF']."?hal=seeallmessages&page=".($noPage-1)."'><< Prev</a>";
					for($page = 1; $page <= $jumPage; $page++)
					{
					if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
					{
					if (($showPage == 1) && ($page != 2)) echo "...";
					if (($showPage != ($jumPage - 1)) && ($page == $jumPage)) echo "...";
					if ($page == $noPage) echo " <b>".$page."</b> ";
					else echo " <a href='".$_SERVER['PHP_SELF']."?hal=seeallmessages&page=".$page."'>".$page."</a> ";
					$showPage = $page;
					}
					}
					if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?hal=seeallmessages&page=".($noPage+1)."'>Next >></a>";
				
?>
					
					</ul>
                </div>
              </div><!--/widget-body-->
            </div> <!-- /widget span8 -->
          </div> <!-- /row-fluid -->
</div>					