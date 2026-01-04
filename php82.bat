@echo off
set "PHP_PATH=C:\laragon\bin\php\php-8.2.29-nts-Win32-vs16-x64\php.exe"
set "PATH=C:\laragon\bin\php\php-8.2.29-nts-Win32-vs16-x64;%PATH%"
"%PHP_PATH%" %*
