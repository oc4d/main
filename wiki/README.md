# Running the wiki locally

## Starting up the containers

You may have to create a docker volume for MySQL first:

    docker volume create mysql-data

To start the services, just run this command inside the `wiki` directory:

    docker-compose up

## Accessing the wiki

On Linux, you should be able to just go to http://127.0.0.1:8080

To view the wiki page locally on a Mac or Windows:

In another terminal window, inside the `wiki` directory, connect to
the running docker-machine and list its env variables:

    docker-machine env

Locate the IP address in the DOCKER_HOST variable. Enter this IP address in
your browser, followed by port 8080. Eg:

    192.168.99.100:8080

## Initializing the database

When running the wiki for the first time, you'll have an empty database. If you try to access the site
when the database is empty, you'll see an error like this:

    Sorry! This site is experiencing technical difficulties.
    Try waiting a few minutes and reloading.
    (Cannot contact the database server)

To initialize the database, go through the installation wizard by opening http://127.0.0.1:8080/mw-config/
and following the wizard prompts:
* Paste the upgrade key from `$wgUpgradeKey` in LocalSettings.php (in this repo) when prompted
* Leave db settings to defaults
* Set site name and admin login and password to whatever you want
* Select "I'm bored already, just install the wiki." at the end