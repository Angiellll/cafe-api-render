# 使用官方 PHP 8.1 搭配 Apache 的映像檔
FROM php:8.1-apache

# 安裝 mysqli 擴充套件（php-mysqli）
RUN docker-php-ext-install mysqli

# 複製你的所有 PHP 程式碼到 Apache 網站根目錄
COPY . /var/www/html/

# 開放 80 端口（HTTP 預設）
EXPOSE 80

# 啟動 Apache，這是官方預設指令，不用改
CMD ["apache2-foreground"]
