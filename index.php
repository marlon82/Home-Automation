<!DOCTYPE html> 
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Home Automation</title> 
	<link rel="stylesheet" href="./jquery/jquery.mobile-1.3.1.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
	<script src="./jquery/jquery.mobile-1.3.1.js"></script>
	<!-- andere skripte -->
	<script src="./skripte/time.js"></script>
	<script src="./skripte/jquery.ui.touch-punch.min.js"></script>

	<?php

/// calculating width of each navbar ///

$width = 100/7; /// dividing 100% space among 7 items. If data is coming form DB then use mysql_num_rows($resource) instead of static number "7"
?>
        <style>
           /**** Trying to style h1 and paragraph *******/
				.nav-glyphish-example .ui-btn .ui-btn-inner { padding-top: 40px !important; }
				.nav-glyphish-example .ui-btn .ui-icon { width: 30px!important; height: 30px!important; margin-left: -15px !important; box-shadow: none!important; -moz-box-shadow: none!important; -webkit-box-shadow: none!important; -webkit-border-radius: none !important; border-radius: none !important; }
				#dashboard1 .ui-icon { background:  url(glyphish-icons/81-dashboard.png) no-repeat }
				#haus .ui-icon { background:  url(glyphish-icons/53-house.png) 50% 50% no-repeat }
				#tv .ui-icon { background:  url(glyphish-icons/70-tv.png) 50% 50% no-repeat; }
				#zap .ui-icon { background:  url(glyphish-icons/64-zap.png) 50% 50% no-repeat}
				#coffee .ui-icon { background:  url(glyphish-icons/100-coffee.png) 50% 50% no-repeat;  background-size: 20px 24px; }
				#skull .ui-icon { background:  url(glyphish-icons/21-skull.png) 50% 50% no-repeat;  background-size: 22px 24px; }
				#watch .ui-icon { background:  url(glyphish-icons/78-stopwatch.png) 50% 50% no-repeat;  background-size: 22px 24px; }
				#music .ui-icon { background:  url(glyphish-icons/65-note.png) 50% 50% no-repeat;  background-size: 22px 24px; }
				#weather .ui-icon { background:  url(glyphish-icons/25-weather.png) 50% 50% no-repeat;  background-size: 22px 24px; }
				#raspberry .ui-icon { background:  url(glyphish-icons/raspberrypi.png) 50% 50% no-repeat;  background-size: 22px 24px; }
				#settings .ui-icon { background:  url(glyphish-icons/19-gear.png) 50% 50% no-repeat; }
				#group .ui-icon { background:  url(glyphish-icons/123-id-card.png) 50% 50% no-repeat; }
				#sensor .ui-icon { background:  url(glyphish-icons/16-line-chart.png) 50% 50% no-repeat; }
				#logviewer .ui-icon { background:  url(glyphish-icons/179-notepad.png) 50% 50% no-repeat; }
				#television .ui-icon { background:  url(glyphish-icons/45-movie-1.png) 50% 50% no-repeat; }

.mycss
{
font-weight:bold;color:#000000;border: 2px solid #b5a759;letter-spacing:0pt;word-spacing:0pt;font-size:24px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:2;
}

		
			.red {font-weight:bold;color:#cc0000;font-size:20px}


        </style>
</head> 

	
<body> 

<?php
include('config.php');
switch( $_GET['page'] )
	{
		case 'settings':
		include('settings.php');
		break;

		case 'multimedia':
		include('multimedia.php');
		break;
		
		case 'room':
		include('room.php');
		break;
		
		case 'dreambox':
		include('dreambox.php');
		break;
		
		case 'timer':
		include('timer.php');
		break;
		
		case 'raspberry':
		include('raspberry.php');
		break;
		
		case 'group':
		include('group.php');
		break;
		
		case 'sensoren':
		include('sensoren.php');
		break;
		
		case 'logviewer':
		include('logviewer.php');
		break;
		
		case 'television':
		include('television.php');
		break;
	
		default:
		include('dashboard.php');
		break;
	}
	
include("footer.php");
?>

</div><!-- /page one -->	


</body>
</html>