<?php
error_reporting(0);
define('host',['Earnbitmoon','earnbitmoon.club','']);
define('version','1.0.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
eval(base64_decode("ZnVuY3Rpb24gX2NJY29uKCR0b2tlbil7CiAgICAkdHM9IHJvdW5kKG1pY3JvdGltZSh0cnVlKSAqIDEwMDApOwogICAgJGRhdGEgPSBbInBheWxvYWQiID0+IGJhc2U2NF9lbmNvZGUoanNvbl9lbmNvZGUoWwogICAgICAgICJpIiAgPT4gIjEiLAogICAgICAgICJhIiAgPT4gIjEiLAogICAgICAgICJ0IiAgPT4gImRhcmsiLAogICAgICAgICJ0cyIgPT4gJHRzXSkpCgkJXTsKCQoJJHIgPSBqc29uX2RlY29kZShiYXNlNjRfZGVjb2RlKHBvc3Qod2ViLicvc3lzdGVtL2xpYnMvY2FwdGNoYS9yZXF1ZXN0LnBocCcsICRkYXRhKSkpOwoJcHJpbnQgcnI7CglwcmludCBwLiIgICBCeXBhc3MgIi5wLiJbIi53My4iMSIucC4iXSI7CglzbGVlcCgxKTsKCXByaW50IHJyOwoJJGhlYWRlcltdID0gImFjY2VwdDogKi8qIjsKCSRoZWFkZXJbXSA9ICdzZWMtY2gtdWE6ICJDaHJvbWl1bSI7dj0iMTA3IiwgIk5vdD1BP0JyYW5kIjt2PSIyNCInOwoJJGhlYWRlcltdID0gIm9yaWdpbjogIi53ZWI7CgkkaGVhZGVyW10gPSAic2VjLWNoLXVhLW1vYmlsZTogPzEiOwoJJGhlYWRlcltdID0gJ3NlYy1jaC11YS1wbGF0Zm9ybToiQW5kcm9pZCInOwoJJGhlYWRlcltdID0gInNlYy1mZXRjaC1zaXRlOiBzYW1lLW9yaWdpbiI7CgkkaGVhZGVyW10gPSAic2VjLWZldGNoLW1vZGU6IGNvcnMiOwogICAgJGhlYWRlcltdID0gInNlYy1mZXRjaC1kZXN0OiBpbWFnZSI7CiAgICAkaGVhZGVyW10gPSAiYWNjZXB0LWxhbmd1YWdlOiBpZC1JRCxpZDtxPTAuOSxlbi1VUztxPTAuOCxlbjtxPTAuNyI7CiAgICAkaGVhZGVyW10gPSAiZG50OiAxIjsKICAgICRoZWFkZXJbXSA9ICJyZWZlcmVyOiAiLndlYi4iLyI7CiAgICAkaGVhZGVyW10gPSAiYWNjZXB0OiBpbWFnZS9hdmlmLGltYWdlL3dlYnAsaW1hZ2UvYXBuZyxpbWFnZS9zdmcreG1sLGltYWdlLyosKi8qO3E9MC44IjsKICAgICRkYXRhID0gYmFzZTY0X2VuY29kZShqc29uX2VuY29kZShbCiAgICAgICAgImkiICA9PiAiMSIsCiAgICAgICAgInRzIiA9PiAkdHNdKSkKCQk7CiAgICAkcj1nYXMod2ViLicvc3lzdGVtL2xpYnMvY2FwdGNoYS9yZXF1ZXN0LnBocD9wYXlsb2FkPScuYmFzZTY0X2VuY29kZSgneyJpIjoxLCJ0cyI6Jy4kdHMuJ30nKSwgMCxhcnJheV9tZXJnZSgkaGVhZGVyLGgoKSkpOwogICAgCiAgICBwcmludCBycjsKCXByaW50IHAuIiAgIEJ5cGFzcyAiLnAuIlsiLnczLiIyIi5wLiJdIjsKCXNsZWVwKDEpOwoJcHJpbnQgcnI7CgkKCSR4ID0gcmFuZCgyMDAsMjUwKTsKICAgICR5ID0gcmFuZCgzMywzNSk7CiAgICAkdyA9IDMwNC44OTg7CgkkZGF0YSA9IFsncGF5bG9hZCcgPT4gYmFzZTY0X2VuY29kZShqc29uX2VuY29kZShbCgkiaSIgID0+ICIxIiwKCSJ4IiAgPT4gJHgsCgkieSIgID0+ICR5LAoJInciICA9PiAkdywKCSJhIiAgPT4gIjIiLAoJInRzIiA9PiAkdHNdKSldOwoJJHIgPSBnYXMod2ViLicvc3lzdGVtL2xpYnMvY2FwdGNoYS9yZXF1ZXN0LnBocCcsICRkYXRhLCBoKCkpWzBdOwogICAgJGRhdGEgPSAiYT1nZXRGYXVjZXQmdG9rZW49Ii4kdG9rZW4uIiZjYXB0Y2hhPTMmY2hhbGxlbmdlPWZhbHNlJnJlc3BvbnNlPWZhbHNlJmljLWhmLWlkPTEmaWMtaGYtc2U9Ii4keC4iLCIuJHkuIiwiLiR3LiImaWMtaGYtaHA9IjsKICAgICRyPSBqc29uX2RlY29kZShwb3N0KHdlYi4iL3N5c3RlbS9hamF4LnBocCIsICRkYXRhKSAsMSk7CiAgICAKICAgIGlmKCRyWydzdGF0dXMnXSA9PSAyMDApewogICAgICAgIGJwc19jYXAoKTsKICAgICAgICBzdWMoJHJbInJld2FyZCJdLCAkclsibnVtYmVyIl0pOwogICAgfWVsc2V7CiAgICAgICAgZWNobyAiICIudzIuc3RyaXBfdGFncygkclsnbWVzc2FnZSddKTsKICAgICAgICBzbGVlcCgxKTsKICAgICAgICBwcmludCBycjsKICAgIH0KfQ=="));
Del_Cok();
function ps($url,$head,$data){
    return curl($url, $head, $data)[1];
}

Function h($data = 0){
    $h[] = "Host: ".host[1];
    $h[] = "X-Requested-With: XMLHttpRequest";
    if($data)$h[] ="Content-Length: ".strlen($data);
    $h[] = "cookie: ".file_get_contents(Data.cok);
    $h[] = "user-agent: ".file_get_contents(Data.uag);
    return $h;
}
Function dashboard(){
    $r=get(web);
    $bal = Ambil($r,'Account Balance <div class="text-primary"><b id="sidebarCoins">','<',1);
    $val = Ambil($r,'Coins Value <div class="text-success"><b>','<',1);
    $tok = Ambil($r,"var token = '","'",1);
    $tim= Ambil($r,'id="claimTime">','</span>',1);
    return ["b"=>$bal,"v"=>$val,"t"=>$tok,"tm"=>$tim];
}
function suc($reward, $lucky ){
    $r = dashboard();
    $b = p.$r["b"].w2." / ".p.$r["v"];
    echo line_at();
    echo line_tg().p." Reward  : ".$reward." coins".w2." / ".p.$lucky.n;
    echo line_tg().p." Balance : ".w3.$b.n;
    echo line_bw();
}
SaveCokUa();
cl();
ban();
$r = dashboard();
$b = p.$r["b"].w2." / ".p.$r["v"];

print line_at();
print line_tg().p." balance : ".$b.n;
print line_bw();
while(true){
    a:
    $r = dashboard();
    $t= $r["t"];
    $time = $r["tm"];
    if($time){
        if(strpos($time,"hour") !== false){
            $cektime=explode(' hour',$time)[0];
            tim(($cektime) * (3600+1800));goto a;}
        if(strpos($time,"minutes") !== false){
            $cektime=explode(' minutes',$time)[0];
            tim(($cektime +1) * 60);goto a;
        }else{
        $cektime=explode(' seconds',$time)[0];
        tim($cektime);
        goto a;
        }
    }
    eval(base64_decode("X2NJY29uKCR0KTs="));
}
