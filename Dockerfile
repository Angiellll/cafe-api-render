# 使用官方 PHP + Apache 映像檔
FROM php:8.2-apache

# 複製你的專案檔案到容器內 Apache 預設網頁目錄
COPY . /var/www/html/

# 開放 80 埠口
EXPOSE 80

# (可選) 如果你需要啟用 PHP 的 mysqli 或 pdo_mysql 擴展（連接 MySQL）
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 預設指令是啟動 Apache，所以不用特別寫 CMD
