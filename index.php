<?php

	class PodloveWebPlayer {

		public $liburl;

		function __construct() {
			$liburl = '';
			$this->assets = array();
			$this->options = array(
					'pluginPath' => "/bin/",
					'alwaysShowHours' => true,
					'alwaysShowControls' => true,
					'timecontrolsVisible' => true,
					'summaryVisible' => false,
					'hidetimebutton' => false,
					'hidedownloadbutton' => false,
					'hidesharebutton' => false,
					'sharewholeepisode' => false,
					'loop' => false,
					'permalink' => '',
					'title' => '',
					'subtitle' => '',
					'summary' => '',
					'poster' => '',
					'showPoster' => '',
					'show' => '',
					'license' => '',
					'downloads' => '',
					'duration' => '00:00:00',
					'chapterVisible' => false,
					'features' => array(
							'current', 'progress', 'duration', 'tracks', 'fullscreen', 'volume'
						),
					'chapters' => array()
				);
		}

		public static function getPlayer( $playerURL ) {
			return "<iframe src='" . $playerURL . "&podlove-web-player' style='width: 100%; min-height: 240px; overflow: hidden;'></iframe>";
		}

		public function printPlayer() {
			
		}

		public function printPlayerWithPage() {
			?>
			<!doctype html>
			<html>
			<head>
			    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
			    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
			    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			    <title><?php echo $this->options['title']; ?> | <?php echo $this->options['show']['title']; ?></title>
			    <meta name='robots' content='noindex,follow' />
			    <link href="<?php echo $this->liburl; ?>lib/podlove-web-player/dist/css/podlove-web-player.css" rel="stylesheet" media="screen" type="text/css" />
			    <link href="<?php echo $this->liburl; ?>lib/podlove-web-player/dist/css/vendor/progress-polyfill.css" rel="stylesheet" media="screen" type="text/css" />
			</head>
			<body>
				<audio controls="controls">
				        <?php
				        foreach ($this->assets as $asset) {
				        	echo  "<source src='".$asset['url']."' type='".$asset['mimetype']."'/>\n";
				        }
				        ?>
				        <object type="application/x-shockwave-flash" data="flashmediaelement.swf">
				            <param name="movie" value="flashmediaelement.swf"/>
				            <param name="flashvars" value="controls=true&amp;file=http://meta.metaebene.me/media/cre/cre206-das-ohr.mp3"/>
				        </object>
			    </audio>
			    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
			    <script src="<?php echo $this->liburl; ?>lib/podlove-web-player/dist/js/vendor/html5shiv.js"></script>
			    <script src="<?php echo $this->liburl; ?>lib/podlove-web-player/dist/js/vendor/jquery.min.js"></script>
			    <script src="<?php echo $this->liburl; ?>lib/podlove-web-player/dist/js/vendor/progress-polyfill.min.js"></script>
			    <script src="<?php echo $this->liburl; ?>lib/podlove-web-player/dist/js/podlove-web-player.js"></script>
			    <script>
			        $('audio').podlovewebplayer(<?php echo json_encode($this->options); ?>);
			    </script>
			</body>
			</html>
			<?php
		}

	}

?>