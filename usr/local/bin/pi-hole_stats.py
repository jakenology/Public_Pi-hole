#!/usr/bin/env python
# Public Pi-hole Status 
#import pihole as ph

password = "MiloMittens2015!"
domain = "pi-hole4all.net"

resolvers = {
    "master": "red",
    "slaves": [
        "orange", 
        "yellow"
    ]
}

master = ''
slaves = []

def getHostnames():
    # Master Pi-hole
    master = '.'.join([(resolvers['master']), domain])

    # Slave Pi-holes
    for slave in resolvers['slaves']:
        hostname = '.'.join([slave, domain])
        slaves.append(hostname)

getHostnames()

pihole.refresh()
pihole.getquer
