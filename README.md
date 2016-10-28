# OC4D Web portal repo

# Dev dependencies

You need to install the following tools in your development environment:
* docker
* docker-compose

# Running the services

In development, simply run:

    ./start.sh

In production and other environments, run:

    ENVIRONMENT=PRODUCTION ./start.sh

* By default, the containers will run detached in production, and attached to the current terminal in development.

To stop the containers:

    docker-compose stop

To continually view the logs when the containers are running detached, run:

    docker-compose logs -f
