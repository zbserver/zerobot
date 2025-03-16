<?php
define('host',['Allfaucet','allfaucet.xyz','']);
define('version','1.0.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
if(!is_dir(Data.host[0])){system("mkdir ".Data.host[0]);}
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
$r  = get(web);
$lg = Ambil($r,'<a class="btn btn-primary" href="https://allfaucet.xyz/login">','</a>',1);
if($lg){echo Error("Cookie Experied");Del();die;}
echo cekapi().n;
echo " ".line();
Faucet:
$r =get(web."/dashboard");
while(true){
    $c = explode('/faucet/currency/',$r);
    foreach($c as $a => $coins){
        if($a == 0)continue;
        $coin = explode('"',$coins)[0];
        $r   = get(web."/faucet/currency/$coin");
        if(preg_match('Invalid Anti-Bo/',$r)){continue; }
        if($res){if($res[$coin] > 2)continue;}
        if(preg_match('/Daily claim limit/',$r)){
            $res = Riwayat([$coin=>3],$res);
            echo Error("Daily claim limit").o." │ ".p.strtoupper($coin).o." | ".n;echo " ".line();continue;
        }
        $atb = anti_bot($r);
        if(!$atb)continue;
        $c_t = Ambil($r,'name="csrf_token_name" id="token" value="','">',1);
        $tok = Ambil($r,'name="token" value="','">',1);
        $data ="antibotlinks=$atb&csrf_token_name=$c_t&token=$tok";
        $post = post(web."/faucet/verify/$coin",$data);
        $hasil= Ambil($post,"html: '",strtoupper($coin)." has been sent to your FaucetPay account!'",1);
        if(preg_match("/Success!'/",$post)){
            $lf=Ambil($r,'<p class="lh-1 mb-1 fw-bold">','</p>',5);
            echo rewardX($hasil.p.senttofp,$lf,$coin);
            echo " ".line();  
            tim(1); 
        }
        if(preg_match("/Failed!'/",$post)){
            echo Error("Failed").o." │ ".p.strtoupper($coin).o." | ".n;echo " ".line();continue;  
        }
        if(preg_match("/Sufficient fund/",$post)){
            $res = Riwayat([$coin=>3],$res);
            echo Error("Sufficient fund").o." │ ".p.strtoupper($coin).o." | ".n;echo " ".line();continue; 
            $res = Riwayat([$coin=>1],$res);
        }
        if(preg_match("/firewall/",$post)){
            $r = get(web."/firewall");
            echo Error("Bypass Firewall!");sleep(2);echo r;
            $cap=Captcha($r, web."/firewall",5);
            if(!$cap)continue;
            $c_t = Ambil($r,'name="csrf_token_name" id="token" value="','">',1);
            $ca= Ambil($r,'<input type="hidden" name="captchaType" value="','">',1);
            $data="g-recaptcha-response=$cap&captchaType=$ca&csrf_token_name=$c_t";
            post(web."/firewall/verify",$data);
            echo Error("Bypass Firewall!");sleep(2);echo r;
        }
        en:
    }
}
