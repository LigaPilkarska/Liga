<?php 
if(isset($_POST['sitelang']) && $_POST['sitelang']!='') 
    setcookie ('sitelang', $_POST['sitelang'], (time()+3600*24*7), "/");
echo '<'.'?xml version="1.0" encoding="utf-8"?'.'>'."\n"; ?>
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
    
    <link rel="stylesheet" href='<?php echo base_url(); ?>szablony/loader/css/queryLoader.css' type="text/css" />
    <script type='text/javascript' src='<?php echo base_url(); ?>szablony/loader/js/queryLoader.js'></script>

    <script src="<?php echo base_url(); ?>js/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>forms_view/assets/js/jquery.formalize.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>szablony/js/wykres.js" type="text/javascript" ></script>
    <script type="text/javascript">
    // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
     function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        
        var x = $('.daneWykresDruzyna');
        var y = $('.daneWykresPunkty');
        $(x).each( function(i) {
            data.addRow([$(x[i]).text(), parseInt($(y[i]).text())]);
        });
        
        // Set chart options
        var options = {'title':'Rozkład punktów w lidze',
                       'width':600,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    
    <script src="<?php echo base_url(); ?>szablony/js/glowny.js" type="text/javascript">
       
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
                            <td><?php echo anchor('/', lang('main')) ?></td>
                            <td><?php echo anchor('#', lang('search')) ?></td>
                            <td><?php echo anchor('liga/index', lang('leagues')) ?></td>
                            <td><?php echo anchor('#', lang('contact')) ?></td>
                            <td><img title="pl" class="sitelang" style="width: 40px; height: 30px" src="<?php echo base_url(); ?>szablony/default/images/pl.png" /></td>
                                <td><img title="eng" class="sitelang" style="width: 50px; height: 25px" src="<?php echo base_url(); ?>szablony/default/images/usa.png" /></td>
                        </tr>
                    </table> 
                </div>
                <div id="NAGLOWEK_PRAWO_MIDDLE">
                    
                </div>
                <div id="NAGLOWEK_PRAWO_BOTTOM">
                    <ul>
                        <li><?php echo anchor('/', lang('main')) ?></li>
                        <li><a href="#"><?php echo lang('about')?></a></li>
                        <li><?php echo anchor('liga/index', lang('leagues')) ?></li>
                        <li><a href="#"><?php echo lang('ad')?></a></li>
                        <li><a href="#"><?php lang('contact')?></a></li>
                    </ul>
                </div>
            </div>
            
        </div>