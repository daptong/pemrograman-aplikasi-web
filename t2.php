<?php
$z = ' handal';

function a(){
    // global $z;
    $a = 'saya';
    function b($a){
        // global $a;
        $b = ' programmer';
        function c($a, $b){
            global $z;
            $c = ' web';
            echo $a, $b, $c, $z;
        }
        c($a, $b);
    }
    b($a);
}

a();
?>