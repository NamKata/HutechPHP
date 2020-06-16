@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../mcrumm/phlack/bin/phlackbot
php "%BIN_TARGET%" %*
