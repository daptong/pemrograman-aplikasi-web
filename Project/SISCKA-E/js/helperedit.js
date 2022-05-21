$(document).ready(function(){
	// code to read selected table row cell data (values).
	$(".btnSelect").on('click',function(){
		 var currentRow = $(this).closest("tr");
		 var col1 = currentRow.find("td:eq(0)").html();
		 var col2 = currentRow.find("td:eq(1)").html();
		 var col3 = currentRow.find("#state_laundry").val();

        var items = {
            transaksi_id: col1,
            status: col3
        };

        $.ajax({
            type: "POST",
            url: "test-admin-helper-change-transaksi-status.php",
            data: items,
            success: function(data){
                alert(data);
                location.href="test-admin-check-laundry.php";
            }
        });
	});
});