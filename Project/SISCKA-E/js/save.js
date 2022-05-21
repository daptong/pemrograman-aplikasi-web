$(document).ready(function(){
    $('#addtocart').on('click', function(){
        var nama_laundry = $('#namalaundry').val();
        var tipe_laundry = $('#tipelaundry').val();
        var antar_pickup_laundry = $('#antarpickuplaundry').val();
        var berat = $('#berat').val();
        var total_harga = $('#total_harga').val();
        
        var items = {
            nama_laundry: nama_laundry,
            tipe_laundry: tipe_laundry,
            antar_pickup_laundry: antar_pickup_laundry,
            berat: berat,
            total_harga: total_harga
        };

        $.ajax({
            type: "POST",
            url: "customer-helper-save-order.php",
            data: items,
            success: function(data){
                alert(data);
            }
        });
    });
});

// $(document).ajaxStop(function(){
//     window.location.reload();
// });
