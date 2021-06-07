#!/bin/bash
set -e
#composer installation
tput setaf 3; echo -e "::::: Running Composer Install Command  :::::"
composer install
tput setaf 3; echo -e "::::: Dependencies installed successfully  :::::\n"

#env sample copy
tput setaf 3; echo -e "::::: Copying sample of environment file  :::::"
cp .env.examples .env.test
tput setaf 2; echo -e "Env copied successfully"
tput setaf 3; echo -e "::::: Env copied successfully :::::\n"

#Generating Application team
tput setaf 3; echo -e "::::: Generating Application Key  :::::"
php artisan key:generate
tput setaf 3; echo -e "::::: Application key generated successfully :::::\n"

#Installing frontend dependencies
tput setaf 3; echo -e "::::: Installing frontend dependencies  :::::"
yarn
tput setaf 3; echo -e "::::: Frontend Dependecies installed successfully :::::\n"
