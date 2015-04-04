#!/bin/sh

wc -l users.list | awk '{print $1}'
