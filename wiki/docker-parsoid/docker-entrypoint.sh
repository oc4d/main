#!/bin/bash
LOCALSETTINGS_FILE=/usr/lib/parsoid/src/localsettings.js

set -e

if [ ! -L settings.js ]; then
	echo >&2 "Copying original 'settings.js' into data volume, creating symbolic link."

	if [ ! -e /data/settings.js ]; then
		mv settings.js /data/settings.js
	fi

	ln -sf "/data/settings.js" settings.js
fi

if [ -e "/data/localsettings.js" ]; then
    # echo >&2 "Copying original 'localsettings.js' into data volume, creating symbolic link."
	echo >&2 "/data/localsettings.js found, linking to $LOCALSETTINGS_FILE"

	#if [ ! -e "/data/localsettings.js" ]; then
	#	mv "$LOCALSETTINGS_FILE" /data/localsettings.js
	#fi

	ln -sf "/data/localsettings.js" "$LOCALSETTINGS_FILE"
fi

exec "$@"
