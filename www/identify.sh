#!/bin/bash
# lookup the output of find in a csv file to find the brief file format
# file -ib can't be used because it conflates several formats with plain zip

# iterate through the lines of formats.dsv, stopping at the first regex match;
# data.csv is sorted in order or priority
file_output=$(file -b "$1")
result=$(cat formats.dsv | while read line; do
    regex=$(cut -d "|" -f 1 <<< "$line")
    format=$(cut -d "|" -f 2- <<< "$line")
    if grep -q "$regex" <<< "$file_output"; then
        echo "$format"
        exit
    fi
done)

# fallback on "unknown"
if [ -z "$result" ]; then
    echo "unknown"
else
    echo "$result"
fi
