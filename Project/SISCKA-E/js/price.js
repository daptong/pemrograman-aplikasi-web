function getValueOne(){
    var laundry = document.getElementById('namalaundry').value;
    var temp1 = 0;
    if(laundry == 'Pakaian'){
        temp1 = 10000;
    }
    else if(laundry == 'Bed Cover'){
        temp1 = 13000;
    }
    else if(laundry == 'Bantal'){
        temp1 = 15000;
    }
    else if(laundry == 'Selimut'){
        temp1 = 16000;
    }

    return temp1;
}

function getValueTwo(){
    var tipe = document.getElementById('tipelaundry').value;
    var temp2 = 0;
    if(tipe == 'Reguler'){
        temp2 = 12000;
    }
    else if(tipe == 'Express'){
        temp2 = 20000;
    }

    return temp2;
}

function getValueThree(){
    var anpick = document.getElementById('antarpickuplaundry').value;
    var temp3 = 0;

    if(anpick == 'Antar'){
        temp3 = 15000;
    }
    else if(anpick == 'Pickup'){
        temp3 = 0;
    }

    return temp3;
}

function getValueFour(){
    var berat = document.getElementById('berat').value;

    var temp4 = 0;

    temp4 = berat * 5000;

    return temp4;
}

function getValueAll(){
    var one = getValueOne();
    var two = getValueTwo();
    var three = getValueThree();
    var four = getValueFour();

    var total = one + two + three + four;

    var divobj = document.getElementById('total_harga');
    divobj.value = total;
}