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
    <div id="page" class="page" data-message="<mp:Message />">

        <div id="header">
            <div id="title">
                <img src="<?= base_url("/content/images/YFSC_emblem_header.png") ?>" alt="YFSC" />
            </div>

            <div id="logindisplay">
				<!--<sec:authorize access="isAuthenticated()">-->
					<text>Welcome <b><sec:authentication property="principal.username" /></b>!
					[ <a href="<?= site_url("/membership/index") ?>">Member Area</a> | <a href="<?= site_url("/account/logOff") ?>">Log Off</a> ]</text>
				<!--</sec:authorize>
				<sec:authorize access="!isAuthenticated()">
				    [ <a href="<?= site_url("/account/logOn") ?>">Log On</a> ] | [ <a href="<?= site_url("/account/create") ?>">Create Account</a> ]
				</sec:authorize>-->
            </div>

            <div id="menucontainer">

                <ul id="menu">
                    <li><a href="<?= site_url("/home/index") ?>">Home</a></li>
                    <li><a href="<?= site_url("/home/program") ?>">Program</a></li>
                    <li><a href="<?= site_url("/home/calendar") ?>">Calendar</a></li>
					<li><a href="<?= site_url("/home/clubCoaches") ?>">Coaches</a></li>
                    <li><a href="<?= site_url("/home/membership") ?>">Membership</a></li>
                    <li><a href="<?= site_url("/home/brochure") ?>">Brochure</a></li>
                    <li><a href="<?= site_url("/home/byLaws") ?>">ByLaws</a></li>
                    <li><a href="<?= site_url("/home/contactInformation") ?>">Contact</a></li>
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