$(document).ready(function(){
    $('#updatecustomer').on('click', function(){
        var transaksi_id = $('#transaksi_id').val();
        var status = $('#state_laundry').val();

        var items = {
            transaksi_id: transaksi_id,
            status: status
        };

        $.ajax({
            type: "POST",
            url: "test-admin-helper-change-driver-packet.php",
            data: items,
            success: function(data){
                alert(data);
                location.href="test-admin-check-laundry.php";
            }
        });
    });
});