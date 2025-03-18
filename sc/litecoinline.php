<?php
define('host',['litecoinline','litecoinline.com','']);
define('version','1.0.1');
define('cok','cookie.'.host[0]);
define('uag','user_agent');
define('web','https://'.host[1]);
Del_Cok();
Function h(){
    $h[] = "Host: ".host[1];
    $h[] = "cookie: ".file_get_contents(Data.cok);
    $h[] = "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7";
    $h[] = "user-agent: ".file_get_contents(Data.uag);
    return $h;
}
Function Balance(){
    $r = get(web."/dashboard");
    $lg= Ambil($r,'<span key="t-logout">','</span>',1);
    $b = Ambil($r,'<h4 class="mb-0">','</h4>',1);
    return ["l"=>$lg,"b"=>$b];
}
Menu_Api();
SaveCokUa();
ban();
$r = Balance();
if(!$r['l']){echo Error("Cookie expried").n;Del();die;}
echo n;
echo line_at();
echo line_tg().msg(1,"Balance").panah.p.$r['b'].n;
echo line_tg().cekapi().n;
echo line_bw();
while(true){
    $r = get(web."/ptc");
    $id = Ambil($r,"/ptc/view/","'",1);
    $adx = Ambil($r,'<p class="lh-1 mb-1 font-weight-bold">','</p>',1);
    if($adx == 0){echo Error("Ads Not Available").n;sleep(3);die;}
    if($id){
        $ads = get(web."/ptc/view/$id");
        $c_t= Ambil($ads,'hidden" name="csrf_token_name" value="','">',1);
        $tok= Ambil($ads,'hidden" name="token" value="','">',1);
        $tim = Ambil($ads,'var timer = ',';',1);
        tim($tim);
        $cap = Captcha($ads,web);
        if(!$cap){continue;}
        $ca = Ambil($ads,'captcha"><option value="','">',1);
        $data = "captcha=$ca&g-recaptcha-response=$cap&csrf_token_name=$c_t&token=$tok";
        $post = post(web."/ptc/verify/$id",$data);
        $hasil = Ambil($post,"'Good job!', '"," token",1);
       if($post){
           $r = Balance();
           echo n;
           echo line_at();
           echo line_tg().bal($r['b']).o." | ".p."reward ".panah.p.$hasil." token".n;
           echo line_tg().cekapi().o." | ".p."Ads Available (".k.($adx - 1).p.")".n;
           echo line_bw();
       }
   }
}
