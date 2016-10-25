#!/bin/bash

git clone https://github.com/oc4d/secret.git

node setdev.js

rm -fr secret

cd ..

docker-compose up
