<?php
define('host',['Eyefaucet','eyefaucet.com','']);
define('version','1.0.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Function h(){
    $h[] = "Host: ".host[1];
    $h[] = "cookie: ".file_get_contents(Data.cok);
    $h[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7";
    $h[] = "user-agent: ".file_get_contents(Data.uag);
    return $h;
}
Function Balance(){
    $r = get(web);
    $lg= Ambil($r,"<a href='logout.php' style='text-decoration: none;'>","</a>",1);
    $b = Ambil($r,"data-target='#levelModal'>","</a>",1);
    $c = Ambil($r,'</span>','</h2>',2);
    return ["l"=>$lg,"b"=>$b];
}
Menu_Api();
//SaveCokUa();
ban();
$r = Balance();
if(!$r['l'] == "Logout"){echo Error("Cookie expried").n;Del();die;}
echo msg(1,"Balance").panah.p.$r['b'].n;
echo cekapi().n;
echo " ".line();

Notimer:
$r =  get(web);
$ver = Ambil($r,"name='verifykey' value='","'/>",1);
$tok = Ambil($r,"name='token' value='","'/>",1);
$d   = "verifykey=$ver&token=$tok";
$p   = post(web."/verify.php",$d);
$ver = Ambil($p,"name='verifykey' value='","'/>",1);
$tok = Ambil($p,"name='token' value='","'/>",1);
$ca  = Ambil($p,"<div class='","'",1);
if(!$ca){goto time;}
$cap = captcha($p,web);
if(!$cap){echo Error("Captcha Error");sleep(2);echo r;goto Notimer;}
$d   = "g-recaptcha-response=$cap&selectedCaptcha=1&verifykey=$ver&token=$tok";
$p   = post(web."/index.php?c=1",$d);
$hasil = Ambil($p,"title: '","'",1);
$suk = Ambil($p,"icon: '","',",1);
if($suk == "success"){
    $r = Balance();
    echo msg(1,"Reward ").k." : ".p.$hasil.n;
    echo msg(2,"Balance").k." : ".p.$r['b'].n;
    echo msg(1,"Apikey ").k." : ".p.Api_Bal().n;
    echo " ".line();
}else{
    time:
    tim(300);
}
goto Notimer;
