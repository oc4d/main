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

    # If the images directory only contains a README, then link it to
    # $MEDIAWIKI_SHARED/images, creating the shared directory if necessary
    if [ "$(ls images)" = "README" -a ! -L images ]; then
        rm -fr images
        mkdir -p "$MEDIAWIKI_SHARED/images"
        ln -s "$MEDIAWIKI_SHARED/images" images
    fi
fi

# If the assets/oc4d (sym link) directory does not already exist
if [ -d "$MEDIAWIKI_SHARED/assets/oc4d" -a ! -L resources/assets/oc4d ]; then
    ln -s "$MEDIAWIKI_SHARED/assets/oc4d" resources/assets/oc4d
fi

# keep the syntax in the commented-out block below, in case we want to build and link our own extensions
# If the mobile friendly extension directory is not already syn-linked to extensions folder
# if [ -d "$MEDIAWIKI_SHARED/extensions/MobileFrontend" -a ! -L extensions/MobileFrontend ]; then
#     ln -s "$MEDIAWIKI_SHARED/extensions/MobileFrontend" extensions
# fi

# Code block below was moved to the Dockerfile, this commented-out code can likely be removed after testing Dockerfile
# If the MobileFrontend extension has not already been copied to the extensions folder
# if [ ! -d extensions/MobileFrontend ]; then
#     # Download the mobile frontend extension to the extensions folder and name the tar file
#     curl -o extensions/MobileFrontend.tgz https://extdist.wmflabs.org/dist/extensions/MobileFrontend-REL1_27-039b40b.tar.gz
#     # Extract the entire tar file into the extensions folder (the extension is still packed into folder named "MobileFrontend")
#     tar -zxf extensions/MobileFrontend.tgz -C extensions
# fi

chown -R www-data: .

exec "$@"
