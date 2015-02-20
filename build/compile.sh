#!/bin/bash

NPM=`which npm`
GRUNT=`which grunt`

if [[ "$NPM" == '' ]]; then
    echo " "
    echo " Please install nodejs "
    echo " "
    exit 0
fi

if [[ "$GRUNT" == '' ]]; then
    sudo $NPM install -g grunt-cli
    GRUNT=`which grunt`
fi

DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )

cd $DIR

cp layout/layout.html.twig ../app/layout/views/

if [[ "--no-bower" == $1 || "-n" == $1 ]]; then
    cp bootstrap/variables.less ../public_html/bower/bootstrap/less/variables.less

    cd ../public_html/bower/bootstrap/

    $NPM install
    $GRUNT dist
fi
