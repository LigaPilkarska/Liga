<?php echo '<'.'?xml version="1.0" encoding="utf-8"?'.'>'."\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Description" content="<?php echo $description ?>" />
    <meta name="Keywords" content="<?php foreach ($keywords as $keyword) {echo $keyword.', ';} ?>" />
    <meta http-equiv="Content-Language" content="<?php echo $lang ?>" />
    <meta name="Author" content="Łukasz '14Luk14' Iżuk, Tadeusz 'elTadziko' Cekała" />
    <meta http-equiv="Creation-Date" content="Sun, 04 Mar 2012 15:42:18 GMT" />
    <meta name="Robots" content="all" />
    <link rel="Shortcut icon" href="<?php echo base_url(); ?>szablony/default/images/favicon.ico" />
    
    <link rel="stylesheet" href='<?php echo base_url(); ?>forms_view/assets/css/formalize.css' type="text/css" media="screen" /> 
    <link rel="stylesheet" href='<?php echo base_url(); ?>szablony/default/header_style.css' type="text/css" media="screen" />
    <link rel="stylesheet" href='<?php echo base_url(); ?>szablony/default/menu_style.css' type="text/css" media="screen" />
    <link rel="stylesheet" href='<?php echo base_url(); ?>szablony/default/info_style.css' type="text/css" media="screen" />
    <link rel="stylesheet" href='<?php echo base_url(); ?>szablony/default/body_style.css' type="text/css" media="screen" />
    <link rel="stylesheet" href='<?php echo base_url(); ?>szablony/default/footer_style.css' type="text/css" media="screen" />
    
    <script src="<?php echo base_url(); ?>js/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>forms_view/assets/js/jquery.formalize.js" type="text/javascript"></script>
    
    
    
    <script type="text/javascript">
       $.ajaxSetup({
            beforeSend:function(xhr) {
                xhr.overrideMimeType('text/html; charset=utf-8');
            }
            //contentType: "application/x-www-form-urlencoded; charset=iso-8859-2"
        });
    $(document).ready(function(){
        
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
    });
    </script>
    
    <title><?php echo $title ?></title>
</head>
<body>
    <div id="top">
	<div id="NAGLOWEK">
            <div id="NAGLOWEK_LOGO">
                <?php echo anchor('', '<img src="'.base_url().'szablony/default/images/logosek.png" alt="logo" />'); ?>
                
            </div>
            <div id="NAGLOWEK_KONTENER_PRAWO">
                <div id="NAGLOWEK_PRAWO_TOP">
                    <table>
                        <tr>
                            <td><?php echo anchor('/', 'Główna') ?></td>
                            <td><?php echo anchor('#', 'Szukaj') ?></td>
                            <td><?php echo anchor('liga/index', 'Ligi') ?></td>
                            <td><?php echo anchor('#', 'Kontakt') ?></td>
                        </tr>
                    </table> 
                </div>
                <div id="NAGLOWEK_PRAWO_MIDDLE">
                    
                </div>
                <div id="NAGLOWEK_PRAWO_BOTTOM">
                    <ul>
                        <li><?php echo anchor('/', 'Główna') ?></li>
                        <li><a href="#">O nas</a></li>
                        <li><?php echo anchor('liga/index', 'Ligi') ?></li>
                        <li><a href="#">Zareklamuj się</a></li>
                        <li><a href="#">Kontakt</a></li>
                    </ul>
                </div>
            </div>
            
        </div>