#!/bin/bash
# lookup the output of find in a csv file to find the brief file format
# file -ib can't be used because it conflates several formats with plain zip

# iterate through the lines of formats.dsv, stopping at the first match.
# formats are sorted in order of priority.
#
# formats can either be specified by a regex or file extension. file extensions
# must be specified by EXT:[extension]; regex is the default.
#
# ex: ^PNG image data|png
# ex: EXT:md|markdown
file_output=$(file -b "$1")
result=$(while read line; do
    match=$(cut -d "|" -f 1 <<< "$line")
    format=$(cut -d "|" -f 2- <<< "$line")
    if grep -q "$match" <<< "$file_output" || \
        ( [ "${match:0:4}" = "EXT:" ] && [ "${1##*.}" = "${match:4}" ] ); then
        echo "$format"
        exit
    fi
done < formats.dsv)

if [ -z "$result" ]; then
    # fall back on "unknown" if no format can be determined
    echo "unknown"
else
    echo "$result"
fi
