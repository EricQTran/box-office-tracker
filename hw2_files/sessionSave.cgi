#!/usr/bin/perl -wT
use CGI qw(:standard);
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
use CGI::Session;
use strict;
use CGI;

my $q = CGI->new();

my $session = CGI::Session->new($q);

my $name = param("username");
my $id = $session -> id;
my $cookie = $q ->cookie("CGISESSID", $id);

$session ->param('username', $name);
my $user = $session -> param("username");
print header;
print start_html("Session Save CGI");
print "<body>";
print "<h1>Username $user was saved in a session</h1>";
print "<a href='../sessionpage1_cgi.html'>Link Back to Page 1</a><br>";
print "<a href='sessionpage2.cgi'>Link to Page 2</a>";
print "</body>";
print end_html;
