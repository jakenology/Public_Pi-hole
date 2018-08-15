#!/bin/bash
# Pi-hole on Google Cloud Platform Enhancement Script 
# PGCPES
# Last Modified by JP on 1 August, 2018
# Force nameservers and not Google's by deleting /etc/resolv.conf
/bin/rm -rf /etc/resolv.conf

# Set the hostname
/usr/bin/hostnamectl set-hostname dns-a.jpits.us
