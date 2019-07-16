# Public Pi-hole Project
# HELP WANTED/COLLABORATION/COMANAGEMENT
# piholeadmins@bluejayit.com

# Making Pi-hole available to all...

# Custom Features
* Google SafeSearch and Bing Strict Search Options Enforced
* OpenDNS to block adult content, academic dishonesty, proxies & VPN, etc. 
* DNS Amplification attack protection

# Public Pi-hole A (OUT OF SERVICE)
#### Provider:	Google Cloud Platform
#### Location:	Council Bluffs, Iowa, U.S.A.
#### OLD IP Addr.:	35.188.83.81

# Public Pi-hole B (NextGen Production)
#### Provider: Amazon Lightsail
#### Location: Ohio, U.S.A.
#### IP Addr.: 18.224.127.179
#### Statistics:    http://red.pi-hole4all.net/admin

## I can not guarantee 100% uptime, but if you encounter any issue or need something whitelisted, please email me at support@jpits.us and I will get back to you A.S.A.P.


### INSTALLATION(S)
## IPTABLES PERSISTENT
# 1. apt update
# 2. apt install iptables-persistent
# 3. systemctl enable netfilter-persistent
# 4. Add your rules
# 5. invoke-rc.d netfilter-persistent save
## COUNTRY BLOCKING
# https://www.vultr.com/docs/easy-iptables-configuration-and-examples-on-ubuntu-16-04
# There's an issue, yes, we know. Go here: https://legacy-geoip-csv.ufficyo.com/
# The command is: wget -q https://legacy-geoip-csv.ufficyo.com/Legacy-MaxMind-GeoIP-database.tar.gz -O - | tar -xvzf - -C /usr/share/xt_geoip
###

## ONLY ALLOW "GOOD" COUNTRIES

## BLOCK ALL OTHER COUNTRIES

## ALLOW ALL FROM VPC NETWORK

## ALLOW ALL FROM CLOUDFLARE CDN

## BLOCK ALL OTHERS 
iptables -A INPUT -s 0.0.0.0/0 -j DROP

## DNS AMPLIFICATION ATTACKS
iptables -A INPUT -p udp --dport 53 -m string --from 40 --algo bm --hex-string '|0000FF0001|' -m recent --set --name dnsanyquery 
iptables -A INPUT -p udp --dport 53 -m string --from 40 --algo bm --hex-string '|0000FF0001|' -m recent --name dnsanyquery --rcheck --seconds 60 --hitcount 3 -j DROP
iptables -A INPUT -p tcp --dport 53 -m string --from 52 --algo bm --hex-string '|0000FF0001|' -m recent --set --name dnsanyquery 
iptables -A INPUT -p tcp --dport 53 -m string --from 52 --algo bm --hex-string '|0000FF0001|' -m recent --name dnsanyquery --rcheck --seconds 60 --hitcount 3 -j DROP
