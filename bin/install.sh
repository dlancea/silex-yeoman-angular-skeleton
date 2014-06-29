#!/bin/bash

# Assumes composer, ruby and node have been installed and available in path.

# Prerequisites - makes global changes
sudo npm install -g yo

sudo gem update --system
sudo gem install compass

# Program setup
cp app/config/config.example.php app/config/config.php

# Program deps
composer install

npm install

bower install

grunt bwatch
