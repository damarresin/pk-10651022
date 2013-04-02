<div id="jam" style="color:white;font-size:10px;" name="jam">
<script language="javascript">
function jam(){

var waktu = new Date();
var jam = waktu.getHours();
var menit = waktu.getMinutes();
var detik = waktu.getSeconds();

if (jam < 10){
jam = "0" + jam;
}
if (menit < 10){
menit = "0" + menit;
}

if (detik < 10){
detik = "0" + detik;
}

var jam_div = document.getElementById('jam');
jam_div.innerHTML = jam + ":" + menit + ":" + detik;
setTimeout("jam()", 1000);
}

jam();
</script>
</div>

<script language="javascript">
function show_hari()
{
//membuat variabel bertipe array untuk nama hari
var NamaHari = new Array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat",
"Sabtu");
//membuat variabel bertipe array untuk nama bulan
var NamaBulan = new Array("Januari", "Februari", "Maret", "April", "Mei",
"Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
var sekarang = new Date();
var HariIni = NamaHari[sekarang.getDay()];
var BulanIni = NamaBulan[sekarang.getMonth()];
var tglSekarang = sekarang.getDate();
var TahunIni = sekarang.getFullYear();
document.write(tglSekarang + " " + BulanIni + " " +TahunIni);
}
</script>
<span style="color:white"><script>show_hari();</script></span>