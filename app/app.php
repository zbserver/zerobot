<?php
const
app_version = "1.0.11",
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
define("w3",o);
define("cpm",["","√","+","-","!"]);
define("senttofp",p."sent to FP");
define("ApiError","Error | 0 ".n);
define("Server","https://raw.githubusercontent.com/zbserver/zerobot/refs/heads/main/app/app.php");
define("execute","https://github.com/zbserver/zerobot/raw/refs/heads/main/sc/");
define("Data","Data/");
Function TimeZone(){$api = json_decode(file_get_contents("http://ip-api.com/json"),1);if($api){$tz = $api["timezone"];date_default_timezone_set($tz);return $api["country"];}else{date_default_timezone_set("UTC");return "UTC";}}
Function curl($u, $h = 0, $p = 0,$c = 0) {while(true){$ch = curl_init();curl_setopt($ch, CURLOPT_URL, $u);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);curl_setopt($ch, CURLOPT_COOKIE,TRUE);curl_setopt($ch, CURLOPT_COOKIEFILE,Data."cookie.txt");curl_setopt($ch, CURLOPT_COOKIEJAR,Data."cookie.txt");if($p) {curl_setopt($ch, CURLOPT_POST, true);curl_setopt($ch, CURLOPT_POSTFIELDS, $p);}if($h) {curl_setopt($ch, CURLOPT_HTTPHEADER, $h);}curl_setopt($ch, CURLOPT_HEADER, true);$r = curl_exec($ch);$c = curl_getinfo($ch);if(!$c) return "Curl Error : ".curl_error($ch); else{$hd = substr($r, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));$bd = substr($r, curl_getinfo($ch, CURLINFO_HEADER_SIZE));curl_close($ch);if(!$bd){print k." Check Your Connection!";sleep(2);print "\r                             \r";continue;}return array($hd,$bd)[1];}}}
Function gas($url, $post = 0, $httpheader = 0, $proxy = 0){$ch = curl_init();curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);curl_setopt($ch, CURLOPT_TIMEOUT, 60);curl_setopt($ch, CURLOPT_COOKIE,TRUE);if($post){curl_setopt($ch, CURLOPT_POST, true);curl_setopt($ch, CURLOPT_POSTFIELDS, $post);}if($httpheader){curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);}if($proxy){curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);curl_setopt($ch, CURLOPT_PROXY, $proxy);}curl_setopt($ch, CURLOPT_HEADER, true);$response = curl_exec($ch);$httpcode = curl_getinfo($ch);if(!$httpcode) return "Curl Error : ".curl_error($ch); else{$header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));$body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));curl_close($ch);return array($header, $body);}}
Function Efek($str,$usleep){$arr = str_split($str);foreach ($arr as $az){print $az;usleep($usleep);}}
Function Ambil($res,$depan,$belakang,$nomor){$data=explode($belakang,explode($depan,$res)[$nomor])[0];return $data;} 
Function Ambil_1($res,$pemisah){$data=explode($pemisah,$res)[0];return $data;}
Function AntiBot($res,$Nomor){$AntiBot = Ambil($res,'rel=\"','\"',$Nomor);return $AntiBot;}
Function Save($file){if(file_exists(Data.$file)){$data = file_get_contents(Data.$file);}else{$data = readline(p." Input ".p.$file." : ");print n;file_put_contents(Data.$file,$data);}return $data;}
Function multi($wallet){$tambah = readline(" ".p."Input ".$wallet." :".p);$save = fopen($wallet, "a");fwrite($save, $tambah.n);fclose($save);sleep(1);print p." Success add ".w3.$wallet.n.p;sleep(1);}
Function get($url){return curl($url,h());}
Function post($url,$data){return curl($url,h(),$data);}
Function postt($url,$data, $ua){return curl($url, $data, $ua)[1]; }
Function line(){return a.str_repeat('─',55).n;}
Function FirCF($r){(preg_match('/Cloudflare/',$r) || preg_match('/Just a moment.../',$r))? $data['cf']=true:$data['cf']=false;return $data;}
Function getUserAgent(){
	$userAgentArray[] = "Mozilla/5.0 (Linux; Android 11; Pixel C Build/RQ1A.210205.004) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/89.0.4389.90 Safari/537.36 GNews/2021022310";
	$getArrayKey = array_rand($userAgentArray);
	return $userAgentArray[$getArrayKey];
}
Function msg($no,$msg){return pesan(0,cpm[$no]).p.$msg;}
Function success($hasil){return pesan(0,cpm[1])."Reward ".panah.p.$hasil;}
Function bal($hasil){return pesan(0,cpm[2])."Balance".panah.p.$hasil;}
Function cekapi(){return pesan(0,cpm[3])."Apikey ".panah.p.Api_Bal();}
Function Error($hasil){return pesan(0,cpm[4]).$hasil;}
Function reward($hasil,$left,$coin){return pesan(0,cpm[1]).c.$hasil.o." │ ".p.$left.o." │ ".p.strtoupper($coin).n;}
Function rewardX($hasil,$left,$coin){return pesan(0,cpm[1]).c.$hasil.o." │ ".p.$left.o." │ ".p.strtoupper($coin).o." │ ".p."Apikey: ".h.Api_Bal().n;}
Function ipApi(){$r = json_decode(file_get_contents("http://ip-api.com/json"));if($r->status == "success")return $r;}
Function ban($menu=null){
    $api =ipApi();
    cl();
    if($api){
        date_default_timezone_set($api->timezone);
        echo str_pad($api->city.', '.$api->regionName.', '.$api->country, 55, " ", STR_PAD_BOTH).n;
    }
    echo " ".line();
    echo p ." ┌──┐              ┌─┬─┐".a." Version: ".app_version.n;
    echo p ."    │     ".o."©2025      ".p."│  ".a." Server : ".h."ON".n;
    echo p ." ┌──┘┬─┐┌─┐┌─┐┌┐ ┌┬┐ o  ".a." Tele   : ".Telegram.n;
    echo p ." │   ├› ├┬┘│o│├┴┐│o│ │  ".a." Note   : Free Not For Sale ".n;
    echo p ." └──┘└─┘┴└─└┴┘└─┘└─┘─┴─ ".n;
    if($menu == null){
        echo p ." Script : ".h.host[0].p." [".h."Ver: ".version.p."]".n;
        echo p ." ".line();
        
    }elseif($menu == 1){
          
    }   
}
Function load(){
    print rr;
    $colors = ["\033[48;5;24m"];
	$text = "  Bypass ...   ";
	$textLength = strlen($text);
	for ($i = 1; $i <= $textLength; $i++) {
		usleep(150000);
		$percent = round(($i / $textLength) * 100); 
		$bgColor = $colors[$i % count($colors)];
		$coloredText = substr($text, 0, $i);
		$remainingText = substr($text, $i);
		echo "     " . $bgColor . $coloredText . "\033[0m" . $remainingText . r;
		flush();
	}
    print rr;
}
Function bps_cap(){
    print rr;
    $delay =1;
    Efek(p."    Bypass Captcha ".h."√",10000);
    sleep($delay);
    print rr;}
