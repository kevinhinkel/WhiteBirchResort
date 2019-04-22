<?php 
   /* Web Dev 1: Week 5 
    * Some Basic Form Processing
    * ========================================================
    * Functions below for some semblance of security
    * src: http://css-tricks.com/serious-form-security/
    */


   /* stripCleanToHTML($s)
    * Restores the added slashes (ie.: " I\'m John " for security in output, 
    * and escapes them in htmlentities(ie.:  " etc.). Also strips any
    * <html> tags it may encouter.
    * Use: Anything that shouldn't contain html (pretty much everything that
    * is not a textarea)
    */

    function stripCleanToHTML($s){
            return htmlentities(trim(strip_tags(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
    }

    /* Restores the added slashes (ie.: " I\'m John " for security in output,
     * and escapes them in htmlentities(ie.:  " etc.)
     * It preserves any <html> tags in that they are encoded aswell (like <html>)
     * As an extra security, if people would try to inject tags that would become tags
     * after stripping away bad characters, we do still strip tags but only after
     * htmlentities, so any genuine code examples will stay
     * Use: For input fields that may contain html, like a textarea
     */
    function cleanToHTML($s){
            return strip_tags(htmlentities(trim(stripslashes($s))), ENT_NOQUOTES, "UTF-8");

    }
    
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Thank You: Your Form Has Been Processed</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <h1>Your form has been processed.</h1>
    <dl>
    <?php foreach ($_POST as $key => $value) {
        $key = stripCleanToHTML($key); ?>
        <dt><?php echo $key; ?></dt>
        <?php
        if (is_array($value)){
            foreach ($value as $array_value){
                $array_value = stripCleanToHTML($array_value); ?>
            <dd><?php echo $array_value; ?></dd>
            <?php
            } 
        } else {
            $value = stripCleanToHTML($value); ?>
            <dd><?php echo $value; ?></dd>
            <?php
        } 
    }    ?>
    </dl>
</body>
</html>