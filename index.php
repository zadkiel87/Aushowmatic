<?php require_once(dirname(__FILE__) . '/conf/config.php'); ?>
<?php require_once(dirname(__FILE__) . '/core/dispatcher.php'); ?>
<?php $GLOBALS['start'] = microtime(true); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
		<title>Aushowmatic</title>
		<link rel="stylesheet" type="text/css" href="./assets/main.css" />
		<link rel="stylesheet" type="text/css" href="./assets/yt-buttons.min.css" />
        <link rel="stylesheet" type="text/css" media="only screen and (max-device-width:1080px)" href="assets/handheld.css" />
	</head>
	<body>

		<header>
			<h1>Aushowmatic</h1>
		</header>

        <div id="remote">
            <ul class="yt-button-group">
                <li><a href="?a=transmission_stop" class="yt-button" title="Stop all torrents">&#8718;</a></li>
                <li><a href="?a=transmission_start" class="yt-button" title="Start all torrents">&#9658;</a></li>
            </ul>
            <ul class="yt-button-group">
                <li><a href="?a=transmission_turtle_on" class="yt-button" title="Turtle ON">Turtle</a></li>
                <li><a href="?a=transmission_turtle_off" class="yt-button" title="Turtle OFF">&infin;</a></li>
            </ul>
            <ul class="yt-button-group">
                <li><a href="?a=transmission_list" class="yt-button" title="List torrents">&equiv;</a></li>
                <li><a href="?a=transmission_info" class="yt-button" title="Info">&iexcl;</a></li>
                <li><a href="<?php echo TRANSMISSION_WEB; ?>" target="_blank" class="yt-button" title="Transmission Web Interface">TWI</a></li>
            </ul>
        </div>

        <div id="main_container" class="auto">

            <nav>
                <ul class="yt-button-group left">
                    <li><a href="?a=done" class="yt-button <?php if(isset($_GET['a']) && $_GET['a'] == 'done') echo 'active'; ?>">See links already processed</a></li>
                    <li><a href="?a=shows" class="yt-button <?php if(isset($_GET['a']) && $_GET['a'] == 'shows') echo 'active'; ?>">See shows added</a></li>
                    <li><a id="add_show" href="#add_show" class="yt-button">Add a show</a></li>
                </ul>

                <ul class="yt-button-group right">
                    <li><a href="?a=preview" class="yt-button <?php if(isset($_GET['a']) && $_GET['a'] == 'preview') echo 'active'; ?>">See links to be processed</a></li>
                    <li><a href="?a=launch" class="yt-button primary <?php if(isset($_GET['a']) && $_GET['a'] == 'launch') echo 'active'; ?>">Launch downloading</a></li>
                </ul>
                <div class="clear"></div>

                <form id="form_add_show" method="post" action="?a=add_show">
                    <input id="name_of_show" name="name_of_show" type="text" placeholder="Show name..." />
                    <input id="sumbit_add_show" class="yt-button big" type="submit" value="Add" />
                </form>
            </nav>

            <pre id="response"><?php echo Dispatcher::dispatch(); ?></pre>

            <div id="bottom_links">
                <div class="left">
                    <a href="?a=update_date" class="yt-button">Update min. date</a>
                    <a href="?a=empty_done" class="yt-button danger">Empty processed links</a>
                </div>
                <?php if( SYSTEM_CMDS_ENABLED ): ?>
	                <div class="right">
	                    <ul class="yt-button-group">
	                        <li><a href="?a=status_xbmc" class="yt-button">XBMC Status</a></li>
	                        <li><a href="?a=start_xbmc" class="yt-button primary">Start XBMC</a></li>
	                    </ul>
	                    <a id="show_hidden_actions" href="#bottom_links" class="yt-button">&#9660;</a>

	                    <div id="hidden_actions">
	                        <a href="?a=kill_xbmc" class="yt-button danger big">Kill XBMC</a>
	                        <a href="?a=reboot" class="yt-button danger big">Reboot</a>
	                        <a href="?a=shutdown" class="yt-button danger big">Shutdown</a>
	                    </div>
	                </div>
                <?php endif; ?>
                <div class="clear"></div>
            </div>

        </div>

        <footer></footer>

        <div id="generated">Generated in <?php echo round(microtime(true) - $GLOBALS['start'], 4); ?>s</div>

        <script src="./assets/main.js"></script>

	</body>
</html>