Function bps_anbot(){
    print rr;
    $delay =1; 
    Efek(p."    Bypass Antibot ".h."√",10000);
    sleep($delay);
    print rr;
}
Function cl(){system("clear");}
Function Del(){
    $co=["cookie.txt",cok];
    unlink(Data.$co[0]);
    unlink(Data.$co[1]);
}
Function Del_App(){
    $server = $_SERVER["TMP"];
    if(!$server){ $server = $_SERVER["TMPDIR"]; }
    unlink($server."/zerobot/app.php");
    echo " ".p."Delete Done Please re run ".o."[ ".p."php server.php".o." ]".n;die;
}
Function tim($tmr){
    date_default_timezone_set("UTC");
    $panah = [
        p.w."❯".p."❯❯❯❯",
        p."❯".w."❯".p."❯❯❯",
        p."❯❯".w."❯".p."❯❯",
        p."❯❯❯".w."❯".p."❯",
        p."❯❯❯❯".w."❯"
    ];
    $rand = rand(1,5);
    $timr = (time()+$tmr)+$rand;
    while(true):
        foreach($panah as $pan){
            print r;$res=$timr-time();
            if($res < 1){print rr;break;}
            print p."  Countdown".o." [ ".p.date('H',$res).":".p.date('i',$res).":".p.date('s',$res).o." ] $pan\r";usleep(200000);
        }if($res < 1){print rr;break;}
    endwhile;  
}
Function RecaptchaV3($anchor){
    while(true){
        $r = curl($anchor,array());
        $token = Ambil($r,'<input type="hidden" id="recaptcha-token" value="','">',1);
        $sitekey = explode("&",$anchor)[1];
        $co = explode("&",$anchor)[2];
        $v = explode("&",$anchor)[4];
        $r = curl("https://www.google.com/recaptcha/api2/reload?".$sitekey,array(),"$v&reason=q&c=$token&$v&$co");
        $res = explode('"',explode('["rresp","',$r)[1])[0];
        if($res){return $res;}
    }
}
Function Api_Bal(){$r = json_decode(file_get_contents(api_url."/res.php?action=userinfo&key=".apikey),1);if(!$r["balance"]){ApiError;}return $r["balance"];}
Function Captcha($source,$pageurl){
    $delay = 5;
    $sitekey= Ambil($source,'data-sitekey="','">',1);
    if(!$sitekey){print Error("Sitekey Error!");sleep(2);print r;goto Err;}
    if(preg_match("/h-captcha/"   ,$source)){$r = json_decode(file_get_contents(api_url."/in.php?key=".apikey."&method=hcaptcha&sitekey=".$sitekey."&pageurl=".$pageurl."&json=1"),1);}
    if(preg_match("/g-recaptcha/" ,$source)){$r = json_decode(file_get_contents(api_url."/in.php?key=".apikey."&method=userrecaptcha&googlekey=".$sitekey."&pageurl=".$pageurl."&json=1"),1);}
    if(preg_match("/cf-turnstile/",$source)){$r = json_decode(file_get_contents(api_url."/in.php?key=".apikey."&method=turnstile&sitekey=".$sitekey."&pageurl=".$pageurl."&json=1"),1);}
    if(preg_match("/authkong/"    ,$source)){$r = json_decode(file_get_contents(api_url."/in.php?key=".apikey."&method=authkong&sitekey=".$sitekey."&pageurl=".$pageurl."&json=1"),1);}
    $status = $r["status"];
        if($status == 0){ApiError;return 0;}
        $id = $r["request"];
        while(true){
            load();
            $r = json_decode(file_get_contents(api_url."/res.php?key=".apikey."&action=get&id=".$id."&json=1"),1);
            $status = $r["status"];
            if($r["request"] == "CAPCHA_NOT_READY"){print rr;load();sleep($delay);print rr;continue;}
            if($status == 1){print rr;print bps_cap();return $r["request"];}
            return 0;
        }
    Err:
}
Function anti_bot($source){
    if(preg_match("/sctg/"    ,api_url)){return antibotXev($source);}
    if(preg_match("/multibot/",api_url)){return antibotMul($source);}	
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
Function OpenSC($filename){
    $server = $_SERVER['TMP'];
    if(!$server){$server = $_SERVER['TMPDIR'];}
    if(!is_dir($server."/zerobot")){system("mkdir ".$server."/zerobot");}
    if(file_exists($server."/zerobot/tmp.tmp")){unlink($server."/zerobot/tmp.tmp");}
    file_put_contents($server."/zerobot/tmp.tmp",file_get_contents(execute.$filename));
    require($server."/zerobot/tmp.tmp");
    unlink($server."/zerobot/tmp.tmp");
}
Function Menu_Api(){
    apikey:
    ban();
    Print" ".p."Menu Apikey :".n;
    Menu(1,"Xevil");
    Menu(2,"Multibot");
    $pilih = readline(o." Input".panah.p);
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
Function MenuX(){
    $server = $_SERVER["TMP"];
    if(!$server){$server = $_SERVER["TMPDIR"];}
    if(!is_dir("Data")){system("mkdir Data");}
    Menu:
    ban(1);
    Echo a." ┌──────────────────────┬─────┬────────────────────────┐".n;
    Echo a." │ ".p."Menu zerobot         ".a."│".p." Api ".a."│ ".p."Link Join / Web ".a."       │".n;
    Echo a." └──────────────────────┴─────┴────────────────────────┘".n;
    echo NoLi(1,"Allfaucet")."          │ Yes │ bit.ly/3DmB6Yf".n;
    echo NoLi(2,"Claimourcoincash")."   │ Yes │ bit.ly/3QSwaNK".n;
    echo NoLi(3,"Ourcoincash")."        │ Yes │ bit.ly/3DtRDtj".n;
    echo NoLi(4,"Claimlite")."          │ ".m."No".p."  │ bit.ly/43voCYQ".n;
    echo NoLi(5,"Nevcoin")."            │ Yes │ bit.ly/4kBaraD".n;
    echo NoLi(6,"Litecoinline")."       │ Yes │ bit.ly/3Ffweol".n;

    $pilih = readline(o." Input".panah.p);
    if($pilih == 1){
        eval(OpenSC("allfaucet.php"));
    }elseif($pilih == 2){
        eval(OpenSC("claimourcoincash.php"));
    }elseif($pilih == 3){
        eval(OpenSC("ourcoincash.php"));
    }elseif($pilih == 4){
        eval(OpenSC("claimlite.php"));
    }elseif($pilih == 5){
        eval(OpenSC("nevcoin.php"));
    }elseif($pilih == 6){
        eval(OpenSC("litecoinline.php"));
    }else{
        print k." Bad Number".n;sleep(3);goto Menu;
    }
}
Function Menu($no,$menu){return print w3." [".p.$no.w3."] ".p.$menu.n;}
Function NoLi($no,$menu){return  w3." [".p.$no.w3."] ".p.$menu;}
Function Select($nomor){return print " Input : ";}
Function Riwayat($newdata,$data=0){
    if(!$data){$data = [];}
    return array_merge($data,$newdata);
}
MenuX();
