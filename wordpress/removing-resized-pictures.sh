#!/bin/bash
find . -regextype posix-extended -regex ".*-[[:digit:]]{1,9}x[[:digit:]]{1,9}(@2x)?.(jpg|jpeg|png|eps|gif)" -type f -exec rm {}  \;


#This will delete all resized pictures (EX : file-100x100.jpg) in the current directory and it's subdirectories
