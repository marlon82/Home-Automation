<?php
$width = 100/5; /// dividing 100% space among 7 items. If data is coming form DB then use mysql_num_rows($resource) instead of static number "7"
$active = $_GET['page'] 
?>


<div data-role="footer" class="nav-glyphish-example" data-position="fixed" data-theme="c" data-tap-toggle="false">
	<div data-role="navbar" class="nav-glyphish-example">
		<ul>
			<li><a href="?page=dashboard" <?php if($active == 'dashboard') { ?> class="ui-btn-active ui-state-persist" <?php } ?> id="dashboard1" data-icon="custom" rel="external">Dashboard</a></li>
			<li><a href="?page=multimedia" <?php if($active == 'multimedia') { ?> class="ui-btn-active ui-state-persist" <?php } ?>  id="tv" data-icon="custom" rel="external">Multimedia</a></li>
			<?
			$sql = query( "SELECT value FROM config WHERE options='DreamBoxavail'");
			$config = fetch( $sql);
			if ($config['value'] == 'Yes'){
				?>
				<li><a href="?page=dreambox&id=start" <?php if($active == 'dreambox') { ?> class="ui-btn-active ui-state-persist" <?php } ?>  id="tv" data-icon="custom" rel="external">Dreambox</a></li>
				<?
			}
			?>
			
			<?
			//show rooms only if rooms available
			$sql = query( "SELECT id FROM rooms");
			$Rooms = fetch( $sql );	
			if( $Rooms['id'] ){
				?>
				<li><a href="?page=room&room=1" <?php if($active == 'room') { ?> class="ui-btn-active ui-state-persist" <?php } ?>  id="haus" data-icon="custom" rel="external">Räume</a></li>
				<?
			}
			?>
			
			<li><a href="?page=settings" <?php if($active == 'settings') { ?> class="ui-btn-active ui-state-persist" <?php } ?>  id="settings" data-icon="custom" rel="external">Einstellungen</a></li>
		</ul>
	</div><!-- /navbar -->
</div><!-- /footer -->