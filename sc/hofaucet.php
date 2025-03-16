<?php
define('host',['hofaucet','hofaucet.xyz','/?r=800']);
define('version','1.0.2');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
if(!is_dir(Data.host[0])){system("mkdir ".Data.host[0]);}
Function h(){
    $h[] = "Host: ".host[1];
    $h[] = "Referer: ".web.host[2];
    $h[] = "user-agent: ".getUserAgent();
    $h[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
	$h[] = "accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7";
    return $h;
}
Menu_Api();
save("Email");
$Email=file_get_contents(Data."Email");
get(web.host[2]);
cl();
ban();
$r = get(web.host[2]);
$cp = ["banana","cherry","grape","'orange","chair","table","bulb","book","car"];
$c = $cp[rand(0,7)];
$t = Ambil($r,'name="csrf_token_name" id="token" value="','">',1);
$d = "wallet=$Email&csrf_token_name=$t&captcha_response=$c";
post(web."/auth/login",$d);
echo msg(1,"Apikey").w3." : ".p.Api_Bal().n;
echo " ".line();
Awal:
echo " ".line();
echo p.str_pad("Menu Coin", 57, " ", STR_PAD_BOTH).n;
echo " ".line();
echo NoLi(1,"TRX")."       ".NoLi(5,"LTC").n;
echo NoLi(2,"DOGE")."      ".NoLi(6,"ETH").n;
echo NoLi(3,"DASH")."      ".NoLi(7,"USDT").n;
echo NoLi(4,"DGB").n;
$pilih = readline(w3." Input".panah.p);
if($pilih == 1){
    cl(); ban();echo str_pad("TRONCOIN", 57, " ", STR_PAD_BOTH).n;
    echo " ".line();
    while(true){claim("trx");}
}elseif($pilih == 2){
    cl(); ban();echo str_pad("DOGECOIN", 57, " ", STR_PAD_BOTH).n;
    echo " ".line();
    while(true){claim("doge");}
}elseif($pilih == 3){
    cl(); ban();echo str_pad("DASHCOIN", 57, " ", STR_PAD_BOTH).n;
    echo " ".line();
    while(true){claim("dash");}
}elseif($pilih == 4){
    cl(); ban();echo str_pad("DIGIBYTE", 57, " ", STR_PAD_BOTH).n;
    echo " ".line();
    while(true){claim("dgb");}
}elseif($pilih == 5){
    cl(); ban();echo str_pad("LITECOIN", 57, " ", STR_PAD_BOTH).n;
    echo " ".line();
    while(true){claim("ltc");}
}elseif($pilih == 6){
    cl(); ban();echo str_pad("ETHEREUM", 57, " ", STR_PAD_BOTH).n;
    echo " ".line();
    while(true){claim("eth");}
}elseif($pilih == 7){
    cl(); ban();echo str_pad("Tether/USDT", 57, " ", STR_PAD_BOTH).n;
    echo " ".line();
    while(true){claim("usdt");}
}else{
    echo msg(4,"Bad Number");sleep(3);echo r; goto Awal;
}
Function claim($coin){
    $Email=file_get_contents(Data."Email");
    $r   = get(web."/faucet/currency/$coin");
    $tim = Ambil($r,"var wait = "," - 1;",1);
    if($tim){tim($tim);goto en;}
    if(preg_match('/Daily claim limit/',$r)){echo msg(4,"Daily claim limit.").p."[".hm.strtoupper($coin).p."]".n;die;}
    $cap = Turnstile($r,web);
    if(!$cap){goto en;}
    $csrf = Ambil($r,'name="csrf_token_name" id="token" value="','">',1);
    $t = Ambil($r,'name="token" value="','">',1);
    $d = "csrf_token_name=$csrf&token=$t&captcha=hcaptcha&cf-turnstile-response=$cap&wallet=".urlencode($Email);
    $p = post(web."/faucet/verify/$coin",$d);
    $hs = Ambil($p ,"'Good job!', '","has been sent to your FaucetPay account!', 'success'",1);
    if(preg_match("/Good job/",$p)){
        echo msg(1,"Reward").k." : ".hm.$hs."sent to FaucetPay.io".n;
        echo msg(3,"Apikey").k." : ".p.Api_Bal().n;
        echo " ".line();
    }
    if(preg_match("/Sufficient fund/",$p)){
        print msg(4,"Sufficient funds.").p."[".hm.strtoupper($coin).p."]".n;goto en;
    }
    en:
}
