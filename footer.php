<?php
$active = $_GET['page'] 
?>

<!--
<div data-role="footer" data-id="Myfooter" data-position="fixed" data-theme="c" data-tap-toggle="false" class="nav-glyphish-example">
	<div data-role="navbar" class="nav-glyphish-example">
	-->
<div data-role="footer" data-id="foo1" data-position="fixed" data-theme="c" data-tap-toggle="false" >
	<div data-role="navbar"  class="nav-glyphish-example">
		<ul>
			<?
			$sql_footerconf = query( "SELECT * FROM configFooter ORDER by sortOrder ASC");
			while( $footerconf = fetch( $sql_footerconf ) ){
				if ($footerconf['codename'] == 'room'){ 
					$sql = query( "SELECT id FROM rooms");
					$Rooms = fetch( $sql );	
					$sql2 = query( "SELECT value FROM config WHERE options='StandardRoom'");
					$StandardRoom = fetch( $sql2 );	
					if( $Rooms['id'] ){
						$page = $footerconf['codename'] . "&room=" . $StandardRoom['value'];
					}else{
						$footerconf['visible'] == 'No';
					}
				}elseif ($footerconf['codename'] == 'dreambox'){
					$page =  $footerconf['codename'] . '&id=start'; 
				}else{
					$page =  $footerconf['codename']; 
				}
				if ($footerconf['visible'] == 'Yes'){
					?>
					<li><a href="?page=<? echo $page; ?>" <?php if($active == $footerconf['codename']) { ?> class="ui-btn-active ui-state-persist" <?php } ?> id="<? echo  $footerconf['icon'];?>" data-icon="custom" rel="external"><? echo  $footerconf['name'];?></a></li>
					<?
				}
				$page = '';
			}
			?>
		</ul>
	</div><!-- /navbar -->
</div><!-- /footer -->