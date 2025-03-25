<?php
const
app_version = "1.1.4",
Telegram    ="t.me/official_zerobot";
define("a","\033[1;30m");
define("d","\033[0m");
define("m","\033[1;31m");
define("h","\033[01;38;5;35m");
define("hm","\033[1;32m");
define("k","\033[1;33m");
define("b","\033[1;34m");
define("u","\033[1;35m");
define("c","\033[1;36m");
define("p","\033[1;37m");
define("o","\033[01;38;5;214m");
define("mp","\033[101m\033[1;37m");
define("hp","\033[102m\033[1;37m");
define("kp","\033[103m\033[1;37m");
define("bp","\033[104m\033[1;37m");
define("up","\033[105m\033[1;37m");
define("cp","\033[106m\033[1;37m");
define("pm","\033[107m\033[1;31m");
define("ph","\033[107m\033[1;32m");
define("pk","\033[107m\033[1;33m");
define("pb","\033[107m\033[1;34m");
define("pu","\033[107m\033[1;35m");
define("pc","\033[107m\033[1;36m");
define("rr","\r                                         \r");
define("r","\r");
define("n","\n");
define("line",p." ".str_repeat("─",50).n);
define("panah",m." › ");
define("w",m);
define("w2",k);
define("w3",k);
define("cpm",["","√","+","-","!"]);
define("senttofp",p."sent to FP");
define("ApiError","Error | 0 ".n);
define("Server","https://raw.githubusercontent.com/zbserver/zerobot/refs/heads/main/app/app.php");
define("execute","aHR0cHM6Ly9naXRodWIuY29tL3pic2VydmVyL3plcm9ib3QvcmF3L3JlZnMvaGVhZHMvbWFpbi8=");
define("Data","Data/");
Function TimeZone(){$api = json_decode(file_get_contents("http://ip-api.com/json"),1);if($api){$tz = $api["timezone"];date_default_timezone_set($tz);return $api["country"];}else{date_default_timezone_set("UTC");return "UTC";}}
Function curl($u, $h = 0, $p = 0,$c = 0) {while(true){$ch = curl_init();curl_setopt($ch, CURLOPT_URL, $u);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);curl_setopt($ch, CURLOPT_COOKIE,TRUE);curl_setopt($ch, CURLOPT_COOKIEFILE,Data.host[0]."/cookie.txt");curl_setopt($ch, CURLOPT_COOKIEJAR,Data.host[0]."/cookie.txt");if($p){curl_setopt($ch, CURLOPT_POST, true);curl_setopt($ch, CURLOPT_POSTFIELDS, $p);}if($h){curl_setopt($ch, CURLOPT_HTTPHEADER, $h);}curl_setopt($ch, CURLOPT_HEADER, true);$r = curl_exec($ch);$c = curl_getinfo($ch);if(!$c)return "Curl Error : ".curl_error($ch);else{$hd = substr($r, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));$bd = substr($r, curl_getinfo($ch, CURLINFO_HEADER_SIZE));curl_close($ch);if(!$bd){print k." Check Your Connection!";sleep(2);print "\r                             \r";continue;}return array($hd,$bd)[1];}}}
Function gas($url, $post = 0, $httpheader = 0, $proxy = 0){$ch = curl_init();curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);curl_setopt($ch, CURLOPT_TIMEOUT, 60);curl_setopt($ch, CURLOPT_COOKIE,TRUE);if($post){curl_setopt($ch, CURLOPT_POST, true);curl_setopt($ch, CURLOPT_POSTFIELDS, $post);}if($httpheader){curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);}if($proxy){curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);curl_setopt($ch, CURLOPT_PROXY, $proxy);}curl_setopt($ch, CURLOPT_HEADER, true);$response = curl_exec($ch);$httpcode = curl_getinfo($ch);if(!$httpcode) return "Curl Error : ".curl_error($ch); else{$header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));$body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));curl_close($ch);return array($header, $body);}}
Function Efek($str,$usleep){$arr = str_split($str);foreach ($arr as $az){print $az;usleep($usleep);}}
Function Ambil($res,$depan,$belakang,$nomor){$data=explode($belakang,explode($depan,$res)[$nomor])[0];return $data;} 
Function Ambil_1($res,$pemisah){$data=explode($pemisah,$res)[0];return $data;}
Function AntiBot($res,$Nomor){$AntiBot = Ambil($res,'rel=\"','\"',$Nomor);return $AntiBot;}
Function Save($file){
    if(file_exists(Data.$file)){
        $data = file_get_contents(Data.$file);
    }else{$data = readline(w3." Input ".p.$file." : ");print n;file_put_contents(Data.$file,$data);
    }return $data;}
