# Running the wiki locally

You may have to create a docker volume for MySQL first:

    docker volume create mysql-data

To start the services, just run this command inside the `wiki` directory:

    docker-compose up
