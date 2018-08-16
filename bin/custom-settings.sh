#!/bin/bash
# Pi-hole on Google Cloud Platform Enhancement Script 
# Last Modified by JP on 16 August, 2018
# Set Global Variables
myhostname=$(cat /etc/UniPi/hostname)

# Force nameservers and not Google's by deleting /etc/resolv.conf
/bin/rm -rf /etc/resolv.conf

# Set the hostname
/usr/bin/hostnamectl set-hostname $myhostname
