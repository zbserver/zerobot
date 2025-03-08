<?php
Function MenuX(){
    $server = $_SERVER["TMP"];
    if(!$server){
        $server = $_SERVER["TMPDIR"];
    }
    if(file_exists($server."/zerobot/app.php")){
        Menu:
        ban(1);
        Echo p." Menu zerobot ".n;
        Menu(1,"Allfaucet");
        Menu(2,"Claimourcoincash");
        Menu(3,"Ourcoincash");
        $pilih = readline(o." Input".panah.p);
        if($pilih == 1){
            eval(str_replace("<?php","",file_get_contents(execute."allfaucet.php")));
        }elseif($pilih == 2){
            eval(str_replace("<?php","",file_get_contents(execute."claimourcoincash.php")));
        }elseif($pilih == 3){
            eval(str_replace("<?php","",file_get_contents(execute."ourcoincash.php")));
        }else{
            echo P." Not Found ".n;
            goto Menu;
        }
    }else{
		echo p." File app.php not found!";
	}     
}
MenuX();
