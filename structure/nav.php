
<div class="topnav">
<?php
    /* get the target */
    $target = $_GET["page"];

    echo "<a href=\"/\">Home</a>\n";

    /* only do sections if there are some and not home page */
    if ($target != "home" && (count($sections) > 1)) {
        echo "<div class=\"dropdown\">\n";
        echo "<a class=\"dropbtn\">Contents ▼</a>\n";
        echo "<div class=\"dropdown-content\">\n";

        for ($i = 0; $i < count($sections); $i++) {
            echo "<a href=\"#$simples[$i]\">$sections[$i]</a>\n"; 
        }
        echo "</div>";
        echo "</div>";
    }
?>
</div>

