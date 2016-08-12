#!/usr/bin/perl

print "Content-type: text/html \n\n";

print<<END;

<html>
<head>
<title>Environment Variables</title>
</head><body><h1 align="center">Environment Variables</h1><hr />
END

foreach $variable (sort keys %ENV){
	print "<b>$variable: </b> $ENV{$variable}<br />\n";

}

print <<END;
</body></html>

END