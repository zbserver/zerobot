Function MenuX(){
    $server = $_SERVER["TMP"];
    if(!$server){$server = $_SERVER["TMPDIR"];}
    if(!is_dir("Data")){system("mkdir Data");}
    Menu:
    ban(1);
    echo a." ┌────────────────────────┬─────┬────────────────────────┐".n;
    echo a." │  ".a."Menu zerobot          ".a."│".a." Api ".a."│ ".a."Link Join / Web ".a."       │".n;
    echo a." ├────────────────────────┼─────┼────────────────────────┤".n;
    echo a." │".NoLi(1,"Allfaucet")."          ".a."│".p." Yes ".a."│".p." bit.ly/3DmB6Yf".a."         │".n;
    echo a." │".NoLi(2,"Claimourcoincash")."   ".a."│".p." Yes ".a."│".p." bit.ly/3QSwaNK".a."         │".n;
    echo a." │".NoLi(3,"Ourcoincash")."        ".a."│".p." Yes ".a."│".p." bit.ly/3DtRDtj".a."         │".n;
    echo a." │".NoLi(4,"Claimlite")."          ".a."│".w3." No  ".a."│".p." bit.ly/43voCYQ".a."         │".n;
    echo a." │".NoLi(5,"Nevcoin")."            ".a."│".p." Yes ".a."│".p." bit.ly/4kBaraD".a."         │".n;
    echo a." │".NoLi(6,"Litecoinline")."       ".a."│".p." Yes ".a."│".p." bit.ly/3Ffweol".a."         │".n;
    echo a." │".NoLi(7,"Freetrxsu")."          ".a."│".p." Yes ".a."│".p."               ".a."         │".n;
    echo a." │".NoLi(8,"Hofaucet")."           ".a."│".p." Yes ".a."│".p."               ".a."         │".n;
    echo a." │".NoLi(9,"Allcoinfaucet")."      ".a."│".p." Yes ".a."│".p."               ".a."         │".n;
    echo a." └────────────────────────┴─────┴────────────────────────┘".p.n;

    $pilih = readline(w3." Input".panah.p);
    if($pilih == 1){
        eval(OpenSC("allfaucet.php"));
    }elseif($pilih == 2){
        eval(OpenSC("claimourcoincash.php"));
    }elseif($pilih == 3){
        eval(OpenSC("ourcoincash.php"));
    }elseif($pilih == 4){
        eval(OpenSC("claimlite.php"));
    }elseif($pilih == 5){
        eval(OpenSC("nevcoin.php"));
    }elseif($pilih == 6){
        eval(OpenSC("litecoinline.php"));
    }elseif($pilih == 999){
        eval(OpenSC("whoopyrewards.php"));
    }elseif($pilih == 7){
        eval(OpenSC("freetrxsu.php"));
    }elseif($pilih == 8){
        eval(OpenSC("hofaucet.php"));
    }elseif($pilih == 9){
        eval(OpenSC("sc/allcoinfaucet.php"));
    }else{
        print k." Bad Number".n;sleep(3);goto Menu;
    }
}
