# UniPi | Universal Pi-hole Settings
# Install
To install UniPi Updater, please issue the following command on your system. Please check the code to make sure it was not tampered with at the time of execution. 
```bash
$ curl -sSL https://raw.githubusercontent.com/jaykepeters/UniPi/master/Install/install.sh | bash
```
# Directory Tree Structure (For Development)
```
├── cron
│   └── jobs.crontab
├── etc
│   ├── cron.monthly
│   │   └── geoip-updater
│   ├── crontab
│   ├── dnsmasq.conf
│   ├── dnsmasq.d
│   │   └── 05-restrict.conf
│   ├── dnsmasq.hosts
│   ├── fail2ban
│   │   ├── filter.d
│   │   │   └── iptables-dns.conf
│   │   └── jail.local
│   ├── iptables.conf
│   ├── lighttpd
│   │   └── external.conf
│   ├── pihole
│   │   ├── blacklist.txt
│   │   ├── pihole-FTL.conf
│   │   ├── regex.list
│   │   └── whitelist.txt
│   ├── ssh
│   │   ├── banner
│   │   └── sshd_config
│   └── UniPi
│       ├── downloads
│       └── packages
├── Install
│   └── install.sh
├── LICENSE
├── README.md
├── usr
│   └── local
│       └── bin
│           ├── crontab.sh
│           ├── fix-apt
│           ├── restart-cron
│           ├── speedtest-cli
│           └── UniPi
└── var
    └── www
        └── html
            ├── gcping.php
            ├── phpinfo.php
            ├── services
            │   └── index.php
            └── status.php
```
Pi-hole | Network-wide ad blocking via your own Linux hardware

# Custom Features
* Google SafeSearch and Bing Strict Search Options Enforced
* OpenDNS to block adult content, academic dishonesty, proxies & VPN, etc. 
* DNS Amplification attack protection

# Public Pi-hole A (Production)
#### Provider:	Google Cloud Platform
#### Location:	Council Bluffs, Iowa, U.S.A.
#### IP Addr.:	35.188.83.81
#### Statistics:	http://pi-hole.jpits.us/admin

# Public Pi-hole B (Production)
#### Provider: Amazon Lightsail
#### Location: Ohio, U.S.A.
#### IP Addr.: 18.224.127.179
#### Statistics:    http://red.pi-hole4all.net

## Note to Users:	This service is provided “as-is”  and we cannot guarantee 100% uptime. To report a problem, please visit https://support.jpits.us
