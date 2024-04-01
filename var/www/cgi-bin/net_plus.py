#!/usr/bin/env python

import time
import cgitb
cgitb.enable()


print("Content-Type: text/html;charset=utf-8")
print ("Content-type:text/html\r\n")


with open('/var/www/html/docs/net_acronyms.txt') as net_acron_file:
     number_of_lines = len(net_acron_file.readlines())
     net_acron_file.seek(0)
     each_line = net_acron_file.readlines()

     i = 0
     j = 1

while i < number_of_lines:
    split_each_line = each_line[i].split(",")
    acronymn = split_each_line[0]
    acronymn_definition = split_each_line[1]
    print("<table width=500>") 
    print("<td><font color=blue size=5>" + acronymn + "</td></tr>") 


    print("<tr><td><font size=5>" + str(acronymn_definition) + "</td></tr>")
    i+=1
