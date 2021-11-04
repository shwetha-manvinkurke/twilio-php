FROM php:7.4

RUN mkdir /twilio
WORKDIR /twilio

COPY src src
COPY composer* ./

RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN composer config -g github-oauth.github.com $GITHUB_TOKEN
RUN composer install --no-dev
