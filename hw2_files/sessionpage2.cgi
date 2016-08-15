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
if($name eq ''){
	print "<p>Howdy stranger, return to page 1 to input a username!</p>";
}
else{
print "<p> Hi $name, nice to meet you</p>";
}
print "<a href='../sessionpage1_cgi.html'>Return to page 1</a><br>";

print "<a href='destroySession.cgi'>Destroy session!</a>";
print "</body>";
print end_html;
 
