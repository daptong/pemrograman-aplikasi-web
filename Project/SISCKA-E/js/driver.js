$(document).ready(function(){
    $(".changeStateDriver").on('click', function(){
        var currentRow = $(this).closest("tr");
        var col1 = currentRow.find("td:eq(0)").html();
        var col7 = currentRow.find("#paket_state").val();
        var col8 = currentRow.find("#assign_driver").val();
        var today = new Date().toISOString().slice(0, 10)

        var items = {
            transaksi_id: col1,
            paket_state: col7,
            paket_driver: col8,
            tanggal_pengiriman: today
        };

        $.ajax({
            type: "POST",
            url: "test-admin-helper-change-driver-packet.php",
            data: items,
            success: function(data){
                alert(data);
                location.href = "test-admin-check-laundry.php";
            }
        });
    });
});