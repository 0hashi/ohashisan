#!/usr/bin/perl
#
# Safeguard Authentication Services refresh script for Linux GPOs.
#
# sasUsersAllowed.pl - Located in AuthenticationServicesDefault GPO -> Refresh Scripts.
#
# 8-10-21 Created as an example script for Zurich to show how the Authentication Services
# users.allow file can be dynamically updated for managed systems based on Active Directory
# Group names.
#
# 8-20-21 modified to use a specific naming convention for Linux system hostnames and
# AD Groups names (%ComputerName%_ADMIN$ and %ComputerName%_READONLY$).
#
# Zurich hostname naming convention: hostname.zurich.com
# AD Group Name naming convention: HOSTNAME_ADMIN$

use strict;

system('clear');
my $usersAllow          = '/etc/opt/quest/vas/users.allow';

# If the Authentication Services users.allow file doesn't exist, create it.
if (! -f $usersAllow) {
        system("touch $usersAllow");
}

my $domain                      = "GIT";
my $hostNameFQDN                = `hostname`;
my ($hostName, $Domain, $com)   = split(/\./, $hostNameFQDN);
my $adminGroupName              = '_ADMIN$';
my $allowedGroup                = "${domain}\\${hostName}${adminGroupName}";
chomp $hostNameFQDN;

my $adminGroupNameGrep          =~ s/\$/\\\$/g;
my $grepString                  = "$domain\\\\${hostName}${adminGroupNameGrep}";
my $doesAdGroupExist            = `grep \'$grepString\' $usersAllow`;
$doesAdGroupExist               = split(/\\/, $doesAdGroupExist);

print "grepStr: $grepString\nAD GROUP: $allowedGroup\nIs already there $doesAdGroupExist\n";

if ($doesAdGroupExist > 0) {
                my $x;
} else {
                open (UA, ">>$usersAllow");
                print UA "$allowedGroup\n";
                close UA;
}