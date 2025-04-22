<?php
error_reporting(0); 
date_default_timezone_set("Asia/Jakarta");
//OPEN_SC($HOST_SC,"pass");
include('../pass.php');
unlink('tmp');
system("clear");
const 
White       = "\33[37;1m",	//White
Yellow      = "\33[33;1m",	//Yellow
Oren_1      = "\033[01;38;5;220m", //OrenOren 
ctg         = White."[".Tema."✓".White."]",
ctg_x       = White."[".Tema."+".White."]",
ctg_x1      = Yellow." > ".Tema,
ctg_x2      = Yellow."|",
ctg_0       = White."[".Tema."0".White."]",
ctg_1       = White."[".Tema."1".White."]",
ctg_2       = White."[".Tema."2".White."]",
ctg_3       = White."[".Tema."3".White."]",
ctg_4       = White."[".Tema."4".White."]", 
line_1      = White."══════════════════════════════════════════════════", 
line_2      = White."──────────────────────────────────────────────────\n",
line_3      = White."──────────────────────────────────────────────────",
host   = "autofaucet.org",
Webnya = "https://".host,
Web_1  = Webnya."/auto/currency",
Web_2  = Webnya."/auto/verify",
Web_3  = Webnya."/firewall/verify",
Web_4  = Webnya."/dashboard",
nice   = " Nice Work! ",
to_fp  = " sent to faucetpay \n",
to_bl  = " sent to balance \n",
Host   = ['AUTOFAUCET','1'],
n      = "\n",
r      = "\r                                                 \r";
Function Ambil($res,$depan,$belakang,$nomor){$data=explode($belakang,explode($depan,$res)[$nomor])[0];return $data;} 
Function Efek($str){$arr = str_split($str);foreach ($arr as $az){print $az;usleep(2500);}}
Function Efek_1($str){$arr = str_split($str);foreach ($arr as $az){print $az;usleep(10000);}}
//Function timer($t){$timr=time()+$t;while(true):echo "\r                                       \r";$res=$timr-time();if($res < 1){break;}if($res==$res){}echo White."Please Wait ".Yellow.date('i:s',$res).White;sleep(1);endwhile;}
Function timer($tmer){$panah = array("\033[01;38;5;214m▶\33[37;1m▶▶▶▶","\33[37;1m▶\033[01;38;5;214m▶\33[37;1m▶▶▶","\33[37;1m▶▶\033[01;38;5;214m▶\33[37;1m▶▶","\33[37;1m▶▶▶\033[01;38;5;214m▶\33[37;1m▶","\33[37;1m▶▶▶▶\033[01;38;5;214m▶");$timer=time()+$tmer;while(true):foreach($panah as $pn){echo"\r                                                      \r";$res=$timer-time();if($res < 1){break;}$tm = date(' i:s ',$res);echo White."                  ".$tm."\033[1;37m"."| ".$pn;sleep(1);}if($res < 1){break;}endwhile;}
Function FOLLOW_IG(){Efek(Tema." FOLLOW IG                   \r");sleep(2);system("xdg-open https://instagram.com/burungowl_");Efek           ("\r             \r");sleep(1);Efek           (" Thank You !!! \r");sleep(1);}
Function AntiBot($url,$Nomor){$AntiBot = Ambil($url,'\"#\" rel=\"','\"',$Nomor);return $AntiBot;}
function Save($namadata){if(file_exists($namadata)){$data = file_get_contents($namadata);}else{$data = readline("\033[102m\033[1;34m Input ".$namadata."\033[0m\033[1;32m\n ►►   \033[1;37m");file_put_contents($namadata,$data);}return $data;}
function get($url){return curl($url, null, head())[1];}
function post($url,$data){return curl($url, $data, head())[1];}

function curl($url, $post = 0, $httpheader = 0, $proxy = 0){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_COOKIE,TRUE);
 curl_setopt($ch, CURLOPT_COOKIEFILE,"cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
if($post){
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
}
if($httpheader){
curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
}
if($proxy){
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
// curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
}
curl_setopt($ch, CURLOPT_HEADER, true);
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch);
if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
$header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
$body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
curl_close($ch);
return array($header, $body);
}
}
function head(){
    $ua[]="Host: ".host;
    $ua[]="User-Agent: ".file_get_contents("user-agent");
    $ua[]="Cookie: ".file_get_contents("Cookie");
    return $ua;
}
Awalmenu:
system('clear');
Save("Cookie");
Save('User-agent');
system('clear');

//LP();
ban();
RandomKey();
$r = get('https://autofaucet.org/dashboard/claim/auto');
$u = Ambil($r,'<p class="username">','</p>',1);
$b = Ambil($r,'<p class="amount">','<span>FCT TOKEN</span></p>',1);
if($u==''){
    Print White."\r Ganti cookie bro!!!   \r";
    sleep(5);
    unlink("Cookie");
    goto Awalmenu;
}

print ctg_x.White." Account Login   : $u".n;
print ctg_x.White." Account balance : $b FCT TOKEN".n;
print line_2;
Function ClaimCoin(){
    $r = get('https://autofaucet.org/dashboard/claim/auto');
    $b = Ambil($r,'<p class="amount">','<span>FCT TOKEN</span></p>',1);
    if($b<='1'){
        Print White." shortlink dulu bro!!!".n;
        die;
    }
    //timer(600);
    timer(121);
    //$data = "currencies%5B%5D=LTC&currencies%5B%5D=DOGE&currencies%5B%5D=BCH&currencies%5B%5D=TRX&currencies%5B%5D=BNB&currencies%5B%5D=SOL&payout=3&frequency=1&boost=1";
    $data = "currency=USDT&payout=1&frequency=1&boost=1";
    post('https://autofaucet.org/verify/cli-au',$data);
    $r = get('https://autofaucet.org/dashboard/claim/auto/start');
    $a = explode('<p class="message"><i class="fas fa-check green">',$r);
	foreach($a as $b => $c){
		$b += 1;
		if($b <= 1)continue;
		$z += 1;
		$x = explode(' has been sent to your FaucetPay account.</p>',explode('</i>',$c)[1])[0];
		
		Print(ctg_x.nice.Tema.$x.White.to_fp);
	}
    $b = Ambil($r,'<p class="amount">','<span>FCT',1);
    print ctg_x.White." FCT -> $b FCT TOKEN".n;
	print line_2;
}
aa:while(true){ClaimCoin();}
