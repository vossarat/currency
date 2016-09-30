<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <title>
            <?=$pagetitle?$pagetitle:"Курс обмена валют"?>
        </title>
        <link rel="stylesheet" type="text/css" href="/css/default.css" />
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">-->
        </script>
        <script src="../js/jquery.min.js"></script>
    </head>

    <body>
        <div id="band">
            <div id="top">
                <div id="logo">
                </div>

                <div id="header">
                    <?=$header?>
                </div>
            </div>
        </div>

        <div id = "topmenu">
            <?=$topmenu?>
            <div id = "auth">
                <?=$auth?>
            </div>
        </div>

        <div id="page">

            <div id="content">
                <?=$content?>
            </div>

            <div id="footer">
                <?=$footer?>
            </div>

        </div><!--end div page-->
    </body>
</html>