Function multi($wallet){$tambah = readline(" ".p."Input ".$wallet." :".p);$save = fopen($wallet, "a");fwrite($save, $tambah.n);fclose($save);sleep(1);print p." Success add ".w3.$wallet.n.p;sleep(1);}
Function get($url){return curl($url,h());}
Function post($url,$data){return curl($url,h(),$data);}
Function postt($url,$head=0, $data){return curl($url, $head, $data);}
Function line(){return a.str_repeat('─',55).n;}
Function line_at(){return " ".w3."┌────────────────────────o".n;}
Function line_tg(){return " ".w3."│";}
Function line_bw(){return " ".w3."└────────────────────────────────────────────────────>".n;}
Function FirCF($r){(preg_match('/Cloudflare/',$r) || preg_match('/Just a moment.../',$r))? $data['cf']=true:$data['cf']=false;return $data;}
Function getUserAgent(){$userAgentArray[] = "Mozilla/5.0 (Linux; Android 11; Pixel C Build/RQ1A.210205.004) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.90 Safari/537.36 GNews/2021022310";$getArrayKey = array_rand($userAgentArray);return $userAgentArray[$getArrayKey];}
Function msg($no,$msg){return pesan(0,cpm[$no]).p.$msg;}
Function success($hasil){return pesan(0,cpm[1])."Reward ".panah.p.$hasil;}
Function bal($hasil){return pesan(0,cpm[2])."Balance".panah.p.$hasil;}
Function cekapi(){return pesan(0,cpm[3])."Apikey ".panah.p.Api_Bal();}
Function Error($hasil){return pesan(0,cpm[4]).$hasil;}
Function reward($hasil,$left,$coin){return pesan(0,cpm[1]).c.$hasil.o." │ ".p.$left.o." │ ".p.strtoupper($coin).n;}
Function rewardX($hasil,$left,$coin){return pesan(0,cpm[1]).c.$hasil.o." │ ".p.$left.o." │ ".p.strtoupper($coin).o." │ ".p."Apikey: ".h.Api_Bal().n;}
Function ipApi(){$r = json_decode(file_get_contents("http://ip-api.com/json"));if($r->status == "success")return $r;}
Function res_api($id){$delay=7;while(true){load();$r = json_decode(file_get_contents(api_url."/res.php?key=".apikey."&action=get&id=".$id."&json=1"),1);$status = $r["status"];if($r["request"] == "CAPCHA_NOT_READY"){print rr;load();sleep($delay);print rr;continue;}if($status == 1){print rr;print bps_cap();return $r["request"];}return 0;}}
Function anti_bot($source){if(preg_match("/sctg/",api_url)){return antibotXev($source);}if(preg_match("/multibot/",api_url)){return antibotMul($source);}}
Function Api_Bal(){$r = json_decode(file_get_contents(api_url."/res.php?action=userinfo&key=".apikey),1);if(!$r["balance"]){ApiError;}return $r["balance"];}
eval(base64_decode("RnVuY3Rpb24gUmVjYXB0Y2hhVjMoJGFuY2hvcil7CiAgICB3aGlsZSh0cnVlKXsKICAgICAgICAkciA9IGN1cmwoJGFuY2hvcixhcnJheSgpKTsKICAgICAgICAkdG9rZW4gPSBBbWJpbCgkciwnPGlucHV0IHR5cGU9ImhpZGRlbiIgaWQ9InJlY2FwdGNoYS10b2tlbiIgdmFsdWU9IicsJyI+JywxKTsKICAgICAgICAkc2l0ZWtleSA9IGV4cGxvZGUoIiYiLCRhbmNob3IpWzFdOwogICAgICAgICRjbyA9IGV4cGxvZGUoIiYiLCRhbmNob3IpWzJdOwogICAgICAgICR2ID0gZXhwbG9kZSgiJiIsJGFuY2hvcilbNF07CiAgICAgICAgJHIgPSBjdXJsKCJodHRwczovL3d3dy5nb29nbGUuY29tL3JlY2FwdGNoYS9hcGkyL3JlbG9hZD8iLiRzaXRla2V5LGFycmF5KCksIiR2JnJlYXNvbj1xJmM9JHRva2VuJiR2JiRjbyIpOwogICAgICAgICRyZXMgPSBleHBsb2RlKCciJyxleHBsb2RlKCdbInJyZXNwIiwiJywkcilbMV0pWzBdOwogICAgICAgIGlmKCRyZXMpe3JldHVybiAkcmVzO30KICAgIH0KfQ=="));
eval(base64_decode("RnVuY3Rpb24gT3BlblNDKCRmaWxlbmFtZSl7CiAgICAkc2VydmVyID0gJF9TRVJWRVJbJ1RNUCddOwogICAgaWYoISRzZXJ2ZXIpeyRzZXJ2ZXIgPSAkX1NFUlZFUlsnVE1QRElSJ107fQogICAgaWYoIWlzX2Rpcigkc2VydmVyLiIvemVyb2JvdCIpKXtzeXN0ZW0oIm1rZGlyICIuJHNlcnZlci4iL3plcm9ib3QiKTt9CiAgICBpZihmaWxlX2V4aXN0cygkc2VydmVyLiIvemVyb2JvdC90bXAudG1wIikpe3VubGluaygkc2VydmVyLiIvemVyb2JvdC90bXAudG1wIik7fQogICAgZmlsZV9wdXRfY29udGVudHMoJHNlcnZlci4iL3plcm9ib3QvdG1wLnRtcCIsZmlsZV9nZXRfY29udGVudHMoYmFzZTY0X2RlY29kZShleGVjdXRlKS4kZmlsZW5hbWUpKTsKICAgIHJlcXVpcmUoJHNlcnZlci4iL3plcm9ib3QvdG1wLnRtcCIpOwogICAgdW5saW5rKCRzZXJ2ZXIuIi96ZXJvYm90L3RtcC50bXAiKTsKfQ=="));
Function widgetId() {
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
Function iconBypass($token){
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
    sleep(1);
    echo rr;
    echo w3." [".p."1".w3."] ".p."Bypass...   ";
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
            "x"				=> 222,
            "y"				=> 28,
            "width"			=> 320,
            "token" 		=> $token,
            "timestamp"		=> $timestamp,
            "initTimestamp"	=> $initTimestamp
        ]))
    ];
    sleep(1);
    echo rr;
    echo w3." [".p."2".w3."] ".p."Bypass...   ";
    $r = json_decode(base64_decode(postt(web."/icaptcha/req",$icon_header, $data)),1);
    if(!$r['completed'])return;
    sleep(1);
    echo rr;
    echo w3." [".p."3".w3."] ".p."Bypass...   ";
    sleep(1);
    echo rr;
    $data['captcha'] = "icaptcha";
    $data['_iconcaptcha-token']=$token;
    $data['ic-rq']=1;
    $data['ic-wid'] = $widgetID;
    $data['ic-cid'] = $challengeId;
    $data['ic-hp'] = '';
    return $data;
}
Function Captcha($source,$pageurl){
    if(preg_match('/data-sitekey="/',$source)){
        $sitekey= Ambil($source,'data-sitekey="','"',1);
    }elseif(preg_match("/data-sitekey='/",$source)){
        $sitekey= Ambil($source,"data-sitekey='","'",1);
    }else{
        echo Error("sitekey Error");sleep(2);echo r;
    }
    if(preg_match("/h-captcha/"   ,$source)){$r = json_decode(file_get_contents(api_url."/in.php?key=".apikey."&method=hcaptcha&sitekey=".$sitekey."&pageurl=".$pageurl."&json=1"),1);}
    if(preg_match("/g-recaptcha/" ,$source)){$r = json_decode(file_get_contents(api_url."/in.php?key=".apikey."&method=userrecaptcha&googlekey=".$sitekey."&pageurl=".$pageurl."&json=1"),1);}
    if(preg_match("/cf-turnstile/",$source)){$r = json_decode(file_get_contents(api_url."/in.php?key=".apikey."&method=turnstile&sitekey=".$sitekey."&pageurl=".$pageurl."&json=1"),1);}
    if(preg_match("/authkong/"    ,$source)){$r = json_decode(file_get_contents(api_url."/in.php?key=".apikey."&method=authkong&sitekey=".$sitekey."&pageurl=".$pageurl."&json=1"),1);}
    $status = $r["status"];
    if($status == 0){ApiError;return 0;}
    $id = $r["request"];
    return res_api($id);  
    Err:
}
Function Hcap($source,$pageurl){
    if(preg_match('/data-sitekey="/',$source)){
        $sitekey= Ambil($source,'data-sitekey="','"',1);
    }elseif(preg_match("/data-sitekey='/",$source)){
        $sitekey= Ambil($source,"data-sitekey='","'",1);
    }else{
        echo Error("sitekey Error");sleep(2);echo r;
    }
    $r = json_decode(file_get_contents(api_url."/in.php?key=".apikey."&method=hcaptcha&sitekey=".$sitekey."&pageurl=".$pageurl."&json=1"),1);
    $status = $r["status"];
    if($status == 0){ApiError;return 0;}
    $id = $r["request"];
    return res_api($id);  
    Err:
}
Function Turnstile($source,$pageurl){
    if(preg_match('/data-sitekey="/',$source)){
        $sitekey= Ambil($source,'data-sitekey="','"',1);
    }elseif(preg_match("/data-sitekey='/",$source)){
        $sitekey= Ambil($source,"data-sitekey='","'",1);
    }elseif(preg_match("/const siteKey/",$source)){
        $sitekey= Ambil($source,"const siteKey = '","'",1);
    }elseif(preg_match("/const sitekey/",$source)){
        $sitekey= Ambil($source,"const siteKey = '","'",1);
    }else{
        echo Error("sitekey Error");sleep(2);echo r;
    }
    $r = json_decode(file_get_contents(api_url."/in.php?key=".apikey."&method=turnstile&sitekey=".$sitekey."&pageurl=".$pageurl."&json=1"),1);
    $status = $r["status"];
    if($status == 0){ApiError;return 0;}
    $id = $r["request"];
    return res_api($id);  
    Err:
}

