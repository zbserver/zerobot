<?php
error_reporting(0);
define('host',['Autofaucet','autofaucet.top','']);
define('version','1.0.2');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Del_Cok();
Function h($data = 0){
    $h[] = "Host: ".host[1];
    if($data)$h[] ="Content-Length: ".strlen($data);
    $h[] = "cookie: ".file_get_contents(Data.cok);
    $h[] = "user-agent: ".file_get_contents(Data.uag);
    return $h;
}
Function dashboard(){
    $r=get(web."/app/referrals");
    $ref = Ambil($r,'?r=','"',1);
    if(!$ref){
        Del_Cok();Del();SaveCokUa();
    }  
}
SaveCokUa();
cl();
ban();
dashboard();
Menu_Coin:
echo line_at();
echo line_tg().p.str_pad("Menu Coin", 20, " ", STR_PAD_BOTH).n;
echo line_bw();
echo NoLi(1,"LTC").n;
echo NoLi(2,"USDT").n;
echo NoLi(3,"DOGE").n;
echo NoLi(4,"DGB").n;
echo n;
$pilih = readline(w3." Input".panah.p);
if($pilih == 1){
    cl(); ban();
    while(true){claim("LTC");}
}elseif($pilih == 2){
    cl(); ban();
    while(true){claim("USDT");}
}elseif($pilih == 3){
    cl(); ban();
    while(true){claim("DOGE");}
}elseif($pilih == 4){
    cl(); ban();
    while(true){claim("DGB");}
}else{
    echo msg(4,"Bad number");sleep(1);echo rr; goto Menu_Coin;
}
Function Claim($coin){
    a:
    $r = get(web."/app/faucet?currency=$coin");
    if(preg_match('/Shortlink in order to claim from the faucet!/',$r)){
        $err = Ambil($r,"html: '","'",1);
		echo msg(4,$err).n;
		exit;
		}
		
    $ictok = Ambil($r,"name='_iconcaptcha-token' value='","'",1);
    $icon = iconBypass($ictok);
    if(!$icon){
        echo rr;
        echo msg(4,"Bypass Failed");
        sleep(1);
		echo rr;
		goto a;
	}
	echo bps_cap();sleep(1);
	echo rr;
	$data = [];
	$data = array_merge($data, $icon);
	$data = http_build_query($data);
	$r = postt(web."/app/faucet/verify?currency=".$coin,h(), $data);

	$has = Ambil($r,"title: '","',",1);
	if($has == "Great!"){
	    $rd = Ambil($r,"text: '"," account'",1);
	    echo line_at();
	    echo line_tg().msg(1,$rd).n;
	    echo line_bw();
	    tim(10);
	    goto a;
	}
	if(preg_match("/1 Shortlink must be/",$r)){
	    echo msg(4,"1 Shortlink must be completed to continue again!").n;die;
	}
    if(preg_match("/sufficient found/",$r)){
        Echo msg(4,"Sufficient Found").n;die;
    }
}
while(true){
    claim($coin);
}
