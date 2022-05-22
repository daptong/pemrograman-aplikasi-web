$(document).ready(function(){
    $('.btnSelect').on('click', function(){
        var currentRow = $(this).closest("tr");
	var col1 = currentRow.find("td:eq(0)").html();
	var col3 = currentRow.find("#state_laundry").val();

        var items = {
            transaksi_id: col1,
            status: col3
        };

        $.ajax({
            type: "POST",
            url: "admin-helper-change-driver-packet.php",
            data: items,
            success: function(data){
                alert(data);
                location.href = "admin-check-laundry.php";
		window.location.reload();
            },
	    error: function(data){
	    	alert(data);
		location.href = "admin-check-laundry.php";
		window.location.reload();
	    }
        });
    });
});
