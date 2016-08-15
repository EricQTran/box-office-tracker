#!/usr/bin/perl -wT

use CGI qw(:standard);
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
use CGI::Session;
use strict;

my $session = new CGI::Session->new();

$session->clear();

print header;

print start_html("Destroy Session-CGI");
print "<body>";
print "<h1>Session is destroyed!</h1>";
print "<a href='../sessionpage1_cgi.html'>Return to page 1</a>";
print "</body>";
print end_html;
