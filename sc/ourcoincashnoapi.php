<?php
error_reporting(0);
define('host',['OurcoincashFREE','ourcoincash.xyz','']);
define('version','1.0.2');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Del_Cok();
Function h(){
    $h[] = "Host: ".host[1];
    $h[] = "cookie: ".file_get_contents(Data.cok);
    $h[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7";
    $h[] = "user-agent: ".file_get_contents(Data.uag);
    return $h;
}
Function balance(){
    $r = get(web."/dashboard");
    $b = Ambil($r,'<p class="acc-amount"><i class="fas fa-coins"></i> ','</p>',1);
    $e = Ambil($r,'<p class="text-warning"><i class="fas fa-bolt"></i> ','</p>',1);
    return ["b"=>$b,"e"=>$e];
}
Awal:
SaveCokUa();
ban();
$r = get(web."/dashboard");
$lg = Ambil($r,'<span>','</span>',2);
if(!$lg){print Error("Cookie Experied").n;Del();die;}
else{echo " ".p." Login success."; echo r;sleep(2);}
$r = balance();
echo rr;
echo line_at();
echo line_tg().msg(2,"Balance").panah.p.$r["b"].n;
echo line_tg().msg(3,"Energy ").panah.p.$r["e"].n;
echo line_bw();

Faucet:
$a = 0;
while(true){
    echo rr;
    $r = get(web."/faucet");
    if(preg_match("/Daily limit reached/",$r)){
        echo Error("Daily limit reached").n;die;
    }
    $c_t = Ambil($r,'name="csrf_token_name" id="token" value="','">',1);
    $tok = Ambil($r,'name="token" value="','">',1);
    if($atb = atb_3($r)){
        $data ="$atb&csrf_token_name=$c_t&token=$tok";}
        goto exekusi;
    if(!$atb){
        $data ="csrf_token_name=$c_t&token=$tok";
    }
    exekusi:
    $post = post(web."/faucet/verify",$data);
    if(preg_match("/Just a moment/",$post)){
        echo msg(4,"Cloudflare!").n;sleep(1);del();del_cok();die;
    }elseif(preg_match("/Invalid Anti-Bot Links/",$post)){
        echo Error("Invalid Antibot! ").p."[".k.$a = $a + 1 .p."]";sleep(2);echo r;goto en;
    }elseif(preg_match("/title: 'Good job!'/",$post)){
        $r = balance(); 
        $hasil = Ambil($post,"text: '"," coins has been added to your balance",1);
        echo line_at();
        echo line_tg().msg(1,"Reward ").panah.p.$hasil.n;
        echo line_tg().msg(2,"Balance").panah.p.$r["b"].n;
        echo line_tg().msg(3,"Energy ").panah.p.$r["e"].n;
        echo line_bw();
        tim(13);
        $a = 0;
        goto en;
    }
    en:
}
