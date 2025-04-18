
<?php
define('host',['Dogemom','dogecoin.mom','']);
define('version','1.0.0');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','http://'.host[1]);
include("App.php");
Del_Cok();
Function h(){
    $h[] = "Host: ".host[1];
    $h[] = "X-Requested-With: XMLHttpRequest";
    $h[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7";
    $h[] = "cookie: ".file_get_contents(Data.cok);
    $h[] = "user-agent: ".file_get_contents(Data.uag);
    return $h;
}
Function dashboard(){
    $r=get(web);
    if(preg_match("/Just a moment/",$r)){
        print k."   cloudflare".n;del();die;
    }
    if(preg_match("/Logout/",$r)){
        print p."   Login Success";sleep(1);
        print rr;
        print lineX();
    }else{
        print "  Login Failed".n;del();die;
    }
}
Function dataXYZ($csrf,$tok,$ca,$atb,$cap,$wall){
    if($ca == "turnstile"){
        if($cap && $atb){
            print msg(1,"Metode ".h."[".p."antibot + captcha".h."]").n;
            $data ="antibotlinks=$atb&csrf_token_name=$csrf&token=$tok&captcha=$ca&g-recaptcha-response=$cap&turnstile-response=$cap&wallet=$wall";
            return $data;
        }elseif($ca == "turnstile"){
            print msg(1,"Metode ".h."[".p."captcha only".h."]").n;
            $data ="csrf_token_name=$csrf&token=$tok&captcha=$ca&g-recaptcha-response=$cap&turnstile-response=$cap&wallet=$wall";
            return $data;
        }
    }elseif($ca == "recaptchav2"){
        if($cap && $atb){
            print msg(1,"Metode ".h."[".p."antibot + captcha".h."]").n;
            $data ="antibotlinks=$atb&csrf_token_name=$csrf&token=$tok&captcha=$ca&g-recaptcha-response=$cap&wallet=$wall";
            return $data;
        }elseif($ca == "recaptchav2"){
            print msg(1,"Metode ".h."[".p."captcha only".h."]").n;
            $data ="csrf_token_name=$csrf&token=$tok&captcha=$ca&g-recaptcha-response=$cap&wallet=$wall";
            return $data;
        }
    }elseif($ca == "hcaptcha"){
        if($cap && $atb){
            print msg(1,"Metode ".h."[".p."antibot + captcha".h."]").n;
            $data ="antibotlinks=$atb&csrf_token_name=$csrf&token=$tok&captcha=$ca&g-recaptcha-response=$cap&h-captcha-response=$cap&wallet=$wall";
            return $data;
        }elseif($ca == "hcaptcha"){
            print msg(1,"Metode ".h."[".p."captcha only".h."]").n;
            $data ="csrf_token_name=$csrf&token=$tok&captcha=$ca&g-recaptcha-response=$cap&h-captcha-response=$cap&wallet=$wall";
            return $data;
        }
    }elseif($atb){
        print msg(1,"Metode ".h."[".p."antibot only".h."]").n;
        $data ="antibotlinks=$atb&csrf_token_name=$csrf&token=$tok&wallet=$wall";
        return $data;
    }
}
Menu_Api();
SaveCokUa();
cl();
ban();
dashboard();
$c = ["trx","doge","bnb","sol","ltc"];
while(true){
    foreach($c as $a => $coins){
        $coin = explode('"',$coins)[0];
        $r = get(web."/faucet/currency/$coin");
        
        if(preg_match("/Just a moment/",$r)){
            print msg(4,"Cloudflare").n;die;
        }
        if(preg_match("/Daily claim limit/",$r)){
            print msg(4,"Daily Claim Limit")." [".o.$coin.p."]".n;
            print lineX();
            unset($c[$a]);
            continue;
        }
        $time= Ambil($r,'var wait = ',' - 1;',1);
        if($time){
            tim($time);
            continue;
        }
        $tok = Ambil($r,'name="token" value="','">',1);
        $csrf= Ambil($r,'name="csrf_token_name" id="token" value="','">',1);
        $ca  = Ambil($r,'name="captcha"><option value="','">',1);
        $wall= Ambil($r,'name="wallet" class="form-control" value="','"',1);
        $atb = anti_bot($r);
        $cap = Captcha($r,web); 
        if(!$atb && !$cap){continue;}
        $data = dataXYZ($csrf,$tok,$ca,$atb,$cap,$wall);
        $r = post(web."/faucet/verify/".$coin, $data);
        $has = Ambil($r,"title: '","',",1);
        if($has == "Success!"){
            $rd = Ambil($r,"html: '","has been sent to your FaucetPay",1);
            print msg(1,"Reward ").h."[".p.$rd.h."]".n;
            print msg(2,"Apikey ").h."[".p.Api_Bal().h."]".n;
            print lineX();
        }
        if(preg_match("/Firewall/",$r)){
            a :
            print msg(4,"firewall detected").n;
            $x = get(web."/firewall");
            $ca   = Ambil($r,'name="captchaType" value="','">',1);
            $csrf = Ambil($r,'name="csrf_token_name" value="','">',1);
            $atb  = Anti_Bot($r);
            $cap  =  Captcha($r,web);
            $data ="g-recaptcha-response=$cap&captchaType=recaptchav2&csrf_token_name=$csrf";
            $x = post(web."/firewall/verify",$data);
            if(preg_match('/unlock/',$x)){
                goto a;
            }
        }
        if(preg_match("/rate-limited/",$r)){
            print msg(4,"You have been rate-limited.");sleep(3);print rr;tim(8);continue;
        }
        if(preg_match("/The faucet does not have sufficient/",$r)){
            Echo msg(4,"Sufficient Found").p." [".o.$coin.p."]".n;
            print lineX();
            unset($c[$a]);
        }elseif(preg_match("/Shortlink must be complete/",$r)){
            echo msg(4,"1 Shortlink must be completed to continue again!").n;die;
        }    
    }
    if(!$c){
        print msg(4,"All coins have been claimed").n;
        return;
    }
}
