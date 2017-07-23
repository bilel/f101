#Parse remote content using xmllint and Xpath
curl --location --header "Accept: application/rdf+xml" http://www.test.com   | xmllint --format --xpath '//title/text()' -
