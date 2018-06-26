#!/bin/bash

docker-compose exec mysql mysqldump -d -uroot -padmin burndown > burndown.sql
