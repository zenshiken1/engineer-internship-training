FROM php:8.2-apache
COPY . .

RUN apt-get update && docker-php-ext-install pdo_mysql

# mod_rewriteを有効に
RUN a2enmod rewrite

RUN apt -y update && \
    apt -y install git && \
    apt -y install curl && \
    apt -y install vim

RUN echo "alias ll='ls -al --color'" >> ~/.bashrc

# Set the document root to /var/www/app and update permissions
RUN cat ./custom-apache2.conf >> /etc/apache2/sites-available/000-default.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

