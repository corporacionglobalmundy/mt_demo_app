<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <title>Magictelecom Demo</title>
        <link href="template/css/bootstrap.min.css" rel="stylesheet" />
        <link href="template/css/style.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="icon-menu"></i> Menu
                    </button>
                    <a class="navbar-brand" href="/">Demo Magictelecom</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class=<?php if($module=='search_dids'){ print '"active"';}?> ><a href="/?module=search_dids">Search Dids</a></li>
                        <li class=<?php if($module=='orders'){ print '"active"';}?> ><a href="/?module=orders">Orders</a></li>
                        <li class=<?php if($module=='account'){ print '"active"';}?> ><a href="/?module=account">Account</a></li>
                    </ul>
                </div>

            </div>

        </nav>
        <div class="page-header">
            <div class="container">
                <div id="info">
                    <h1>API Demo</h1>
                    <p class="lead">
                        Magic Telecom provides global inbound SIP trunking services with DIDs in 100+ countries through fully-owned facilities with local licenses as well as partnerships with direct local operators.
                    </p>
                </div>
            </div>
        </div>
        <div class="container" >
            <div class="starter-template">