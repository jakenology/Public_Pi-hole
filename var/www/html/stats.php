<!DOCTYPE html>

<html lang="EN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pi-hole4All Statistics</title>

<script src="/cdn-cgi/apps/head/Su1KxO5nDlzWVA1tOazKmHbaEBo.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
        html {
	    background: url(background.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover
        }
        
        body {
            font-family: 'Arial';
            color: red;
            text-shadow: 1px black
        }
        
        #header {
            text-align: center;
            color: red;
            text-shadow: 1px 2px white
        }
        
        .data {
            color: #fff;
            font-weight: bold
        }
    </style>
</head>
<body>
<h1 id="header">Pi-hole4All Statistics</h1>
<div id="stats">
<p><strong>Ads Blocked Today: </strong><span class="data" id="ads_blocked_today"></span></p>
<p><strong>DNS Queries Today: </strong><span class="data" id="dns_queries_today"></span></p>
<p><strong>Ads Percentage Today: </strong><span class="data" id="ads_percentage_today"></span></p>
</div>

<script>
        var response;
        function setText(id, newvalue) {
            var s = document.getElementById(id);
            s.innerHTML = newvalue;
        }
        function apiData() {
            $.getJSON("https://api.pi-hole4all.net/", function(data) {
                response = data;
                dataReady();
            });
        }
        function formatData(data) {
            function formatNumber(number) {
                formattedNumber = number.toLocaleString('en');
                return formattedNumber;
            }
            ads_blocked_today = formatNumber(data.ads_blocked_today);
            dns_queries_today = formatNumber(data.dns_queries_today);
            ads_percentage_today = Math.round(10 * data.ads_percentage_today) / 10 + '%';
        }
        function dataReady() {
            formatData(response);
            setText("ads_blocked_today", ads_blocked_today);
            setText("dns_queries_today", dns_queries_today);
            setText("ads_percentage_today", ads_percentage_today);
        }
        window.setInterval(function() {
            apiData();
        }, 500);
        window.onload = function() {
            apiData();
        }
    </script>
</body>
</html>
