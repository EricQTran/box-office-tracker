#!/usr/bin/perl -wT

use CGI qw(:standard);
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
use CGI::Session;
use strict;

my $session = new CGI::Session();
my $name = $session -> param("username");

print header;
print start_html("Session Save CGI");
print "<body>";
print "<h1>Session Page 2 - CGI</h1>";
print "<p> Hi $name, nice to meet you</p>";
print "</body>";
print end_html;
 
