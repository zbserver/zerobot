<?php
error_reporting(0);
define('host',['Autofaucet','autofaucet.top','']);
define('version','1.0.5');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Del_Cok();
Function h($data = 0){
    $h[] = "Host: ".host[1];
    if($data)$h[] ="Content-Length: ".strlen($data);
	$h[] = "User-Agent: ".file_get_contents(Data.uag);
    $h[] = "Cookie: ".file_get_contents(Data.cok);
    return $h;
}
Function dashboard(){
    $r=get(web."/app/referrals");
    $ref = Ambil($r,'?r=','"',1);
    if(!$ref){
        Del_Cok();Del();cl();ban();SaveCokUa();
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
    dashboard();
    $r = get(web."/app/faucet?currency=$coin");
    $l = Ambil($r,'<h3 class="mb-1">','</h3>',4);
    $limit=Ambil_1($l,"/80");
    if($limit == 0){echo msg(4,"Limit claim").h." $coin".n;die;}
    if(preg_match('/Shortlink in order to claim from the faucet!/',$r)){
        $err = Ambil($r,"html: '","'",1);
		echo msg(4,$err).n;
		exit;
		}
		
    $ictok = Ambil($r,"name='_iconcaptcha-token' value='","'",1);
    $icon = _cIconX($ictok);

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
	if(preg_match("/The faucet does not have sufficient/",$r)){
        Echo msg(4,"Sufficient Found").h." $coin".n;die;
    }elseif(preg_match("/Shortlink must be complete/",$r)){
	    echo msg(4,"1 Shortlink must be completed to continue again!").n;die;
	}
}
while(true){
    claim($coin);
}
