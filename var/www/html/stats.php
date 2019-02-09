<!DOCTYPE html>
<html lang="EN">
    <head>
        <title>Pi-hole4All Statistics</title>
        <!-- JQUERY -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style>
            body {
                font-family: 'Arial';
            }
            #header {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1 id="header">Pi-hole4All Statistics</h1>
        <p><h1>Ads Blocked Today: </h1><span id="dns_queries_today"></span></p>
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
        }

        function dataReady() {
            formatData(response);
            setText("dns_queries_today", ads_blocked_today)
        }

        window.setInterval(function(){
            /// call your function here
            apiData();
        }, 1000);

        window.onload=function() {
            apiData();
        }
        </script>
    </body>
</html>
