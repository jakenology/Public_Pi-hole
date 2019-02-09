<!DOCTYPE HTML>
<html lang="EN">
    <head>
        <title>Pi-hole4All Statistics</title>
        <!-- JQUERY -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style>
            body {
                font-family: 'Arial';
                background-color: gray;
                color: white;
                text-shadow: 1px black;
            }
            #header {
                text-align: center;
                color: red;
            }
            .data {
                color: black;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <h1 id="header">Pi-hole4All Statistics</h1>
        <p><strong>Ads Blocked Today: </strong><span class="data" id="ads_blocked_today"></span></p>
        <p><strong>DNS Queries Today: </strong><span class="data" id="dns_queries_today"></span></p>
        <p><strong>Ads Percentage Today: </strong><span class="data" id="ads_percentage_today"></span></p>

        <!-- THE MAGIC -->
        <script>
        // Global Variables
        var response;

        // Text Setter
        function setText(id,newvalue) {
            var s = document.getElementById(id);
            s.innerHTML = newvalue;
        }  

        function apiData() {
            $.getJSON("https://www.pi-hole4all.net/api.php",function(data){
                response = data;
                dataReady();
            });
        }

        function formatData(data) {
            function formatNumber(number) {
                formattedNumber = number.toLocaleString('en')
                return formattedNumber;
            }

            ads_blocked_today = formatNumber(data.ads_blocked_today);
            dns_queries_today = formatNumber(data.dns_queries_today);
            ads_percentage_today = formatNumber(data.ads_percentage_today * 100);
            ads_percentage_today = Math.round(10*ads_percentage_today)/10 + '%';
        }

        function dataReady() {
            formatData(response);
            setText("ads_blocked_today", ads_blocked_today);
            setText("dns_queries_today", dns_queries_today);
            setText("ads_percentage_today", ads_percentage_today);
        }

        window.setInterval(function(){
            apiData(); 
        }, 500);

        window.onload=function() {
            apiData();
        }
        </script>
    </body>
</html>
