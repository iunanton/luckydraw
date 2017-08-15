#!/bin/bash
docker build -t luckydraw .
docker run -d -P --restart=always --name=webserver luckydraw
docker ps
