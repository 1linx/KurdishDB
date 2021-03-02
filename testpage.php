<?php/* Template Name: Test */?>
		<?php get_header(); ?>
		<div id="wrapper">
			<div id="topcontainer"></div>
			<div id="maincontainer" role="main">

<?php
			
				
				
if(get_meta_tags('http://'.$_POST['pagina'])){
        print '<font class="midden">Meta data from http://'.$_POST['pagina'].'</font>';
        $metadata = get_meta_tags('http://'.$_POST['pagina']);
        echo '<table width="100%">';
        print '<tr><td>Meta</td><td>Waarde</td></tr>';
        foreach($metadata as $naam => $waarde){
            echo '<tr><td valign="top">'.$naam.'</td><td>'.$waarde.'</td></tr>';
        }
        print '</table>';
    }else{
        print '
        <div class="red_h">Incorrect</div>
        ';
    }

?>


			</div>
		</div>
		<?php get_footer(); ?>