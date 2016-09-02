#!/usr/bin/perl -w

use strict;
use warnings;

$| = 1;

my @pngs = @ARGV ? @ARGV : glob("*.png");

foreach my $png (@pngs) {
    (my $name = $png) =~ s/\.png$//;
    
    next if $name =~ /-\d+\.\d+$/;
    
    print "$png... ";
    system('pngnq', '-f', '-s 1', $png);
    system('pngcrush', '-reduce', '-brute', '-l 9', '-rem gAMA', '-rem cHRM', '-rem iCCP', '-rem sRGB', '-q', "$name-nq8.png", $png);
    unlink "$name-nq8.png";
    print "done!\n";
}
