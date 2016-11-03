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

if [ $ENVIRONMENT != "DEV" ]; then
    # Url to the secrets repo for the current environment
    SECRETS_REPO='git@github.com:oc4d/secret.git'
    # Relative path to the .json file in the repo
    SECRETS_FILE_PATH='/production.json'
    echo "Pulling the secrets from $SECRETS_REPO"

    SECRETS_TMP_DIR='/tmp/secrets'

    rm -rf $SECRETS_TMP_DIR
    git clone $SECRETS_REPO $SECRETS_TMP_DIR

    echo "Setting up environment"
    node scripts/setenv.js ${SECRETS_TMP_DIR}${SECRETS_FILE_PATH}

    rm -rf $SECRETS_TMP_DIR
fi

echo ""
echo "Starting the services"
docker-compose up $COMPOSE_PARAMS
