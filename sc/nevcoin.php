<?php
define('host',['Nevcoins','nevcoins.club','']);
define('version','1.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
include("app.php");
Menu_Api();
SaveCokUa();
ban();
Function h(){
    $h[] = "Host: ".host[1];
    $h[] = "x-requested-with: XMLHttpRequest";
    $h[] = "cookie: ".file_get_contents(Data.cok);
    $h[] = "user-agent: ".file_get_contents(Data.uag);
    return $h;
}
Function balance(){
    $r    = get(web."/shortlinks.html");
    $log  = Ambil($r,'<font class="text-success">','</font>',1);
    $coin = Ambil($r,'<div class="text-success"><b>','</b>',1);
    $bal  = Ambil($r,'<div class="text-primary"><b>','</b>',1);
    return ["b"=>$bal,"c"=>$coin,"l"=>$log];
}
Function suc($reward,$nub){
    $r=balance(); $b =$r["b"]; $c=$r["c"];
    print " ".w3."[".p.cpm[1].w3."]".p." Number ".panah.p.$nub.k." / ".p.$reward." Bits".n;
    print " ".w3."[".p.cpm[2].w3."]".p." Balance".panah.p.$b.k." / ".p.$c.n;
    print cekapi().n;
    print " ".line();
}
$apikey=file_get_contents(Data."/Apikey");
$r = get(web);
if(preg_match("/logout/",$r)){
    print p." Login Success".r;sleep(2);
}else{
    Echo Error("Cookie Experied! ").n;sleep(2);Del();die;
}
$r=balance();
echo msg(2,"Login  ").panah.p.$r['l'].n;
echo msg(2,"Balance").panah.p.$r['b'].k." / ".p.$r['c'].n;
echo cekapi().n;
echo " ".line();
Faucet:
while(true){
    $r=get(web."/claim.html");
    if(preg_match('/Just a moment.../',$r)){echo Error("Cloudflare".n);Del();die;}
    $locked=Ambil($r,'You must visit ',' to be able to Roll',1);
    if(preg_match('/Faucet Locked!/',$r)){print hm." Faucet Locked! ".p."You must visit ".p.$locked.n;die();}
    $time= Ambil($r,'id="claimTime">','</span>',1);
    if($time){
        if(strpos($time,"hour") !== false){
            $cektime=explode(' hour',$time)[0];
            tim(($cektime) * (3600+1800));goto Faucet;}
        if(strpos($time,"minutes") !== false){
            $cektime=explode(' minutes',$time)[0];
            tim(($cektime +1) * 60);goto Faucet;
        }else{
        $cektime=explode(' seconds',$time)[0];
        tim($cektime);
        }
    }
    $token = Ambil($r,"var token = '","'",1);
    $cap=Captcha($r, web."/claim.html",5);
    if(!$cap)continue;
    $data  = "a=getFaucet&token=$token&captcha=1&challenge=false&response=$cap";
    $r = json_decode(post(web.'/system/ajax.php',$data),1);
    if($r['status'] == 200){
        suc($r["reward"], $r["number"]);  
    }else{
        echo " ".k.strip_tags($r['message']).r;
    }
}
