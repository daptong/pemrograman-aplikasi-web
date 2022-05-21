$(document).ready(function(){
    $(".addmore").on('click', function () {
        var count = $('#cart-table')[0].rows.length;
        var data = "<tr class='case'><td><span id='snum" + count + "'>" + count + ".</span></td>";
        data += "<td><input class='form-control' type='text' name='wname[]'/></td><td><button type=\"button\" id='newtrbtn' class='btn btn-success childtbl'>+ add new Title</button><table class='table table-bordered'></table></td></tr>";
        $('#form_table').append(data);
    });
    $('form#test').on('click', '.childtbl', function () {
        var $titlesTable = $(this).next('table')[0];
        var titlesCount = $titlesTable.rows.length + 1;
        var data1 = "<tr class='case1'><td><span id='snum1" + titlesCount + "'>" + titlesCount + ".</span></td>";
        data1 += "<td>Title:<input class='form-control' type='text' name='wr[]'/></td></tr>";
        $($titlesTable).append(data1);
    });
});