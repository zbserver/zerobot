<?php
define('host',['Freetrx','freetrx.su','']);
define('version','1.0.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Del_Cok();
Function h(){
    $h[] = "Host: ".host[1];
    $h[] = "Referer: https://freetrx.su/?r=TALrypwEaPW5JhDwg6b54KY3PFJrZkagaa";
    $h[] = "user-agent: ".getUserAgent();
    $h[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
	$h[] = "accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7";
    return $h;
}
Menu_Api();
save("Email");
$Email=urlencode(file_get_contents(Data."Email"));
get(web."/?r=TALrypwEaPW5JhDwg6b54KY3PFJrZkagaa");
cl();
ban();
echo msg(1,"Apikey").w3." : ".p.Api_Bal().n;
echo " ".line();
while(true){
    $r =  get(web."/?r=TALrypwEaPW5JhDwg6b54KY3PFJrZkagaa");
    $tok = Ambil($r,'name="session-token" value="','">',1);
    if(preg_match('/data-sitekey="/',$r)){$sitekey= Ambil($r,'data-sitekey="','"',1);}elseif(preg_match("/data-sitekey='/",$r)){$sitekey= Ambil($r,"data-sitekey='","'",1);}else{echo Error("sitekey Error");sleep(2);goto time;}
    $cap = captcha($r,web);
    if(!$cap){continue;}
    $data = "session-token=$tok&address=$Email&antibotlinks=&captcha=recaptcha&g-recaptcha-response=$cap&login=Verify+Captcha";
    $p  = post(web."/?r=TALrypwEaPW5JhDwg6b54KY3PFJrZkagaa",$data);
    $hasil = Ambil($p,'<i class="fas fa-money-bill-wave"></i> ',' <',1);
    if($hasil){
        echo msg(1,"Reward").w3." : ".hm.$hasil." Faucetpay.io".n;
        echo msg(3,"Apikey").w3." : ".p.Api_Bal().n;
        echo " ".line();
    }else{
        $limit = Ambil($p,'<i class="fas fa-exclamation-triangle"></i> ',' Please come back in tomorrow.',1);
        echo msg(4,$limit).n;die;
    }
    time:
    tim(120);
}
