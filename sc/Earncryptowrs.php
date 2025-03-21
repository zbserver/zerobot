<?php
//error_reporting(0);
define('host',['earncryptowrs','earncryptowrs.in','']);
define('version','1.0.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
include("app.php");
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
function widgetId() {
	$uuid = '';
	for ($n = 0; $n < 32; $n++) {
		if ($n == 8 || $n == 12 || $n == 16 || $n == 20) {
				$uuid .= '-';
		}
		$e = mt_rand(0, 15);
		if ($n == 12) {
			$e = 4;
		} elseif ($n == 16) {
			$e = ($e & 0x3) | 0x8;
		}
		$uuid .= dechex($e);
	}
	return $uuid;
}
function iconBypass($token){
		$icon_header = h();
		$icon_header[] = "origin: ".host[1];
		$icon_header[] = "x-iconcaptcha-token: ".$token;
		$icon_header[] = "x-requested-with: XMLHttpRequest";
		
		$timestamp = round(microtime(true) * 1000);
		$initTimestamp = $timestamp - 2000;
		$widgetID = widgetId();
		
		$data = ["payload" => 
			base64_encode(json_encode([
				"widgetId"	=> $widgetID,
				"action" 	=> "LOAD",
				"theme" 	=> "light",
				"token" 	=> $token,
				"timestamp"	=> $timestamp,
				"initTimestamp"	=> $initTimestamp
			]))
		];
		sleep(2);
		echo rr;
		print k."---[".p."1".k."] Bypass....";
		$r = json_decode(base64_decode(postt(web."/icaptcha/req",$icon_header,$data)),1);
		$base64Image = $r["challenge"];
		$challengeId = $r["identifier"];
		
		$timestamp = round(microtime(true) * 1000);
		$initTimestamp = $timestamp - 2000;
		$data = ["payload" => 
			base64_encode(json_encode([
				"widgetId"		=> $widgetID,
				"challengeId"	=> $challengeId,
				"action"		=> "SELECTION",
				"x"				=> 160,
				"y"				=> 24,
				"width"			=> 320,
				"token" 		=> $token,
				"timestamp"		=> $timestamp,
				"initTimestamp"	=> $initTimestamp
			]))
		];
		sleep(1);
		print "\r                        \r";
		print k."---[".p."2".k."] Bypass..";
		$r = json_decode(base64_decode(postt(web."/icaptcha/req",$icon_header, $data)),1);
		if(!$r['completed'])return;
		sleep(1);
		print "\r                        \r";
		print k."---[".p."3".k."] Bypass....";
		echo rr;
		$data = [];
		$data['captcha'] = "icaptcha";
		$data['_iconcaptcha-token']=$token;
		$data['ic-rq']=1;
		$data['ic-wid'] = $widgetID;
		$data['ic-cid'] = $challengeId;
		$data['ic-hp'] = '';
		return $data;
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
$coin = "USDT";
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
        echo msg(4,"Bypass failed");
        sleep(1);
		echo rr;
		goto a;
	}
	print h."---[".p."✓".h."] Bypass success";sleep(1);
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
	    echo msg(4,"1 Shortlink must be completed to continue again!").n;
	    die;
	}
}
while(true){
    claim($coin);
}
