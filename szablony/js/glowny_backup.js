$.ajaxSetup({
            beforeSend:function(xhr) {
                xhr.overrideMimeType('text/html; charset=utf-8');
            }
            //contentType: "application/x-www-form-urlencoded; charset=iso-8859-2"
        });
    $(document).ready(function(){
        
        //QueryLoader.selectorPreload = "#info";
        //QueryLoader.init();
        
        $('area').click(function(){
            $('div#info').ajaxStart(function() {
                $(this).html('');
                $(this).toggleClass('ajax_loader');
           })
           .ajaxStop(function() {
                $(this).toggleClass('ajax_loader');
           });
                      
           var val = $(this).attr('href');
                     
           $.post('http://localhost/Liga/skrypty/liga.php', {'idLigi':val}, function(e) { 
               $('div#info').html(e);
            });
            return false;
        });
        
        var val = $(this).attr('href');
    
         /*$('#loader').insertBefore('div#info')
          .ajaxStart(function() {
            $(this).show();
          })
          .ajaxStop(function() {
            $(this).hide();
          });*/   
    
        
        $('ul#WOJEWODZTWA a').click(function() {
           
           $('div#info').ajaxStart(function() {
                $(this).html('');
                $(this).toggleClass('ajax_loader');
           })
           .ajaxStop(function() {
                $(this).toggleClass('ajax_loader');
           });
           
           var woj = $(this).attr('title');
                     
           $.post('http://localhost/Liga/skrypty/liga.php', {'idLigi':woj}, function(e) { 
               $('div#info').html(e);
            });
            return false;
        });
        
        
        $('a.usun_uzytk').click(function(){
            if (confirm('Czy na pewno usunac?')){
                $('table').ajaxStart(function() {
                    //$(this).html('');
                    $(this).toggleClass('ajax_loader');
               })
               .ajaxStop(function() {
                    $(this).toggleClass('ajax_loader');
               });

               var val = $(this).attr('href'); 

               $.post('usunUzytk/' + val, {'idLigi':val}, function(e) { 
                   setInterval(function(){
                    window.location = 'uzytkownicy';
                    });
                });
                return false;
            }else{
            return false;
            }
        });
        
        $('a.usun_lige').click(function(){
            if (confirm('Czy na pewno usunac?')){
                $('table').ajaxStart(function() {
                    //$(this).html('');
                    $(this).toggleClass('ajax_loader');
               })
               .ajaxStop(function() {
                    $(this).toggleClass('ajax_loader');
               });

               var val = $(this).attr('href'); 

               $.post('usunLige/' + val, {'idLigi':val}, function(e) { 
                   setInterval(function(){
                    window.location = 'ligi';
                    });
                });
                return false;
            }else{
            return false;
            }
        });
        
        $('a.usun_druzyne').click(function(){
            if (confirm('Czy na pewno usunac?')){
                $('table').ajaxStart(function() {
                    //$(this).html('');
                    $(this).toggleClass('ajax_loader');
               })
               .ajaxStop(function() {
                    $(this).toggleClass('ajax_loader');
               });

               var val = $(this).attr('href'); 

               $.post('usunDruzyne/' + val, {'idDruzyny':val}, function(e) { 
                   setInterval(function(){
                    window.location = 'druzyny';
                    });
                });
                return false;
            }else{
            return false;
            }
        });
        
        $('a.usun_news').click(function(){
            if (confirm('Czy na pewno usunac?')){
                $('div#TRESC').ajaxStart(function() {
                    //$(this).html('');
                    $(this).toggleClass('ajax_loader');
               })
               .ajaxStop(function() {
                    $(this).toggleClass('ajax_loader');
               });

               var val = $(this).attr('href'); 
               $.post('usunNews/' + val, {'idWpisu':val}, function(e) { 
                   setInterval(function(){
                    window.location = 'index';
                    });
                });
                return false;
            }else{
            return false;
            }
        });
        
        $('a.usun_kom').click(function(){
            if (confirm('Czy na pewno usunac?')){
                $('div#TRESC').ajaxStart(function() {
                    //$(this).html('');
                    $(this).toggleClass('ajax_loader');
               })
               .ajaxStop(function() {
                    $(this).toggleClass('ajax_loader');
               });

               var val = $(this).attr('href');
               
               var val2 = $(this).attr('alt');
               $.post('../usunKomentarz/' + val, {'idKomentarza':val}, function(e) { 
                   setInterval(function(){
                    window.location = val2;
                    });
                });
                return false;
            }else{
            return false;
            }
        });
        
        $('[name="klasa_select"]').live('change', function(){
        var klasa = $(this).val();
        var woj = $('[name="wojewodztwo_select"]').val();
        //adres url do pliku PHP z kodem generującym dane w formacie JSON
        var url = '../dajListeGrup/'+woj+'/'+klasa;
        alert('woj: '+woj+', klasa: '+klasa+', url: '+url);
 
        //jeśli istnieje już select-lista o id: podkategorie, to usuń ją
        if($('#podkategorie').length>0)
            $('#podkategorie').remove();
 
        //metoda pobierająca dane JSON z podanego adresu w zmiennej url
        
        
        $.getJSON(
            url,
            function(data){
                //tworzymy nową, pustą listę select o id: podkategorie i ją dołączamy do formularza
                //select = '<select id="podkategorie"></select>';
                //$('.form_dodawania_uzytk_fieldset').append(select);
                var lista = $('[name="grupa_select"]');
 
                //ukrywamy listę. Potrzebne to będzie do uzyskania animacji pojawienia się elementu na stronie
                //lista.hide();
                $('[name="grupa_select"] option').remove();
                //generowanie kolejnych opcji listy
                $.each(data, function(key, val){
                    var option = $('<option/>');
                    alert(key+' = '+val);
                    option.attr('value', key)
                          .html(val)
                          .appendTo(lista);
                });
 
                //animacja pojawienia się elementu na stronie
                lista.show('scale', 500);
            },
            'json'
        );
    })

	
    
    });