<?php
function generatePassword($length, $repeat, $characters){

var_dump($characters);

$password = '';

//caratteri generazione password
$lettere_minuscole = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
$lettere_maiuscole = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
$numeri = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
$caratteri_speciali = ["!","@", "#", "$", "%", "^", "&", "*", "-", "+", "/", "?"];


if(count($characters) === 0){
//modello caratteri generazione password
$range_caratteri = array_merge($lettere_minuscole, $lettere_maiuscole, $numeri, $caratteri_speciali);
} else {


    $temp_array = [];

    //lettere maiuscole
    if(in_array('a', $characters)){
        //var_dump('Aggiungo lettere maiuscole');
        $temp_array = array_merge($temp_array, $lettere_maiuscole);
    }

    if(in_array('b', $characters)){
        //var_dump('Aggiungo lettere minuscole');
        $temp_array = array_merge($temp_array, $lettere_minuscole);
    }

    if(in_array('c', $characters)){
        //var_dump('Aggiungo numeri');
        $temp_array = array_merge($temp_array, $numeri);
    }

    if(in_array('d', $characters)){
        //var_dump('Aggiungo caratteri speciali');
        $temp_array = array_merge($temp_array, $caratteri_speciali);

    }

    $range_caratteri = $temp_array;
    // var_dump($range_caratteri);
    // die();

}










if($repeat === '1'){
    
    for($i = 1; $i <= $length; $i++){
        $random = rand(0, count($range_caratteri)-1);
        $char = $range_caratteri[$random];
        $password .= $char;
    }
    
} else {

    while(strlen($password) < $length){
        $random = rand(0, count($range_caratteri)-1);
        $char = $range_caratteri[$random];

        if(!str_contains($password, $char)){
            $password .= $char;
        }
    }

}


return $password;
}
