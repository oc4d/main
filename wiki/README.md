# Running the wiki locally

You may have to create a docker volume for MySQL first:

    docker volume create mysql-data

To start the services, just run this command inside the `wiki` directory:

    docker-compose up

To view the wiki page locally on mac:

In another terminal window, inside the `wiki` directory, connect to 
the running docker-machine and then list its IP address:

    docker-machine env
    eval $(docker-machine env)

Locate the IP address in the DOCKER_HOST variable. Enter this IP address in 
your browser, followed by port 8080. Eg:

    192.168.99.100:8080
