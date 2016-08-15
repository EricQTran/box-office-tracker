#!/usr/bin/perl -wT
use CGI qw(:standard);
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
use CGI::Session;
use strict;

my $session = CGI::Session->new();

my $name = param("username");

$session ->param('username', $name);

print header;
print start_html("Session Save CGI");
print "<body>";
print "<h1>Username $name was saved in a session</h1>";
print "</body>";
print end_html;
