@echo off
set PHP_PATH=C:\laragon\bin\php\php-8.2.29-nts-Win32-vs16-x64\php.exe

echo ==========================================
echo    PROJECT KP - AUTO RUNNER (PHP 8.2)
echo ==========================================

:: 1. Cek PHP
if not exist "%PHP_PATH%" (
    echo [ERROR] PHP 8.2 tidak ditemukan di %PHP_PATH%
    pause
    exit
)

:: 2. bypass PowerShell Policy untuk NPM (jika dijalankan via script ini)
echo [1/3] Menyiapkan lingkungan...
set "PATH=C:\laragon\bin\php\php-8.2.29-nts-Win32-vs16-x64;%PATH%"

:: 3. Jalankan Concurrently (PHP Artisan Serve + NPM Run Dev)
echo [2/3] Menjalankan Server & Vite secara bersamaan...
echo.
echo TIP: Jika ada error "npm cannot be loaded", jangan khawatir.
echo Script ini akan menjalankan via CMD untuk menghindari blokir PowerShell.
echo.

cmd /c npx concurrently -n "PHP,VITE" -c "magenta,cyan" "\"%PHP_PATH%\" artisan serve" "npm run dev"

pause
