
# 使用官方 PHP 內建的 Apache 映像檔，方便跑 PHP 網頁
FROM php:8.1-apache

# 將你的 PHP 程式碼複製到 Apache 的網站根目錄
COPY . /var/www/html/

# 開放 80 端口（HTTP 預設端口）
EXPOSE 80

# 啟動 Apache，這是預設 CMD，不用特別寫也可以
CMD ["apache2-foreground"]
