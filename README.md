# OC4D Web portal repo

# Dev dependencies

You need to install the following tools in your development environment:
* docker
* docker-compose

# Production dependencies

* docker
* docker-compose
* node

# Running the services

In development, simply run:

    ./start.sh

In production and other environments, run:

    ENVIRONMENT=PRODUCTION ./start.sh

* By default, the containers will run detached in production, and attached to the current terminal in development.

In production, to continually view the logs when the containers are running detached, run:

    ENVIRONMENT=PRODUCTION ./logs.sh

# Stopping the services

In development, go to your bash terminal window, where the running containers are attached, and press 'ctrl + C'

In production and other environments run:

    ENVIRONMENT=PRODUCTION ./stop.sh

# Re-building the services

In development, simply run:

    ./build.sh

In production and other environments, run:

    ENVIRONMENT=PRODUCTION ./build.sh
