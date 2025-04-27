<?php
error_reporting(0);
define('host',['BTCPTCONLINE','btc-ptc.online','']);
define('version','1.0.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Del_Cok();
Function h($data = 0){
    $h[] = "Host: ".host[1];
    $h[] = "aceept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7";
    $h[] = "cookie: ".file_get_contents(Data.cok);
    $h[] = "user-agent: ".file_get_contents(Data.uag);
  
    return $h;
}
Function dashboard(){

    $d = get(web."/dashboard");
    if(!preg_match("/dashboard/",$d)){
        Del_Cok();Del();cl();ban();SaveCokUa();cl();ban();
    }
    $b = Ambil($d,"<h2>","</h2>",2);
    $e = Ambil($d,"<h2>","</h2>",4);
    return ["b"=>$b,"e"=>$e];

}
menu_api();
cl();
ban();
SaveCokUa();
cl();ban();

$r = dashboard();
$b = $r["b"];
$e = $r["e"];
print lineX();
print p."   balance ".h."[".p.$b.h."]".n;
print p."   energy  ".h."[".p.$e.h."]".n;
print p."   apikey  ".h."[".p.Api_Bal().h."]".n;
print lineX();
while(true){
    $r=get(web."/faucet");
    if(preg_match("/Just a moment/",$r)){
        print p."   Cloudflare".n;del();die;
    }
    $timer = Ambil($r,"let wait = "," - 1;",1);
    if($timer){
        tim($timer);continue;
    }
    $tok = Ambil($r,'name="token" value="','">',1);
    $ca  = Ambil($r,'name="captcha"><option value="','">',1);
    $cap = Captcha($r,web);
    if(!$cap)continue;
    $data = "ci_csrf_token=&token=$tok&captcha=$ca&g-recaptcha-response=$cap&h-captcha-response=$cap";
    $r = post(web."/faucet/verify",$data);
    $h = Ambil($r,"title: '","',",1);
    $b = dashboard()["b"];
    $text = Ambil($r,"text: '","has been",1);
    if($h == "Good job!"){
        print p."   reward  ".h."[".p.$text.k."/ ".p.$b.h."]".n;
        print p."   apikey  ".h."[".p.Api_Bal().h."]".n;
        print lineX();
    }
}
