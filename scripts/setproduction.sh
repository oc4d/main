#!/bin/bash

git clone https://github.com/oc4d/secret.git

node setproduction.js

rm -fr secret

cd ..

docker-compose up