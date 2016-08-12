#!/usr/bin/perl

print "Content-type: text/html\n\n";

$time = localtime;
$colorChoice = rand(2);
$color = white;

if($colorChoice == 0){
	$color = red;
}
elsif($colorChoice == 1){
	$color = blue;
}

print "<html><head><title>Hello World!</title>";
print "</head><body bgcolor=$color>\n";
print "<h1>Hello from CGI, the current time date is $time\n</h1>";

print"</body>\n</html>";

