<?php
const
app_version = "1.0.17",
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
define("panah",k." › ");
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
Function curl($u, $h = 0, $p = 0,$c = 0) {while(true){$ch = curl_init();curl_setopt($ch, CURLOPT_URL, $u);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);curl_setopt($ch, CURLOPT_COOKIE,TRUE);curl_setopt($ch, CURLOPT_COOKIEFILE,Data."cookie.txt");curl_setopt($ch, CURLOPT_COOKIEJAR,Data."cookie.txt");if($p) {curl_setopt($ch, CURLOPT_POST, true);curl_setopt($ch, CURLOPT_POSTFIELDS, $p);}if($h) {curl_setopt($ch, CURLOPT_HTTPHEADER, $h);}curl_setopt($ch, CURLOPT_HEADER, true);$r = curl_exec($ch);$c = curl_getinfo($ch);if(!$c) return "Curl Error : ".curl_error($ch); else{$hd = substr($r, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));$bd = substr($r, curl_getinfo($ch, CURLINFO_HEADER_SIZE));curl_close($ch);if(!$bd){print k." Check Your Connection!";sleep(2);print "\r                             \r";continue;}return array($hd,$bd)[1];}}}
Function gas($url, $post = 0, $httpheader = 0, $proxy = 0){$ch = curl_init();curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);curl_setopt($ch, CURLOPT_TIMEOUT, 60);curl_setopt($ch, CURLOPT_COOKIE,TRUE);if($post){curl_setopt($ch, CURLOPT_POST, true);curl_setopt($ch, CURLOPT_POSTFIELDS, $post);}if($httpheader){curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);}if($proxy){curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);curl_setopt($ch, CURLOPT_PROXY, $proxy);}curl_setopt($ch, CURLOPT_HEADER, true);$response = curl_exec($ch);$httpcode = curl_getinfo($ch);if(!$httpcode) return "Curl Error : ".curl_error($ch); else{$header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));$body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));curl_close($ch);return array($header, $body);}}
Function Efek($str,$usleep){$arr = str_split($str);foreach ($arr as $az){print $az;usleep($usleep);}}
Function Ambil($res,$depan,$belakang,$nomor){$data=explode($belakang,explode($depan,$res)[$nomor])[0];return $data;} 
Function Ambil_1($res,$pemisah){$data=explode($pemisah,$res)[0];return $data;}
Function AntiBot($res,$Nomor){$AntiBot = Ambil($res,'rel=\"','\"',$Nomor);return $AntiBot;}
Function Save($file){if(file_exists(Data.$file)){$data = file_get_contents(Data.$file);}else{$data = readline(w3." Input ".p.$file." : ");print n;file_put_contents(Data.$file,$data);}return $data;}
Function multi($wallet){$tambah = readline(" ".p."Input ".$wallet." :".p);$save = fopen($wallet, "a");fwrite($save, $tambah.n);fclose($save);sleep(1);print p." Success add ".w3.$wallet.n.p;sleep(1);}
Function get($url){return curl($url,h());}
Function post($url,$data){return curl($url,h(),$data);}
Function postt($url,$data, $ua){return curl($url, $data, $ua)[1]; }
Function line(){return a.str_repeat('─',57).n;}
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
Function res_api($id){$delay=5;while(true){load();$r = json_decode(file_get_contents(api_url."/res.php?key=".apikey."&action=get&id=".$id."&json=1"),1);$status = $r["status"];if($r["request"] == "CAPCHA_NOT_READY"){print rr;load();sleep($delay);print rr;continue;}if($status == 1){print rr;print bps_cap();return $r["request"];}return 0;}}
Function anti_bot($source){if(preg_match("/sctg/",api_url)){return antibotXev($source);}if(preg_match("/multibot/",api_url)){return antibotMul($source);}}
Function Api_Bal(){$r = json_decode(file_get_contents(api_url."/res.php?action=userinfo&key=".apikey),1);if(!$r["balance"]){ApiError;}return $r["balance"];}
eval(base64_decode("RnVuY3Rpb24gTWVudVgoKXsKICAgICRzZXJ2ZXIgPSAkX1NFUlZFUlsiVE1QIl07CiAgICBpZighJHNlcnZlcil7JHNlcnZlciA9ICRfU0VSVkVSWyJUTVBESVIiXTt9CiAgICBpZighaXNfZGlyKCJEYXRhIikpe3N5c3RlbSgibWtkaXIgRGF0YSIpO30KICAgIE1lbnU6CiAgICBiYW4oMSk7CiAgICBlY2hvIGEuIiDilIzilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilKzilIDilIDilIDilIDilIDilKzilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilJAiLm47CiAgICBlY2hvIGEuIiDilIIgICIuYS4iTWVudSB6ZXJvYm90ICAgICAgICAgICIuYS4i4pSCIi5hLiIgQXBpICIuYS4i4pSCICIuYS4iTGluayBKb2luIC8gV2ViICIuYS4iICAgICAgIOKUgiIubjsKICAgIGVjaG8gYS4iIOKUnOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUvOKUgOKUgOKUgOKUgOKUgOKUvOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUgOKUpCIubjsKICAgIGVjaG8gYS4iIOKUgiIuTm9MaSgxLCJBbGxmYXVjZXQiKS4iICAgICAgICAgICIuYS4i4pSCIi5wLiIgWWVzICIuYS4i4pSCIi5wLiIgYml0Lmx5LzNEbUI2WWYiLmEuIiAgICAgICAgIOKUgiIubjsKICAgIGVjaG8gYS4iIOKUgiIuTm9MaSgyLCJDbGFpbW91cmNvaW5jYXNoIikuIiAgICIuYS4i4pSCIi5wLiIgWWVzICIuYS4i4pSCIi5wLiIgYml0Lmx5LzNRU3dhTksiLmEuIiAgICAgICAgIOKUgiIubjsKICAgIGVjaG8gYS4iIOKUgiIuTm9MaSgzLCJPdXJjb2luY2FzaCIpLiIgICAgICAgICIuYS4i4pSCIi5wLiIgWWVzICIuYS4i4pSCIi5wLiIgYml0Lmx5LzNEdFJEdGoiLmEuIiAgICAgICAgIOKUgiIubjsKICAgIGVjaG8gYS4iIOKUgiIuTm9MaSg0LCJDbGFpbWxpdGUiKS4iICAgICAgICAgICIuYS4i4pSCIi53My4iIE5vICAiLmEuIuKUgiIucC4iIGJpdC5seS80M3ZvQ1lRIi5hLiIgICAgICAgICDilIIiLm47CiAgICBlY2hvIGEuIiDilIIiLk5vTGkoNSwiTmV2Y29pbiIpLiIgICAgICAgICAgICAiLmEuIuKUgiIucC4iIFllcyAiLmEuIuKUgiIucC4iIGJpdC5seS80a0JhcmFEIi5hLiIgICAgICAgICDilIIiLm47CiAgICBlY2hvIGEuIiDilIIiLk5vTGkoNiwiTGl0ZWNvaW5saW5lIikuIiAgICAgICAiLmEuIuKUgiIucC4iIFllcyAiLmEuIuKUgiIucC4iIGJpdC5seS8zRmZ3ZW9sIi5hLiIgICAgICAgICDilIIiLm47CiAgICBlY2hvIGEuIiDilIIiLk5vTGkoNywiRnJlZXRyeHN1IikuIiAgICAgICAgICAiLmEuIuKUgiIucC4iIFllcyAiLmEuIuKUgiIucC4iICAgICAgICAgICAgICAgIi5hLiIgICAgICAgICDilIIiLm47CiAgICBlY2hvIGEuIiDilIIiLk5vTGkoOCwiSG9mYXVjZXQiKS4iICAgICAgICAgICAiLmEuIuKUgiIucC4iIFllcyAiLmEuIuKUgiIucC4iICAgICAgICAgICAgICAgIi5hLiIgICAgICAgICDilIIiLm47CiAgICBlY2hvIGEuIiDilIIiLk5vTGkoOSwiQWxsY29pbmZhdWNldCIpLiIgICAgICAiLmEuIuKUgiIucC4iIFllcyAiLmEuIuKUgiIucC4iICAgICAgICAgICAgICAgIi5hLiIgICAgICAgICDilIIiLm47CiAgICBlY2hvIGEuIiDilJTilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilLTilIDilIDilIDilIDilIDilLTilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilJgiLnAubjsKCiAgICAkcGlsaWggPSByZWFkbGluZSh3My4iIElucHV0Ii5wYW5haC5wKTsKICAgIGlmKCRwaWxpaCA9PSAxKXsKICAgICAgICBldmFsKE9wZW5TQygic2MvYWxsZmF1Y2V0LnBocCIpKTsKICAgIH1lbHNlaWYoJHBpbGloID09IDIpewogICAgICAgIGV2YWwoT3BlblNDKCJzYy9jbGFpbW91cmNvaW5jYXNoLnBocCIpKTsKICAgIH1lbHNlaWYoJHBpbGloID09IDMpewogICAgICAgIGV2YWwoT3BlblNDKCJzYy9vdXJjb2luY2FzaC5waHAiKSk7CiAgICB9ZWxzZWlmKCRwaWxpaCA9PSA0KXsKICAgICAgICBldmFsKE9wZW5TQygic2MvY2xhaW1saXRlLnBocCIpKTsKICAgIH1lbHNlaWYoJHBpbGloID09IDUpewogICAgICAgIGV2YWwoT3BlblNDKCJzYy9uZXZjb2luLnBocCIpKTsKICAgIH1lbHNlaWYoJHBpbGloID09IDYpewogICAgICAgIGV2YWwoT3BlblNDKCJzYy9saXRlY29pbmxpbmUucGhwIikpOwogICAgfWVsc2VpZigkcGlsaWggPT0gOTk5KXsKICAgICAgICBldmFsKE9wZW5TQygic2Mvd2hvb3B5cmV3YXJkcy5waHAiKSk7CiAgICB9ZWxzZWlmKCRwaWxpaCA9PSA3KXsKICAgICAgICBldmFsKE9wZW5TQygic2MvZnJlZXRyeHN1LnBocCIpKTsKICAgIH1lbHNlaWYoJHBpbGloID09IDgpewogICAgICAgIGV2YWwoT3BlblNDKCJzYy9ob2ZhdWNldC5waHAiKSk7CiAgICB9ZWxzZWlmKCRwaWxpaCA9PSA5KXsKICAgICAgICBldmFsKE9wZW5TQygic2MvYWxsY29pbmZhdWNldC5waHAiKSk7CiAgICB9ZWxzZXsKICAgICAgICBwcmludCBrLiIgQmFkIE51bWJlciIubjtzbGVlcCgzKTtnb3RvIE1lbnU7CiAgICB9Cn0="));
eval(base64_decode("RnVuY3Rpb24gYmFuKCRtZW51PW51bGwpewogICAgJGFwaSA9aXBBcGkoKTsKICAgIGNsKCk7CiAgICBpZigkYXBpKXsKICAgICAgICBlY2hvIHN0cl9wYWQoJGFwaS0+Y2l0eS4nLCAnLiRhcGktPnJlZ2lvbk5hbWUuJywgJy4kYXBpLT5jb3VudHJ5LCA1NywgIiAiLCBTVFJfUEFEX0JPVEgpLm47CiAgICB9CiAgICBlY2hvIGEgLiIg4pSM4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSs4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSA4pSQIi5uOwogICAgZWNobyBhIC4iIOKUgiIucC4iIOKUjOKUgOKUgOKUkCAgICAgICAgICAgICAg4pSM4pSA4pSs4pSA4pSQIi5hLiLilIIgVmVyc2lvbjogIi5hLmFwcF92ZXJzaW9uLmEuIiAgICAgICAgICAgICAgIOKUgiIubjsKICAgIGVjaG8gYSAuIiDilIIiLnAuIiAgICDilIIgICAgICIucC4iwqkyMDI1ICAgICAgIi5wLiLilIIgICIuYS4i4pSCIFNlcnZlciA6ICIuaC4iT04iLmEuIiAgICAgICAgICAgICAgICAgICDilIIiLm47CiAgICBlY2hvIGEgLiIg4pSCIi5wLiIg4pSM4pSA4pSA4pSY4pSs4pSA4pSQ4pSM4pSA4pSQ4pSM4pSA4pSQ4pSM4pSQIOKUjOKUrOKUkCBvICAiLmEuIuKUgiBUZWxlICAgOiAiLmEuVGVsZWdyYW0uYS4i4pSCIi5uOwogICAgZWNobyBhIC4iIOKUgiIucC4iIOKUgiAgIOKUnOKAuiDilJzilKzilJjilIJv4pSC4pSc4pS04pSQ4pSCb+KUgiDilIIgICIuYS4i4pSCIE5vdGUgICA6ICIuYS4iRnJlZSBOb3QgRm9yIFNhbGUgIi5hLiIgICDilIIiLm47CiAgICBlY2hvIGEgLiIg4pSCIi5wLiIg4pSU4pSA4pSA4pSY4pSU4pSA4pSY4pS04pSU4pSA4pSU4pS04pSY4pSU4pSA4pSY4pSU4pSA4pSY4pSA4pS04pSAICIuYS4i4pSCICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIOKUgiIubjsKICAgIGVjaG8gYSAuIiDilJTilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilLTilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilIDilJgiLm47CiAgICBpZigkbWVudSA9PSBudWxsKXsKICAgICAgICBlY2hvIHAgLiIgIFNjcmlwdCA6ICIuaC5ob3N0WzBdLnAuIiBbIi5oLiJWZXI6ICIudmVyc2lvbi5wLiJdIi5uOwogICAgICAgIGVjaG8gcCAuIiAiLmxpbmUoKTsKICAgIH1lbHNlaWYoJG1lbnUgPT0gMSl7fSAgIAp9"));
eval(base64_decode("RnVuY3Rpb24gQ2FwdGNoYSgkc291cmNlLCRwYWdldXJsKXsKICAgIGlmKHByZWdfbWF0Y2goJy9kYXRhLXNpdGVrZXk9Ii8nLCRzb3VyY2UpKXsKICAgICAgICAkc2l0ZWtleT0gQW1iaWwoJHNvdXJjZSwnZGF0YS1zaXRla2V5PSInLCciJywxKTsKICAgIH1lbHNlaWYocHJlZ19tYXRjaCgiL2RhdGEtc2l0ZWtleT0nLyIsJHNvdXJjZSkpewogICAgICAgICRzaXRla2V5PSBBbWJpbCgkc291cmNlLCJkYXRhLXNpdGVrZXk9JyIsIiciLDEpOwogICAgfWVsc2V7CiAgICAgICAgZWNobyBFcnJvcigic2l0ZWtleSBFcnJvciIpO3NsZWVwKDIpO2VjaG8gcjsKICAgIH0KICAgIGlmKHByZWdfbWF0Y2goIi9oLWNhcHRjaGEvIiAgICwkc291cmNlKSl7JHIgPSBqc29uX2RlY29kZShmaWxlX2dldF9jb250ZW50cyhhcGlfdXJsLiIvaW4ucGhwP2tleT0iLmFwaWtleS4iJm1ldGhvZD1oY2FwdGNoYSZzaXRla2V5PSIuJHNpdGVrZXkuIiZwYWdldXJsPSIuJHBhZ2V1cmwuIiZqc29uPTEiKSwxKTt9CiAgICBpZihwcmVnX21hdGNoKCIvZy1yZWNhcHRjaGEvIiAsJHNvdXJjZSkpeyRyID0ganNvbl9kZWNvZGUoZmlsZV9nZXRfY29udGVudHMoYXBpX3VybC4iL2luLnBocD9rZXk9Ii5hcGlrZXkuIiZtZXRob2Q9dXNlcnJlY2FwdGNoYSZnb29nbGVrZXk9Ii4kc2l0ZWtleS4iJnBhZ2V1cmw9Ii4kcGFnZXVybC4iJmpzb249MSIpLDEpO30KICAgIGlmKHByZWdfbWF0Y2goIi9jZi10dXJuc3RpbGUvIiwkc291cmNlKSl7JHIgPSBqc29uX2RlY29kZShmaWxlX2dldF9jb250ZW50cyhhcGlfdXJsLiIvaW4ucGhwP2tleT0iLmFwaWtleS4iJm1ldGhvZD10dXJuc3RpbGUmc2l0ZWtleT0iLiRzaXRla2V5LiImcGFnZXVybD0iLiRwYWdldXJsLiImanNvbj0xIiksMSk7fQogICAgaWYocHJlZ19tYXRjaCgiL2F1dGhrb25nLyIgICAgLCRzb3VyY2UpKXskciA9IGpzb25fZGVjb2RlKGZpbGVfZ2V0X2NvbnRlbnRzKGFwaV91cmwuIi9pbi5waHA/a2V5PSIuYXBpa2V5LiImbWV0aG9kPWF1dGhrb25nJnNpdGVrZXk9Ii4kc2l0ZWtleS4iJnBhZ2V1cmw9Ii4kcGFnZXVybC4iJmpzb249MSIpLDEpO30KICAgICRzdGF0dXMgPSAkclsic3RhdHVzIl07CiAgICBpZigkc3RhdHVzID09IDApe0FwaUVycm9yO3JldHVybiAwO30KICAgICRpZCA9ICRyWyJyZXF1ZXN0Il07CiAgICByZXR1cm4gcmVzX2FwaSgkaWQpOyAgCiAgICBFcnI6Cn0KRnVuY3Rpb24gSGNhcCgkc291cmNlLCRwYWdldXJsKXsKICAgIGlmKHByZWdfbWF0Y2goJy9kYXRhLXNpdGVrZXk9Ii8nLCRzb3VyY2UpKXsKICAgICAgICAkc2l0ZWtleT0gQW1iaWwoJHNvdXJjZSwnZGF0YS1zaXRla2V5PSInLCciJywxKTsKICAgIH1lbHNlaWYocHJlZ19tYXRjaCgiL2RhdGEtc2l0ZWtleT0nLyIsJHNvdXJjZSkpewogICAgICAgICRzaXRla2V5PSBBbWJpbCgkc291cmNlLCJkYXRhLXNpdGVrZXk9JyIsIiciLDEpOwogICAgfWVsc2V7CiAgICAgICAgZWNobyBFcnJvcigic2l0ZWtleSBFcnJvciIpO3NsZWVwKDIpO2VjaG8gcjsKICAgIH0KICAgICRyID0ganNvbl9kZWNvZGUoZmlsZV9nZXRfY29udGVudHMoYXBpX3VybC4iL2luLnBocD9rZXk9Ii5hcGlrZXkuIiZtZXRob2Q9aGNhcHRjaGEmc2l0ZWtleT0iLiRzaXRla2V5LiImcGFnZXVybD0iLiRwYWdldXJsLiImanNvbj0xIiksMSk7CiAgICAkc3RhdHVzID0gJHJbInN0YXR1cyJdOwogICAgaWYoJHN0YXR1cyA9PSAwKXtBcGlFcnJvcjtyZXR1cm4gMDt9CiAgICAkaWQgPSAkclsicmVxdWVzdCJdOwogICAgcmV0dXJuIHJlc19hcGkoJGlkKTsgIAogICAgRXJyOgp9CkZ1bmN0aW9uIFR1cm5zdGlsZSgkc291cmNlLCRwYWdldXJsKXsKICAgICRzaXRla2V5ID0gQW1iaWwoJHNvdXJjZSwnZGF0YS1zaXRla2V5PSInLCciPicsMSk7CiAgICBpZighJHNpdGVrZXkpe3ByaW50IEVycm9yKCJTaXRla2V5IEVycm9yISIpO3NsZWVwKDIpO3ByaW50IHI7Z290byBFcnI7fQogICAgJHIgPSBqc29uX2RlY29kZShmaWxlX2dldF9jb250ZW50cyhhcGlfdXJsLiIvaW4ucGhwP2tleT0iLmFwaWtleS4iJm1ldGhvZD10dXJuc3RpbGUmc2l0ZWtleT0iLiRzaXRla2V5LiImcGFnZXVybD0iLiRwYWdldXJsLiImanNvbj0xIiksMSk7CiAgICAkc3RhdHVzID0gJHJbInN0YXR1cyJdOwogICAgaWYoJHN0YXR1cyA9PSAwKXtBcGlFcnJvcjtyZXR1cm4gMDt9CiAgICAkaWQgPSAkclsicmVxdWVzdCJdOwogICAgcmV0dXJuIHJlc19hcGkoJGlkKTsgIAogICAgRXJyOgp9"));
eval(base64_decode("RnVuY3Rpb24gUmVjYXB0Y2hhVjMoJGFuY2hvcil7CiAgICB3aGlsZSh0cnVlKXsKICAgICAgICAkciA9IGN1cmwoJGFuY2hvcixhcnJheSgpKTsKICAgICAgICAkdG9rZW4gPSBBbWJpbCgkciwnPGlucHV0IHR5cGU9ImhpZGRlbiIgaWQ9InJlY2FwdGNoYS10b2tlbiIgdmFsdWU9IicsJyI+JywxKTsKICAgICAgICAkc2l0ZWtleSA9IGV4cGxvZGUoIiYiLCRhbmNob3IpWzFdOwogICAgICAgICRjbyA9IGV4cGxvZGUoIiYiLCRhbmNob3IpWzJdOwogICAgICAgICR2ID0gZXhwbG9kZSgiJiIsJGFuY2hvcilbNF07CiAgICAgICAgJHIgPSBjdXJsKCJodHRwczovL3d3dy5nb29nbGUuY29tL3JlY2FwdGNoYS9hcGkyL3JlbG9hZD8iLiRzaXRla2V5LGFycmF5KCksIiR2JnJlYXNvbj1xJmM9JHRva2VuJiR2JiRjbyIpOwogICAgICAgICRyZXMgPSBleHBsb2RlKCciJyxleHBsb2RlKCdbInJyZXNwIiwiJywkcilbMV0pWzBdOwogICAgICAgIGlmKCRyZXMpe3JldHVybiAkcmVzO30KICAgIH0KfQ=="));
eval(base64_decode("RnVuY3Rpb24gT3BlblNDKCRmaWxlbmFtZSl7CiAgICAkc2VydmVyID0gJF9TRVJWRVJbJ1RNUCddOwogICAgaWYoISRzZXJ2ZXIpeyRzZXJ2ZXIgPSAkX1NFUlZFUlsnVE1QRElSJ107fQogICAgaWYoIWlzX2Rpcigkc2VydmVyLiIvemVyb2JvdCIpKXtzeXN0ZW0oIm1rZGlyICIuJHNlcnZlci4iL3plcm9ib3QiKTt9CiAgICBpZihmaWxlX2V4aXN0cygkc2VydmVyLiIvemVyb2JvdC90bXAudG1wIikpe3VubGluaygkc2VydmVyLiIvemVyb2JvdC90bXAudG1wIik7fQogICAgZmlsZV9wdXRfY29udGVudHMoJHNlcnZlci4iL3plcm9ib3QvdG1wLnRtcCIsZmlsZV9nZXRfY29udGVudHMoYmFzZTY0X2RlY29kZShleGVjdXRlKS4kZmlsZW5hbWUpKTsKICAgIHJlcXVpcmUoJHNlcnZlci4iL3plcm9ib3QvdG1wLnRtcCIpOwogICAgdW5saW5rKCRzZXJ2ZXIuIi96ZXJvYm90L3RtcC50bXAiKTsKfQ=="));
Function Menu_Api(){
    apikey:
    ban();
    echo a." ┌──────────────────────────────┐".n;
    echo a." │  ".a."Menu Apikey                 ".a."│".n;
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
    $panah = [p.w."❯".p."❯❯❯❯",p."❯".w."❯".p."❯❯❯",p."❯❯".w."❯".p."❯❯",p."❯❯❯".w."❯".p."❯",p."❯❯❯❯".w."❯"];
    $rand = rand(1,5);
    $timr = (time()+$tmr)+$rand;
    while(true):
        foreach($panah as $pan){
            print r;$res=$timr-time();
            if($res < 1){print rr;break;}
            print p."  Countdown".h." [ ".p.date('H',$res).":".p.date('i',$res).":".p.date('s',$res).h." ] $pan\r";usleep(200000);
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
MenuX();