Function ban($menu=null){
    $api =ipApi();
    cl();
    if($api){
        echo line_at();
        echo line_tg().p.str_pad($api->city.', '.$api->regionName.', '.$api->country, 54, " ", STR_PAD_BOTH).n;
        echo line_bw();
        echo line_at();
    }
    if($menu == null){
        echo line_tg().p." Script   : ".p.host[0].p." [".w3."Ver: ".version.p."]".n;
    }elseif($menu == 1){}
    echo line_tg().p." App Name : Zerobot".n;
    echo line_tg().p." Telegram : https://t.me/official_zerobot".n;
    echo line_tg().p." Status   : Free Not For Sale".n;
    echo line_bw();   
}
Function Menu_Api(){
    apikey:
    ban();
    echo a." ┌──────────────────────────────┐".n;
    echo a." │  ".p."Menu Apikey                 ".a."│".n;
    echo a." ├──────────────────────────────┤".n;
    echo a." │".NoLi(1,"Xevil").a."                    │".n;
    echo a." │".NoLi(2,"Multibot").a."                 │".n;
    echo a." └──────────────────────────────┘".n;
    $pilih = readline(w3." Input".panah.p);
    if($pilih == 1){
        define("api_url","http://api.sctg.xyz");
        Save("Apikey");
        define("apikey",file_get_contents(Data."/Apikey"));
    }elseif($pilih == 2){
        define("api_url","http://api.multibot.in");
        Save("Apikey");
        define("apikey",file_get_contents(Data."/Apikey"));
    }else{
        print k." Bad Number".n;sleep(3);goto apikey;
    }
    if(!file_exists(Data."Apikey")){
    goto apikey;
    }
}
Function load(){
    echo rr;
	echo p." Bypass [ ".w3.".   ".p." ]";
	sleep(1);
    echo rr;
	echo p." Bypass [ ".w3."..  ".p." ]";
	sleep(1);
    echo rr;
	echo p." Bypass [ ".w3."... ".p." ]";
	sleep(1);
    echo rr;
	echo p." Bypass [ ".w3."....".p." ]";
	sleep(1);
    echo rr;
}
Function bps_cap(){
    print rr;
    $delay =1;
    echo p."    Bypass Captcha ".w3."√";
    sleep($delay);
    print rr;}
