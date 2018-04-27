[![pipeline status](https://gitlab.com/gionniboy/phpdemo-cicd/badges/master/pipeline.svg)](https://gitlab.com/gionniboy/phpdemo-cicd/commits/master)

[![coverage report](https://gitlab.com/gionniboy/phpdemo-cicd/badges/master/coverage.svg)](https://gitlab.com/gionniboy/phpdemo-cicd/commits/master)

# CI/CD PHP Demo
A demo to illustrate the powerful of ci/cd pipeline: for php7 projects.
Pdf slide from speech @phpusergrouppalermo attached [here](20180426-pugpalermo.pdf).


## gitlab-ci
Two stage: test and deploy.

Tests on devel and master. Tests and autodeploy on "passed" for master only.

Secret envars on protected branch are used for CD:

SSH_USER_DEMO, SSH_KEY_DEMO, SSH_PORT_DEMO [avoid leak]

You can see them into (.gitlab-ci.yml)[.gitlab-ci.yml]

Job Template is used for mariadb service and then grafted inside jobs.


## PHP testing & analisys
PHPUnit, PHPCS, PHPMD, PHPMETRICS are used on pipeline to build artifacts with reports.

You can browse them through job details.

All configuration files for this tools are present in this repository.

Composer is customized to be helpful too, with some scripts and post-update command.
Try it:

```console
$ composer run-script tests
```
remember: first install dependencies (use composer).

Guzzle is used to do functional tests on api.

Simple API based on slim&eloquent.

### SQL
Helpful assets to quickly bootstrap database with sample data too.

### utils
Contain a based deploy script to run on demo-stage triggered by CD.


## License
This project is licensed under the BSD 3-Clause License - see the [LICENSE](LICENSE) file for details
