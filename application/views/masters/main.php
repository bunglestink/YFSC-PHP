<!DOCTYPE html>
<html>
<head>
	<title>Yale Figure Skating</title>
    <link href="<?= base_url("/content/Site.css") ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url("/content/Site-print.css") ?>" rel="stylesheet" type="text/css" media="print" />
    <link href="<?= base_url("/content/ui-lightness/jquery-ui-1.8.16.custom.css") ?>" rel="stylesheet" type="text/css" />
    <script src="<?= base_url("/js/jquery-1.4.4.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("/js/jquery-ui.min.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("/js/jquery.tmpl.js") ?>" type="text/javascript"></script>
    <script src="<?= base_url("/js/Util/alert.js") ?>" type="text/javascript"></script>
    <mp:AdditionalScripts />
    
    <script type="text/javascript">
        $(function () {
            $('.date').datepicker();
            $('input:submit, button').button()

            var message = $('#page').data('message');
            if (message) {
                UTIL.alert(message);
            }
        });
    </script>
</head>
<body>
    <div id="page" class="page" data-message="${message}">

        <div id="header">
            <div id="title">
                <img src="<?= base_url("/content/images/YFSC_emblem_header.png") ?>" alt="YFSC" />
            </div>

            <div id="logindisplay">
				<!--<sec:authorize access="isAuthenticated()">
					<text>Welcome <b><sec:authentication property="principal.username" /></b>!
					[ <a href="<?= base_url("/membership/index") ?>">Member Area</a> | <a href="<?= base_url("/account/logOff") ?>">Log Off</a> ]</text>
				</sec:authorize>
				<sec:authorize access="!isAuthenticated()">
				    [ <a href="<?= base_url("/account/logOn") ?>">Log On</a> ] | [ <a href="<?= base_url("/account/create.do") ?>">Create Account</a> ]
				</sec:authorize>-->
            </div>

            <div id="menucontainer">

                <ul id="menu">
                    <li><a href="<?= base_url("/home/index.do") ?>">Home</a></li>
                    <li><a href="<?= base_url("/home/program.do") ?>">Program</a></li>
                    <li><a href="<?= base_url("/home/calendar.do") ?>">Calendar</a></li>
					<li><a href="<?= base_url("/home/clubCoaches.do") ?>">Coaches</a></li>
                    <li><a href="<?= base_url("/home/membership.do") ?>">Membership</a></li>
                    <li><a href="<?= base_url("/home/brochure.do") ?>">Brochure</a></li>
                    <li><a href="<?= base_url("/home/byLaws.do") ?>">ByLaws</a></li>
                    <li><a href="<?= base_url("/home/contactInformation.do") ?>">Contact</a></li>
                </ul>

            </div>
        </div>

        <template:get name="RightBar">
                <div id="right-bar">
                        <h3>Yale Figure Skating Club</h3>
                        <img src="<?= base_url("/content/images/whale.jpg") ?>" alt="Whale" />
                        <em>Yale Figure Skating Club, Inc. is a tax-exempt nonprofit organization.</em>
                </div>
        </template:get>

        <div id="main">
            <mp:Content />
        </div>
        <div id="footer">
        </div>
    </div>
</body>
</html>