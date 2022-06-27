<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>

	<meta property="og:site_name" content="KIDSALUD" />

	<title><?= getNomApe($d) ?></title>
	<meta name="description" content="<?= $d['datosUsuario']['puesto'] ?>" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="generator" content="http://kidsalud.com/<?= $d['datosUsuario']['slug'] ?>/" />
	<meta http-equiv="pragma" content="cache" />
	<meta property="og:title" content="<?= getNomApe($d) ?>" />
	<meta property="og:description" content="<?= getNomApe($d) ?> - <?= $d['datosUsuario']['puesto'] ?> | contacto: <?= getTelefonoPrincipal($d)['prefijo'] ?> <?= getTelefonoPrincipal($d)['numero'] ?> | email: <?= getCorreoPrincipal($d)['url'] ?>">
	<meta property="og:url" content="<?= base_url($d['datosUsuario']['slug']) ?>" />
	<meta property="og:image" content="<?= base_url($d['datosUsuario']['url_foto_de_perfil']) ?>" />
	<meta property="og:image:width" content="300" />
	<meta property="og:image:height" content="300" />
	<meta property="og:image:type" content="image/<?= getExt($d) ?>" />
	<link rel="shortcut icon" href="<?= base_url($d['datosUsuario']['url_foto_de_perfil']) ?>" type="image/<?= getExt($d) ?>" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="apple-touch-icon" href="<?= base_url($d['datosUsuario']['url_foto_de_perfil']) ?>" />
	<link rel="apple-touch-startup-image" href="<?= base_url($d['datosUsuario']['url_foto_de_perfil']) ?>" />
	<link rel="image_src" href="<?= base_url($d['datosUsuario']['url_foto_de_perfil']) ?>" />
	<meta name="mobile-web-app-capable" content="yes" />
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,300&amp;lang=es" rel="stylesheet" type="text/css" />
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			font-family: 'Open Sans', sans-serif;
			font-size: 14px;
			line-height: 15px;
			background: #ffffff;
			color: #000000;
			-webkit-text-size-adjust: 100%;
		}

		#cardmain {
			width: 100%;
			/*
	max-width:1400px; margin:0 auto; background:rgba(0,0,0,0.05);
	-webkit-box-shadow: 4px 7px 56px -17px rgba(0,0,0,0.92);-moz-box-shadow: 4px 7px 56px -17px rgba(0,0,0,0.92);box-shadow: 4px 7px 56px -17px rgba(0,0,0,0.22);
	*/
		}

		#cardmain-inside {
			width: 100%;
		}

		#cardtopbar {
			width: 100%;
			max-width: 1400px;
			margin: 0 auto;
		}

		#cardtopbar-inside {
			padding: 5px 7px 5px 0px;
		}

		#logo {
			max-height: 65px;
			max-width: 237px;
		}

		#photocontainer {
			position: relative;
			z-index: 3000;
			margin-top: -100px;
		}

		#photobox {
			-webkit-transition: width 0.1s ease-in-out, height 0.1s ease-in-out;
			transition: width 0.1s ease-in-out, height 0.1s ease-in-out;
			-webkit-box-shadow: 4px 7px 56px -17px rgba(0, 0, 0, 0.92);
			-moz-box-shadow: 4px 7px 56px -17px rgba(0, 0, 0, 0.92);
			box-shadow: 4px 7px 56px -17px rgba(0, 0, 0, 0.92);
		}

		#photoperson {
			opacity: 0.15;
			margin: 0 auto;
			position: absolute;
		}

		#cardbase {
			width: 100%;
			max-width: 1400px;
			margin: 0 auto;
		}

		#cardmaincontent-td {
			background: rgba(0, 0, 0, 0.05);
		}

		#cardmaincontent {
			padding: 20px 10px;
			border-radius: 0 0 5px 5px;
		}

		#cardextracontent-td {}

		#cardextracontent-inside {
			font-size: 15px;
			line-height: 16px;
		}

		.cardextracontenttitle {
			padding: 15px 0px 15px 0px;
			color: #999;
			font-size: 32px;
			font-weight: 300;
			text-align: center;
		}

		.cardextracontentblock {
			padding: 10px 0px 20px 0px;
		}

		#cardextracontent-inside {
			padding-top: 0;
		}

		#cardsidebar {
			background: #444;
			vertical-align: top;
			width: 275px;
		}

		.sidebartitle {
			text-transform: uppercase;
			font-size: 12px;
			padding: 25px 0 10px 10px;
		}

		.sidebaroptions {}

		.sidebaroptions a {
			text-decoration: none;
			display: block;
			font-size: 15px;
			padding: 5px 20px;
		}

		.sidebaroptions i {
			padding-right: 10px;
			font-size: 14px;
		}

		#pagebtnclose {
			text-align: right;
			padding: 0px 10px;
			margin-top: -20px;
			position: relative;
			z-index: 9999;
		}

		#pagebtnclose a {
			font-size: 12px;
			text-decoration: none;
			background: #ffffff;
			padding: 10px 15px;
			color: #444444;
			border-radius: 3px 3px 0 0;
		}

		#pagebtnclose a i {
			font-size: 25px;
			vertical-align: middle;
		}

		.cardpagetitle {
			text-transform: uppercase;
			font-weight: 300;
			padding-top: 45px;
			padding-bottom: 15px;
			text-align: center;
			border-bottom: 1px solid <?= getColorApariencia($d) ?>;
		}

		.cardpagetitle i {
			padding-bottom: 0px;
			color: <?= getColorApariencia($d) ?>;
		}

		#floatbox {
			position: absolute;
			z-index: 4000;
			right: 0;
			background: rgba(0, 0, 0, 0.5);
			border-radius: 5px 0px 0px 5px;
		}

		.floatbuttons {
			width: 100%;
		}

		.floatbuttons td {
			width: 20%;
			text-align: center;
			vertical-align: top;
		}

		.floatbuttons a {
			text-decoration: none;
			color: #fff;
			opacity: 0.9;
		}

		.floatbuttons i {
			font-size: 250%;
		}

		.floatbuttons span {
			display: block;
			opacity: 0.8;
			padding-top: 4px;
			font-size: 11px;
			line-height: 125%;
		}

		.floatbuttons a:hover {
			opacity: 1;
		}

		#floatleftbox {
			top: 25px;
			left: 0;
			z-index: 5000;
			position: absolute;
		}

		#floatleftbox i {
			color: #fff;
			font-size: 17px;
			background: #9ec41c;
			padding: 9px 12px 9px 12px;
			border-radius: 0 3px 3px 0;
		}

		#cardfooterbar {
			background: <?= getColorApariencia($d) ?>;
			position: fixed;
			z-index: 1000;
			width: 100%;
			bottom: 0;
			-webkit-box-shadow: 2px 2px 20px 1px rgba(0, 0, 0, 0.30);
			-moz-box-shadow: 2px 2px 20px 1px rgba(0, 0, 0, 0.30);
			box-shadow: 2px 2px 20px 1px rgba(0, 0, 0, 0.30);
		}

		#cardfooterbar-inside {
			width: 100%;
			max-width: 600px;
			margin: 0 auto;
			padding: 6px 0 5px 0;
		}

		.footerbuttons {
			width: 100%;
		}

		.footerbuttons td {
			width: 20%;
			text-align: center;
			vertical-align: top;
		}

		.footerbuttons a {
			text-decoration: none;
			color: #fff;
		}

		.footerbuttons i {
			font-size: 230%;
		}

		.footerbuttons span {
			display: block;
			padding-top: 4px;
			font-size: 11px;
			line-height: 125%;
		}

		.footerbuttons a:hover {
			opacity: 1;
		}

		#infobutton {
			color: #999;
			font-size: 110%;
		}

		#infobutton-content {
			text-align: left;
			font-size: 11px;
			line-height: 13px;
			color: #999;
		}

		.iconButtonPlain,
		.iconButtonPlain i,
		.iconButtonPlain span {
			background: transparent !important;
			color: #999999 !important;
			border: 0 !important;
			min-width: 16px !important;
		}

		.iconButtonPlain i {
			text-align: center;
			display: block;
			padding: 8px;
			font-size: 180%;
			border-radius: 4px 4px 0 0px;
			opacity: 0.9;
		}

		.iconButtonPlain span {
			display: none !important;
		}

		.blockicon {
			font-size: 150%;
		}

		.homescreenall {
			border: 1px solid #ddd;
			border-radius: 3px;
			padding: 30px 30px 40px 30px;
			margin-bottom: 20px;
		}

		.modal {
			display: none;
			position: fixed;
			padding-top: 5px;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgb(0, 0, 0);
			background-color: rgba(0, 0, 0, 0.5);
			z-index: 19999;
			-webkit-box-shadow: 0px 0px 0px 9999px rgba(0, 0, 0, 0.5);
			box-shadow: 0px 0px 0px 9999px rgba(0, 0, 0, 0.5);
		}

		.modal-content {
			background: url("//d3cwdr4mx7w8ca.cloudfront.net/static/mobile/assets/loading.gif") center center no-repeat rgb(255, 255, 255);
			margin: auto;
			padding: 5px 10px;
			border: 1px solid #888;
			width: 90%;
		}

		.modal-loading {
			position: absolute;
			left: 50%;
			top: 50%;
		}

		.modal-content a {
			color: #000;
		}

		.modal-content iframe {
			width: 100%;
			/* Full width */
			height: 100%;
			/* Full height */
			min-height: 500px;
		}


		.details-name {
			font-size: 31px;
			font-weight: 400;
			line-height: 33px;
			letter-spacing: -0.5px;
		}

		.details-name span {
			font-weight: 400;
		}

		.details-level1,
		.details-level2,
		.details-level3 {
			font-size: 17px;
			line-height: 20px;
		}

		.blockicon {
			border-radius: 3px;
			background: rgba(255, 255, 255, 0.1);
			padding: 10px 10px;
			margin-right: 4px;
			text-align: center;
		}

		.details-title {
			display: inline-block;
			padding: 0;
			font-size: 90%;
			text-transform: uppercase;
		}

		.details-title i {
			font-size: 150%;
			margin-right: 5px;
			width: 20px;
			text-align: center;
			padding: 0px 6px 0px 0px;
			vertical-align: middle;
			border-right: 1px solid rgba(0, 0, 0, 0.15);
			color: rgba(0, 0, 0, 0.7);
			border-radius: 5%;
		}

		.details-text {
			display: block;
			padding: 10px 0px 8px 40px;
			font-size: 120%;
			line-height: 125%;
		}

		.details-text-noicon {
			display: block;
			padding: 10px 0px 8px 0px;
			font-size: 120%;
			line-height: 125%;
		}

		.details-text label,
		.details-text-noicon label {
			color: <?= getColorApariencia($d) ?>;
		}

		a[href^=tel] {
			color: inherit;
			text-decoration: none;
		}

		.bigbuttons {
			width: 100%;
		}

		.bigbuttons td {
			width: 25%;
			text-align: center;
			vertical-align: top;
		}

		.bigbuttons a {
			text-decoration: none;
			color: #fffeea;
		}

		.bigbuttons span {
			display: block;
			padding-top: 4px;
			font-size: 90%;
			line-height: 125%;
		}

		.bigbuttons a:hover {
			opacity: 1;
		}

		.bigbuttons i {
			border-radius: 50%;
			color: #fff;
		}

		.subbigbuttons {}

		.subbigbuttons td {
			text-align: center;
			vertical-align: top;
			padding: 5px 6px 5px 0px;
		}

		.subbigbuttons a {
			text-decoration: none;
			background: rgba(255, 255, 255, 0.07);
			color: #fff;
			opacity: 1;
			display: block;
			background: <?= getColorApariencia($d) ?>;
			padding: 8px 9px;
			border-radius: 3px;
			min-width: 70px;
		}

		.subbigbuttons i {
			font-size: 180%;
		}

		.subbigbuttons span {
			display: block;
			padding-top: 4px;
			font-size: 90%;
			line-height: 125%;
		}

		.subbigbuttons a:hover {
			opacity: 1;
			background: #3B333B;
			color: #fff;
		}

		.subbigbuttons a.selected {
			opacity: 1;
			background: transparent;
			border: 1px solid #3B333B;
			color: #3B333B;
		}


		#menumobile {
			cursor: hand;
			cursor: pointer;
			text-align: center;
			padding: 7px 7px;
			border-radius: 3px;
			text-transform: uppercase;
			font-size: 12px;
		}

		.menumobile-list {
			display: none;
			position: absolute;
			z-index: 10000;
			list-style-type: none;
			-moz-border-radius: 3px 0 3px 3px;
			border-radius: 3px 0 3px 3px;
			-webkit-border-radius: 3px 0 3px 3px;
			padding: 0;
			margin: 0;
			margin-left: -89px;
			margin-top: 1px;
			line-height: 14px;
			background: #fcfcfc;
			-webkit-box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.45);
			-moz-box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.45);
			box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.45);
		}

		.menumobile-list li {
			z-index: 5000 !important;
			padding: 0;
		}

		.menumobile-list li a,
		.menumobile-list li span {
			text-decoration: none;

			color: #fff;
			background: <?= getColorApariencia($d) ?>;

			text-align: left;
			-moz-border-radius: 0px;
			border-radius: 0px;
			-webkit-border-radius: 0px;

			border: none;
			text-transform: none;
			border-bottom: 1px solid rgba(0, 0, 0, 0.09);
			font-size: 13px;
			font-weight: 400;
			margin: 0;
			padding: 12px 15px;
			width: 100px;

			display: block;
			z-index: 5000 !important;
		}

		.menumobile-list li:hover>a {
			color: #fffeea;
			background: #0e6171;
		}

		.menumobile-list li:last-child a {
			border: none;
		}

		.col-full,
		.col-set-full .grid-col,
		.grid-col {
			width: 100%
		}

		.divide-bottom {
			border-bottom: 1px solid #ccc;
			padding-bottom: 1.5em;
			margin-bottom: 1.5em
		}

		.island :last-child,
		li.grid-col {
			margin-bottom: 0
		}

		.island {
			padding: 1.5em;
			background-color: #ececec
		}

		.grid-wrap {
			margin-left: -3em;
			overflow: hidden;
			clear: both
		}

		.grid-col {
			float: left;
			padding-left: 3em;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box
		}

		.large-gutter {
			margin-left: -6em
		}

		.large-gutter .grid-col {
			padding-left: 6em
		}

		.half-gutter {
			margin-left: -1.5em
		}

		.half-gutter .grid-col {
			padding-left: 1.5em
		}

		.short-gutter {
			margin-left: -.8em
		}

		.short-gutter .grid-col {
			padding-left: .8em
		}

		.no-gutter {
			margin-left: 0
		}

		.no-gutter .grid-col {
			padding-left: 0
		}

		.reset-gutter {
			margin-left: -3em
		}

		.reset-gutter .grid-col {
			padding-left: 3em
		}

		ol.grid-wrap,
		ul.grid-wrap {
			padding-left: 0;
			list-style: none
		}

		li.grid-col {
			margin-left: 0
		}

		.col-one-half,
		.col-set-one-half .grid-col {
			width: 50%
		}

		.col-one-third,
		.col-set-one-third .grid-col {
			width: 33.333%
		}

		.col-one-quarter,
		.col-set-one-quarter .grid-col {
			width: 25%
		}

		.col-two-thirds {
			width: 66.666%
		}

		.col-three-quarters {
			width: 75%
		}

		@media only screen and (min-width:30em) {

			.bp1-col-full,
			.bp1-col-set-full .grid-col {
				width: 100%
			}

			.bp1-col-one-half,
			.bp1-col-set-one-half .grid-col {
				width: 50%
			}

			.bp1-col-one-third,
			.bp1-col-set-one-third .grid-col {
				width: 33.333%
			}

			.bp1-col-one-quarter,
			.bp1-col-set-one-quarter .grid-col {
				width: 25%
			}

			.bp1-col-two-thirds {
				width: 66.666%
			}

			.bp1-col-three-quarters {
				width: 75%
			}
		}

		@media only screen and (min-width:48em) {

			.bp2-col-full,
			.bp2-col-set-full .grid-col {
				width: 100%
			}

			.bp2-col-one-half,
			.bp2-col-set-one-half .grid-col {
				width: 50%
			}

			.bp2-col-one-third,
			.bp2-col-set-one-third .grid-col {
				width: 33.333%
			}

			.bp2-col-one-quarter,
			.bp2-col-set-one-quarter .grid-col {
				width: 25%
			}

			.bp2-col-two-thirds {
				width: 66.666%
			}

			.bp2-col-three-quarters {
				width: 75%
			}
		}

		@media only screen and (min-width:60em) {

			.bp3-col-full,
			.bp3-col-set-full .grid-col {
				width: 100%
			}

			.bp3-col-one-half,
			.bp3-col-set-one-half .grid-col {
				width: 50%
			}

			.bp3-col-one-third,
			.bp3-col-set-one-third .grid-col {
				width: 33.333%
			}

			.bp3-col-one-quarter,
			.bp3-col-set-one-quarter .grid-col {
				width: 25%
			}

			.bp3-col-two-thirds {
				width: 66.666%
			}

			.bp3-col-three-quarters {
				width: 75%
			}
		}


		@media all and (min-width: 10px) {
			#menubutton {
				display: none;
			}

			#photo-td1 {
				width: 100%;
			}

			#photo-td2 {
				width: 0%;
			}

			#topbar-td1 {
				width: 50%;
				text-align: left;
				padding-left: 15px;
			}

			#topbar-td2 {
				width: 50%;
			}

			#cardmaincontent-inside {
				padding-right: 0px;
			}

			#fullimage {
				min-height: 178px;
			}

			#cardbase {
				margin-top: -45px;
			}

			.floatbuttons i {
				font-size: 159%;
			}

			.floatbuttons span {
				display: none;
			}

			.floatbuttons td {
				padding: 14px 5px;
			}

			#floatbox {
				width: 55px;
				/*margin-top:15px;*/
				margin-top: 0;
				padding: 14px 0;
				border-radius: 0;
			}

			.footerbuttons i {
				font-size: 160%;
			}

			.footerbuttons span {
				display: none;
			}

			.footerbuttons td {
				padding: 7px 5px;
			}

			#photobox {
				width: 145px;
				height: 145px;
			}

			#photoperson {
				width: 95px;
				height: 95px;
				top: 26px;
				margin-left: 26px;
			}

			#cardmaincontent-personaldata {
				padding-top: 43px;
				padding-bottom: 10px;
			}

			#cardmaincontent-inside {
				padding-bottom: 30px;
			}

			#cardmaincontent-td {
				width: 100%;
				display: block;
			}

			#cardextracontent-td {
				width: 100%;
				display: block;
			}

			#cardextracontent {
				padding: 15px 15px 0px 15px;
			}

			#poweredfooter {
				padding: 40px 7px 60px 7px;
				color: #444;
			}

			#poweredbybox {
				margin: 0;
				padding: 0;
			}

			.cardpagetitle {
				font-size: 22px;
				line-height: 24px;
			}

			.cardpagetitle i {
				font-size: 25px;
			}

			.cardpagetitle {
				margin: 0 20px;
			}

			.cardpagecontent {
				padding: 25px 10px 10px 10px;
			}

			.bigbuttons {
				max-width: 270px;
				margin: 0 auto;
			}

			.bigbuttons td {
				padding: 11px 0px;
			}

			.bigbuttons i {
				font-size: 27px;
				padding: 14px 14px;
				width: 30px;
			}

			#photocontainer.small {
				margin-top: -60px;
			}

			#photocontainer.small #photobox {
				width: 80px !important;
				height: 80px !important;
			}

			#photocontainer.small #photoperson {
				width: 50px;
				height: 50px;
				top: 15px;
				margin-left: 15px;
			}

			#fullimage.small {
				min-height: 72px !important;
			}

			#cardbase.small {
				margin-top: -20px !important;
			}

			#cardbase.small #cardmaincontent-personaldata {
				padding-top: 13px !important;
				padding-bottom: 15px;
			}

			#floatbox.small {
				display: none;
			}

			#cardmaincontent-td.small #cardmaincontent {
				display: none;
			}

			#logo.small {
				max-height: 35px;
			}

		}

		@media all and (min-width: 480px) {}

		@media all and (min-width: 540px) {}

		@media all and (min-width: 768px) {
			#photo-td1 {
				width: 50%;
			}

			#photo-td2 {
				width: 50%;
			}

			#topbar-td1 {
				width: 50%;
				text-align: center;
				padding-left: 0px;
			}

			#topbar-td2 {
				width: 50%;
			}

			#cardmaincontent-inside {
				padding: 0;
			}

			#fullimage {
				min-height: 300px;
			}

			#cardbase {
				margin-top: -75px;
			}

			.floatbuttons span {
				display: block;
			}

			.floatbuttons i {
				font-size: 210%;
			}

			.floatbuttons td {
				padding: 13px 10px;
			}

			.floatbuttons {
				margin-top: 33px;
			}

			#floatbox {
				width: 115px;
				height: 300px;
				padding: 0px 0 0px 0;
				margin-top: 0px;
				border-radius: 0;
			}

			/*.footerbuttons span {display:block;}
        .footerbuttons i { font-size:230%; }
        .footerbuttons td { padding:13px 5px; }*/
			.footerbuttons td {
				padding: 0px 1px 0px 0px;
			}

			.footerbuttons a {
				background: rgba(0, 0, 0, 0.06);
				padding: 19px 0;
				display: block;
			}

			.footerbuttons i {
				font-size: 220%;
				vertical-align: middle;
			}

			.footerbuttons span {
				display: none;
				/*display:-moz-inline-stack; display:inline-block;zoom:1; *display:inline; padding-left:10px; font-size:13px; font-weight:400;*/
			}

			#cardfooterbar-inside {
				padding: 0;
				max-width: 1400px;
			}

			.bigbuttons {
				max-width: 320px;
				margin: 0 auto;
			}

			.bigbuttons td {
				padding: 13px 5px;
			}

			.bigbuttons i {
				font-size: 33px;
				padding: 15px 15px;
				width: 35px;
			}

			#photobox {
				width: 175px;
				height: 175px;
			}

			#photoperson {
				width: 115px;
				height: 115px;
				top: 30px;
				margin-left: 30px;
			}

			#cardmaincontent-personaldata {
				padding-top: 75px;
				padding-bottom: 10px;
			}

			#cardmaincontent-inside {
				padding-bottom: 60px;
			}

			#cardmaincontent-td {
				width: 50%;
				vertical-align: top;
				display: table-cell;
			}

			#cardextracontent-td {
				width: 50%;
				vertical-align: top;
				display: table-cell;
			}

			#cardextracontent {
				padding: 40px 25px 0px 40px;
			}

			#poweredfooter {
				padding: 40px 40px 110px 60px;
				color: #444;
			}

			#poweredbybox {
				margin: 0;
				padding: 0;
			}

			.cardpagetitle {
				font-size: 30px;
				line-height: 33px;
			}

			.cardpagetitle i {
				font-size: 34px;
			}

			.cardpagetitle {
				margin: 0 80px;
			}

			.cardpagecontent {
				padding: 40px 50px 60px 50px;
			}


			#cardmain.noextracontent #photo-td1 {
				width: 100%;
			}

			#cardmain.noextracontent #photo-td2 {
				width: 0%;
			}

			#cardmain.noextracontent #topbar-td1 {
				width: 50%;
				text-align: left;
				padding-left: 15px;
			}

			#cardmain.noextracontent #topbar-td2 {
				width: 50%;
			}

			#cardmain.noextracontent #cardmaincontent-personaldata {
				padding-top: 73px;
				padding-bottom: 10px;
			}

			#cardmain.noextracontent #cardmaincontent-inside {
				padding-bottom: 30px;
				margin: 0 auto;
				max-width: 800px;
			}

			#cardmain.noextracontent #cardmaincontent-td {
				width: 100%;
				display: block;
				background: transparent;
			}

			#cardmain.noextracontent #cardextracontent-td {
				width: 100%;
				display: block;
			}


			#photocontainer.small {
				margin-top: -80px !important;
			}

			#photocontainer.small #photobox {
				width: 120px !important;
				height: 120px !important;
			}

			#photocontainer.small #photoperson {
				width: 70px;
				height: 70px;
				top: 26px;
				margin-left: 26px;
			}

			#photo-td1.small {
				width: 35% !important;
			}

			#photo-td2.small {
				width: 65% !important;
			}

			#topbar-td1.small {
				width: 35% !important;
				text-align: center !important;
			}

			#topbar-td2.small {
				width: 65% !important;
			}

			#fullimage.small {
				min-height: 172px !important;
			}

			#cardbase.small {
				margin-top: -40px !important;
			}

			#cardbase.small #cardmaincontent-personaldata {
				padding-top: 35px !important;
				padding-bottom: 15px !important;
			}

			#floatbox.small {
				display: none !important;
			}

			#cardmaincontent-td.small {
				width: 35% !important;
				display: table-cell !important;
				background: rgba(0, 0, 0, 0.05) !important;
			}

			#cardextracontent-td.small {
				width: 65% !important;
				display: table-cell !important;
			}

			#cardmaincontent-td.small #cardmaincontent {
				display: block !important;
			}

			#cardmaincontent-td.small #cardmaincontent-otherdata {
				display: none !important;
			}

			#cardmaincontent-td.small .details-level1,
			#cardmaincontent-td.small .details-level2,
			#cardmaincontent-td.small .details-level3 {
				font-size: 15px !important;
				line-height: 18px !important;
			}

			#logo.small {
				max-height: 65px;
			}

		}

		@media all and (min-width: 768px) and (max-height: 780px) {
			#fullimage {
				min-height: 178px;
			}

			#cardbase {
				margin-top: -45px;
			}

			#photobox {
				width: 145px;
				height: 145px;
			}

			#photoperson {
				width: 95px;
				height: 95px;
				top: 26px;
				margin-left: 26px;
			}

			#cardmaincontent-personaldata {
				padding-top: 43px;
				padding-bottom: 10px;
			}

			#cardmaincontent-inside {
				padding-bottom: 30px;
			}

			#cardextracontent {
				padding: 5px 25px 0px 40px;
			}

			.floatbuttons i {
				font-size: 165%;
			}

			.floatbuttons span {
				display: none;
			}

			.floatbuttons td {
				padding: 14px 5px;
			}

			.floatbuttons {
				margin-top: 13px;
			}

			#floatbox {
				width: 75px;
				height: 178px;
				margin-top: 0;
				padding: 0px 0;
				border-radius: 0;
			}

			#floatbox:hover {
				width: 225px;
			}

			#floatbox:hover .floatbuttons a {
				display: block;
				width: 50px;
				text-align: center;
				right: -158px;
				position: relative;
			}

			#floatbox:hover .floatbuttons span {
				display: block;
				position: absolute;
				right: 50px;
				width: 150px;
				margin-top: -24px;
				text-align: right;
			}

			.cardextracontenttitle {
				font-size: 28px;
			}

			#cardextracontent-inside {
				padding-top: 25px;
			}
		}

		@media all and (min-width: 950px) {
			.footerbuttons i {
				font-size: 220%;
			}

			.footerbuttons td {
				padding: 0px 1px 0px 0px;
			}

			.footerbuttons span {
				display: -moz-inline-stack;
				display: inline-block;
				zoom: 1;
				*display: inline;
				padding-left: 10px;
				font-size: 13px;
				font-weight: 400;
			}
		}

		@media all and (min-width: 1150px) {
			.footerbuttons span {
				font-size: 13px;
				font-weight: 400;
			}
		}

		@media all and (min-width: 1420px) {
			.footerbuttons a {
				padding: 22px 0;
			}

			.footerbuttons span {
				font-size: 15px;
				font-weight: 400;
			}
		}

		.details-textbig {
			font-size: 125%;
			line-height: 125%;
		}

		.details-sep {
			height: 1px;
			/*border-top:1px dashed rgba(0,0,0,0.15); margin:7px 0;*/
			margin: 8px 0;
			clear: both;
		}

		.cursorhand {
			cursor: hand;
			cursor: pointer;
		}

		a.link,
		a.linkbig {
			color: #fff;
			background: #3B333B;
			text-decoration: none;
			padding: 7px 14px 7px 11px;
			border-radius: 2px;
		}

		a.link:hover {
			opacity: 0.7;
		}

		a.linkinvers {
			color: #fffeea;
			text-decoration: none;
		}

		#infoqr {
			color: #888888;
		}

		.socialnetworkButton,
		.iconButton,
		.iconSmallButton,
		.iconButtonPlain {
			display: -moz-inline-stack;
			display: inline-block;
			zoom: 1;
			*display: inline;
			text-decoration: none;
			text-shadow: none;
			padding: 6px 4px 6px 0px;
			margin: 0px 4px;
			cursor: hand;
			cursor: pointer;
			color: rgba(0, 0, 0, 0.65);
			font-size: 85%;
		}

		.socialnetworkButton i {
			display: block;
			float: left;
			color: #fff;
			text-align: center;
			width: 46px;
			padding: 12px 0;
			border-radius: 4px;
			font-size: 160%;
		}

		.socialnetworkButton span {
			display: none;
			background: rgba(255, 255, 255, 0.40);
			padding: 14px 10px 15px 10px !important;
		}

		.socialnetworkButton:hover i {
			border-radius: 4px 0 0 4px;
		}

		.socialnetworkButton:hover span {
			display: block;
			float: right;
			margin: 0;
			padding: 10px 8px 11px 8px;
			border-radius: 0 4px 4px 0;
		}

		.iconButton i {
			min-width: 70px;
			text-align: center;
			display: block;
			color: #fff;
			padding: 8px;
			font-size: 160%;
			border-radius: 4px 4px 0 0px;
			border: 1px solid rgba(255, 254, 234, 0.45);
			border-bottom: 0;
			opacity: 0.9;
		}

		.iconButton span {
			min-width: 70px;
			font-size: 105%;
			text-align: center;
			display: block;
			margin: 0;
			padding: 11px 8px 12px 8px;
			border-radius: 0 0px 4px 4px;
			color: #444444;
			background: transparent;
			border: 1px solid rgba(68, 68, 68, 0.35);
			border-top: 0;
			background: rgba(255, 255, 255, 0.07);
		}

		.iconSmallButton i {
			display: block;
			float: left;
			color: #fff;
			text-align: center;
			width: 40px;
			padding: 8px 0;
			border-radius: 4px;
			font-size: 160%;
			border: 1px solid rgba(255, 255, 255, 0.10);
		}

		.iconSmallButton span {
			display: none;
			background: rgba(255, 255, 255, 0.40);
		}

		.iconSmallButton:hover i {
			border-radius: 4px 0 0 4px;
		}

		.iconSmallButton:hover span {
			display: block;
			float: right;
			margin: 0;
			padding: 11px 8px 12px 8px;
			border-radius: 0 4px 4px 0;
		}

		.inputfield {
			font-size: 150%;
			width: 100%;
			padding: 2px;
			border-radius: 3px;
			background: white;
			border: 1px solid rgba(0, 0, 0, 0.3);
		}

		.inputbutton {
			cursor: hand;
			cursor: pointer;
			font-weight: 700;
			padding: 9px 15px;
			font-size: 135%;
			border-radius: 3px;
			border: 0;
			color: #fff;
			background: #3B333B;
		}

		.details-text-noicon label {
			font-weight: 700;
			font-size: 110%;
		}

		.flexblock {
			padding: 0px 9px 0 0px;
			border-radius: 5px;
			display: -moz-inline-stack;
			display: block;
			zoom: 1;
			*display: inline;
			margin-right: 0px;
		}

		.textinfo {
			opacity: 0.70;
			font-size: 105%;
			line-height: 130%;
			letter-spacing: 0.5px;
		}
	</style>
	<link rel="stylesheet" href="//d3cwdr4mx7w8ca.cloudfront.net/libs/template/assets/vendor/font-awesome-pro-5.11.2/css/all.min.css">


	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="//d3cwdr4mx7w8ca.cloudfront.net/qrcardcdn/v1/js/min/jquery.form.min.js"></script>
	<script type="text/javascript">
		(function($) {
			$.fn.extend({
				trackOutBound: function(options, callback) {
					var defaults = {};
					var options = $.extend(defaults, options);
					return this.each(function() {
						$(this).click(callback);
					});
				}
			});
		})(jQuery);

		/* */
		var lastPage = "";

		function openPage(type) {
			if (lastPage != "") {
				closePage();
			}
			lastPage = type;

			if (type == "localization") {
				if (!mapinitialized) {
					// initializeMap();
				}
			}

			document.location.href = "#" + type;

			/*$("#toprightbuttons").hide();
			$("#toprightclose").show();*/
			$("#pagebtnclose").show();
			$("#logo").addClass("small");
			$("#floatbox").addClass("small"); //.hide();
			$("#photocontainer").addClass("small");
			$("#fullimage").addClass("small");
			$("#cardbase").addClass("small");
			$("#cardmaincontent-td").addClass("small");
			$("#cardmaincontent").addClass("small");
			$("#cardextracontent-td").addClass("small");
			$("#photo-td1").addClass("small");
			$("#photo-td2").addClass("small");
			$("#topbar-td1").addClass("small");
			$("#topbar-td2").addClass("small");

			$("#cardextracontent").hide();
			$("#card" + type).fadeIn();
		}

		function closePage() {

			document.location.href = "#";

			sendvcardemailerror.style.display = "none";

			var type = lastPage;
			lastPage = "";
			$("#pagebtnclose").hide();
			$("#logo").removeClass("small");
			$("#floatbox").removeClass("small"); //.hide();
			$("#photocontainer").removeClass("small");
			$("#fullimage").removeClass("small");
			$("#cardbase").removeClass("small");
			$("#cardmaincontent-td").removeClass("small");
			$("#cardmaincontent").removeClass("small");
			$("#cardextracontent-td").removeClass("small");
			$("#photo-td1").removeClass("small");
			$("#photo-td2").removeClass("small");
			$("#topbar-td1").removeClass("small");
			$("#topbar-td2").removeClass("small");

			$("#cardextracontent").show();
			$("#card" + type).hide();
		}
		/* */

		function openModalVideo(url) {
			videotitle = "Video";
			$("#modal").show();
			$("#modal-title").html(videotitle);
			$("#modal-div").html('<iframe src="' + url + '" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay; encrypted-media"></iframe>');
		}

		function openModal(type) {
			var _isVideo = false,
				videotitle, videoid;
			if (type == "videoandroid") {
				_isVideo = true;
				videotitle = "Android";
				videoid = "322871084";
			} else if (type == "videoipad") {
				_isVideo = true;
				videotitle = "iPhone";
				videoid = "322872024";
			} else if (type == "videoiphone") {
				_isVideo = true;
				videotitle = "iPad";
				videoid = "322871813";
			}
			if (_isVideo) {
				videotitle = videotitle + ": A&ntilde;adir a pantalla de inicio";
				$("#modal").show();
				$("#modal-title").html(videotitle);
				$("#modal-div").html('<iframe src="https://player.vimeo.com/video/' + videoid + '?&background=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay; encrypted-media"></iframe>');
			}
		}

		function closeModal() {
			$("#modal").hide();
			$("#modal-title").html('');
			$("#modal-div").html('');
		}

		var isMobileDevice = false;
		var userAgent = window.navigator.userAgent.toLowerCase();

		function getCurrentBrowser() {
			var sBrowser, sUsrAg = window.navigator.userAgent;
			if (sUsrAg.indexOf("Firefox") > -1) {
				sBrowser = "Firefox";
				// "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0"
			} else if (sUsrAg.indexOf("Opera") > -1 || sUsrAg.indexOf("OPR") > -1) {
				sBrowser = "Opera";
				//"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.106"
			} else if (sUsrAg.indexOf("Trident") > -1) {
				sBrowser = "IE";
				// "Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; Zoom 3.6.0; wbx 1.0.0; rv:11.0) like Gecko"
			} else if (sUsrAg.indexOf("Edge") > -1) {
				sBrowser = "Edge";
				// "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299"
			} else if (sUsrAg.indexOf("Chrome") > -1) {
				sBrowser = "Chrome";
				// "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/66.0.3359.181 Chrome/66.0.3359.181 Safari/537.36"
			} else if (sUsrAg.indexOf("Safari") > -1) {
				sBrowser = "Safari";
				// "Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1 980x1306"
			} else {
				sBrowser = "unknown";
			}
			return sBrowser;
		}

		function isIPad() {
			return /ipad/.test(userAgent);
		}

		function isIPhone() {
			return /iphone/.test(userAgent);
		}

		function isAndroid() {
			return /android/.test(userAgent);
		}

		function openHomeScreenBlock(type) {
			$(".homescreenall").hide();
			$(".homescreen" + type).fadeIn();

			$("#btn-android").removeClass("selected");
			$("#btn-ipad").removeClass("selected");
			$("#btn-iphone").removeClass("selected");
			$("#btn-" + type).addClass("selected");
		}
		$(document).ready(function() {
			var _currentbrowser = getCurrentBrowser();
			if (isAndroid() && _currentbrowser == "Chrome") {
				$(".homescreenandroid").show();
				$("#btn-android").addClass("selected");
			} else if (isIPad() && _currentbrowser == "Safari") {
				$(".homescreenipad").show();
				$("#btn-ipad").addClass("selected");
			} else if (isIPhone() && _currentbrowser == "Safari") {
				$(".homescreeniphone").show();
				$("#btn-iphone").addClass("selected");
			} else {
				$(".homescreenall").show();
			}

			var isInWebAppiOS = (window.navigator.standalone == true);
			var isInWebAppChrome = (window.matchMedia('(display-mode: standalone)').matches);

			// Open Page by URL Hash
			if (!isInWebAppiOS && !isInWebAppChrome) {
				var _hash = window.location.hash;
				_hash = _hash.replace('#', '');
				if (_hash.length > 2) {
					openPage(_hash);
				}
			}

			$('#menumobile').bind('mousedown tap', function() {
				$('#menumobile-list').toggle();
			});
			$(window).resize(function() {
				$('#menumobile-list').hide();
			});

			formajx.addEventListener('submit', function(e) {
				e.preventDefault();
				let datos = new FormData(this);
				const ENVIAR_EMAIL_API = new EnviarEmailAPI();
				btnEnviarEmail.disabled = true;
				loadingSpinnerImg.style.display = 'inline-block';

				ENVIAR_EMAIL_API.enviarVCard(datos).then(json => {
					console.log(json);

					loadingSpinnerImg.style.display = 'none';
					btnEnviarEmail.disabled = false;
					if (json.status === 400) {
						sendvcardemailerror.style.display = 'block';
						sendvcardemailerror.innerHTML = json.messages.emailDestino || json.messages.error;
						sendvcardemailerror.style.backgroundColor = '#c3140f';
					} else if (json.status === 200) {
						sendvcardemailerror.style.display = 'block';
						sendvcardemailerror.style.backgroundColor = 'seagreen';
						sendvcardemailerror.innerHTML = json.data;
						sendvcardemail.value = "";
					}
				});
			});

			frmSendCardWsp.addEventListener('submit', function(e) {
				e.preventDefault();

				let telefonoDestino = inputNumeroWsp.value.replace(/\s/g, '').replace('+', '');
				let msgWsp = `Accede a la tarjeta digital desde el siguiente enlace: <?= getLinkTarjeta($d) ?>`;
				let msgEncode = encodeURIComponent(msgWsp);
				let linkWsp = `https://api.whatsapp.com/send?phone=${telefonoDestino}&text=${msgEncode}`;
				inputNumeroWsp.value = "";
				console.log(linkWsp);
				window.open(linkWsp, '_blank');
			});

			// $('#formajx').submit(function() {
			// 	var femail = $("#sendvcardemail").val();
			// 	//var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
			// 	var pattern = new RegExp(/^[^\s@]+@[^\s@]+\.[^\s@]+$/);
			// 	if (pattern.test(femail)) {
			// 		cardStatsAction("sendvcard", "");
			// 		$(this).ajaxSubmit();
			// 		//actionSendvCard("close");
			// 		closePage();
			// 		$("#sendvcardemailerror").hide();
			// 		$("#sendvcardemail").val("");
			// 		alert("Se ha enviado correctamente el email con la vCard adjuntada.");
			// 	} else {
			// 		$("#sendvcardemailerror").show();
			// 	}
			// 	return false;
			// });

			$('#cardlocalization-inside').bind('mousedown tap', function() {
				//$('#cardlocalization-content').toggle();
				changeBlockBarContent("cardlocalization", false);
				$('#cardlocalization-map').toggle();
				if (!mapinitialized) {
					// initializeMap();
				}
			});
			$('#cardcontact-inside').bind('mousedown tap', function() {
				changeBlockBarContent("cardcontact", true);
			});
			$('#cardcompany-inside').bind('mousedown tap', function() {
				changeBlockBarContent("cardcompany", true);
			});
			$('#cardsocialnetwork-inside').bind('mousedown tap', function() {
				changeBlockBarContent("cardsocialnetwork", true);
			});
			$('#cardvcard-inside').bind('mousedown tap', function() {
				changeBlockBarContent("cardvcard", true);
			});
			$('#cardvideo-inside').bind('mousedown tap', function() {
				changeBlockBarContent("cardvideo", true);
			});
			$('#cardcontent-inside').bind('mousedown tap', function() {
				changeBlockBarContent("cardcontent", true);
			});
			$('#cardsecurecontent-inside').bind('mousedown tap', function() {
				changeBlockBarContent("cardsecurecontent", true);
			});
			$('#infobuttonblock').bind('mousedown tap', function() {
				$('#infobutton-content').toggle();
			});
			$('#infoqrblock').bind('mousedown tap', function() {
				$('#infoqr-content').toggle();
			});

			setTimeout(function() {
				changeBlockBarOpentext("cardcontact");
				changeBlockBarOpentext("cardcompany");
				changeBlockBarOpentext("cardsocialnetwork");
				changeBlockBarOpentext("cardvcard");
				changeBlockBarOpentext("cardvideo");
				changeBlockBarOpentext("cardcontent");
				changeBlockBarOpentext("cardsecurecontent");
				changeBlockBarOpentext("cardlocalization");
			}, 500);

			var ua = navigator.userAgent;
			var uaindex;
			var userOS;
			if (ua.match(/iPad/i) || ua.match(/iPhone/i)) {
				userOS = 'iOS';
				uaindex = ua.indexOf('OS ');
			} else if (ua.match(/Android/i)) {
				userOS = 'Android';
				uaindex = ua.indexOf('Android ');
			} else {
				userOS = 'unknown';
			}
			if (userOS === 'iOS' && uaindex > -1) {
				userOSver = ua.substr(uaindex + 3, 3).replace('_', '.');
			} else if (userOS === 'Android' && uaindex > -1) {
				userOSver = ua.substr(uaindex + 8, 3);
			} else {
				userOSver = 'unknown';
			}

			if (userOS == 'Android' || userOS == 'iOS') {
				isMobileDevice = true;
			}
			if (!isMobileDevice) {
				//$('#shareButtonWhatsapp').hide(); 
				$("#shareButtonWhatsapp").attr('href', $("#shareButtonWhatsappUrl").html());
			}
			if ($(window).width() >= 768) {
				$("#cardcontact-content").show();
				$("#cardvideo-content").show();
			}
			if (isMobileDevice) {
				actionAnimStart();
			}
		});

		var startaction = true;
		var lastaction = "";
		var fromActionBigButton = false;

		function actionBigButton(blockid) {
			fromActionBigButton = true;
			$("#card" + blockid + "-content").show();
			if (blockid == "content") {
				//$("#cardsecurecontent").show();
			}
			if (blockid == "localization") {
				$("#cardlocalization-content").show();
				$('#cardlocalization-map').toggle();
				if (!mapinitialized) {
					// initializeMap();
				}
			}
			document.location.href = "#" + blockid;
			lastaction = blockid;
		}

		function changeBlockBarContent(id, iconbar) {
			$('#' + id + '-content').fadeToggle("fast", function() {
				changeBlockBarOpentext(id);
				if (!$('#' + id + '-content').is(":visible")) {
					if (fromActionBigButton) {
						$("html, body").animate({
							scrollTop: 0
						}, "slow");
					}
				} else {
					document.location.href = "#" + id;
					lastaction = id;
				}
				if (iconbar) {
					fromActionBigButton = false;
				}
			});
		}

		function changeBlockBarOpentext(id) {
			if ($('#' + id + '-content').is(":visible")) {
				$('#' + id + '-opentext').hide();
				$('#' + id + '-closetext').fadeIn();
				$('#' + id + '-openicon').hide();
				$('#' + id + '-closeicon').show();
			} else {
				$('#' + id + '-closetext').hide();
				$('#' + id + '-opentext').fadeIn();
				$('#' + id + '-openicon').show();
				$('#' + id + '-closeicon').hide();
			}
		}

		var countAnim = 0;

		function actionAnimStart() {
			countAnim++;
			$("#animstart").fadeIn("slow", function() {
				$("#animstart").animate({
						bottom: '-125px'
					}, 700,
					function() {
						if (countAnim < 5) {
							$("#animstart").hide().css('bottom', 20);
						}
					} // actionAnimStart();
				);
			});
		}

		function actionAnimStop() {
			if (countAnim != 999) {
				countAnim = 999;
				$("#animstart").fadeOut();
			}
		}
		document.addEventListener('touchmove', function(e) {
			actionAnimStop();
		}, false);
		//document.addEventListener('mousemove', function(e) { actionAnimStop(); }, false);

		function chekOtherPopups(type) {
			var controlId;
			controlId = "cardviewcopy";
			if (type != controlId && $('#' + controlId).is(":visible")) {
				$("#" + controlId).hide();
			}
			controlId = "cardviewqr";
			if (type != controlId && $('#' + controlId).is(":visible")) {
				$("#" + controlId).hide();
			}
			controlId = "cardsendvcard";
			if (type != controlId && $('#' + controlId).is(":visible")) {
				$("#" + controlId).hide();
			}
			controlId = "cardsendwhatsapp";
			if (type != controlId && $('#' + controlId).is(":visible")) {
				$("#" + controlId).hide();
			}
			controlId = "cardecology";
			if (type != controlId && $('#' + controlId).is(":visible")) {
				$("#" + controlId).hide();
			}
			controlId = "cardbusy";
			if (type != controlId && $('#' + controlId).is(":visible")) {
				$("#" + controlId).hide();
			}
			controlId = "cardmembershipqr";
			if (type != controlId && $('#' + controlId).is(":visible")) {
				$("#" + controlId).hide();
			}
		}

		function actionBusy(type) {
			if (type == "open") {
				chekOtherPopups("cardbusy");
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
				$("#cardbusy").show();
				$("#cardcontainer-contact").hide();
			} else if (type == "close") {
				$("#cardbusy").hide();
				$("#cardcontainer-contact").show();
			}
		}

		function actionEcology(type) {
			if (type == "open") {
				chekOtherPopups("cardecology");
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
				$("#cardecology").show();
				$("#cardcontainer-contact").hide();
			} else if (type == "close") {
				$("#cardecology").hide();
				$("#cardcontainer-contact").show();
			}
		}

		function actionViewCopy(type) {
			if (type == "open") {
				chekOtherPopups("cardviewcopy");
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
				$("#cardviewcopy").show();
				$("#cardcontainer-contact").hide();
				copyTextToClipboard('<?= base_url(getLinkTarjeta($d)) ?>');

			} else if (type == "close") {
				$("#cardviewcopy").hide();
				$("#cardcontainer-contact").show();
			}
		}

		function actionViewQR(type) {
			if (type == "open") {
				chekOtherPopups("cardviewqr");
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
				$("#cardviewqr").show();
				$("#cardcontainer-contact").hide();
			} else if (type == "close") {
				$("#cardviewqr").hide();
				$("#cardcontainer-contact").show();
			}
		}

		function actionDownloadvCard() {
			let slugUsuario = '<?= $d['datosUsuario']['slug'] ?>';
			let baseUrl = '<?= base_url() ?>';
			window.open(`${baseUrl}/descargar-vcard/${slugUsuario}`, '_blank');
		}

		function actionSendvCard(type) {
			if (type == "open") {
				chekOtherPopups("cardsendvcard");
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
				$("#cardsendvcard").show();
				//$("#cardcontainer-content").hide();
				$("#cardcontainer-contact").hide();
			} else if (type == "close") {
				$("#cardsendvcard").hide();
				//$("#cardcontainer-content").show();
				$("#cardcontainer-contact").show();
			}
		}

		function cardStatsAction(actiontype, data) {
			var page = "";
			var etime = 0;
			sendAction(actiontype, data, page, etime);
		}

		function putDelayer(action, delay) {
			onLoad = setTimeout(action, delay);
		}

		function copyTextToClipboard(text) {
			$('#inputCopyToClipboard').select();
			var res = document.execCommand("copy");
			if (!res) {
				console.log("> No copy to clipboard");
			}
		}

		function copyTextToClipboardID(fieldid) {
			$('#' + fieldid).select();
			var res = document.execCommand("copy");
			if (!res) {
				console.log("> No copy to clipboard");
			}
		}
	</script>
