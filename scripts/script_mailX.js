$(function(){
    
//    alert ('WOW');
    
    $('#mail').blur(function(){
        
//        alert ('WOW');
        
        // obsługa zapytań AJAX przez jquery
        $.ajax({
            
            url:'sprawdz.php?mail='+$(this).val(),
            
            success: function(s){
                
                if(s==='TAK'){
                    $('#mailSpan').html('Mail zajęty').css('color','red');
                } else {
                    $('#mailSpan').html('Mail OK!').css('color','green');
                }
            },
            
            error:function(e){
                
                alert('Błąd połączenia');
                
            }
            
        });
        
    });
    
});
