var update=true;
function sendval(opject){
  
$.ajax({
    url : 'about1.php', 
    method: 'post',
    data:opject
    }).done(function(str){});
}
$('span').click(function(){
    var firstchar=$(this).attr('id')[0];
    
    if(firstchar=='e'){
        var thedpid=$(this).attr('id').slice(1);
        var inputclass='.cl'+thedpid;
        var trid='tr'+thedpid;
        var thetr=document.getElementById(trid);
        
        var mybtn=document.getElementById('btn'+thedpid);
         if(thetr.getAttribute('data-write')=='no')
            {
               $(inputclass).removeAttr('readonly');
                $("#"+trid).css('background-color','#AAA');
                thetr.setAttribute('data-write','yes');
                $('#btn'+thedpid).css('display','inline');
            }
            else
            {
                $(inputclass).attr('readonly','');
                $("#"+trid).css('background-color','#EEE');
                thetr.setAttribute('data-write','no');
                 $('#btn'+thedpid).css('display','none');

            } 
    }
    else if(firstchar=='d'){
     
        var i=confirm('Are You Sure u want to delete this.....!!?');
        if(i==true){
            var buttonid=$(this).attr('id');
            var dpid=buttonid.slice(1);
           
             var data={UPDATEID:dpid};
            sendval(data);
           location.reload();
        }
        
    }
    });
    
    $('input').click(function(){
        var thedpid=$(this).attr('id').slice(1);
        var trid='tr'+thedpid;
        var thetr=document.getElementById(trid);
        
        if(thetr.getAttribute('data-done')=='no')
            {
                $('#'+trid).css('text-decoration','line-through');
                thetr.setAttribute('data-done','yes');
                
            }
        else
        {
             $('#'+trid).css('text-decoration','none');
                thetr.setAttribute('data-done','no');
        }
        
    });
    
    $('.upetxt').click(function(){
        update=true;
        var buttonid=$(this).attr('id');
        var dpid=buttonid.slice(3);
        var fromval=document.getElementById('from'+dpid).value;
        var descripval=document.getElementById('descrip'+dpid).value;
        var tohwereval=document.getElementById('towhere'+dpid).value;
        var titleval=document.getElementById('title'+dpid).value;
        var theid={DPID:dpid,FROM:fromval,DESCRIP:descripval,TOWHERE:tohwereval,TITLE:titleval};
        sendval(theid);//send it to php SESSTION
    });