</head>

<body>
	<div id="cardmain">
		<div id="cardmain-inside">

			<div id="cardsidebar" style="display:none;">

				<table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
					<tr>
						<td>
							<div class="sidebartitle">Cont&aacute;ctame</div>
							<div class="sidebaroptions">
								<a href=""><i class="fal fa-user-alt blockicon"></i> Datos de Contacto</a>
								<br />
							</div>

							<div class="sidebartitle">Qui&eacute;nes somos / D&oacute;nde estamos</div>
							<div class="sidebaroptions">
								<a href=""><i class="far fa-building blockicon"></i> Datos Corporativos</a>
								<br />
								<a href=""><i class="fas fa-map-marker-alt blockicon"></i> Datos de Localizaci&oacute;n</a>
								<br />
							</div>

							<div class="sidebartitle">Acceso a Contenidos</div>
							<div class="sidebaroptions">
								<a href=""><i class="fas fa-share-alt blockicon"></i> Redes Sociales</a>
								<br />
								<a href=""><i class="fab fa-youtube blockicon"></i> Video presentaci&oacute;n</a>
								<br />
								<a href=""><i class="fas fa-book-open blockicon"></i> Contenidos P&uacute;blicos</a>
								<br />
								<a href=""><i class="fas fa-lock blockicon"></i> Contenidos y Accesos privados</a>
								<br />
							</div>

							<div class="sidebaroptions">
								<a href="javascript:openPage('vcard')"><i class="fas fa-share-square blockicon"></i> Compartir
									Tarjeta</a>
								<br />
							</div>

							<div class="sidebaroptions">
								<a href=""><i class="fas fa-leaf"></i> Huella Ecol&oacute;gica</a>
							</div>
						</td>
					</tr>
				</table>

			</div>


			<!-- <div id="cardtopbar">
				<div id="cardtopbar-inside">
					<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td id="topbar-td1">
								<img id="logo" src="//d3cwdr4mx7w8ca.cloudfront.net/imgcdn/20210527085936/card/c18pagelogo.png"
									style="padding-bottom:5px;" />

							</td>
							<td id="topbar-td2">

								<div id="toprightclose" style="display:none; float:right;padding-top:0px;padding-right:10px;">
									<a href="" style="font-size:26px;"><i class="fas fa-times"></i></a>
								</div>
								<div id="toprightbuttons" style="float:right;padding-top:4px;padding-right:5px;text-align:right;">
									<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
										<tr>
											<td>
												<a href="javascript:openPage('ecology')" aria-label="Huella Ecol&oacute;gica"><i
														class="far fa-leaf"
														style="color:#fff;font-size:17px;background:#9ec41c;padding:6px 9px 8px 9px;border-radius:3px;"></i></a>
											</td>
											<td style="padding-left:10px;">
												<div id="menumobile" style="color:rgba(0,0,0,0.40);border:1px solid rgba(0,0,0,0.15)">es<i
														class="fas fa-angle-down" style="padding-left:5px;font-size:12px;"></i></div>
												<ul id="menumobile-list" class="menumobile-list">
													<li><span style="opacity:0.6;" title="Espa&ntilde;ol">Espa&ntilde;ol</span></li>
													<li><a href="/ccc397184?l=1" title="English">English</a></li>
													<li><a href="/ccc397184?l=23" title="Italiano">Italiano</a></li>
													<li><a href="/ccc397184?l=16" title="Deutsch">Deutsch</a></li>
													<li><a href="/ccc397184?l=15" title="Fran&ccedil;ais">Fran&ccedil;ais</a></li>
													<li><a href="/ccc397184?l=43" title="Portugu&ecirc;s (BR)">Portugu&ecirc;s (BR)</a></li>
													<li><a href="/ccc397184?l=4" title="Svenska">Svenska</a></li>
													<li><a href="/ccc397184?l=3" title="Catal&agrave;">Catal&agrave;</a></li>
												</ul>
											</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
					<div style="clear:both"></div>
				</div>
			</div> -->





			<div id="floatbox">
				<table border="0" cellpadding="0" cellspacing="0" class="floatbuttons">
					<tr>
						<td><a href="javascript:openPage('vcard')" aria-label="Compartir Tarjeta" style="color:#eee;"><i class="fal fa-share-square"></i><span>Compartir Tarjeta</span></a></td>
					</tr>
					<tr>
						<td><a href="javascript:openPage('save')" aria-label="Guardar" style="color:#eee;"><i class="fal fa-user-plus"></i><span>Guardar</span></a></td>
					</tr>
					<tr>
						<td><a href="javascript:openPage('viewqr')" aria-label="C&oacute;digo QR" style="color:#eee;"><i class="fal fa-qrcode"></i><span>C&oacute;digo QR</span></a></td>
					</tr>
				</table>
				<div style="clear:both"></div>
			</div>
			<?php
			$backgroundColor = "background-color: " . getColorApariencia($d) . ";";
			$backgroundImage = "background-image: url(" . getRutaBanner($d) . "); background-position: center; background-repeat: no-repeat; background-size: cover;";
			?>
			<div id="fullimage" style="<?= (getRutaBanner($d)) ? $backgroundImage : $backgroundColor ?>">
				<!-- background-image:url('img/fondo_kidsalud_1.jpg');background-position: top right; background-repeat: no-repeat; background-size: cover; -->
				<!-- <div style="padding: 10px; background-color: #fff; width: 100px; border-bottom-right-radius: 15px;">
					<img src="#" alt="logotipo" style="display: block; width: 100px;">
				</div> -->
			</div>

			<table border="0" cellpadding="0" cellspacing="0" style="width:100%; max-width:1400px;margin:0 auto;">
				<tr>
					<td id="photo-td1">
						<div id="photocontainer">
							<div id="photobox" style="margin:0 auto; text-align:center;border-radius:50%;background:url(<?= base_url($d['datosUsuario']['url_foto_de_perfil']) ?>);background-size:cover; background-position: center;">
							</div>
						</div>
					</td>
					<td id="photo-td2"></td>
				</tr>
			</table>


			<div id="cardbase">
				<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
						<td id="cardmaincontent-td">


							<div id="cardmaincontent">
								<div id="cardmaincontent-inside">
									<div id="cardmaincontent-personaldata" style="text-align:center;">

										<span class="details-name"><?= $d['datosUsuario']['nombres'] ?> <span style="color:<?= getColorApariencia($d) ?>;font-weight:700;"><?= $d['datosUsuario']['apellidos'] ?></span></span>

										<div style="height:6px;"></div><span class="details-level1"><?= $d['datosUsuario']['puesto'] ?></span>
										<!-- <div style="height:2px;"></div><span class="details-level2">Smart Business Representation</span> -->
									</div>



									<div id="cardmaincontent-otherdata">
										<table border="0" cellpadding="0" cellspacing="0" class="bigbuttons">
											<tr>
												<td>
													<a href="tel:<?= getPrefijo(getTelefonoPrincipal($d), "telefono") ?><?= formatearTelefono(getTelefonoPrincipal($d)['numero']) ?>" aria-label="Llamar" style="color:#666;"><i class="fas fa-phone" style="background:<?= getColorApariencia($d) ?>;"></i><span>Llamar</span></a>
												</td>
												<td>
													<a target="_blank" href="https://api.whatsapp.com/send?phone=<?= getPrefijo(getTelefonoPrincipal($d), "whatsapp") ?><?= formatearTelefono(getTelefonoPrincipal($d)['numero']) ?>&text=<?= getMsgWsp(getTelefonoPrincipal($d)) ?>" aria-label="WhatsApp" style="color:#666;"><i class="fab fa-whatsapp" style="background:<?= getColorApariencia($d) ?>;"></i><span>WhatsApp</span></a>
												</td>
												<td>
													<a href="mailto:<?= getCorreoPrincipal($d)['url'] ?>" aria-label="E-mail" style="color:#666;"><i class="fal fa-envelope" style="background:<?= getColorApariencia($d) ?>;"></i><span>E-mail</span></a>
												</td>
											</tr>
										</table>






										<!-- <div style="max-width:450px;margin:0 auto; text-align:center; padding-top:10px;">
											<a href="https://businesscard.bhybrid.com/es/dsl?r=3-17213" target="_blank"
												style="text-decoration:none;">
												<div
													style="font-size:16px;line-height:19px;border:2px solid <?= getColorApariencia($d) ?>;color:<?= getColorApariencia($d) ?>;padding:12px 12px;border-radius:3px;">
													<b>Prueba una Demo Gratis por 14 días!</b>
												</div>
											</a>
										</div> -->



										<div style="height:15px;"></div> <a name="socialnetwork"></a>
										<div style="margin-bottom:5px;text-align:center;">
											<a href="<?= getRedSocial($d, 'Facebook') ?>" target="_blank" aria-label="Facebook" class="iconButtonPlain"><i class="fab fa-facebook-f" style="background:#3b5998;"></i><span>Facebook</span></a>

											<a href="<?= getRedSocial($d, 'Twitter') ?>" target="_blank" aria-label="Twitter" class="iconButtonPlain"><i class="fab fa-twitter" style="background:#1da1f2;"></i><span>Twitter</span></a>

											<a href="<?= getRedSocial($d, 'Linkedin') ?>" target="_blank" aria-label="LinkedIn" class="iconButtonPlain"><i class="fab fa-linkedin-in" style="background:#0077b5;"></i><span>LinkedIn</span></a>

											<a href="<?= getRedSocial($d, 'Instagram') ?>" target="_blank" aria-label="Instagram" class="iconButtonPlain"><i class="fab fa-instagram" style="background:#9c4299;"></i><span>Instagram</span></a>

											<a href="<?= getRedSocial($d, 'Youtube') ?>" target="_blank" aria-label="YouTube" class="iconButtonPlain"><i class="fab fa-youtube" style="background:#ff0000;"></i><span>YouTube</span></a>
										</div>
										<div style="height:10px;"></div>
										<div style="text-align:center;padding-top:20px;padding-bottom:20px;">
											<a href="<?= getPaginaWeb($d) ?>" style="color:<?= getColorApariencia($d) ?>; text-decoration:none;" target="_blank"><i class="fal fa-link"></i> <?= $d['datosUsuario']['pagina_web'] ?></a>
										</div>

									</div>

								</div>
							</div>

						</td>
						<td id="cardextracontent-td">
							<div id="cardextracontent">
								<!-- CONTENIDO DE PORTADA -->
								<div id="cardextracontent-inside">
									<div class="cardextracontentblock">

										<div style="margin-bottom: 30px;">
											<div class="cardextracontenttitle" style="color: <?= getColorApariencia($d) ?>;">Presentación</div>
											<div style="border:0px solid rgba(0,0,0,0.15);">
												<!-- <iframe width="100%" height="250" style="border:0;" src="video/video_presentacion.mp4"></iframe> -->

												<?php if(getVideoPresentacion($d) !== '#'): ?>
													<video src="<?= getVideoPresentacion($d) ?>" controls style="width: 100%; height: auto; margin-top: 15px;"></video>
												<?php else: ?>

													<?php if(!empty($d['imagenes'])):?>
														<img src="<?= base_url($d['imagenes'][0]['url']) ?>" alt="" style="display: block; width: 100%; margin-top: 30px;">
													<?php endif;?>

												<?php endif; ?>

											</div>
										</div>

										<?php if (!empty(trim($d['datosUsuario']['acerca_de_mi']))) : ?>
											<div style="margin-bottom: 30px;">
												<div class="cardextracontenttitle" style="color: <?= getColorApariencia($d) ?>;">Acerca de Mi</div>
												<div style="border:0px solid rgba(0,0,0,0.15); text-align: justify; padding: 0 30px;">
													<p><?= $d['datosUsuario']['acerca_de_mi'] ?></p>
												</div>
											</div>
										<?php endif; ?>

										<?php if (!empty(trim($d['datosUsuario']['inicio']))) : ?>
											<div style="margin-bottom: 30px;">
												<div class="cardextracontenttitle" style="color: <?= getColorApariencia($d) ?>;">Inicio</div>
												<div style="border:0px solid rgba(0,0,0,0.15); text-align: justify; padding: 0 30px;">
													<p><?= $d['datosUsuario']['inicio'] ?></p>
												</div>
											</div>
										<?php endif; ?>

										<?php if (!empty(trim($d['datosUsuario']['horarios_atencion']))) : ?>
											<div style="margin-bottom: 30px;">
												<div class="cardextracontenttitle" style="color: <?= getColorApariencia($d) ?>;">Horarios de Atención</div>
												<div style="border:0px solid rgba(0,0,0,0.15); text-align: left; padding: 0 30px;">
													<p><?= $d['datosUsuario']['horarios_atencion'] ?></p>
												</div>
											</div>
										<?php endif; ?>

										<?php if (!empty(trim($d['datosUsuario']['educacion']))) : ?>
											<div style="margin-bottom: 30px;">
												<div class="cardextracontenttitle" style="color: <?= getColorApariencia($d) ?>;">Educación</div>
												<div style="border:0px solid rgba(0,0,0,0.15); text-align: justify; padding: 0 30px;">
													<p><?= $d['datosUsuario']['educacion'] ?></p>
												</div>
											</div>
										<?php endif; ?>

										<?php if (!empty(trim($d['datosUsuario']['experiencia']))) : ?>
											<div style="margin-bottom: 30px;">
												<div class="cardextracontenttitle" style="color: <?= getColorApariencia($d) ?>;">Experiencia</div>
												<div style="border:0px solid rgba(0,0,0,0.15); text-align: justify; padding: 0 30px;">
													<p><?= $d['datosUsuario']['experiencia'] ?></p>
												</div>
											</div>
										<?php endif; ?>

										<?php if (!empty(trim($d['datosUsuario']['servicios']))) : ?>
											<div style="margin-bottom: 30px;">
												<div class="cardextracontenttitle" style="color: <?= getColorApariencia($d) ?>;">Servicios</div>
												<div style="border:0px solid rgba(0,0,0,0.15); text-align: justify; padding: 0 30px;">
													<p><?= $d['datosUsuario']['servicios'] ?></p>
												</div>
											</div>
										<?php endif; ?>

									</div>

									<!-- <div class="cardextracontentblock">
										<div class="cardextracontenttitle" id="shelfContainerHomeTitle">Contenidos P&uacute;blicos</div>
										<div id="shelfContainerHome"></div>
									</div> -->
								</div>
							</div>


							<div id="pagebtnclose" style="display:none;">
								<a href="javascript:closePage()">cerrar &nbsp;<i class="fal fa-times"></i></a>
							</div>


							<div id="cardecology" style="display:none;">
								<div class="cardpagetitle"><i class="fal fa-leaf"></i>&nbsp; Huella Ecol&oacute;gica</div>
								<div class="cardpagecontent" style="margin:0 auto; max-width:700px;">

									<div style="padding:0 10px;">
										<span style="font-size:18px;line-height:22px;font-weight:700;">
											La responsabilidad para cuidar el planeta empieza con peque&ntilde;os detalles </span>
										<br /><br />

										<span class="textinfo">
											Al optimizar el uso del material impreso, contribuyes a reducir el efecto invernadero, la
											deforestaci&oacute;n y ayudas a reducir el consumo de agua y petr&oacute;leo. </span>

										<div id="cardecologydatacontent"></div>
									</div>

								</div>
							</div>

							<div id="cardvideo" style="display:none;">
								<div class="cardpagetitle"><i class="fal fa-video"></i>&nbsp; Videos</div>
								<div class="cardpagecontent">

									<?php foreach ($d['videos'] as $video) : ?>
										<div style="width:100%; max-width:700px; margin:0 auto;">
											<div style="text-transform:uppercase; font-weight:300; font-size:15px;line-height:17px; text-align:center;padding:0px 25px 12px 25px; "><?= $video['titulo'] ?></div>
											<div style="margin-bottom:20px; background:#000;">
												<video src="<?= base_url($video['url']) ?>" style="width: 100%; height: auto;" controls></video>
											</div>
											<p style="margin-top: 20px; text-align: center;"><?= $video['descripcion'] ?></p>
										</div>
									<?php endforeach; ?>

								</div>
							</div>

							<div id="cardpublication" style="display:none;">
								<div class="cardpagetitle"><i class="fal fa-book-open"></i>&nbsp; Contenidos P&uacute;blicos</div>
								<div class="cardpagecontent">

									<!-- <div style="text-align:center;"><span class="textinfo">Pulse en la portada para acceder al
											contenido.</span></div> -->
									<br />

									<div style="width:100%; max-width:650px; margin:0 auto;">

										<style type="text/css">
											ul.publist {
												list-style: none;
												padding: 0;
											}

											ul.publist li {
												float: left;
												cursor: hand;
												cursor: pointer;
												padding: 0px 10px;
											}

											ul.publist li a {
												text-decoration: none;
												border: 0;
											}

											ul.publist li img {
												border: 0;
											}

											ul.publist li .imgcover {
												box-shadow: 1px 1px rgba(255, 255, 255, 0.40), 2px 2px rgba(180, 180, 180, 0.40), 3px 3px rgba(255, 255, 255, 0.40), 4px 4px rgba(180, 180, 180, 0.40), 5px 5px rgba(255, 255, 255, 0.40);
												-moz-box-shadow: 1px 1px rgba(255, 255, 255, 0.40), 2px 2px rgba(180, 180, 180, 0.40), 3px 3px rgba(255, 255, 255, 0.40), 4px 4px rgba(180, 180, 180, 0.40), 5px 5px rgba(255, 255, 255, 0.40);
												-webkit-box-shadow: 1px 1px rgba(255, 255, 255, 0.40), 2px 2px rgba(180, 180, 180, 0.40), 3px 3px rgba(255, 255, 255, 0.40), 4px 4px rgba(180, 180, 180, 0.40), 5px 5px rgba(255, 255, 255, 0.40);
											}

											ul.publist li:hover .imgcover {
												box-shadow: 1px 1px rgba(255, 255, 255, 0.40), 2px 2px rgba(180, 180, 180, 0.40), 3px 3px rgba(255, 255, 255, 0.40), 4px 4px rgba(180, 180, 180, 0.40), 5px 5px rgba(255, 255, 255, 0.40);
												-moz-box-shadow: 1px 1px rgba(255, 255, 255, 0.40), 2px 2px rgba(180, 180, 180, 0.40), 3px 3px rgba(255, 255, 255, 0.40), 4px 4px rgba(180, 180, 180, 0.40), 5px 5px rgba(255, 255, 255, 0.40);
												-webkit-box-shadow: 1px 1px rgba(255, 255, 255, 0.40), 2px 2px rgba(180, 180, 180, 0.40), 3px 3px rgba(255, 255, 255, 0.40), 4px 4px rgba(180, 180, 180, 0.40), 5px 5px rgba(255, 255, 255, 0.40);
											}

											ul.publist li:hover .blockPub {
												top: -3px;
												left: -3px;
											}

											.shelfbreak {
												clear: both;
												float: none;
												height: auto;
												padding: 0;
											}

											.pubTitleBox {
												padding: 25px 2px 4px 2px;
											}

											.pubTitleBtn {
												background: #444;
												-moz-box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.05);
												-webkit-box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.05);
												box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.05);
											}

											.pubTitleText {
												font-size: 15px;
												line-height: 18px;
												font-weight: 700;
												letter-spacing: 0px;
												color: #555;
											}

											.shelfshadow {
												-moz-box-shadow: 0px 1px 17px rgba(0, 0, 0, 0.6);
												-webkit-box-shadow: 0px 1px 17px rgba(0, 0, 0, 0.6);
												box-shadow: 0px 1px 17px rgba(0, 0, 0, 0.6);
											}

											.objshadow {
												-moz-box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.5);
												-webkit-box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.5);
												box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.5);
											}

											.objshadowinset {
												-moz-box-shadow: inset 1px 1px 15px rgba(0, 0, 0, 0.8);
												-webkit-box-shadow: inset 1px 1px 15px rgba(0, 0, 0, 0.8);
												box-shadow: inset 1px 1px 15px rgba(0, 0, 0, 0.8);
											}

											.radius15 {
												-moz-border-radius: 15px;
												border-radius: 15px;
												-webkit-border-radius: 15px;
											}

											.radius10 {
												-moz-border-radius: 10px;
												border-radius: 10px;
												-webkit-border-radius: 10px;
											}

											.radius7 {
												-moz-border-radius: 7px;
												border-radius: 7px;
												-webkit-border-radius: 7px;
											}

											.radius5top {
												-moz-border-radius: 5px 5px 0px 0px;
												border-radius: 5px 5px 0px 0px;
												-webkit-border-radius: 5px 5px 0px 0px;
											}

											.radius5 {
												-moz-border-radius: 5px;
												border-radius: 5px;
												-webkit-border-radius: 5px;
											}

											.radius3 {
												-moz-border-radius: 3px;
												border-radius: 3px;
												-webkit-border-radius: 3px;
											}

											.opacity50 {
												opacity: .5;
												filter: alpha(opacity=50);
												-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
											}

											.inlinedisplay {
												display: -moz-inline-stack;
												display: inline-block;
												zoom: 1;
												*display: inline;
											}

											.blockaction {
												border: 1px solid #EEE;
												border-right: 1px solid #CCC;
												border-bottom: 1px solid #CCC;
												background: #FAFAFA url(/editions/images/blockbg.png) repeat-x bottom;
												padding: 20px 20px;
												cursor: hand;
												cursor: pointer;
											}

											.blockaction:hover {
												background: #E3F2FF;
											}

											.imgcover {
												image-rendering: optimizeQuality;
												-ms-interpolation-mode: bicubic;
											}

											.blockPub {
												position: relative;
												z-index: 1;
												box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.20);
												-moz-box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.20);
												-webkit-box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.20);
												filter: progid:DXImageTransform.Microsoft.dropShadow(color=#BBBBBB, offX=1, offY=1, positive=true);
											}

											.imgcovereffect {
												position: relative;
											}

											.imgcovereffect span {
												position: absolute;
												top: 0px;
												left: 0px;
												width: 100%;
												height: 100%;
												z-index: 100;

												background: -moz-linear-gradient(left, rgba(27, 27, 27, 0.28) 0%, rgba(255, 255, 255, 0.15) 10%, rgba(255, 255, 255, 0.14) 11%, rgba(255, 255, 255, 0.33) 18%, rgba(255, 255, 255, 0.13) 30%, rgba(10, 10, 10, 0.13) 47%, rgba(1, 1, 1, 0.13) 50%, rgba(13, 13, 13, 0.13) 54%, rgba(149, 149, 149, 0.11) 100%);
												/* FF3.6+ */
												background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(27, 27, 27, 0.28)), color-stop(10%, rgba(255, 255, 255, 0.15)), color-stop(11%, rgba(255, 255, 255, 0.14)), color-stop(18%, rgba(255, 255, 255, 0.33)), color-stop(30%, rgba(255, 255, 255, 0.13)), color-stop(47%, rgba(10, 10, 10, 0.13)), color-stop(50%, rgba(1, 1, 1, 0.13)), color-stop(54%, rgba(13, 13, 13, 0.13)), color-stop(100%, rgba(149, 149, 149, 0.11)));
												/* Chrome,Safari4+ */
												background: -webkit-linear-gradient(left, rgba(27, 27, 27, 0.28) 0%, rgba(255, 255, 255, 0.15) 10%, rgba(255, 255, 255, 0.14) 11%, rgba(255, 255, 255, 0.33) 18%, rgba(255, 255, 255, 0.13) 30%, rgba(10, 10, 10, 0.13) 47%, rgba(1, 1, 1, 0.13) 50%, rgba(13, 13, 13, 0.13) 54%, rgba(149, 149, 149, 0.11) 100%);
												/* Chrome10+,Safari5.1+ */
												background: -o-linear-gradient(left, rgba(27, 27, 27, 0.28) 0%, rgba(255, 255, 255, 0.15) 10%, rgba(255, 255, 255, 0.14) 11%, rgba(255, 255, 255, 0.33) 18%, rgba(255, 255, 255, 0.13) 30%, rgba(10, 10, 10, 0.13) 47%, rgba(1, 1, 1, 0.13) 50%, rgba(13, 13, 13, 0.13) 54%, rgba(149, 149, 149, 0.11) 100%);
												/* Opera 11.10+ */
												background: -ms-linear-gradient(left, rgba(27, 27, 27, 0.28) 0%, rgba(255, 255, 255, 0.15) 10%, rgba(255, 255, 255, 0.14) 11%, rgba(255, 255, 255, 0.33) 18%, rgba(255, 255, 255, 0.13) 30%, rgba(10, 10, 10, 0.13) 47%, rgba(1, 1, 1, 0.13) 50%, rgba(13, 13, 13, 0.13) 54%, rgba(149, 149, 149, 0.11) 100%);
												/* IE10+ */
												background: linear-gradient(left, rgba(27, 27, 27, 0.28) 0%, rgba(255, 255, 255, 0.15) 10%, rgba(255, 255, 255, 0.14) 11%, rgba(255, 255, 255, 0.33) 18%, rgba(255, 255, 255, 0.13) 30%, rgba(10, 10, 10, 0.13) 47%, rgba(1, 1, 1, 0.13) 50%, rgba(13, 13, 13, 0.13) 54%, rgba(149, 149, 149, 0.11) 100%);
												filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#25000000', endColorstr='#10ffffff', GradientType=1);
											}

											.book-td2 a {
												float: left;
											}

											@media all and (min-width: 10px) {
												.book-td1 {
													padding: 20px 0px 0px 0;
													display: block;
													width: 100%;
													height: auto;
													text-align: center;
												}

												.book-td2 {
													padding: 15px 25px 20px 25px;
													display: block;
													text-align: left;
												}
											}

											@media all and (min-width: 900px) {
												.book-td1 {
													padding: 20px 0;
													vertical-align: middle;
													text-align: center;
													display: table-cell;
													width: 265px;
													height: 265px;
												}

												.book-td2 {
													padding: 0 25px;
													display: table-cell;
													text-align: left;
													width: 50%;
												}
											}

											.bookcovereffect {
												position: relative;
												cursor: hand;
												cursor: pointer;
											}

											.bookcovereffect img {
												-webkit-box-shadow: 1px 1px 17px rgba(0, 0, 0, 0.40);
												-moz-box-shadow: 1px 1px 17px rgba(0, 0, 0, 0.40);
												box-shadow: 1px 1px 27px rgba(0, 0, 0, 0.30);
											}

											.bookcovereffect span {
												position: absolute;
												top: 0px;
												left: 0px;
												width: 100%;
												height: 100%;
												z-index: 100;
												background: -webkit-linear-gradient(left, rgba(27, 27, 27, 0.28) 0%, rgba(255, 255, 255, 0.11) 10%, rgba(255, 255, 255, 0.28) 17%, rgba(255, 255, 255, 0.27) 18%, rgba(255, 255, 255, 0.13) 30%, rgba(10, 10, 10, 0.13) 47%, rgba(1, 1, 1, 0.13) 50%, rgba(13, 13, 13, 0.13) 54%, rgba(149, 149, 149, 0.11) 100%);
											}

											.shelf3d {
												border-bottom: 27px solid #f4f4f4;
												border-left: 40px solid transparent;
												border-right: 25px solid transparent;
												top: -15px;
												z-index: -10;
												margin-top: -14px;
												margin-left: 8px;
												margin-right: 5px;
												-webkit-box-shadow: 0px 2px 0px 0px #e1e1e1;
												-moz-box-shadow: 0px 2px 0px 0px #e1e1e1;
												box-shadow: 0px 2px 0px 0px #e1e1e1;
											}
										</style>

										<?php foreach ($d['imagenes'] as $imagen) : ?>
											<div style="margin-bottom: 10px;">
												<img src="<?= base_url($imagen['url']) ?>" alt="" style="display: block; width: 100%;">
												<p style="padding: 15px;"><?= $imagen['descripcion'] ?></p>
											</div>
										<?php endforeach; ?>

										<!-- <script type="text/javascript"
											src="//d3cwdr4mx7w8ca.cloudfront.net/libs/jquery/tooltip/jquery.qtip-1.0.0-rc3.min.js"></script>
										<script type="text/javascript">
											var _shelfPubs = { "30c3df2e": ["Presentación Tarjetas Digitales  para organizaciones y profesionales", "//d3cwdr4mx7w8ca.cloudfront.net/publicationcdn/v24/30c3df2e/images/coverpage1.jpg", "297", "419", "https://content.bhybrid.com/publication/30c3df2e", "30c3df2e", "4"], "da24ae75": ["ECO TARJETAS DIGITALES", "//d3cwdr4mx7w8ca.cloudfront.net/publicationcdn/v11/da24ae75/images/coverpage1.jpg", "297", "419", "https://content.bhybrid.com/publication/da24ae75", "da24ae75", "4"], "5c22d4de": ["Visualización Agrupada de Contenidos", "//d3cwdr4mx7w8ca.cloudfront.net/publicationcdn/v13/5c22d4de/images/coverpage1.jpg", "297", "419", "https://content.bhybrid.com/publication/5c22d4de", "5c22d4de", "8"] }; var _shelfImg = ""; var _shelfImgTop = "position:relative;top:-2px;"; var _hostImgs = "//d3cwdr4mx7w8ca.cloudfront.net";
											var iFrameHeight = 200;
											function getSizeProportional(width, height, maxsize) {
												_width = width; _height = height;
												if (_width > maxsize) { var _proportion = Math.round((maxsize * 100) / _width); _width = maxsize; _height = Math.round((_height * _proportion) / 100); }
												if (_height > maxsize) { var _proportion = Math.round((maxsize * 100) / _height); _height = maxsize; _width = Math.round((_width * _proportion) / 100); }
												return [_width, _height];
											}
											function getShelfBreak() {
												if (_shelfImg == "") {
													return '';
												} else {
													return '<div class="shelfbreak shelfshadow" style="' + _shelfImgTop + 'background:url(' + _hostImgs + '/library/images/' + _shelfImg + ') top left;"><img src="' + _hostImgs + '/library/images/' + _shelfImg + '"></div>';
												}
											}
											function popupwin(url) {
												var newwindow; var name = "hpubwin"; var width = screen.availWidth - 20; var height = screen.availHeight - 45;
												newwindow = window.open(url, name, 'height=' + height + ',width=' + width + ',scrollbars=0,status=0,toolbar=0,menubar=0,resizable=0');
												if (window.focus) { newwindow.focus() }
											}
											$(document).ready(function () {
												var _isIEle7 = false;
												if ($.browser.msie == true && $.browser.version <= 7.0) { _isIEle7 = true; }
												var maxImgSize = 215 + 25; var blockPubSize = maxImgSize + 25; var pubBorderSize = 40;

												function writeShelves() {
													var shelfContainer = "#shelfContainer";
													var maxShelfSize = $(shelfContainer).width(); var _cnt = 0; var _incSize = 0; var _cntRow = 1;
													//var _contentPubs = '<table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;"><tr><td><ul class="publist">';
													var _contentPubs = '';
													$.each(_shelfPubs, function (ind, val) {
														_cnt++;
														var _pubTitle = val[0]; var _pubUrlImg = val[1]; var _pubImgWidth = parseInt(val[2]); var _pubImgHeight = parseInt(val[3]); var _pubUrl = val[4]; var _pubCode = val[5];
														var _pubPages = val[6];
														var _sizes = getSizeProportional(_pubImgWidth, _pubImgHeight, maxImgSize);
														var styleSize = ''; 'width="' + _sizes[0] + '" height="' + _sizes[1] + '"';
														if (_pubImgWidth > _pubImgHeight) { styleSize = 'width="' + maxImgSize + '"'; } else { styleSize = 'height="' + maxImgSize + '"'; }
														_incSize += _sizes[0] + pubBorderSize;
														if (_incSize > maxShelfSize) {
															_cntRow++;
															_incSize = _sizes[0] + pubBorderSize;
														}
														_contentPubs += '<div style="margin:5px 0 25px 0px; width:100%; border-radius:5px; border:1px solid #f1f1f1; background: #f1f1f1; background: -moz-linear-gradient(top, #f1f1f1 0%, #ffffff 100%); background: -webkit-linear-gradient(top, #f1f1f1 0%,#ffffff 100%); background: linear-gradient(to bottom, #f1f1f1 0%,#ffffff 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#f1f1f1\', endColorstr=\'#ffffff\',GradientType=0 );">';

														_contentPubs += '<table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr><td class="book-td1">';

														_contentPubs += '<table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;"><tr><td>';
														_contentPubs += '<a id="link' + _cnt + '" href="' + _pubUrl + '" target="_blank" class="publinkcontrol" data-pub="' + _pubCode + '" style="text-decoration:none;border:0;">';
														_contentPubs += '<div class="bookcovereffect"><img src="' + _pubUrlImg + '" ' + styleSize + ' /><span></span></div>';
														_contentPubs += '</a>';
														_contentPubs += '</td></tr></table>';

														_contentPubs += '<div style="float:left; color:#888; margin-top:22px; margin-left:15px; font-size:11px; font-weight:400;"><span style="border:1px solid #f0f0f0;border-top:0;padding:6px 8px 6px 8px;border-radius:2px;">p&aacute;ginas: ' + _pubPages + '</span></div>';

														//_shelfImg = 'shelf_4.jpg';
														//---_shelfImg = 'shelf_1.jpg';
														//---_contentPubs+= '<div class="shelfbreak shelfshadow" style="z-index:-1;margin-top:-10px;'+_shelfImgTop+'background:url('+_hostImgs+'/library/images/'+_shelfImg+') top left;"><img src="'+_hostImgs+'/library/images/'+_shelfImg+'"></div>';
														_contentPubs += '<div class="shelf3d"></div>';

														_contentPubs += '</td><td class="book-td2"><div class="pubTitleBox">';
														_contentPubs += '<span class="pubTitleText">' + _pubTitle + '</span><div style="height:25px;"></div>';

														//_contentPubs+='<a href="'+_pubUrl+'" target="_blank" style="color:#fff;background:#444;padding:8px 15px;font-weight:400;font-size:13px;border-radius:2px;text-decoration:none;margin-bottom:10px;"><i class="far fa-book-reader" style="font-size:20px;vertical-align:middle;"></i>&nbsp; abrir</a>';
														//---_contentPubs+='<table border="0" cellpadding="0" cellspacing="0" class="subbigbuttons"><tr><td><a href="'+_pubUrl+'"><i class="fal fa-book-open"></i><span>Abrir</span></a></td></tr></table>';
														_contentPubs += '<a href="' + _pubUrl + '" aria-label="Abrir" class="link" style="font-size:13px;"><i class="fal fa-book-open" style="font-size:18px; vertical-align:middle;"></i>&nbsp; Abrir</a>';
														_contentPubs += '<br/><br/>';

														_contentPubs += '</td></tr></table>';

														_contentPubs += '</div>';
													});
													$(shelfContainer).html(_contentPubs);

													$('.pubTooltip[title]').qtip({
														content: { text: false }, position: { corner: { tooltip: 'topMiddle', target: 'bottomMiddle' } },
														style: { border: { width: 1, radius: 5, color: "#393d49" }, title: { background: "#393d49", color: "#FFF" }, background: "#393d49", color: "#FFF", padding: 6, tip: true }
													});
												}
												writeShelves();

												$("#shelfContainerHome").html($("#shelfContainer").html());

												$("a.publinkcontrol").trackOutBound(null, function () {
													var pub = $(this).data('pub');
													cardStatsAction("openpub", pub);
												});
											});
										</script> -->
										<div style="background:url(); position:relative;z-index:1;">
											<div id="wrapper" style="padding:0;">
												<div id="shelfContainer"></div>
											</div>
										</div>
									</div>

								</div>
							</div>

							<div id="cardsecurecontent" style="display:none;">
								<div class="cardpagetitle"><i class="far fa-hospital"></i>&nbsp; Empresa</div>
								<div class="cardpagecontent">
									<!-- <table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
										<tr>
											<td style="padding:10px 0;">
												<span class="details-text" style="padding:0;">
													<a href="https://system.bhybrid.com" target="_blank" class="link"><i
															class="fas fa-book-open"></i>&nbsp; Acceso a contenidos privados</a>
												</span>
												<div style="clear:both"></div>
												<div style="height:10px;"></div>
											</td>
										</tr>
									</table> -->
									<div>
										<img src="<?= (!empty($d['datosEmpresa']['url_imagen'])) ? base_url($d['datosEmpresa']['url_imagen']) : '#' ?>" alt="" style="display: block; width: 85%; margin: 0 auto;">
									</div>
									<p style="text-align: justify; line-height: normal; padding: 0 15px;"><?= $d['datosEmpresa']['descripcion'] ?? null ?></p>
								</div>

							</div>


							<div id="cardcontact" style="display:none;">
								<div class="cardpagetitle"><i class="fal fa-user-alt"></i>&nbsp; Datos de Contacto</div>
								<div class="cardpagecontent" style="margin:0 auto; max-width:700px;">

									<div style="text-align:center;"><span class="textinfo">Puedes contactar directamente pulsando el icono
											deseado.</span></div>
									<div class="details-sep" style="margin-bottom:30px;"></div>

									<?php foreach ($d['telefonos'] as $telefono) : ?>

										<div class="flexblock">
											<span class="details-title"><?= strtoupper($telefono['descripcion_tipo_telefono']) ?></span>
											<span class="details-text-noicon"><label>(<?= getPrefijo($telefono, "telefono") ?>) <?= $telefono['numero'] ?></label></span>
											<table border="0" cellpadding="0" cellspacing="0" class="subbigbuttons">
												<tr>
													<td>
														<a href="tel:<?= getPrefijo($telefono, "telefono") ?><?= $telefono['numero'] ?>">
															<i class="fas fa-mobile-alt"></i><span>Llamar</span>
														</a>
													</td>
													<?php if ($telefono['es_wsp'] === '1') : ?>
														<td>
															<a target="_blank" href="https://api.whatsapp.com/send?phone=<?= getPrefijo($telefono, "whatsapp") ?><?= formatearTelefono($telefono['numero']) ?>&text=<?= getMsgWsp($telefono) ?>">
																<i class="fab fa-whatsapp"></i><span>WhatsApp</span>
															</a>
														</td>
													<?php endif; ?>
													<?php if ($telefono['descripcion_tipo_telefono'] === 'Móvil') : ?>
														<td>
															<a href="sms:<?= getPrefijo($telefono, "telefono") ?><?= formatearTelefono($telefono['numero']) ?>">
																<i class="fal fa-comment-dots"></i><span>SMS</span>
															</a>
														</td>
													<?php endif; ?>
												</tr>
											</table>

											<div class="details-sep"></div>
										</div>
									<?php endforeach; ?>

									<?php foreach ($d['correos'] as $correo) : ?>
										<div class="flexblock">
											<span class="details-title">E-mail:</span>
											<span class="details-text-noicon"><label><?= $correo['url'] ?></label></span>

											<table border="0" cellpadding="0" cellspacing="0" class="subbigbuttons">
												<tr>
													<td><a href="mailto:<?= $correo['url'] ?>"><i class="far fa-envelope"></i><span>E-mail</span></a>
													</td>
												</tr>
											</table>

											<div class="details-sep"></div>
										</div>
									<?php endforeach; ?>

									<div style="clear:both"></div>
								</div>


							</div>


							<div id="cardvcard" style="display:none;">
								<div class="cardpagetitle"><i class="fas fa-share-square"></i>&nbsp; Compartir Tarjeta</div>
								<div class="cardpagecontent">

									<div style="width:100%; max-width:580px; margin:0 auto;">

										<div class="textinfo" style="padding-bottom:10px;">Puedes compartir esta tarjeta f&aacute;cilmente
											en cualquiera de los sistemas informados que tengas habilitados en tu dispositivo.</div>

										<table border="0" cellpadding="0" cellspacing="0" style="margin-top:5px;" class="subbigbuttons">
											<tr>
												<td><a href="javascript:openPage('viewqr')"><i class="far fa-qrcode"></i><span>C&oacute;digo
															QR</span></a></td>
											</tr>
										</table>
										<br><br>

										<span class="details-title">Compartir en sistemas de comunicaci&oacute;n:</span>
										<div style="height:5px;"></div>
										<div style="clear:both"></div>
										<a href="whatsapp://send?text=<?= getLinkCompartirWspMsg($d) ?>" target="_blank" class="iconButton" id="shareButtonWhatsapp"><i class="fab fa-whatsapp" style="background:#4dc247;"></i><span>WhatsApp</span></a><span id="shareButtonWhatsappUrl" style="display:none">https://api.whatsapp.com/send?text=<?= getLinkCompartirWspMsg($d) ?></span>

										<a href="sms:?&body=<?= getLinkCompartirWspMsg($d) ?>" target="_blank" class="iconButton"><i class="fal fa-comment-dots" style="background:#1158c2;"></i><span>SMS</span></a>

										<div style="height:20px;"></div>
										<span class="details-title">Compartir en redes sociales:</span>
										<div style="height:5px;"></div>
										<div style="clear:both"></div>
										<a href="//www.facebook.com/sharer.php?u=<?= getLinkCompartir($d) ?>&t=<?= str_replace(' ', '+', getNomApe($d)) ?>" target="_blank" class="iconButton"><i class="fab fa-facebook-f" style="background:#3b5998;"></i><span>Facebook</span></a>

										<a href="//twitter.com/share?url=<?= getLinkCompartir($d) ?>&text=<?= str_replace(' ', '+', getNomApe($d)) ?>" target="_blank" class="iconButton"><i class="fab fa-twitter" style="background:#1da1f2;"></i><span>Twitter</span></a>

										<a href="//www.linkedin.com/shareArticle?mini=true&url=<?= getLinkCompartir($d) ?>&title=<?= str_replace(' ', '+', getNomApe($d)) ?>&ro=false&summary=&source=" target="_blank" class="iconButton"><i class="fab fa-linkedin-in" style="background:#0077b5;"></i><span>LinkedIn</span></a>

										<a href="//www.google.com/bookmarks/mark?op=add&bkmk=<?= getLinkCompartir($d) ?>&title=<?= str_replace(' ', '+', getNomApe($d)) ?>" target="_blank" class="iconButton"><i class="fab fa-google-plus-g" style="background:#dc4e41;"></i><span>Google+</span></a>

										<a href="//pinterest.com/pin/create/link/?url=<?= getLinkCompartir($d) ?>&description=<?= str_replace(' ', '+', getNomApe($d)) ?>" target="_blank" class="iconButton"><i class="fab fa-pinterest-p" style="background:#cb2027;"></i><span>Pinterest</span></a>

										<div style="height:20px;"></div>
										<span class="details-title">Otros m&eacute;todos para compartir:</span>
										<div style="clear:both"></div>

										<table border="0" cellpadding="0" cellspacing="0" style="margin-top:5px;" class="subbigbuttons">
											<tr>
												<td><a href="javascript:openPage('viewcopy')"><i class="far fa-copy"></i><span>Copiar
															enlace</span></a></td>
											</tr>
										</table>

										<br><br>
										<div class="textinfo" style="padding-bottom:15px;">Puedes enviar esta tarjeta por email que incluye
											un acceso directo y un formato vCard para descarga.</div>

										<div class="flexblock">
											<table border="0" cellpadding="0" cellspacing="0" style="margin-top:5px;" class="subbigbuttons">
												<tr>
													<td><a href="javascript:openPage('sendvcard');"><i class="far fa-id-card"></i><span>Enviar por
																email</span></a></td>
												</tr>
											</table>
										</div>

										<br><br>
										<div class="textinfo" style="padding-bottom:15px;">Puedes enviar esta tarjeta por whatsapp que incluye
											un acceso directo</div>

										<div class="flexblock">
											<table border="0" cellpadding="0" cellspacing="0" style="margin-top:5px;" class="subbigbuttons">
												<tr>
													<td><a href="javascript:openPage('sendwhatsapp');"><i class="far fa-id-card"></i><span>Enviar por whatsapp</span></a></td>
												</tr>
											</table>
										</div>

										<div style="clear:both"></div>
										<div class="details-sep"></div>

										<div style="height:20px;"></div>


									</div>
								</div>
							</div>


							<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAplZ5kz6gVOe_jipDX-AWkzZNbCdzfmpY"></script>
							<script type="text/javascript">
								var mapinitialized = false;
								var myLatlng = "";
								var map = "";

								// function initializeMap() {
								// 	mapinitialized = true;
								// 	var myLatlng = new google.maps.LatLng(41.4031632, 2.1711502);
								// 	var mapOptions = {
								// 		zoom: 15,
								// 		center: myLatlng,
								// 		mapTypeId: google.maps.MapTypeId.ROADMAP
								// 	};
								// 	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
								// 	var marker = new google.maps.Marker({
								// 		position: myLatlng,
								// 		map: map,
								// 		title: ""
								// 	});
								// }
								// google.maps.event.addDomListener(window, 'load', initializeMap);
							</script>

							<div id="cardlocalization" style="display:none;">
								<div class="cardpagetitle"><i class="fal fa-map-marker-alt"></i>&nbsp; Datos de Localizaci&oacute;n
								</div>

								<div id="map-canvas" style="height:300px;border:1px solid #ddd; display: none;"></div>

								<?php foreach ($d['localizaciones'] as $localizacion) : ?>
									<div class="cardpagecontent">
										<span class="details-text" style="text-align:center;padding:0;float:none;"><b><?= $localizacion['direccion'] ?></b></span>
										<div style="clear:both"></div>
										<div style="height:25px;"></div>

										<div id="cardlocalization-map">

											<div id="map-canvas" style="height:300px;border:1px solid #ddd; display: none;"></div>

											<iframe src="<?= $localizacion['iframe'] ?>" height="450" style="border:0; width: 100%;" allowfullscreen="" loading="lazy"></iframe>
										</div>

										<table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
											<tr>
												<td style="padding:35px 0;">
													<span class="details-text" style="padding:0;">
														<a style="white-space:nowrap" class="link" href="<?= $localizacion['link'] ?>" target="_blank">
															<i class="fal fa-map-marked-alt"></i>&nbsp; Mapa de Localizaci&oacute;n</a>
													</span>
													<div style="clear:both"></div>
												</td>
											</tr>
										</table>

										<table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
											<tr>
												<td style="padding:0px 0;">
													<span class="details-text" style="padding:0;">
														<a style="white-space:nowrap" class="link" href="<?= $localizacion['link_como_llegar'] ?>" target="_blank">
															<i class="fal fa-route"></i>&nbsp; C&oacute;mo llegar</a>
													</span>
													<div style="clear:both"></div>
												</td>
											</tr>
										</table>
									</div>
								<?php endforeach; ?>

							</div>

							<div id="cardviewcopy" style="display:none;">
								<div class="cardpagetitle"><i class="far fa-copy"></i>&nbsp; Copiar enlace</div>
								<div class="cardpagecontent" style="max-width:650px; margin:0 auto;">
									<span class="textinfo" style="opacity:1;">
										Al pulsar el bot&oacute;n Copiar enlace, se copiar&aacute; en el portapapeles de tu dispositivo la
										URL de acceso a la tarjeta. Puedes usarla en cualquier correo electr&oacute;nico, navegador o
										sistema de comunicaci&oacute;n. </span>

									<div style="height:30px;"></div>

									<span class="details-title"><i class="far fa-address-card"></i> URL de acceso a la tarjeta:</span>
									<span class="details-text">
										<input id="inputCopyToClipboard" type="text" value="<?= getLinkTarjeta($d) ?>" style="color:<?= getColorApariencia($d) ?>;background:transparent;border:0;width:100%;font-weight:700;font-size:105%;padding:3px 0;" />
									</span>
									<div style="clear:both"></div>
									<div style="text-align:right;padding-top:10px;">
										<input type="button" value="Copiar enlace" class="inputbutton" onclick="copyTextToClipboard()" />
									</div>
								</div>
							</div>

							<div id="cardsave" style="display:none;">
								<div class="cardpagetitle"><i class="fal fa-save"></i>&nbsp; Guardar</div>
								<div class="cardpagecontent" style="max-width:650px; margin:0 auto;">
									<div class="textinfo" style="padding-bottom:10px;">Puedes guardar la tarjeta en la pantalla de inicio
										de tu m&oacute;vil o descargarla para a&ntilde;adirla a tus contactos.</div>
									<div class="flexblock">
										<table border="0" cellpadding="0" cellspacing="0" style="margin-top:5px;" class="subbigbuttons">
											<tr>
												<td><a href="javascript:openPage('addhomescreen')"><i class="fal fa-rocket"></i><span>A&ntilde;adir a pantalla de inicio</span></a></td>
												<td>
													<div id="linkvcarddownload"><a href="javascript:openPage('addcontact');"><i class="far fa-address-book"></i><span>A&ntilde;adir a contactos</span></a></div>
												</td>
											</tr>
										</table>
									</div>

								</div>
							</div>

							<div id="cardaddhomescreen" style="display:none;">
								<div class="cardpagetitle"><i class="fal fa-rocket"></i>&nbsp; A&ntilde;adir a pantalla de inicio</div>
								<div class="cardpagecontent" style="max-width:600px; margin:0 auto;">

									<table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto; margin-bottom:15px;" class="subbigbuttons">
										<tbody>
											<tr>
												<td><a href="javascript:openHomeScreenBlock('android')" id="btn-android"><i class="fab fa-android" style="font-size:32px"></i> <span>Android</span></a></td>
												<td><a href="javascript:openHomeScreenBlock('iphone')" id="btn-iphone"><i class="fab fa-apple" style="font-size:32px"></i> <span>iOS - iPhone</span></a></td>
												<td><a href="javascript:openHomeScreenBlock('ipad')" id="btn-ipad"><i class="fab fa-apple" style="font-size:32px"></i> <span>iOS - iPad</span></a></td>
											</tr>
										</tbody>
									</table>

									<div class="homescreenall homescreenandroid" style="display:none">
										<span class="textinfo">
											<i class="fab fa-android" style="font-size:22px"></i> <b>Android</b><br />
										</span>
										<div style="height:7px;"></div>
										<span class="textinfo">
											Para a&ntilde;adir esta tarjeta en tu m&oacute;vil Android desde el navegador web Google Chrome.
										</span>
										<br /><br />
										<table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
											<tr>
												<td style="vertical-align:top;padding-right:13px; font-size:35px">
													<i class="far fa-ellipsis-v" style="border:1px solid #eee;padding:6px 21px;border-radius:3px;"></i>
												</td>
												<td>
													<span class="textinfo">
														Pulsa &eacute;ste bot&oacute;n en la parte superior de la pantalla y selecciona la
														opci&oacute;n 'A&ntilde;adir a pantalla de inicio'. Para confirmar, deber&aacute;s presionar
														la opci&oacute;n 'A&ntilde;adir'. </span>
												</td>
											</tr>
										</table>

										<div style="padding-top:30px;">
											<a href="javascript:openModal('videoandroid')" class="link"><i class="fal fa-video"></i>&nbsp;
												Android: Ver video explicativo</a>
										</div>
									</div>
									<div class="homescreenall homescreeniphone" style="display:none">
										<span class="textinfo">
											<i class="fab fa-apple" style="font-size:22px"></i> <b>Apple iOS - iPhone</b>
										</span>
										<div style="height:7px;"></div>
										<span class="textinfo">
											Para a&ntilde;adir esta tarjeta en tu iPhone desde el navegador web Safari. </span>
										<br /><br />

										<table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
											<tr>
												<td style="vertical-align:top;padding-right:13px;">
													<img style="border:1px solid #eee;padding:9px 12px;border-radius:3px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAhCAYAAAAswACjAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OEVGMjc4OEQ0MUU3MTFFOTg2NkI5MjUwOTUxMjYwQ0IiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OEVGMjc4OEU0MUU3MTFFOTg2NkI5MjUwOTUxMjYwQ0IiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo4RUYyNzg4QjQxRTcxMUU5ODY2QjkyNTA5NTEyNjBDQiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4RUYyNzg4QzQxRTcxMUU5ODY2QjkyNTA5NTEyNjBDQiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PoEcAWkAAAHsSURBVHja7FbNLgRBEK7qnSA2Es+wCUKEC3F0wcFPIpHgIO5ewWN4BImLi4u9OCHYbESCG+EgEpFwEIv4yU77urOYsd0z0zPrpjbfdk11d33dVd01w7QsyUG6iWmFJC1Bvwj1yBq+RBjVWOkCwRbakVpbSDoxKUkPHO+g/QAeAcZvF21Ho0h64fAAoTgG5vHcTD7NQL/UdqLOrCR9cLQPh0fAOPQn2JqABxCNwnYGW0nnKiXJIByU4agEh4rAD4zP4fkdljH0n0I/hK3fnYQpDwcbcDQN/Q0wyQv6J9EW9fifuSHxrCSStjUMk0JL9OkZmNM6m8d6kRlh+8RvuwjcE8tiPHRMoB2KoGoB1oATQ98A5s+ifbXGg6isdqIGLeLx3DKwDdjTJFx3wwuwLUCrWCKhjveqImkFrvWN9h3PoaR1DXuob/GfFyEnIiY3SeXXeFG3WuFw0DnZgoTRoXCoCRy/Y88af44+lkYi6xEmh1Ak3VHKUp9J/kmcJLpA1leAKyR4CqfuxiXx8VU4TFSBreh6EkVDgslZcyKyESQjYcsojimqiXMiAw5zgTIjDDVLptmJdKxRzmVFprwQnJREZrx5HEciG3TFDd9dVfUeBsFwihetPaOs/ajvh6oiuQfagc0/KFuK5O5TgAEAR/Fhv00k508AAAAASUVORK5CYII=" />
												</td>
												<td>
													<span class="textinfo">
														Pulsa &eacute;ste bot&oacute;n en la parte inferior central de la pantalla y selecciona la
														opci&oacute;n 'A&ntilde;adir a pantalla de inicio'. Para confirmar, deber&aacute;s presionar
														la opci&oacute;n 'A&ntilde;adir'. </span>
												</td>
											</tr>
										</table>

										<div style="padding-top:30px;">
											<a href="javascript:openModal('videoiphone')" class="link"><i class="fal fa-video"></i>&nbsp;
												iPhone: Ver video explicativo</a>
										</div>
									</div>
									<div class="homescreenall homescreenipad" style="display:none">
										<span class="textinfo">
											<i class="fab fa-apple" style="font-size:22px"></i> <b>Apple iOS - iPad</b>
										</span>
										<div style="height:7px;"></div>
										<span class="textinfo">
											Para a&ntilde;adir esta tarjeta en tu iPad desde el navegador web Safari. </span>
										<br /><br />

										<table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto;">
											<tr>
												<td style="vertical-align:top;padding-right:13px;">
													<img style="border:1px solid #eee;padding:9px 12px;border-radius:3px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAhCAYAAAAswACjAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OEVGMjc4OEQ0MUU3MTFFOTg2NkI5MjUwOTUxMjYwQ0IiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OEVGMjc4OEU0MUU3MTFFOTg2NkI5MjUwOTUxMjYwQ0IiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo4RUYyNzg4QjQxRTcxMUU5ODY2QjkyNTA5NTEyNjBDQiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4RUYyNzg4QzQxRTcxMUU5ODY2QjkyNTA5NTEyNjBDQiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PoEcAWkAAAHsSURBVHja7FbNLgRBEK7qnSA2Es+wCUKEC3F0wcFPIpHgIO5ewWN4BImLi4u9OCHYbESCG+EgEpFwEIv4yU77urOYsd0z0zPrpjbfdk11d33dVd01w7QsyUG6iWmFJC1Bvwj1yBq+RBjVWOkCwRbakVpbSDoxKUkPHO+g/QAeAcZvF21Ho0h64fAAoTgG5vHcTD7NQL/UdqLOrCR9cLQPh0fAOPQn2JqABxCNwnYGW0nnKiXJIByU4agEh4rAD4zP4fkdljH0n0I/hK3fnYQpDwcbcDQN/Q0wyQv6J9EW9fifuSHxrCSStjUMk0JL9OkZmNM6m8d6kRlh+8RvuwjcE8tiPHRMoB2KoGoB1oATQ98A5s+ifbXGg6isdqIGLeLx3DKwDdjTJFx3wwuwLUCrWCKhjveqImkFrvWN9h3PoaR1DXuob/GfFyEnIiY3SeXXeFG3WuFw0DnZgoTRoXCoCRy/Y88af44+lkYi6xEmh1Ak3VHKUp9J/kmcJLpA1leAKyR4CqfuxiXx8VU4TFSBreh6EkVDgslZcyKyESQjYcsojimqiXMiAw5zgTIjDDVLptmJdKxRzmVFprwQnJREZrx5HEciG3TFDd9dVfUeBsFwihetPaOs/ajvh6oiuQfagc0/KFuK5O5TgAEAR/Fhv00k508AAAAASUVORK5CYII=" />
												</td>
												<td>
													<span class="textinfo">
														Pulsa &eacute;ste bot&oacute;n en la parte superior derecha de la pantalla y selecciona la
														opci&oacute;n 'A&ntilde;adir a pantalla de inicio'. Para confirmar, deber&aacute;s presionar
														la opci&oacute;n 'A&ntilde;adir'. </span>
												</td>
											</tr>
										</table>

										<div style="padding-top:30px;">
											<a href="javascript:openModal('videoipad')" class="link"><i class="fal fa-video"></i>&nbsp; iPad:
												Ver video explicativo</a>
										</div>
									</div>

								</div>
							</div>

							<div id="cardviewqr" style="display:none;">
								<div class="cardpagetitle"><i class="fal fa-qrcode"></i>&nbsp; C&oacute;digo QR gen&eacute;rico</div>
								<div class="cardpagecontent" style="max-width:400px; margin:0 auto;">
									<span class="textinfo">
										Usa la c&aacute;mara de tu smartphone o un lector de QR para acceder a la tarjeta digital. </span>

									<div style="text-align:center;padding-top:15px;">
										<?= getQr($d) ?> <br>
									</div>
								</div>
							</div>

							<div id="cardaddcontact" style="display:none;">
								<div class="cardpagetitle"><i class="far fa-address-book"></i>&nbsp; A&ntilde;adir a contactos</div>
								<div class="cardpagecontent" style="max-width:400px; margin:0 auto;">
									<span class="textinfo">
										Descarga la vCard si quieres a&ntilde;adir los datos de esta tarjeta a tus contactos en cualquier
										dispositivo. </span>
									<div style="height:25px;"></div>
									<div class="flexblock">
										<table border="0" cellpadding="0" cellspacing="0" style="margin-top:5px;" class="subbigbuttons">
											<tr>
												<td>
													<div id="linkvcarddownload"><a href="javascript:actionDownloadvCard();"><i class="fal fa-arrow-to-bottom"></i><span>A&ntilde;adir a contactos</span></a></div>
												</td>
											</tr>
										</table>
									</div>

									<br /><br /><br />
									<span class="details-title"><b>QR VCard</b></span>
									<br /><br />
									<span class="textinfo">
										Lee el QR con tu m&oacute;vil para a&ntilde;adir los datos del titular de la tarjeta en tus
										contactos. </span>

									<br /><br />

									<?= $qrVcardImg ?>

								</div>
							</div>

							<div id="cardsendvcard" style="display:none;">
								<div class="cardpagetitle"><i class="far fa-id-card"></i>&nbsp; Enviar por email</div>
								<div class="cardpagecontent" style="max-width:500px; margin:0 auto;">
									<form name="sendvcard" id="formajx" method="post" action="">
										<div style="font-size:120%;line-height:120%;padding-bottom:30px;">
											Completa la direcci&oacute;n de correo electr&oacute;nico para enviar un acceso a la tarjeta y la
											vCard por email: </div>
										<table border="0" cellpadding="0" cellspacing="0" style="margin:0 auto">
											<tr>
												<td style="vertical-align:top;padding-top:7px;">
													<span style="font-size:115%;font-weight:bold;white-space:nowrap;">E-mail:</span>
												</td>
												<td style="padding-left:7px;">
													<input type="hidden" name="slugUsuario" value="<?= $d['datosUsuario']['slug'] ?>">
													<input name="emailDestino" type="text" id="sendvcardemail" class="inputfield" />
													<div id="sendvcardemailerror" style="border-radius:2px;display:none;background:#c3140f;color:#ffffff;margin-top:5px;padding:5px 10px;"></div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td style="text-align:right;padding-top:12px;">
													<button type="submit" class="inputbutton" id="btnEnviarEmail">
														Enviar
														<img src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" id="loadingSpinnerImg" style="width: 18px; display: none;">
													</button>
												</td>
											</tr>
										</table>
									</form>
								</div>
							</div>



							<div id="cardsendwhatsapp" style="display:none;">
								<div class="cardpagetitle"><i class="far fa-id-card"></i>&nbsp; Enviar por Whatsapp</div>
								<div class="cardpagecontent" style="max-width:500px; margin:0 auto;">
									<p>Enviar por número de wsp</p>
									<form id="frmSendCardWsp">
										<input type="tel" class="inputfield" id="inputNumeroWsp">
										<p>Ej: (+51 000 000 000)</p>
										<div style="text-align: right; margin-top: 10px;">
											<button type="submit" class="inputbutton" id="btnEnviarMsgWsp">Enviar</button>
										</div>
									</form>
								</div>
							</div>


							<div id="poweredfooter">

								<div id="poweredbybox" style="text-align:right; color:rgba(0,0,0,0.50);font:normal 9px Arial,sans-serif;">

									<div id="infobutton-content" style="display:none;">
										<div style="padding:5px 7px 13px 7px; color:rgba(0,0,0,0.60);">
											tarjetaspot.com no se responsabiliza necesariamente de los contenidos a los que se pueda acceder a
											trav&eacute;s de este servicio. La organizaci&oacute;n que contrat&oacute; nuestros servicios y en
											su caso el titular del mismo son los que tiene exclusiva responsabilidad sobre lo que publican o
											enlazan. </div>
									</div>
									<div style="padding-top:10px; background:rgba(0,0,0,0.05);padding: 6px 10px; border-radius:3px;">

										desarrollado por
										<!-- <a href="https://businesscard.bhybrid.com" target="_blank"
											style="color:rgba(0,0,0,0.70);font-weight:bold;font-size:12px;text-decoration:none;"><img
												src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFMAAAAUCAYAAADx7wHUAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAvtJREFUeNrsWOFxm1AMpr78zxuBTlA2KBuYTlC6gTNByASuJyCZAHsCyARmA9gAPAGBnt7dZ52eeLZp75qz7t45gJ6kJ+mT9PIluJNG8bWbmnGlHrz5uMpxRQsaXS4kc7JtGFc2wxeRvok3VGQl4zJMtrRy3JjBh9Dj4AP9LunMSWZxg4wUzhB76hsUWSgjURy54ZuzCww5zhhyDXULyMwvOMMwo49nduOTkZaKBQ25hv6GTBeFoKv0cGbkcGQDJWD6LVfwIEHAQi/2cEJDkTIsexOHsYOjvqHMDmQibZiOzBGQlPFZOy8hVx1/GVdvHYk+apSaYFdEG+b4juxwEhQa5mwfmVKZkZzZeTQMu7YOR20dgec6zpJvBalvqaLVMgXPV0YyEZ6tvleKrqUW9PdMZkoL5feCrTUFPRX4OO/JYyTqhe8V2BW74HoUhGI0UgWeW5aNLqiXLNs1yBfsW+noojGrg4WCjEzrxFBTQ6VmZlLWPhBzBVENhCyVosIz9wDGTYa8QRatx7WH2mczpGb6W6EuGfj2CN9ehcwLSO8anl+UzKoczrRI/EU2to6R8RsiYsU+nhT49qwR1Apvyw6bQOOwtBNKTO04mFRCeqW0GGYL0uMMhI0wa+5mSttvSqYziORCfUP4lMoIJcG1YJDqtAIuyMzZfqkBcN2JMmoZzxlTGn9KNuFY3o54tivBeQn8/cxgHCgRD4SIH1gDMwJEa8YTUUZuWBNplQz+rmTbhoIUs2TZe86kJdn9A8pCTO/20ERP0g1kcIwCZuamIt1AjENe6HlVQ8TEyrDNm1rhITP2uGpiY44gOB1rlmfTQzrjyMjjpuKCayFcArRASAcxzOnZzHU0nEmQ1PPeLgU1JHtSqNd/LhYPALsJRj9Z1hwgjY3S9fm7msnA0ehN2Dt1zXfqwgbgeoCSYJSuXwsl6CsdeA3v3+GsWomqFNjnJMfWzIn/ydHMFqfohqvcf0Wrf/wP1l1wp5uoYE3snpk30AFGkf4zO/NDgAEAGoDXCVbhUfgAAAAASUVORK5CYII="
												width="83" height="20" border="0" title="BHybrid"
												style="opacity:0.50; vertical-align:middle;padding-left:2px;padding-right:2px;" /></a> -->

										<a href="http://tarjetaspot.com/" style="color:rgba(0,0,0,0.70);font-weight:bold;font-size:12px;text-decoration:none;">tarjetaspot.com</a>
										&nbsp;&nbsp;&nbsp;
										<span id="infobuttonblock" class="cursorhand"><i class="fas fa-info" id="infobutton" style="color:rgba(0,0,0,0.40);border:1px solid rgba(0,0,0,0.11);padding:8px 12px;border-radius:3px;"></i></span>


									</div>
								</div>





							</div>

						</td>
					</tr>
				</table>

			</div>


		</div>
	</div>


	<div id="cardfooterbar">
		<div id="cardfooterbar-inside">
			<table border="0" cellpadding="0" cellspacing="0" class="footerbuttons">
				<tr>
					<td><a href="javascript:openPage('contact')" aria-label="Contactar" style="color:#fff;"><i class="fal fa-user-alt"></i><span>Contactar</span></a></td>
					<td><a href="javascript:openPage('localization')" aria-label="Localizaci&oacute;n" style="color:#fff;"><i class="fal fa-map-marker-alt"></i><span>Localizaci&oacute;n</span></a></td>
					<td><a href="javascript:openPage('video')" aria-label="Video" style="color:#fff;"><i class="fal fa-video"></i><span>Video</span></a></td>
					<td><a href="javascript:openPage('publication')" aria-label="Publicaciones" style="color:#fff;"><i class="fal fa-book-open"></i><span>Publicaciones</span></a></td>
					<td><a href="javascript:openPage('securecontent')" aria-label="Empresa" style="color:#fff;"><i class="far fa-hospital"></i><span>Empresa</span></a></td>
				</tr>
			</table>
		</div>
	</div>

	</div>
	</div>



	<div class="modal" id="modal" style="display:none;">
		<div class="modal-content">
			<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width:100%; padding:5px 5px 10px 5px;">
						<div id="modal-title"></div>
					</td>
					<td style="padding:5px;">
						<a href="javascript:closeModal()" style="font-size:25px;"><i class="fal fa-times"></i></a>
					</td>
				</tr>
			</table>
			<div id="modal-div">
			</div>
			<div>
			</div>

			<script type="text/javascript">
				$(document).ready(function() {
					$("#cardecologydatacontent").html('<div style="max-width:500px;margin:0 auto;"><div class="grid-wrap" style="border-bottom:1px solid #9ec41c;"><div class="grid-col col-two-thirds" style="padding-top:30px; padding-bottom:10px; padding-left:40px; "><table border="0" cellpadding="0" cellspacing="0"><tr><td style="padding-left:10px;width:35px;text-align:center;"><i class="fal fa-thermometer-three-quarters" style="font-size:55px;opacity:0.6;"></i></td><td style="padding-left:15px;font-size:15px;"><div style="font-size:25px;padding-bottom:8px;">121,88</div>gr de CO2</td></tr></table><div style="padding-left:10px;padding-top:8px;text-transform:uppercase;font-size:11px;line-height:14px; padding-bottom:5px;">Reducci&oacute;n del efecto invernadero</div></div><div class="grid-col col-one-third" style="padding-top:25px; padding-left:40px;"><img src="//d3cwdr4mx7w8ca.cloudfront.net/external/images/ods/ods_n13_es.jpg" style="float:right; width:100%; max-width:111px;" /></div></div><div class="grid-wrap" style="border-bottom:1px solid #9ec41c;"><div class="grid-col col-two-thirds" style="padding-top:30px; padding-bottom:10px; padding-left:40px;"><table border="0" cellpadding="0" cellspacing="0"><tr><td style="padding-left:10px;width:35px;text-align:center;"><i class="fal fa-tree-alt" style="font-size:55px;opacity:0.6;"></i></td><td style="padding-left:15px;font-size:15px;"><div style="font-size:25px;padding-bottom:8px;">127,56</div>gr de madera</td></tr></table><div style="padding-left:10px;padding-top:8px;text-transform:uppercase;font-size:11px;line-height:14px; padding-bottom:5px;">Evitar la tala de &aacute;rboles</div></div><div class="grid-col col-one-third" style="padding-top:25px; padding-left:40px;"><img src="//d3cwdr4mx7w8ca.cloudfront.net/external/images/ods/ods_n15_es.jpg" style="float:right; width:100%; max-width:111px;" /></div></div><div class="grid-wrap" style="border-bottom:1px solid #9ec41c;"><div class="grid-col col-two-thirds" style="padding-top:30px; padding-bottom:10px; padding-left:40px;"><table border="0" cellpadding="0" cellspacing="0"><tr><td style="padding-left:10px;width:35px;text-align:center;"><i class="fal fa-tint" style="font-size:55px;opacity:0.6;"></i></td><td style="padding-left:15px;font-size:15px;"><div style="font-size:25px;padding-bottom:8px;">6,09</div>litros de agua</td></tr></table><div style="padding-left:10px;padding-top:8px;text-transform:uppercase;font-size:11px;line-height:14px; padding-bottom:5px;">Evitar el consumo de agua</div></div><div class="grid-col col-one-third" style="padding-top:25px; padding-left:40px;"><img src="//d3cwdr4mx7w8ca.cloudfront.net/external/images/ods/ods_n6_es.jpg" style="float:right; width:100%; max-width:111px;" /></div></div><div class="grid-wrap" style="border-bottom:1px solid #9ec41c;"><div class="grid-col col-two-thirds" style="padding-top:30px; padding-bottom:10px; padding-left:40px;"><table border="0" cellpadding="0" cellspacing="0"><tr><td style="padding-left:10px;width:35px;text-align:center;"><i class="fal fa-gas-pump" style="font-size:55px;opacity:0.6;"></i></td><td style="padding-left:15px;font-size:15px;"><div style="font-size:25px;padding-bottom:8px;">0,04</div>litros de petr&oacute;leo</td></tr></table><div style="padding-left:10px;padding-top:8px;text-transform:uppercase;font-size:11px;line-height:14px; padding-bottom:5px;">Evitar el consumo de petr&oacute;leo</div></div><div class="grid-col col-one-third" style="padding-top:25px; padding-left:40px;"><img src="//d3cwdr4mx7w8ca.cloudfront.net/external/images/ods/ods_n12_es.jpg" style="float:right; width:100%; max-width:111px;" /></div></div></div><div style="font-size:12px; line-height:15px;padding-top:22px;font-style:italic;">Datos referenciales estimados en base a la entrega de 1 tarjeta y las publicaciones asociadas, en formato papel.</div><div style="padding-top:40px;padding-bottom:15px;"><span class="textinfo">La suma de peque&ntilde;os detalles nos ayuda a contribuir con la sostenibilidad del planeta.</span><div style="height:10px;"></div><span class="textinfo">&iquest;Quieres que te ayudemos a generar buenas pr&aacute;cticas en tu organizaci&oacute;n?<div style="height:5px;"></div>&iquest;Quieres demostrar tu implicaci&oacute;n con los objetivos de desarrollo sostenible?</span></span><div style="padding-top:27px;"><a href="https://businesscard.bhybrid.com/es/form/h/Contactar" target="_blank" class="link"><i class="fal fa-arrow-square-right"></i>&nbsp; Solicitar informaci&oacute;n</a></div></div>');
				});
			</script>


			<script type="text/javascript" src="//stats.bhybrid.com/stats/cardstatsjs.php?id=cc397184-1109&csc=1"></script>
			<noscript><img src="//stats.bhybrid.com/stats/cardstatsjs.php?t=nojs&id=cc397184-1109&csc=1" alt="stats" title="stats" /></noscript>


			<script src="<?= base_url('js/API/EnviarEmailAPI.js') ?>"></script>
			<script>
				const BASE_URL = '<?= base_url() ?>';
			</script>

</body>

</html>