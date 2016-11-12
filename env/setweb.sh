#!/bin/bash

# Default to development environment
: ${ENVIRONMENT:=DEV}

case $ENVIRONMENT in
    DEV)
        export WEB_PORT=8090 && COMPOSE_PARAMS=''
        ;;
    PRODUCTION)
        export WEB_PORT=80 && COMPOSE_PARAMS='-d'
        ;;
    *)
        >&2 echo "Unknown environment: $ENVIRONMENT"
        exit 127
        ;;
esac

echo "Running environment: $ENVIRONMENT"
