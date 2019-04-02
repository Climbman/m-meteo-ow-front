#!/bin/bash

sudo mkdir /tmp/mm_front
sudo rm -r /tmp/mm_front/*
sudo cp -r /var/www/html/mm_front-testing/* /tmp/mm_front/
sudo rm -r /var/www/html/mm_front-testing/*
sudo cp -r ../mmeteo_factW-front/* /var/www/html/mm_front-testing/
sudo chown -R www-data /var/www/html/mm_front-testing
sudo chgrp -R www-data /var/www/html/mm_front-testing
