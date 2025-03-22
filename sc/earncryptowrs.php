<?php
define('host',['Earncryptowrs','earncryptowrs.in','']);
define('version','1.0.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Del_Cok();
Function h(){
    $h[] = "Host: ".host[1];
    $h[] = "x-requested-with: XMLHttpRequest";
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
    $h[] = "x-requested-with: XMLHttpRequest";
    return $h;
}

Function dashboard(){
    $r=get(web."/app/dashboard");
    if(preg_match("/Dashboard | Earncryptowrs.in/",$r)){
        echo "  login success";sleep(1);echo rr;
    }else{
        echo msg(4,"login failed");die;
    }  
}
savecokua();
cl();
ban();
dashboard();
Menu_Coin:
echo line_at();
echo line_tg().p.str_pad("Menu Coin", 55, " ", STR_PAD_BOTH).n;
echo line_bw();
echo NoLi(1,"LTC")."       ".NoLi(9,"FEY")."      ".NoLi(17,"XMR").n;
echo NoLi(2,"DOGE")."      ".NoLi(10,"POL")."     ".NoLi(18,"TARA").n;
echo NoLi(3,"ETH")."       ".NoLi(11,"BNB")."     ".NoLi(19,"TRUMP").n;
echo NoLi(4,"XLM")."       ".NoLi(12,"SOL")."     ".NoLi(20,"ADA").n;
echo NoLi(5,"TON")."       ".NoLi(13,"DGB")."     ".NoLi(21,"BCH").n;
echo NoLi(6,"XRP")."       ".NoLi(14,"PEPE")."    ".NoLi(22,"ZEC").n;
echo NoLi(7,"TRX")."       ".NoLi(15,"DASH")."    ".NoLi(23,"BTC").n;
echo NoLi(8,"USDT")."      ".NoLi(16,"USDC").n;
echo n;
$pilih = readline(w3." Input".panah.p);
if($pilih == 1){
    cl(); ban();
    while(true){claim("LTC");}
}elseif($pilih == 2){
    cl(); ban();
    while(true){claim("DOGE");}
}elseif($pilih == 3){
    cl(); ban();
    while(true){claim("ETH");}
}elseif($pilih == 4){
    cl(); ban();
    while(true){claim("XLM");}
}elseif($pilih == 5){
    cl(); ban();
    while(true){claim("TON");}
}elseif($pilih == 6){
    cl(); ban();
    while(true){claim("XRP");}
}elseif($pilih == 7){
    cl(); ban();
    while(true){claim("TRX");}
}elseif($pilih == 8){
    cl(); ban();
    while(true){claim("USDT");}
}elseif($pilih == 9){
    cl(); ban();
    while(true){claim("FEY");}
}elseif($pilih == 10){
    cl(); ban();
    while(true){claim("POL");}
}elseif($pilih == 11){
    cl(); ban();
    while(true){claim("BNB");}
}elseif($pilih == 12){
    cl(); ban();
    while(true){claim("SOL");}
}elseif($pilih == 13){
    cl(); ban();
    while(true){claim("DGB");}
}elseif($pilih == 14){
    cl(); ban();
    while(true){claim("PEPE");}
}elseif($pilih == 15){
    cl(); ban();
    while(true){claim("DASH");}
}elseif($pilih == 16){
    cl(); ban();
    while(true){claim("USDC");}
}elseif($pilih == 17){
    cl(); ban();
    while(true){claim("XMR");}
}elseif($pilih == 18){
    cl(); ban();
    while(true){claim("TARA");}
}elseif($pilih == 19){
    cl(); ban();
    while(true){claim("TRUMP");}
}elseif($pilih == 20){
    cl(); ban();
    while(true){claim("ADA");}
}elseif($pilih == 21){
    cl(); ban();
    while(true){claim("BCH");}
}elseif($pilih == 22){
    cl(); ban();
    while(true){claim("ZEC");}
}elseif($pilih == 23){
    cl(); ban();
    while(true){claim("BTC");}
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
        echo msg(4,"Bypass failed");
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
}
while(true){
    claim($coin);
}
