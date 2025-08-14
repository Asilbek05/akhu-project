FROM yiisoftware/yii2-php:8.1-apache

# Change document root for Apache
RUN sed -i -e 's|/app/web|/app/frontend/web|g' /etc/apache2/sites-available/000-default.conf
RUN chmod -R 777 /var/www/html/frontend/web/assets && \
    chmod -R 777 /var/www/html/frontend/runtime && \
    chmod -R 777 /var/www/html/backend/web/assets && \
    chmod -R 777 /var/www/html/backend/runtime