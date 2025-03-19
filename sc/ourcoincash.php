<?php
define('host',['Ourcoincash','ourcoincash.xyz','']);
define('version','1.0.1');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Del_Cok();
Function h(){
    $h[] = "Host: ".host[1];
    $h[] = "accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7";
    $h[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7";
    $h[] = "cookie: ".file_get_contents(Data.cok);
    $h[] = 'sec-ch-ua: "Not A(Brand";v="8", "Chromium";v="132"';
    $h[] = 'sec-ch-ua-arch: ""';
    $h[] = 'sec-ch-ua-bitness: ""';
    $h[] = 'sec-ch-ua-full-version: "132.0.6961.0"';
    $h[] = 'sec-ch-ua-full-version-list: "Not A(Brand";v="8.0.0.0", "Chromium";v="132.0.6961.0"';
    $h[] = 'sec-ch-ua-mobile: ?1';
    $h[] = 'sec-ch-ua-model: "SM-A057F"';
    $h[] = 'sec-ch-ua-platform: "Android"';
    $h[] = 'sec-fetch-site: same-origin';
    $h[] = 'upgrade-insecure-requests: 1';
    $h[] = "user-agent: ".file_get_contents(Data.uag);
    return $h;
}
Function balance(){
    $r = get(web."/dashboard");
    $b = Ambil($r,'<p class="acc-amount"><i class="fas fa-coins"></i> ','</p>',1);
    $e = Ambil($r,'<p class="text-warning"><i class="fas fa-bolt"></i> ','</p>',1);
    return ["b"=>$b,"e"=>$e];
}
Menu_Api();
Awal:
SaveCokUa();
ban();
$r = get(web."/dashboard");
$lg = Ambil($r,'<span>','</span>',2);
if(!$lg){print Error("Cookie Experied").n;Del();die;}
else{print " ".p."Login success.";sleep(2);print rr;}
$r = Balance();
echo n;
echo line_at();
echo line_tg().msg(1,"Balance").panah.p.$r["b"].n;
echo line_tg().msg(1,"Energy ").panah.p.$r["e"].n;
echo line_tg().msg(1,"Apikey ").panah.p.Api_Bal().n;
echo line_bw();
Faucet:
while(true){
    $r = get(web."/faucet");
    if(preg_match("/Daily limit reached/",$r)){
        echo Error("Daily limit reached").n;die;
    }
    if(preg_match("/firewall/",$r)){
        $s = get(web."/firewall");
        $sitekey= Ambil($r,'data-sitekey="','">',1);
        if(!$sitekey){
            print Error("Sitekey Error");sleep(5);print r;
            continue;
        }
        $cap=Captcha($r, web."/firewall");
        if(!$cap)continue;
        $c_t = Ambil($r,'name="csrf_token_name" id="token" value="','">',1);
        $data="g-recaptcha-response=$cap&captchaType=hcaptcha&csrf_token_name=$c_t";
        post(web."/firewall/verify",$data);
    }
    if(preg_match("/Just a moment.../",$r)){
        echo msg(4,"Cloudflare!").n;del();Del_Cok();die;
    }
    $atb = anti_bot($r);
    if(!$atb)continue;
    $c_t = Ambil($r,'name="csrf_token_name" id="token" value="','">',1);
    $tok = Ambil($r,'name="token" value="','">',1);
    $data ="antibotlinks=$atb&csrf_token_name=$c_t&token=$tok";
    $post = post(web."/faucet/verify",$data);
    if($post){
        if(preg_match("/title: 'Good job!'/",$post)){
            $r = balance(); 
            $hasil = Ambil($post,"text: '","has been added to your balance",1);
            echo n;
            echo line_at();
            echo line_tg().msg(1,"Reward ").panah.p.$hasil.n;
            echo line_tg().msg(2,"Balance").panah.p.$r["b"].n;
            echo line_tg().msg(3,"Energy ").panah.p.$r["e"].n;
            echo line_tg().msg(3,"Apikey ").panah.p.Api_Bal().n;
            echo line_bw();
            tim(20);
        }
    }
}
