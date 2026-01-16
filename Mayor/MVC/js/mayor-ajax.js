$(document).ready(function(){
    $('#approveSelected').click(function(){
        const selected=[];
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
                    selected.forEach(function(id){
                        $('tr[data-id="'+id+'"]').remove();

                    });
                    if($('#tableBody tr').length===0){
                        $('#tableBody').html('<tr><td colspan="6">No complaints ready for final approval.</td></tr>');

                    }
                    if(selected.length>0){
                    setTimeout(function(){
                        window.location.href='../php/send_rewards_controller.php?selected=' + selected.join(',');
                    },2000);
                }
                },
                error:function(xhr,status,error){
                    alert("Error processing approval" + error);
                    console.error("ajax error",xhr.responseText);
                }
                
                
            });
        }
    });
    $('#rejectSelected').click(function(){
        const selected=[];
        $('input[name="selected[]"]:checked').each(function(){
            selected.push($(this).val());
        });
        if(selected.length===0){
            alert("please select one complaint");
            return;
        }
        if(confirm("are u sure u want to reject this?")){
            $.ajax({
                url:'../php/final_approve_ajax.php',
                type:'POST',
                data:{ action:'reject',selected:selected},
                success:function(response){
                    $('#message').text(response);
                    selected.forEach(function(id){
                        $('tr[data-id="'+id+'"]').remove();
                    });
                    if($('#tableBody tr').length===0){
                        $('#tableBody').html('<tr><td colspan="6">No complains ready for final approveal</td></tr>');
                    
                    }
                },
                error:function(xhr,status,error){
                    alert("Error processing rejection." +error);
                    console.error("ajax error",xhr.responseText);
                }
            });
        }

    });
    
});