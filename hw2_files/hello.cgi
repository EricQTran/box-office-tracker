#!/usr/bin/perl

print "Content-type: text/html\n\n";

$time = localtime;
$colorChoice = int(rand(3));


if($colorChoice == 0){
	$color = red;
}
elsif($colorChoice == 1){
	$color = blue;
}
else{
$color = white;
}

print "<html><head><title>Hello World!</title>";
print "</head><body bgcolor=$color>\n";
print "<h1>Hello from CGI, the current time date is $time\n</h1>";
print"</body>\n</html>";

