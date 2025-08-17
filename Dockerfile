# 使用官方 PHP 8.1 搭配 Apache 的映像檔
FROM php:8.1-apache

# 安裝系統依賴和 PHP 擴展
RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    && docker-php-ext-install mysqli curl \
    && rm -rf /var/lib/apt/lists/*

# 啟用 Apache 模組
RUN a2enmod rewrite
RUN a2enmod headers

# 複製你的所有 PHP 程式碼到 Apache 網站根目錄
COPY . /var/www/html/

# 設置正確的權限
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# 創建 .htaccess 文件來處理 CORS（如果需要）
RUN echo "Header always set Access-Control-Allow-Origin \"*\"" > /var/www/html/.htaccess \
    && echo "Header always set Access-Control-Allow-Methods \"GET,POST,OPTIONS,DELETE,PUT\"" >> /var/www/html/.htaccess \
    && echo "Header always set Access-Control-Allow-Headers \"Content-Type,Authorization\"" >> /var/www/html/.htaccess

# 開放 80 端口（HTTP 預設）
EXPOSE 80

# 啟動 Apache
CMD ["apache2-foreground"]