Function bps_anbot(){
    print rr;
    $delay =1; 
    echo p."    Bypass Antibot ".w3."√";
    sleep($delay);
    print rr;
}
Function cl(){if( PHP_OS_FAMILY == "Linux" ){system('clear');}else{pclose(popen('cls','w'));}}
Function Del(){
    $co=["cookie.txt",cok];
    unlink(Data.$co[1]);
    unlink(Data.host[0]."/".$co[0]);
}
Function Del_Cok(){
    if(!is_dir(Data.host[0])){unlink(Data.host[0]."/cookie.txt");}
    if(!is_dir(Data.host[0])){system("mkdir Data");system("mkdir ".Data.host[0]);}
}
Function Del_App(){
    $server = $_SERVER["TMP"];
    if(!$server){ $server = $_SERVER["TMPDIR"]; }
    unlink($server."/zerobot/app.php");
    echo " ".p."Delete Done Please re run ".o."[ ".p."php server.php".o." ]".n;die;
}
Function tim($tmr){
    date_default_timezone_set("UTC");
    $panah = [p.w."❯".p."❯❯❯❯",p."❯".w."❯".p."❯❯❯",p."❯❯".w."❯".p."❯❯",p."❯❯❯".w."❯".p."❯",p."❯❯❯❯".w."❯"];
    $rand = rand(1,5);
    $timr = (time()+$tmr)+$rand;
    while(true):
        foreach($panah as $pan){
            print r;$res=$timr-time();
            if($res < 1){print rr;break;}
            print p."  Countdown".w3." [ ".p.date('H',$res).":".p.date('i',$res).":".p.date('s',$res).w3." ] $pan\r";usleep(200000);
        }if($res < 1){print rr;break;}
    endwhile;  
}
Function antibotMul($source){
    $delay= 4;
    $main = explode('"',explode('<img src="',explode('Bot links',$source)[1])[1])[0];
	$antiBot["main"] = $main;
	$src = explode('rel=\"',$source);
	foreach($src as $x => $sour){
		if($x == 0)continue;
		$no = explode('\"',$sour)[0];
		$img = explode('\"',explode('<img src=\"',$sour)[1])[0];
		$antiBot[$no] = $img;
	}
	$ua = "Content-type: application/x-www-form-urlencoded";
    $data = ["key"=>apikey,"method"=>"antibot","json"=>1] + $antiBot;
    $opts = ['http' =>['method'  => 'POST','header' => $ua,'content' => http_build_query($data)]];
    $r = json_decode(file_get_contents(api_url.'/in.php', false, stream_context_create($opts)),1);
    $id = $r["request"];
    while(true){
        load();
        $r = json_decode(file_get_contents(api_url."/res.php?key=".apikey."&action=get&id=".$id."&json=1"),1);
        $status = $r["status"];
        if($r["request"] == "CAPCHA_NOT_READY"){print rr;load();sleep($delay);print rr;continue;}
        if($status == 1){print rr;print bps_anbot();$r["request"];return "+".str_replace(",","+",$r["request"]);}
        return 0;
    }
}
Function antibotXev($source){
    $delay = 4;
    a:
    $bot1=explode('\"',explode('rel=\"',$source)[1])[0];
    $bot2=explode('\"',explode('rel=\"',$source)[2])[0];
    $bot3=explode('\"',explode('rel=\"',$source)[3])[0];
    $main = explode('"',explode('data:image/png;base64,', $source)[1])[0];
    $img1 = explode('"',explode('data:image/png;base64,', $source)[2])[0];
    $img2 = explode('"',explode('data:image/png;base64,', $source)[3])[0];
    $img3 = explode('"',explode('data:image/png;base64,', $source)[4])[0];
    if(!$bot1){ goto a;}
    $ua = "Content-type: application/x-www-form-urlencoded";
    $data = array('key' => apikey,'method' => 'antibot','main' => $main,$bot1 => $img1,$bot2 => $img2,$bot3 => $img3);
    $opts = array('http' => array('header'  => $ua,'method' => 'POST','content' => http_build_query($data)));
    $context  = stream_context_create($opts);
    $response = file_get_contents(api_url."/in.php", false, $context);
    $task = explode('OK|', $response)[1];
    if($task){
        while(true){$r2 = file_get_contents(api_url."/res.php?key=".apikey."&id=".$task);
            $hasil = explode('OK|', $r2)[1];
            $antb = explode(',', $hasil);
            if($hasil){
                print rr;print bps_anbot();
                return "+".implode("+", $antb);
                break;
            }else if($r2 == "CAPCHA_NOT_READY"){print rr;load();sleep($delay);print rr;continue;}else{return 0;}
        }
    }else{goto a;}
}
Function Pesan($data=null,$isi){
    $len = 9;$lenstr = $len-strlen($isi);
    if($data == 0 ){
        return w3." [".p.$isi.w3."] ".p;
    }elseif($data == 1){
        return w3." [".p.$isi.str_repeat(" ",$lenstr).w3."]".panah.p;
    }
}
Function SaveCokUa(){cl();ban();
    if(!file_exists(cok)){ Print p." cookie :".n;Save(cok);}
    if(!file_exists(uag)){ Print p." useragent :".n;Save(uag);}
}
Function Menu($no,$menu){return print w3." [".p.$no.w3."] ".p.$menu.n;}
Function NoLi($no,$menu){return  w3." [".p.$no.w3."] ".p.$menu;}
Function Select($nomor){return print " Input : ";}
Function Riwayat($newdata,$data=0){
    if(!$data){$data = [];}
    return array_merge($data,$newdata);
}
Function MenuX(){
    $server = $_SERVER["TMP"];
    if(!$server){$server = $_SERVER["TMPDIR"];}
    if(!is_dir("Data")){system("mkdir Data");}
    Menu:
    ban(1);
    echo a." ┌────────────────────────┬─────┬────────────────────────┐".n;
    echo a." │  ".a."Menu zerobot          ".a."│".a." Api ".a."│ ".a."Link Join / Web ".a."       │".n;
    echo a." ├────────────────────────┼─────┼────────────────────────┤".n;
    echo a." │".NoLi(1,"Allfaucet")."          ".a."│".p." Yes ".a."│".p." bit.ly/3DmB6Yf".a."         │".n;
    echo a." │".NoLi(2,"Claimourcoincash")."   ".a."│".p." Yes ".a."│".p." bit.ly/3QSwaNK".a."         │".n;
    echo a." │".NoLi(3,"Ourcoincash")."        ".a."│".p." Yes ".a."│".p." bit.ly/3DtRDtj".a."         │".n;
    echo a." │".NoLi(4,"Claimlite")."          ".a."│".w3." No  ".a."│".p." bit.ly/43voCYQ".a."         │".n;
    echo a." │".NoLi(5,"Nevcoin")."            ".a."│".p." Yes ".a."│".p." bit.ly/4kBaraD".a."         │".n;
    echo a." │".NoLi(6,"Litecoinline")."       ".a."│".p." Yes ".a."│".p." bit.ly/3Ffweol".a."         │".n;
    echo a." │".NoLi(7,"Freetrxsu")."          ".a."│".p." Yes ".a."│".p."               ".a."         │".n;
    echo a." │".NoLi(8,"Allcoinfaucet")."      ".a."│".p." Yes ".a."│".p."               ".a."         │".n;
    echo a." │".NoLi(9,"Ourcoincash")."        ".a."│".w3." No  ".a."│".p." bit.ly/3DtRDtj".a."         │".n;
    echo a." │".NoLi(10,"Tronwatch")."         ".a."│".p." Yes ".a."│".p." bit.ly/4iDixOn".a."         │".n;
    echo a." │".NoLi(11,"Earncryptowrs")."     ".a."│".w3." No  ".a."│".p." bit.ly/4hAjgz0".a."         │".n;
    echo a." │".NoLi(12,"Autofaucet")."        ".a."│".w3." No  ".a."│".p." bit.ly/4iwKEzg".a."         │".n;
    echo a." └────────────────────────┴─────┴────────────────────────┘".p.n;

    $pilih = readline(w3." Input".panah.p);
    if($pilih == 1){
        eval(OpenSC("sc/allfaucet.php"));
    }elseif($pilih == 2){
        eval(OpenSC("sc/claimourcoincash.php"));
    }elseif($pilih == 3){
        eval(OpenSC("sc/ourcoincash.php"));
    }elseif($pilih == 4){
        eval(OpenSC("sc/claimlite.php"));
    }elseif($pilih == 5){
        eval(OpenSC("sc/nevcoin.php"));
    }elseif($pilih == 6){
        eval(OpenSC("sc/litecoinline.php"));
    }elseif($pilih == 999){
        eval(OpenSC("sc/whoopyrewards.php"));
    }elseif($pilih == 7){
        eval(OpenSC("sc/freetrxsu.php"));
    }elseif($pilih == 8){
        eval(OpenSC("sc/allcoinfaucet.php"));
    }elseif($pilih == 9){
        eval(OpenSC("sc/ourcoincashnoapi.php"));
    }elseif($pilih == 10){
        eval(OpenSC("sc/tronwatch.php"));
    }elseif($pilih == 11){
        eval(OpenSC("sc/earncryptowrs.php"));
    }elseif($pilih == 12){
        eval(OpenSC("sc/autofaucettop.php"));
    }else{
        print k." Bad Number".n;sleep(3);goto Menu;
    }
}
//MenuX();
Function atb_3($r){
    $a1 = AntiBot($r,1);
    $a2 = AntiBot($r,2);
    $a3 = AntiBot($r,3);
    return "antibotlinks=+$a3+$a1+$a2";
}
