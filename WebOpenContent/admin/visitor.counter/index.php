<?php
 
include_once("counter.php"); // meng-include-kan script counter.php untuk menghitung jumlah pengunjung
 
initCounter(); // memanggil fungsi 'initCounter()' untuk membuat log pengunjung saat ini
 
echo "<h4>Contoh Membuat IP Counter Pengunjung Website </h4>";
 
echo "Halaman ini telah dikunjungi oleh ".getCounter('hits')." pengunjung, yang terdiri dari ".getCounter('unique')." pengunjung dengan IP Address unik";
 
?>