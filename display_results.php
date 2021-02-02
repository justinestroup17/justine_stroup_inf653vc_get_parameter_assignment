<?php
    // get the data from the form
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $age = filter_input(INPUT_POST, 'age',
        FILTER_VALIDATE_INT);
    
    // Initialize greeting
    $greeting = 'Hello, my name is ';

    // validate profile
    if (empty($first_name)) {
        $error_message = 'Must enter first name.'; 
    }else if (empty($last_name)) {
        $error_message = 'Must enter last name.';
    } 
    else if ($age === FALSE) {
        $error_message = 'Age must be a valid number.'; 
    }
    else if ($age < 0 ) {
        $error_message = 'Age must be at least 0.'; 
    }
    /*
    else if ( $interest_rate > 15 ) {
        $error_message = 'Interest rate must be less than or equal to 15.';
    // validate years
    } else if ( $years === FALSE ) {
        $error_message = 'Years must be a valid whole number.';
    } else if ( $years <= 0 ) {
        $error_message = 'Years must be greater than zero.';
    } else if ( $years > 30 ) {
        $error_message = 'Years must be less than 31.';
    }
        */
    // set error message to empty string if no invalid entries
    else {
        $error_message = ''; }
    
    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit();
    }
    
    // calculate voting status
    $can_vote = FALSE;      // Default boolean is false
    $voting_message = '';   // Default message is empty
    if ($age >= 18) {
        $can_vote = TRUE;
    }
    // Determine voting message
    if ($can_vote) {        // user is 18 or older and legally able to vote
        $voting_message = 'I am old enough to vote in the United States.';
    }
    else {                  // user is too young to legally vote
        $voting_message = 'I am NOT old enough to vote in the United States.';
    }

    // Calculate number of days old
    $days = $age * 365;
    $nf = number_format($days); // Display commas in large number
?>
<!DOCTYPE html>
<html>
<head>
    <title>Justine Stroup Get Parameter Assignment</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main class="center">
        <span class="big"><?php echo htmlspecialchars($greeting.$first_name.' '.$last_name.'.'); ?></span><br />
        <span class = "output"><?php echo htmlspecialchars('I am '.$age.' years old, and '. $voting_message); ?></span><br />
        <span class = "output"><?php echo htmlspecialchars('That means I\'m at least '.$nf.' days old.'); ?></span><br />
    </main>
</body>
</html>