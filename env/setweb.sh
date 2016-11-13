#!/bin/bash

# Default to development environment
: ${ENVIRONMENT:=DEV}

case $ENVIRONMENT in
    DEV)
        source "env/dev.sh"
        ;;
    PRODUCTION)
        source "env/production.sh"
        ;;
    *)
        >&2 echo "Unknown environment: $ENVIRONMENT"
        exit 127
        ;;
esac

echo "Running environment: $ENVIRONMENT"
