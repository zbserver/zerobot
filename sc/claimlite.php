<?php
define('host',['ClaimLite','claimlite.club','']);
define('version','1.0.1');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Del_Cok();
Function h(){
    $h[] = "Host: ".host[1];
    $h[] = "x-requested-with: XMLHttpRequest";
    $h[] = "cookie: ".file_get_contents(Data.cok);
    $h[] = "user-agent: ".file_get_contents(Data.uag);
    return $h;
}
Function balance(){
    $r    = get(web);
    $log  = Ambil($r,'<font class="text-success">','</font>',1);
    $coin = Ambil($r,'<div class="text-success"><b>','</b>',1);
    $bal  = Ambil($r,'<div class="text-primary"><b>','</b>',1);
    return ["b"=>$bal,"c"=>$coin,"l"=>$log];
}
Function suc($reward,$nub){
    $r=balance(); $b =$r["b"]; $c=$r["c"];
    print n;
    print line_at();
    print line_tg().p." Number ".panah.p.$nub.k." / ".p.$reward.n;
    print line_tg().p." Balance".panah.p.$b.k." / ".p.$c.n;
    print line_bw();
}
Awal:
SaveCokUa();
ban();
$r = get(web);
if(preg_match("/logout/",$r)){
    print p." Login Success".r;sleep(2);
}else{
    print " ".w3."[".p.cpm[4].w3."]".k." Cookie Experied! ".n;sleep(2);Del();die;
}
$r=null;
$r = balance(); $b=$r["b"]; $c=$r["c"]; $l=$r["l"];
echo n;
echo line_at();
echo line_tg().p." Login   ".panah.p.$l.n;
echo line_tg().p." Balance ".panah.p.$b.k." / ".p.$c.n;
echo line_bw();
Faucet:
while(true){
    $r = get(web);
    $lock = Ambil($r,"You must visit "," more ",1);
    if(preg_match('/Faucet Locked!/',$r)){print p." Faucet locked. ".p."You must visit ".h.$lock.p." more Shortlinks today".n;die();}
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
    
    $token = Ambil($r,"var token = '","';",1);
    $data  = "a=getFaucet&token=$token&challenge=false&response=false";
    $r = json_decode(post(web.'/system/ajax.php',$data),1);
    
    if($r['status'] == 200){
        suc($r["reward"], $r["number"]);    
    }else{
        echo " ".k.strip_tags($r['message']).r;
    }          
}
