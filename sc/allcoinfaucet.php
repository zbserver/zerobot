<?php
define('host',['Allcoinfaucet','allcoinfaucet.com','/?r=TALrypwEaPW5JhDwg6b54KY3PFJrZkagaa']);
define('version','1.0.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Function h(){
    $h[] = "Host: ".host[1];
    $h[] = "Referer: ".web.host[2];
    $h[] = "user-agent: ".getUserAgent();
    $h[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
	$h[] = "accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7";
    return $h;
}
Menu_Api();
$w= readline(p." Wallet".panah.hm);
get(web.host[2]);
cl();
ban();
$r = get(web.host[2]);
$b = Ambil($r,'<p class="alert alert-info">[TRX] Balance: ',' satoshi</p>',1);
echo " ".p."Balance Web".w3." : ".hm.$b.n;
echo " ".p."Apikey".w3." : ".Api_Bal().n;
echo " ".line();
while(true){
    $r = get(web.host[2]);
    $l = Ambil($r,'1 minutes.<br />',' daily claims left.</p>',1);
    if($l == 0){echo Error("Daily claim limit").n;die;}
    $wt= Ambil($r,'<p class="alert alert-info">You have to wait ',' minutes</p>',1);
    if($wt){tim($wt);goto en;}
    $t = Ambil($r,'<input type="text" name="','"',1);
    $c = Hcap($r,web.host[2]);
    if(!$c){goto en;}
    $d = "$t=$w&g-recaptcha-response=$c&h-captcha-response=$c";
    $p = post(web.host[2],$d);
    $h = Ambil($p,'<div class="alert alert-success">',' satoshi was sent',1);
    if(preg_match("/satoshi was sent/",$p)){
        echo msg(1,"Reward").k." : ".hm.$h.p." sent FP".k." │ ".p."apikey : ".hm.Api_Bal().k." │ ".hm.$l.p." left".n;
    }
en:
}
