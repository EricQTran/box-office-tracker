#!/usr/bin/perl -wT
use CGI qw(:standard);
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
use strict;

print header;
print start_html("Get/Post CGI");

my %form;
my $fn = param('firstname');
my $ln = param('lastname');
my $color = param('cSelect');
my $method= param('mSelect');
my $time = localtime;

print "<body bgcolor=$color>";
print "<h1>Hello $fn $ln, from a Web app written in CGI on $time using $method</h1>";
print "</body>";
print end_html;
