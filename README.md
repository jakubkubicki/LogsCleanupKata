# JakubKubicki LogsCleanupKata

A Magento2 module responsible for cleaning up old logs.

## Features
- cleaning up old logs

## Installation
- composer config repositories.jakubkubicki git https://github.com/jakubkubicki/LogsCleanupKata.git
- composer require jakubkubicki/module-logs-cleanup-data:dev-master

## Configuration
Stores -> Settings -> Configuration -> Jakub Kubicki -> Logs Cleanup Kata
### General
1. Is Enabled Logs Cleanup - flag defining whether logs should be cleaned up
2. Cron Run Frequency - frequency with which logs should be cleaned up
### Files
1. Is Enabled Files Logs Cleanup - flag defining whether files logs should be cleaned up
### Folders
1. Is Enabled Folders Logs Cleanup - flag defining whether folders logs should be cleaned up
### Database
1. Is Enabled Database Logs Cleanup - flag defining whether database logs should be cleaned up

## Description

Cron clean_up_logs initiates cleanup actions for particular types of logs at a specified interval. For this purpose, it uses handlers responsible for cleaning specific types of logs.

Additionally, the clean:up:logs console command has been added, which cleans up the logs without having to wait for cron job. This method will clean the logs regardless of the Is Enabled Logs Cleanup setting.
