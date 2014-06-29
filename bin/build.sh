#!/bin/bash

SERVER_DOMAIN="domain"
SERVER_USER_NAME="username"
SERVER_ROOT_DIR="/srv/www/app_name/"

DB_FILE="app/db/db.sqlite"

CHMOD_1="app/db"
CHMOD_2="app/logs"

grunt build
rsync -r --exclude=$DB_FILE dist/ $SERVER_USER_NAME@$SERVER_DOMAIN:$SERVER_ROOT_DIR
ssh $SERVER_USER_NAME@$SERVER_DOMAIN "chmod -R a+wr $SERVER_ROOT_DIR$CHMOD_1; chmod -R a+wr $SERVER_ROOT_DIR$CHMOD_2;"
