#!/bin/bash

set -e

: ${MEDIAWIKI_SITE_NAME:=MediaWiki}

if ! [ -e index.php -a -e includes/DefaultSettings.php ]; then
    echo >&2 "MediaWiki not found in $(pwd) - copying now..."

    if [ "$(ls -A)" ]; then
        echo >&2 "WARNING: $(pwd) is not empty - press Ctrl+C now if this is an error!"
        ( set -x; ls -A; sleep 10 )
    fi
    tar cf - --one-file-system -C /usr/src/mediawiki . | tar xf -
    echo >&2 "Complete! MediaWiki has been successfully copied to $(pwd)"
fi

: ${MEDIAWIKI_SHARED:=/var/www-shared/html}
if [ -d "$MEDIAWIKI_SHARED" ]; then
    # If there is no LocalSettings.php but we have one under the shared
    # directory, symlink it
    if [ -e "$MEDIAWIKI_SHARED/LocalSettings.php" -a ! -e LocalSettings.php ]; then
        ln -s "$MEDIAWIKI_SHARED/LocalSettings.php" LocalSettings.php
    fi
    if [ -e "$MEDIAWIKI_SHARED/LocalSettings.overrides.php" -a ! -e LocalSettings.overrides.php ]; then
        ln -s "$MEDIAWIKI_SHARED/LocalSettings.overrides.php" LocalSettings.overrides.php
    fi

    # If the images directory only contains a README, then link it to
    # $MEDIAWIKI_SHARED/images, creating the shared directory if necessary
    if [ "$(ls images)" = "README" -a ! -L images ]; then
        rm -fr images
        mkdir -p "$MEDIAWIKI_SHARED/images"
        ln -s "$MEDIAWIKI_SHARED/images" images
    fi

    # If the files dir does not exist in wwww-shared, create it
    if [ ! -d "$MEDIAWIKI_SHARED/files" ]; then
        mkdir -p "$MEDIAWIKI_SHARED/files"
    fi

    # If the path to files does not exist, link in the files directory from www-shared
    if [ ! -e files ]; then
        ln -s "$MEDIAWIKI_SHARED/files" files
    fi
fi

# If the assets/oc4d (sym link) directory does not already exist
if [ -d "$MEDIAWIKI_SHARED/assets/oc4d" -a ! -L resources/assets/oc4d ]; then
    ln -s "$MEDIAWIKI_SHARED/assets/oc4d" resources/assets/oc4d
fi

chown -R www-data: .

exec "$@"
