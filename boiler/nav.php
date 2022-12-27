<?php
    /* list of the chapters for making the nav bar */
    $parts = array("title", "preface", "chapter01", "chapter02", "chapter03", "chapter04", "chapter05", "chapter06", "chapter07", "chapter08", "chapter09", "chapter10", "chapter11");
    $display = array("Title", "Preface", "Chapter 1", "Chapter 2", "Chapter 3", "Chapter 4", "Chapter 5", "Chapter 6", "Chapter 7", "Chapter 8", "Chapter 9", "Chapter 10", "Chapter 11");

    /* get the target, scrubbing the leading "exploring-cs/" */
    $target = substr($_GET["page"], strlen("exploring-cs/"));
    $idx = array_search($target, $parts);


    if ($idx !== False) {
        echo "<div class=\"topnav\">";

        /* find the back part */
        if ($idx >= 1) {
            $link = $parts[$idx - 1];
            $disp = $display[$idx - 1];
            echo "<a href=\"$link\">← $disp</a>\n";
        } else {
            echo "<a href=\"/exploring-cs\">← Home</a>\n";
        }

        /* only do sections if there are some and not home page */
        if (count($sections) > 1) {
            echo "<div class=\"dropdown\">\n";
            echo "<a class=\"dropbtn\">Contents ▼</a>\n";
            echo "<div class=\"dropdown-content\">\n";

            for ($i = 0; $i < count($sections); $i++) {
                echo "<a href=\"#$simples[$i]\">$sections[$i]</a>\n"; 
            }
            echo "</div>";
            echo "</div>";
        }

        /* find the next part */
        if ($idx < (count($parts) - 1)) {
            $link = $parts[$idx + 1];
            $disp = $display[$idx + 1];
            echo "<a class=\"righty\" href=\"$link\">$disp →</a>\n";
        }
        echo "</div>";
        echo "<div class=\"main\">";
    }
?>

