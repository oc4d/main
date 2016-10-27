#!/bin/bash

# Default to development environment
: ${ENVIRONMENT:=DEV}

case $ENVIRONMENT in
    DEV)
        INCLUDE_FILE='dev.sh'
        ;;
    PRODUCTION)
        INCLUDE_FILE='production.sh'
        ;;
    *)
        >&2 echo "Unknown environment: $ENVIRONMENT"
        exit 127
        ;;
esac

echo "Running environment: $ENVIRONMENT"

source "env/$INCLUDE_FILE"

docker-compose up
