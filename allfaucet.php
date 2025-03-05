<?php
define('host',['Allfaucet','allfaucet.xyz','']);
define('version','1.0.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
include("app.php");
Function h(){
    $h[] = "Host: ".host[1];
    $h[] = "cookie: ".file_get_contents(Data.cok);
    $h[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7";
    $h[] = "user-agent: ".file_get_contents(Data.uag);
    return $h;
}
Menu_Api();
SaveCokUa();
ban();
$r  = get(web."/dashboard");
$lg = Ambil($r,'<h2>','</h2>',1);
if(!$lg){echo Error("Cookie Experied");Del();die;}
echo cekapi().n;
echo " ".line();
Faucet:
while(true){
    $r =get(web."/dashboard");
    $c = explode('/faucet/currency/',$r);
    foreach($c as $a => $coins){
        if($a == 0)continue;
        $coin = explode('"',$coins)[0];
        $r   = get(web."/faucet/currency/$coin");
        if(preg_match('Invalid Anti-Bo/',$r)){continue; }
        if($res){if($res[$coin] > 2)continue;}
        if(preg_match('/Daily claim limit/',$r)){
            $res = Riwayat([$coin=>3],$res);
            echo pesan(0,cpm[4]).p."Daily claim limit | ".k.strtoupper($coin).p."|".n;continue;
        }
        $atb = anti_bot($r);
        if(!$atb)continue;
        $c_t = Ambil($r,'name="csrf_token_name" id="token" value="','">',1);
        $tok = Ambil($r,'name="token" value="','">',1);
        $data ="antibotlinks=$atb&csrf_token_name=$c_t&token=$tok";
        
        $post = post(web."/faucet/verify/$coin",$data);
        $hasil= Ambil($post,"html: '",strtoupper($coin)." has been sent to your FaucetPay account!'",1);
        if(preg_match("/Success!'/",$post)){
            $left=Ambil($r,'<p class="lh-1 mb-1 fw-bold">','</p>',5);
            efek(rewardX(o.$hasil.p.senttofp,$lf,$coin),5000).n;  
            tim(10);  
        }
        if(preg_match("/Failed!'/",$post)){
            echo pesan(0,cpm[4]).p."Failed |".k.strtoupper($coin).p."|".n;continue;  
        }
        if(preg_match("/Sufficient fund/",$post)){
            $res = Riwayat([$coin=>3],$res);
            echo pesan(0,cpm[4]).p."Sufficient fund".n;continue;
            $res = Riwayat([$coin=>1],$res);
        }
        if(preg_match("/firewall/",$post)){
            $r = get(web."/firewall");
            echo pesan(0,cpm[4]).p."Bypass Firewall!";sleep(2);echo r;
            $sitekey= Ambil($r,'data-sitekey="','">',1);
            if(!$sitekey){
                echo pesan(0,cpm[4]).p." Sitekey Error ";sleep(5);echo r;
                continue;
            }
            $cap=Captcha($r, web."/firewall",5);
            if(!$cap)continue;
            $c_t = Ambil($r,'name="csrf_token_name" id="token" value="','">',1);
            $ca= Ambil($r,'<input type="hidden" name="captchaType" value="','">',1);
            $data="g-recaptcha-response=$cap&captchaType=$ca&csrf_token_name=$c_t";
            post(web."/firewall/verify",$data);
            echo pesan(0,cpm[4]).p."Bypass Firewall!";sleep(2);echo r;continue;
        }
        en:
    }
}
