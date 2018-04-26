#!/bin/sh

# deploy new version pulling master from gitlab

echo -e "load ssh agent \n"
eval $(ssh-agent -s)
echo -e "load ssh key - readonly \n"
ssh-add .ssh/demo_ci_key

echo -e "new version deploying \n"
cd git/phpdemo-cicd/
git pull
echo -e "pkill ssh-agent\n"
pkill ssh-agent
echo -e "finished\n"

