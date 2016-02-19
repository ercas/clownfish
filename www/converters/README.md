this directory contains small shell scripts that obey the following:
* $1 is the input file.
* $2 is the output file.
* the output file must be a single file. if multiple files are generated, they must be zipped. tar is not used unless the output would only be used on a unix-like system in order to ensure maximum interoperability.
* all temporary files must be removed before the script exits.
* a script that errors must exit with a nonzero exit code, indicating the error.
* if the conversion program allows, all precautions must be taken to minimize memory usage. for example, imagemagick conversions must utilize the MAGICK\_TMPDIR variable and the options -limit memory 32mb -limit map 64mb. for an example, see the imagemagick script.
