#!/usr/bin/perl

print "Content-type: text/html\n\n";

$time = localtime;

print "<html><head><title>Hello World!</title>";
print "</head><body bgcolor='yellow'>\n";
print "<h1>Hello from CGI, the current time date is $time\n</h1>";

print"</body>\n</html>";

