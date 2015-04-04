<?
	echo "<HTML><TITLE>LinuxSA Dinner Registration Form</TITLE>\n";

	echo "<BODY BGCOLOR=white>";

        if (isset($cmd)) {
                if (isset($email)  && isset($number)) {
			echo "<P>You have registered $number users under the email $email.</P>\n";
                        echo "<P>Thanks for registering!!!</P>\n";
		
			for ($i = 0; $i < $number; $i++) {
				system(EscapeShellCmd("./adduser.sh $email"));
			};
			system(EscapeShellCmd("./addlog.sh $email $number"));

                        exit;
                }

        }

	echo "<H2>LinuxSA Social Dinner 1999</H2>\n";
	echo "<HR>\n";
	echo "<P>There are currently <STRONG>\n";
	system("./countusers.sh");
	echo "</STRONG> LinuxSA members registered for the dinner</P>\n";
	include ("blurb.txt");

        echo "<FORM METHOD=POST ACTION=\"?cmd=feed\">\n";
        echo "<P>Your Email Address</P><INPUT TYPE=TEXT SIZE=50 NAME=email><BR>\n";
	echo "<P>Number of people coming with you (including yourself)</P>\n";
	echo "<SELECT NAME=number>\n";
	echo "   <OPTION VALUE=1>One\n";
	echo "   <OPTION VALUE=2>Two\n";
	echo "   <OPTION VALUE=3>Three\n";
	echo "   <OPTION VALUE=4>Four\n";
	echo "   <OPTION VALUE=5>Five\n";
	echo "   <OPTION VALUE=6>Six\n";
	echo "   <OPTION VALUE=7>Seven\n";
	echo "</SELECT>\n";
	echo "<INPUT TYPE=SUBMIT VALUE=\"Include Me!\">\n";
        echo "</FORM>\n";

	echo "</BODY></HTML>\n";

?>
