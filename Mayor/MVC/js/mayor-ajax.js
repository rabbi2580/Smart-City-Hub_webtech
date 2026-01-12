$(document).ready(function()){
    $('#approveSelected').click(function(){
        var selected=[];
        $('input[name="selected[]"]:checked').each(function(){
            selected.push($(this).val());
        });
        if(selected.length===0){
            alert("please select one complaint");
            return;
        }
        if(confirm("are u sure that u want approve these?")){
            $.ajax({
                url:'../php/final_approve_ajax.php',
                type: 'POST',
                data: { action:'approve',selected:selected},
                success: function(response){
                    $('#message').text(response);
                    selected.forEach(function*(id){
                        $('tr[data-id="'+id+'"]').remove();

                    });
                    if($('#tableBody tr').length===0){
                        $('#tableBody').html('<tr><td colspan="6">No complaints ready for final approval.</td></tr>');

                    }
                },
                error:function(){
                    alert("Error processing approval");
                }
                
                
            });
        }
    });
    
}