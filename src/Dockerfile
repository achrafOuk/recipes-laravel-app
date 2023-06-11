FROM php:8.0.3-fpm-alpine
#set current directory


# Install required packages
RUN apk add --no-cache \
    curl \
    zip \
    libzip-dev \
    nodejs \
    npm \
    zip


# Install pdo's mysql extention  
RUN docker-php-ext-install pdo_mysql 

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /src

# make changes if compsoer file content has change
COPY ./composer.json .


# Install the project dependencies using Composer
RUN  composer install --no-interaction --no-plugins --no-scripts --prefer-dist

#cache the package file
COPY ./package.json .

RUN npm i

COPY . .

#copy code from src file into docker image
COPY . .

# expose port
expose 8000


# Expose the port used by the application
EXPOSE 8000

RUN php artisan config:cache

# RUN php artisan migrate
RUN npm run build 

# Start the application
CMD  php artisan serve --host=0.0.0.0 --port=8000