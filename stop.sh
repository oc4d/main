#!/bin/bash

# Default to development environment
: ${ENVIRONMENT:=DEV}

COMPOSE_PARAMS=''

case $ENVIRONMENT in
    DEV)
        VAR_FILE='dev.sh'
        ;;
    PRODUCTION)
        VAR_FILE='production.sh'
        COMPOSE_PARAMS='-d'
        ;;
    *)
        >&2 echo "Unknown environment: $ENVIRONMENT"
        exit 127
        ;;
esac

echo "Running environment: $ENVIRONMENT"

source "env/$VAR_FILE"

docker-compose stop
