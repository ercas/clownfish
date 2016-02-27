#!/usr/bin/bash
# start or check the status of running conversions

# for easier reading
hash="$1"
converter="$2"
ext="$3"

function error() {
    echo "error$(! [ -z "$1" ] && echo ": $1")" | tee "converted/$hash"
}

if ! [ -f "uploads/$hash" ]; then
    error "could not find uploaded file"
    exit 1
fi
if ! [ -f "converters/$converter" ]; then
    error "could not find converter"
    exit 1
fi

# make sure the conversion isn't already running. if it's not, run the
# appropriate conversion script and move to converted/$hash.$ext if it
# succeeds. if it fails, echo "error" to converted/$hash.
if ps -eo pid,cmd | grep $hash | grep -vE "grep|$$ "; then
    echo "waiting to finish"
else
    if "converters/$converter" "uploads/$hash" "processing/$hash.$ext"; then
        mv "processing/$hash.$ext" "converted/$hash.$ext" #success
    else
        error "conversion failed"
        rm "processing/$hash.$ext"
    fi
    rm "uploads/$hash"
fi
