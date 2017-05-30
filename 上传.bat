@echo off&setlocal enabledelayedexpansion&
color 0A
git add .
echo.请输入备注
set /p remark=

git commit -m "%remark%"
git push
echo.上传完成 , 稍等几秒后自动关闭本窗口
ping -n 6 127.1 >nul