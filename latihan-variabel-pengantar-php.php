<?php

var_dump(1 + 1);
## Outputnya adalah 2 dengan tipe data integer karena yang dimaukkan di parameter adalah angka semua

var_dump("1 + 1");
## Outputnya adalah string dengan 5 karakter, yaitu "1 + 1" karena yang dimasukkan di parameter adalah string

## Karena bahasa pemrograman PHP termasuk weakly typed language, 
## maka untuk output kedua fungsi dibawah ini akan mengeluarkan output yang memiliki tipe data integer
var_dump( 1 + "1");
## Outputnya adalah 2 dengan tipe data integer, karena ada 1 karakter dengan tipe data string dan 1 karakter dengan tipe data integer
## Sehingga PHP akan mengganggap kedua karakter tersebut bertipe data integer

var_dump( "1" + "1");
## Outputnya adalah 2 dengan tipe data integer, karena PHP mengganggap karakter yang berada di tiap tanda petik adalah karakter dengan
## tipe data integer
?>