FROM php:5.6-apache

COPY ./xss_vul/ /tmp/
ADD ./xss_vul/phantomjs-2.1.1-linux-x86_64.tar.bz2 /tmp/

RUN set -ex \
    && echo " \
    deb http://mirrors.aliyun.com/debian/ buster main non-free contrib\n \
    deb-src http://mirrors.aliyun.com/debian/ buster main non-free contrib\n \
    deb http://mirrors.aliyun.com/debian-security buster/updates main\n \
    deb-src http://mirrors.aliyun.com/debian-security buster/updates main\n \
    deb http://mirrors.aliyun.com/debian/ buster-updates main non-free contrib\n \
    deb-src http://mirrors.aliyun.com/debian/ buster-updates main non-free contrib\n \
    deb http://mirrors.aliyun.com/debian/ buster-backports main non-free contrib\n \
    deb-src http://mirrors.aliyun.com/debian/ buster-backports main non-free contrib\n" > /etc/apt/sources.list \
    && apt-get update \
    && apt-get install -y --allow-unauthenticated wget cron bzip2 fontconfig python3 python3-pip

RUN ln -s /tmp/phantomjs-2.1.1-linux-x86_64/bin/phantomjs /usr/bin/ \
    && pip3 install \
	-i http://mirrors.aliyun.com/pypi/simple/ \
	--trusted-host mirrors.aliyun.com selenium==2.48.0

RUN cp -rf /tmp/www/* /var/www/html/ \
    && chown -R www-data:www-data /var/www/html/ \
    && chmod 777 -R /var/www/html/
    
RUN echo "service cron start && service apache2 start && /bin/bash" > /start.sh \
    && chmod u+x /start.sh \
    && /start.sh \
    && echo "service cron start && service apache2 start" > /tmp/enable.sh \
    && chmod u+x /tmp/enable.sh \
    && echo 'if [ -f /tmp/enable.sh ]; then' >> /root/.bashrc \
    && echo '   /tmp/enable.sh '>> /root/.bashrc \
    && echo 'fi'>> /root/.bashrc \
    && echo "(crontab -l;echo '*/1 * * * * /usr/bin/python3 /tmp/bot.py >> /tmp/xssbot.log')|crontab -" > /tmp/cron.sh \
    && chmod u+x /tmp/cron.sh \
    && /tmp/cron.sh
    
ENTRYPOINT /start.sh

EXPOSE 80