#!/usr/bin/python
"""

"""
import time

while True:
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

              html_file = open('/var/www/html/tech/net_acronyms.html', mode="w")
              new_acronym = "<html><head>"
              new_acronym += "<meta http-equiv=\"refresh\" content=\"5\">"
              new_acronym += "</head>"
              new_acronym += "<table width=800 border=0><tr><td><h4>" + str(j) + "of " + str(number_of_lines) \
			          + "</h4><br><font size=5 color=blue>" + str(acronymn) + "</font></td></tr></table>"
              html_file.write(new_acronym)
              html_file.close()
              print(acronymn)
              time.sleep(5)

              html_file = open('/var/www/html/tech/net_acronyms.html', mode="w")
              new_definition = "<html><head>"
              new_definition += "<meta http-equiv=\"refresh\" content=\"10\">"
              new_definition += "</head>"
              new_definition += "<table width=800 border=0><tr><td><h4>" + str(j) + "of " + str(number_of_lines) \
			          + "</h4><br><font size=5 color=blue>" + str(acronymn) + "</font>"
              new_definition += "<br><tr><td><font size=4>" + str(acronymn_definition) + "</font></td></tr></table>"
              html_file.write(new_definition)
              html_file.close()
              print(new_definition)
              time.sleep(10)
 
              i+=1
              j+=1
              html_file.close()

time.sleep(60)

