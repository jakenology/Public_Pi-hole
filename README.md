# UniPi | Universal Pi-hole Settings
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
