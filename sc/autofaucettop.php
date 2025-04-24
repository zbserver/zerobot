<?php
define('host',['Autofaucet','autofaucet.top','']);
define('version','1.0.7');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Del_Cok();
Function h($data = 0){
    $h[] = "Host: ".host[1];
	$h[] = "x-requested-with: XMLHttpRequest";
    $h[] = "User-Agent: ".file_get_contents(Data.uag);
    $h[] = "Cookie: ".file_get_contents(Data.cok);
    return $h;
}
Function dashboard(){
    $r=get(web."/app/referrals");
    $ref = Ambil($r,'?r=','"',1);
    if(!$ref){
        Del_Cok();Del();cl();ban();SaveCokUa();cl();ban();
    }  
}
SaveCokUa();
cl();
ban();
dashboard();

$c = ["LTC","DOGE","DGB","USDT"];
while(true){
	dashboard();
    foreach($c as $a => $coins){
        $coin = explode('"',$coins)[0];
        $r = get(web."/app/faucet?currency=$coin");
        if(preg_match("/Daily claim limit/",$r)){
            print msg(4,"Daily Claim Limit")." [".o.$coin.p."]".n;
            print lineX();
            unset($c[$a]);
            continue;
        }
        if(preg_match("/Just a moment/",$r)){
            print msg(4,"Cloudflare").n;die;
        }
        $time= Ambil($r,'<b id="minute">','</b>',1);
        $seco= Ambil($r,'<b id="second">','</b>',1);
        if($time){
            tim(($time*60)+$seco);
            continue;
        }
        $ictok = Ambil($r,"name='_iconcaptcha-token' value='","'",1);
        $icon = _cIconX($ictok,"light");

        if(!$icon){
            echo rr;
            echo msg(4,"Bypass Failed");
            sleep(1);
    		echo rr;
    		continue;
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
        	continue;
    	}
    	if(preg_match("/The faucet does not have sufficient/",$r)){
            print msg(4,"Sufficient Found").h." $coin".n;
           unset($c[$a]);
           continue;
        }
        if(preg_match("/Shortlink must be complete/",$r)){
    	    echo msg(4,"1 Shortlink must be completed to continue again!").n;die;
    	}
    }
    if(!$c){
        print msg(4,"All coins have been claimed").n;
        return;
    }
}
