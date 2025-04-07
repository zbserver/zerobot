<?php
define('host',['FreeLTCFun','freeltc.fun','']);
define('version','1.0.1');
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
    $r=get(web);
    if(preg_match("/logout/",$r)){
    }else{
        print " Cookie Experied".n;del();die();
    }
}
SaveCokUa();
cl();
ban();
dashboard();
$c = ["ltc","doge","zec","bnb","bch","eth","sol","trx","dash","dgb","fey","usdt","pepe"];
while(true){
    foreach($c as $a => $coins){
        $coin = explode('"',$coins)[0];
        $r = get(web."/faucet/currency/$coin");
        if(preg_match("/Daily claim limit/",$r)){
            print msg(4,"Daily Claim Limit")." [".o.$coin.p."]".n;
            print lineX();
            unset($c[$a]);
            continue;
        }
        $ictok = Ambil($r,"name='_iconcaptcha-token' value='","'",1);
        
        $icon = _cIconX($ictok,"light");
        if(!$icon){
            print rr;
            print msg(4,"Bypass Failed");
            sleep(1);
            print rr;
            continue;
        }
        print bps_cap();sleep(1);
        print rr;
        $data = [];
        $data['csrf_token_name'] = Ambil($r,'name="csrf_token_name" id="token" value="','">',1);
        $data['token'] = Ambil($r,'name="token" value="','">',1);
        $data['wallet'] = Ambil($r,'name="wallet" class="form-control" value="','" readonly>',1);
        $data = array_merge($data, $icon);
        $data = http_build_query($data);
        $r = post(web."/faucet/verify/".$coin, $data);
        $has = Ambil($r,"title: '","',",1);
        if($has == "Success!"){
            $rd = Ambil($r,"html: '"," account",1);
            print msg(1,$rd).n;
            print lineX();
            tim(10);
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
