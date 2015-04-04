<?
  include "/www/linuxsa/data/common.inc";

  function check_submit() {
    global $error, $name, $email, $people;

    if (strlen($name) < 2) {
      $error = "Please enter your name";
    } elseif (!ereg('.@.*\\..', $email)) {
      $error = "Please enter your email address";
    } elseif (!is_natural($people) or $people < 1 or $people > 30) {
      $error = "Please enter a valid number of people";
    }
  }

  function do_submit() {
    $fields = array("name", "email", "people");
    table_insert("christmas", $fields);
    redirect("/meetings/register-thanks.html");
  }

  function show_form() {
    ?>
      <P>To register for the LinuxSA Christmas Dinner to be held on
      Tuesday, 15th December, 6:30pm, at NetCraft Australia, Suite 2,
      259 Glen Osmond Road, Frewville, please enter your details into
      the form below:</P>
    <?
    form_begin("register.php3");
    table_begin();
    hidden_field("submit", 1);
    entry_row("Your name", "name", 40);
    entry_row("Your email address", "email", 40);
    entry_row("Number of people", "people", 5);
    submit_row("Register");
    table_end();
    form_end();
  }

  if ($submit) {
    check_submit();
    if (!$error) {
      do_submit();
    }
  }
?>
<HTML>
<HEAD>
<TITLE>LinuxSA - Meetings</TITLE>
</HEAD>

<BODY BGCOLOR="#FFFFFF">

<P><IMG ALT="LinuxSA" SRC="/images/linuxsabar.jpg" WIDTH=431 HEIGHT=50></P>
<P><IMG ALT="Meetings" SRC="/images/meetingsbar.jpg" WIDTH=431 HEIGHT=50></P>

<?
  include "../buttonbar.txt";
  print "<HR WIDTH=\"50%\">\n";
  show_error();
  show_form();
  print "<HR WIDTH=\"50%\">\n";

  include "../tail.txt";
?>

</BODY>
</HTML>
