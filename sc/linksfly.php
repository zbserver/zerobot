<?php
define('host',['Linksfly','linksfly.link','']);
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
    $r=get(web."/app/referrals");
    $ref = Ambil($r,'?r=','"',1);
    if(!$ref){
        Del_Cok();Del();cl();ban();SaveCokUa();
    }  
}
dashboard();
SaveCokUa();
cl();
ban();
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
echo NoLi(7,"TRX")."       ".NoLi(15,"DASH")."    ".n;
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
    dashboard();
    $r = get(web."/app/faucet?currency=$coin");
    if(preg_match('/Shortlink in order to claim from the faucet!/',$r)){
        $err = Ambil($r,"html: '","'",1);
		echo msg(4,$err).n;
		exit;
		}
		
    $ictok = Ambil($r,"name='_iconcaptcha-token' value='","'",1);
    $icon = _cIconX($ictok,"light");
    if(!$icon){
        echo rr;
        echo msg(4,"Bypass Failed");
        sleep(1);
		echo rr;
		goto a;
	}
	$data = [];
	$data = array_merge($data, $icon);
	$data = http_build_query($data);
	$r = postt(web."/app/faucet/verify?currency=".$coin,h(), $data);
	
	$has = Ambil($r,"title: '","',",1);
	if($has == "Great!"){
	    $rd = Ambil($r,"text: '"," account'",1);
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
while(true){
    claim($coin);
}
