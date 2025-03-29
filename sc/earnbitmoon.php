<?php
error_reporting(0);
define('host',['Earnbitmoon','earnbitmoon.club','']);
define('version','1.0.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Del_Cok();
function x(){return rand(80,200);}
function y(){return rand(26,35);}
function w(){return "314.678";}
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
