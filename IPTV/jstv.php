<?php
header('Content-Type:text/json;charset=UTF-8');
$id = isset($_GET['id'])?$_GET['id']:'jsws';
/*
江苏卫视id=jsws
江苏公共新闻id=jsgg
江苏城市id=jscs
江苏综艺id=jszy
江苏影视id=jsys
江苏体育id=jsty
江苏教育id=jsjy
江苏靓妆id=jslz
江苏学习id=xxpd
江苏国际id=jsgj
好享购物id=hxgw
优漫卡通id=ymkt
*/
$e = 'https://live-hls.jstv.com/livezhuzhan/'.$id.'.m3u8';
$a = '/livezhuzhan/'.$id.'.m3u8';
$r = "jstvlivezhuzhan@2022cdn!@#124gg";
$i = time()+5;
$d = substr(md5($r."&".$i."&".$a),12,8).$i;
$m3u8 = $e."?upt=".$d;
$r = 'http://live.jstv.com/';
$h = ["User-Agent: Mozilla/5.0 (Windows NT 6.1)","Referer: $r",];
if (empty($_GET['ts'])){
      print_r(preg_replace("/(.*?.ts)/i",(isset($_SERVER["HTTPS"])&&$_SERVER["HTTPS"]==="on"?"https":"http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]?ts=https://live-hls.jstv.com$1",getdata($m3u8,$h,$r)));
  } else {
   $ts = getdata($_GET['ts'],$h,$r);
   echo $ts;
   }
function getdata($url,$header,$ref){
       $ch = curl_init($url);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
       curl_setopt($ch, CURLOPT_REFERER, $ref);
       $res = curl_exec($ch);
       curl_close($ch);
       return $res;
}
?>
