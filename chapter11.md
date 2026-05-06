Chapter 11: Using Files
=======================


::: {.blackbox}
::: {.blackbox-title}
**Learning Objectives**
:::

::: {.blackbox-contents}
-   TODO
-   TODO
-   TODO
-   TODO
-   TODO
:::
:::

11.1 Overview
--------

So far we have always gotten program input from the user of the program typing
in to the program window. This works very well for a lot of interactive
programs. However, there is another way to get input into a program which is to
read it in from a file. There are some cases where this is nice to be able to
do:

-   It lets you read in *large amounts* of input which would be tedious
    to type by hand.
-   It lets you test a program more quickly if you don\'t have to type
    the input in, and also keeps you from typing it wrong. If you want
    to re-run the program over and over again this speeds up development.
-   Programs can read in their settings from files without needing to
    ask the user each time.
-   Programs can read in files which might not be in a format users can
    easily enter.

We can also put output into files instead of just to the screen. There
are some reasons to do this:

-   It lets the user keep the output even after the program is done.
-   If it\'s in a file, our program can read it in the next time it\'s
    run.

If you think about it, a lot of the programs you use read and write information
to files.  When you use a word processor to work on a paper, the program saves
your paper to a file.  Then when you open that same paper again, it reads the
information out of the file again.  Likewise when you change a setting in a
video game it "remembers" the setting next time you open it.  This is done by
writing the setting to a file and then reading that same file each time it's
opened.


11.2 Opening and Closing Files
------------------

The first step of using a file for input or output is opening it. To do
this we call the `open` function. This takes two parameters. The first
is the name of the file, which must be a string.

The second parameter is the *mode* which is also string and says how the
file should be opened. The most common modes are:

  Mode    Meaning
  ------- -----------------------------------------------------------------------------------
  \"r\"   Use the file for reading (input).
  \"w\"   Use the file for writing (output). This will erase the file if it already exists.
  \"a\"   Use the file for output but append to the end of it.

For example, we can open an input file like this:

``` python
f = open("input.txt", "r")
```

This will look for a file in the same directory as our program called
\"input.txt\". If the file cannot be found, the program will stop with
an error message.

When we are done with a file, we should close it. To do that, we put the
file variable, and then \".close()\". For instance, we could open an
output file, use it (which we will talk about), then close it:

``` python
f = open("stuff.txt", "w")

# output things to it

f.close()
```

Your program will probably work OK if you forget to close a file, but
it\'s good practice to close the file when you are done anyway[^fileclose].




11.3 Reading A Line
-------------------

To read a line from a file, we can use \".readline()\". This will return
the next line of the file. If we call it multiple times, it will return
the next line of the file we have not read yet. Files remember where you
are in the file.

``` python
f = open("input.txt", "r")

# read the first 2 lines and print them out:
line1 = f.readline()
line2 = f.readline()
print(line1)
print(line2)

f.close()
```

When a file has been read in its entirety, readline will give you back
an empty string \"\" when you call it.

TODO: example


11.4 Reading All the Lines
--------------------------

Instead of reading each line with readline, we can get the entire file
read into a list of strings with \"readlines\". This will let us read
the entire file in one go:

``` python
f = open("input.txt", "r")

# read all lines and print them out
lines = f.readlines()
print(lines)

f.close()
```

Note that when we read lines in from a file (either one at a time or all
at once) they have line breaks at the end of them.

TODO: example


11.5 Looping Through Lines
--------------------------

Lots of time with input files we want to go through each line and do
something with it. We can do that in Python with just a for loop:

``` python
f = open("input.txt", "r")

# print each line
for line in f:
    print(line)

f.close()
```

This can also be combined with readline. For example, we can read the
first line of a file specially, and then use a for loop to go through
the remaining lines.

TODO: example


11.6 Printing to a File
-----------------------

To use output files, we can use the same old `print` function that we
have been using. We just need to pass an extra parameter that specifies
what file to write to.

We do this by passing \"file=f\" (where f is whatever we called the file
we opened) at the end of the print:

``` python
f = open("output.txt", "w")

print("This will go to a file", file=f)

f.close()
```


11.7 Example: Total Balance
---------------------------

How could we write a program that opens a file of numbers, and adds up
the total? The input file should be called \"nums.txt\" and contain a
bunch of integers. The output file should be called \"total.txt\" and
contain the sum.


TODO!





11.8 On File Paths
------------------

When you open a file with `open`, you must give it the name of the file to
open.  In the simplest case this is a simple name like "input.txt" and a
file with that name exists in the same directory on your computer where
you run the program.  With Thonny, this is the directory where your
program .py code is.

We can also give `open` a *file path* which can specify where a file is in
your system. TODO: explain!!!




Beginning programmers sometimes struggle with being able to find where
files on their computer are located in the file system[^osrant].  If you have
issues being able to open files on your computer, you're not alone.


11.9 Comprehension Questions
----------------------------


1. TODO
2. TODO
3. TODO
4. TODO
5. TODO
6. TODO


11.10 Programming Exercises
---------------------------


1. TODO
2. TODO
3. TODO




::: {.blackbox}
::: {.blackbox-title}
**Chapter Summary**
:::

::: {.blackbox-contents}
-   TODO
-   TODO
-   TODO
-   TODO
-   TODO
-   TODO
:::
:::


Footnotes {#footnote-label1 .visually-hidden}
---------


[^fileclose]: One situation where it *is* important to close files is if the
program runs for a long time and you want to make sure the file gets written
at a specific time.  For instance, if your program continues after writing data
to a file, and then your computer crashes, it's possible that the file won't
have been written properly.  This is because the operating system doesn't always
write data immediately, to improve performance.  Closing a file tells the OS
that you're done and the file should be written to.

[^osrant]: This is especially true these days where modern operating systems
like, newer versions of Windows and Mac, intensionally obscure the fact that
files are stored in a hierarchical directory structure, in an effort to make
their systems more "user friendly".



