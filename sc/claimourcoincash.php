<?php
define('host',['claim.ourcoincash','claim.ourcoincash.xyz','']);
define('version','1.0.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
CekVer();
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
$r = get(web);
$lg = Ambil($r,'<span>','</span>',2);

if(!$lg){echo Error("Cookie expried").n;Del();die;}
echo cekapi().n;
echo " ".line();

while(true){
    faucet:
    $r = get(web);
    $c = explode('/faucet/currency/',$r);
    foreach($c as $a => $coins){
        if($a == 0)continue;
        $coin = explode('"',$coins)[0];
        $r = get(web."/faucet/currency/$coin");
        if(preg_match("/firewall/",$r)){
            $r = get(web."/firewall");
            Echo Error("Bypass Firewall!");sleep(2);print r;
            $cap=Captcha($r, web."/firewall");
            if(!$cap)continue;
            $c_t = Ambil($r,'name="csrf_token_name" value="','">',1);
            $ca  = Ambil($r,'name="captchaType" value="','">',1);
            $data="g-recaptcha-response=$cap&captchaType=$ca&csrf_token_name=$c_t";
            post(web."/firewall/verify",$data);
            echo Error("Bypass Firewall!".hm." √");sleep(2);echo r;goto faucet;
        }
        $r = get(web."/faucet/currency/$coin");
        if($res){if($res[$coin] > 2)continue;}
        if(preg_match('/Daily claim limit/',$r)){
            $res = Riwayat([$coin=>3],$res);
            echo Error(w2."Daily claim limit ").w2.strtoupper($coin).p.n;continue;
        }
        $cap=Captcha($r, web."/claim.html");
        if(!$cap){continue;}
        $c_t = Ambil($r,'name="csrf_token_name" id="token" value="','">',1);
        $tok = Ambil($r,'name="token" value="','">',1);
        $ca  = Ambil($r,'name="captcha"><option value="','">',1);
        $email= Ambil($r,'name="wallet" class="form-control" value="','"',1);
        $data ="csrf_token_name=$c_t&token=$tok&captcha=$ca&g-recaptcha-response=$cap&wallet=".urlencode($email);
        $post = post(web."/faucet/verify/$coin",$data);
        $hasil= Ambil($post,"html: '",strtoupper($coin)." has been sent to your FaucetPay account!'",1);
        if(preg_match("/Success!'/",$post)){
            $lf = Ambil($r,'<p class="lh-1 mb-1 font-weight-bold">','</p>',3);
            efek(rewardX(o.$hasil.p.senttofp,$lf,$coin),15000).n;   
        }
        if(preg_match("/Failed!'/",$post)){
            $hasil= Ambil($post,"html: '",'',1);
            echo Error($hasil);   
        }
        if(preg_match("/Sufficient fund/",$post)){
            echo Error("Sufficient funds.")."|".w2.strtoupper($coin).p."|".n;continue;
            $res = Riwayat([$coin=>1],$res);
        }
        en:
    }
}
