FROM php:7.4.8-fpm-alpine3.12 

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN install-php-extensions \
    bcmath \
    pdo_pgsql \
    zip

# Create a group and user

ENV USER=docker
ENV UID=1000
ENV GID=1000

RUN addgroup \
    --gid "$GID" \
    docker

RUN adduser \
    --disabled-password \
    --gecos "" \
    --home "$(pwd)" \
    --ingroup "$USER" \
    --no-create-home \
    --uid "$UID" \
    "$USER"

USER docker
