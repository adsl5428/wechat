@echo off&setlocal enabledelayedexpansion&
color 0A
git add .
echo.�����뱸ע
set /p remark=

git commit -m "%remark%"
git push
echo.�ϴ���� , �Եȼ�����Զ��رձ�����
ping -n 6 127.1 >nul