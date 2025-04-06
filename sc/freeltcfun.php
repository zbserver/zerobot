<?php
define('host',['FreeLTCFun','freeltc.fun','']);
define('version','1.0.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Del_Cok();
Function h($data = 0){
    $h[] = "Host: ".host[1];
    if($data)$h[] = "Content-Length: ".strlen($data);
    $h[] = "cookie: ".file_get_contents(Data.cok);
    $h[] = "user-agent: ".file_get_contents(Data.uag);
    return $h;
}
Function dashboard(){
    $r=get(web);
    if(preg_match("/logout/",$r)){
    }else{
        print " Cookie Experied".n;del();die();
    }
}
SaveCokUa();
cl();
ban();
dashboard();
Menu_Coin:
print lineX();
print p.str_pad("Menu Coin", 55, " ", STR_PAD_BOTH).n;
print lineX();
print NoLi(1,"LTC")."       ".NoLi(9,"DASH").n;
print NoLi(2,"DOGE")."      ".NoLi(10,"DGB").n;
print NoLi(3,"ZEC")."       ".NoLi(11,"FEY").n;
print NoLi(4,"BNB")."       ".NoLi(12,"USDT").n;
print NoLi(5,"BCH")."       ".NoLi(13,"PEPE").n;
print NoLi(6,"ETH")."       ".n;
print NoLi(7,"SOL")."       ".n;
print NoLi(8,"TRX")."      ".n;
print n;
$pilih = readline(w3." Input".panah.p);
if($pilih == 1){
    cl(); ban();
    while(true){claim("LTC");}
}elseif($pilih == 2){
    cl(); ban();
    while(true){claim("DOGE");}
}elseif($pilih == 3){
    cl(); ban();
    while(true){claim("ZEC");}
}elseif($pilih == 4){
    cl(); ban();
    while(true){claim("BNB");}
}elseif($pilih == 5){
    cl(); ban();
    while(true){claim("BCH");}
}elseif($pilih == 6){
    cl(); ban();
    while(true){claim("ETH");}
}elseif($pilih == 7){
    cl(); ban();
    while(true){claim("SOL");}
}elseif($pilih == 8){
    cl(); ban();
    while(true){claim("TRX");}
}elseif($pilih == 9){
    cl(); ban();
    while(true){claim("DASH");}
}elseif($pilih == 10){
    cl(); ban();
    while(true){claim("DGB");}
}elseif($pilih == 11){
    cl(); ban();
    while(true){claim("FEY");}
}elseif($pilih == 12){
    cl(); ban();
    while(true){claim("USDT");}
}elseif($pilih == 13){
    cl(); ban();
    while(true){claim("PEPE");}
}else{
    print msg(4,"Bad number");sleep(1);print rr; goto Menu_Coin;
}
$a = null;
Function Claim($coin){
    a:
    $r = get(web."/faucet/currency/$coin");
    if(preg_match("/Daily claim limit/",$r)){
        print msg(4,"Daily Claim Limit").n;die;
    }
    $ictok = Ambil($r,"name='_iconcaptcha-token' value='","'",1);
    
    $icon = _cIconX($ictok,"light");
    if(!$icon){
        print rr;
        print msg(4,"Bypass Failed");
        sleep(1);
		print rr;
		goto a;
	}
	print bps_cap();sleep(1);
	print rr;
	$data = [];
    $data['csrf_token_name'] = Ambil($r,'name="csrf_token_name" id="token" value="','">',1);
    $data['token'] = Ambil($r,'name="token" value="','">',1);
    $data['wallet'] = Ambil($r,'name="wallet" class="form-control" value="','" readonly>',1);
    $data = array_merge($data, $icon);
	$data = http_build_query($data);
	$r = post(web."/faucet/verify/".$coin, $data);
	$has = Ambil($r,"title: '","',",1);
	if($has == "Success!"){
	    $rd = Ambil($r,"html: '"," account",1);
	    print msg(1,$rd).n;
	    print lineX();
	    tim(10);
	    goto a;
	}
	if(preg_match("/The faucet does not have sufficient/",$r)){
        Echo msg(4,"Sufficient Found").n;die;
    }elseif(preg_match("/Shortlink must be complete/",$r)){
	    echo msg(4,"1 Shortlink must be completed to continue again!").n;die;
	}
}
