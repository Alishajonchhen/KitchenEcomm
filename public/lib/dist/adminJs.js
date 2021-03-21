//changes done while opening of side navbar
function openNav() {
    document.getElementById("mySidebar").style.width = "300px";
    document.getElementById("main").style.marginLeft = "300px";
    document.getElementById("box").style.marginLeft = "0";
    document.getElementById("box1").style.marginLeft = "0";
}

//changes done while closing of side navbar
function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("box").style.marginLeft = "90px";
    document.getElementById("box1").style.marginLeft = "0px";
}

//showing add modal
$(function() {
    $('#categoryModal').modal({
        show: true
    });
});

//showing add modal
$(function() {
    $('#productModal').modal({
        show: true
    });
});


/*editing the table of category
$(document).ready(function () {
    var table=$('#dataTable').DataTable();

    //Start Edit Record
    table.on('click','.edit', function () {
        $tr=$(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr=$tr.prev('.parent');
        }
        var data=table.row($tr).data();
        console.log(data);

        $('#id').val(data[1]);
        $('#name').val(data[2]);
        $('#status').val(data[3]);

        $('#editForm').attr('action','/editCategory/'+data[0]);
        $('#editModal').modal('show');
    });
});
 */




