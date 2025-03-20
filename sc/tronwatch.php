<?php
define('host',['TronWatch','tron.watch','']);
define('version','1.0.2');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
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
    return $h;
}
Function Faucet(){
    $r=get(web."/faucet");
    $l=Ambil($r,"<h2>","</h2>",1);
    $t=Ambil($r,"Total Claims: ","</p>",1);
    $c=Ambil($r,"Claims Today: ","</p>",1);
    return ["l"=>$l,"t"=>$t,"c"=>$c];
}
Awal:
Menu_Api();
SaveCokUa();
ban();
$r = Faucet();
if(!$r["l"]){print Error("Cookie Experied").n;Del();die;}
else{print " ".p."Login success.";sleep(1);print rr;}
goto Vid;
Faucet:
while(true){
    $r = get(web."/faucet");
    if(preg_match("/Daily limit reached/",$r)){
        echo Error("Daily limit reached").n;die;
    }
    $sl=Ambil($r,'<button id="visitShortlinkBtn" class="shortlink-btn">','</button>',1);
    if($sl == "Visit Shortlink"){
        echo msg(4,"Please visit shortlink or wait 1 hour").n;
        die;
    }
    $cap= Turnstile($r,web);
    if(!$cap){continue;}
    $csrf = Ambil($r,'name="csrf_token" value="','"',1);
    $data = "claim_faucet=1&csrf_token=$csrf&captchaToken=$cap&cf-turnstile-response=$cap";
    $r = json_decode(post(web."/faucet",$data),1);
    if($r['status'] == 200){
            $m = strip_tags($r['message']);
            $rd= Ambil($m,"Success: Claimed "," successfully!",1);
            $r = Faucet();
            echo line_at();
            echo line_tg().msg(1,"Reward     ").panah.p.$rd.n;
            echo line_tg().msg(1,"Claim Today").panah.p.$r["c"].o." | ".p."Apikey ".panah.p.Api_Bal().n;
            echo line_bw();
        tim(5);
    }
}
Ads:
while(true){
    $r  = get(web."/ptc");
    $ptc_id    = Ambil($r,'data-ptc-id="','"',1);
    $data_timer= Ambil($r,'data-timer="','"',1);
    $data_url  = Ambil($r,'data-url="','"',1);
    $data_reward = Ambil($r,'data-reward="','"',1);
    if($data_reward < "0.00010000"){
        echo line_at();
        echo line_tg().msg(4,"Other ptc rewards small direct faucet").n;
        echo line_bw();
        goto Faucet;
    }
    get($data_url);
    tim($data_timer);
    $cap = Turnstile($r,web."/ptc");
    if(!$cap){continue;}
    $csrf = Ambil($r,'name="csrf_token" value="','">',1);
    $data = "claim_ptc=1&ptc_id=$ptc_id&csrf_token=$csrf&captchaToken=$cap&cf-turnstile-response=$cap";
    $r = json_decode(post(web."/ptc?=claimPtcForm",$data),1);
    if($r['status'] == 200){
        $m = strip_tags($r['message']);
        $rd= Ambil($m,"Reward of "," account",1);
        echo line_at();
        echo line_tg().msg(1,"Reward").panah.p.$rd.n;
        echo line_tg().msg(3,"Apikey").panah.p.Api_Bal().n;
        echo line_bw();
    }elseif($r['status'] == 400){
        $m = strip_tags($r['message']);
        if(preg_match("/You have already reached the visit limit for this PTC/",$m)){
            echo line_at();
            echo line_tg().msg(4,"PTC limit.").n;
            echo line_bw();
            goto Faucet;
        }
    }
}
Vid:
while(true){
    $r = get(web."/claim");
    if(preg_match("/You’ve completed all available video tasks for today./",$r)){
        echo line_at();
        echo line_tg().msg(4,"Completed all available video tasks for today.").n;
        echo line_bw();
        goto Ads;
    }
    $video_id   = Ambil($r,'data-video-id="','"',1);
    $data_url   = Ambil($r,'data-url="','"',1);
    $data_timer = Ambil($r,'data-watch-time="','">',1);
    if($video_id){
        get($data_url);
        tim($data_timer);
        $cap = Turnstile($r,web);
        if(!$cap){continue;}
        $csrf = Ambil($r,'name="csrf_token" value="','">',1);
        $data = "claim=1&video_id=$video_id&csrf_token=$csrf&captchaToken=$cap&cf-turnstile-response=$cap";
        $r= json_decode(post(web."/claim?=claimForm",$data),1);
        if($r['status'] == 200){
            $m = strip_tags($r['message']);
            $rd= Ambil($m,"You successfully claimed your reward of ","!",1);
            echo line_at();
            echo line_tg().msg(1,"Reward").panah.p.$rd.n;
            echo line_tg().msg(3,"Apikey").panah.p.Api_Bal().n;
            echo line_bw();
        }
    }
}
