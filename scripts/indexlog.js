$(function(){
    
    $('#dodaj').click(function(event){
        
//        jeżeli chcę zablokować domyślą wartość, czyli w naszym przypadku odświeżanie po kliknięciu to dajemy event
//        blokada domyślnej akcji
        event.preventDefault();
        
        $('#modal').css('display', 'block').hide().fadeIn(1000);
        $('#dod').css('display', 'block').hide().fadeIn(2000);
        
    });
    
    $('#anuluj').click(function(event){
        
        event.preventDefault();
        
        $('#modal').fadeOut(2000);
        $('#dod').fadeOut(1000);
        
    });
    
    $(document).keyup(function(e){
        
//        Numer klawisza ESC
        
        if(e.keyCode === 27){
            
            $('#modal').fadeOut(2000);
            $('#dod').fadeOut(1000);
            
        }
        
    });
    
//        $('#modyfikacja').click(function(event){
//        
//        event.preventDefault();
//        
//        $('#modal').css('display', 'block').hide().fadeIn(2000);
//        $('#dod').css('display', 'block').hide().fadeIn(3000);
//        
//    });
    
});