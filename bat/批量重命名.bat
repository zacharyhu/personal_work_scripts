@echo off
for /f "delims=" %%i in ('dir/b/s *.jpg') do (
set str=%%~dpi&set str2=%%~nxi
setlocal enabledelayedexpansion
if not "!str!"=="!num!" (
set "n=1"
ren "!str!*.jpg" "*.*.jpg"
) else set /a n+=1
ren "!str!!str2!.jpg" "!n!.jpg"
for %%a in (!n!) do endlocal&set n=%%a
set "num=%%~dpi"
)
pause