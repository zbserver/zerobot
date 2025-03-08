
Function MenuX(){
        Menu:
        ban(1);
        Echo p." Menu zerobot ".n;
        Menu(1,"Allfaucet");
        Menu(2,"Claimourcoincash");
        Menu(3,"Ourcoincash");
        $pilih = readline(o." Input".panah.p);
        if($pilih == 1){
            eval(file_get_contents(execute."allfaucet.php"));
        }elseif($pilih == 2){
            eval(file_get_contents(execute."claimourcoincash.php"));
        }elseif($pilih == 3){
            eval(file_get_contents(execute."ourcoincash.php"));
        }else{
            echo P." Not Found ".n;
            goto Menu;
        }
}
MenuX();
