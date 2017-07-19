alias myip="curl https://api.ipify.org?format=json | jq -r '.ip'"

#An alternative without Json 
alias myip="curl icanhazip.com"

#Easy ! just type myip
