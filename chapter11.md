Chapter 11: Using Files
=======================


::: {.blackbox}
::: {.blackbox-title}
**Learning Objectives**
:::

::: {.blackbox-contents}
-   Learn how to open and close text files
-   Learn how to read input from files line by line or all at once
-   Learn how output text to files
-   Understand file paths including relative and absolute ones
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
    to type in by hand.
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
video game it "remembers" the setting the next time you open it.  This is done by
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
file = open("input.txt", "r")
```

This will look for a file in the same directory as our program called
\"input.txt\". If the file cannot be found, the program will stop with
an error message.

When we are done with a file, we should close it. To do that, we put the
file variable, and then \".close()\". For instance, we could open an
output file, use it (which we will talk about), then close it:

``` python
file = open("stuff.txt", "w")

# output things to it

file.close()
```

Your program will probably work OK if you forget to close a file, but
it\'s good practice to close the file when you are done anyway[^fileclose].




11.3 Reading From a File
------------------------

To read a line from a file, we can use \".readline()\". This will return
the next line of the file. If we call it multiple times, it will return
the next line of the file we have not read yet. When you have a file variable,
it "remembers" where you are in the file.

For example,suppose the file "input.txt" has the following contents:

``` {.output}
hello
there
everyone
```

For example, the following program will open a file and then read the first
two lines out of it:

``` python
f = open("input.txt", "r")

# read the first 2 lines and print them out:
line1 = f.readline()
line2 = f.readline()
print(line1)
print(line2)

f.close()
```

This will give the following output:
``` {.output}
hello

there

```

Notice that there are extra blank lines between the two lines of the file.
These are caused by the fact that the lines in the input file end with
*newline characters*, which are read in when we call `readline`.  If we
want to remove these, we can do so using the following slice, which removes
the last element from a string or list:

``` python
line1 = line1.rstrip()
line2 = line2.rstrip()
```

This method removes (or "strips") any spaces or new lines from the right
side of the string.  This can be important if we are want to, for example,
compare the string we read in with the == operator.  It won't be seen as
equal if one has a newline on the end.

When a file has been read in its entirety, readline will give you back
an empty string \"\" when you call it.

Instead of reading each line with readline, we can instead get the entire file
read into a list of strings with \"readlines\". This will let us read
the entire file in one go.  The following program demonstrates this:

``` python
f = open("input.txt", "r")

# read all lines and print them out
lines = f.readlines()
print(lines)

f.close()
```

This will print the following:

``` {.output}
['hello\n', 'there\n', 'everyone\n']
```

Notice the "\n" in the output.  These are how computer systems commonly print
out newline characters in output.  They also are how you can enter a newline
into your program if you want to explicitly put one into a string for any
reason.



Lots of the time with input files we want to go through each line and do
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

So now we have seen a few things that Python for loops can loop through:
 * characters in a string
 * numbers in a `range`
 * items in a list
 * lines in a file

So there are a few ways in which we can read information from a file.  The best
one to use depends on the situation.  If you want to deal with the lines in
a uniform way, using a for loop is the easiest.  If not, you can decide whether
a list of lines is more convenient (in which case you would use `readlines`),
or individual string variables (in which case you would use `readline`).


11.4 Printing to a File
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

Besides that, printing to files can be done identically to printing to the
screen!


11.5 Example: Total Calculator
---------------------------

How could we write a program that opens a file of numbers, and adds up
the total? The input file should be called \"nums.txt\" and contain a
bunch of integers. The output file should be called \"total.txt\" and
contain the sum.

Here is a sample "nums.txt" file:

``` {.output}
43
39
78
35
30
71
86
67
73
94
28
84
61
38
39
72
94
45
79
83
32
42
```

We can solve this problem by opening the file up as an input file, and then
reading through it line by line with a for loop (because we'll treat each line
in a uniform way).  That would look something like this:

``` python
infile = open("nums.txt", "r")

for line in infile:
    print(line)
```

If we run this program, we will see the extra blank lines between each printed
line.  This is because the lines have newline characters, and they are also of
the string type.  Before we can do any adding with them, we'll have to get rid
of the newline and also convert them to integers.  We can do that by modifying
the program thusly:

``` python
infile = open("nums.txt", "r")

for line in infile:
    num = int(line.rstrip())
    print(num)
```
    
Now we are getting numbers into the program from the file.  We can now make a
sum variable which computes the total sum of the numbers one-by-one, and prints
out the answer at the end:

``` python
infile = open("nums.txt", "r")

sum = 0
for line in infile:
    num = int(line.rstrip())
    sum = sum + num

print(sum)
```

And finally we can change it so that we output the result to a file instead
of to the screen, and also close our files:

``` python
infile = open("nums.txt", "r")

sum = 0
for line in infile:
    num = int(line.rstrip())
    sum = sum + num

outfile = open("total.txt", "w")
print("The total is", sum, file=outfile)

infile.close()
outfile.close()
```

Now when we run this program, it looks like nothing happens!  Nothing gets
printed to the screen at all and we need to look for the "total.txt" file
so we can see what got output.





11.6 On File Paths
------------------

When you open a file with `open`, you must give it the name of the file to
open.  In the simplest case this is a simple name like "input.txt" and a
file with that name exists in the same directory on your computer where
you run the program.  With Thonny, this is the directory where your
program .py code is.

We can also give `open` a *file path* which can specify where a file is in
your system.  For example, the following could be given as the first parameter
to open:


``` python
infile = open("data/nums.txt", "r")
```

Now, the nums.txt file is listed as being inside a directory called "data".  For
the file to be found, this directory has to be where the program is run from
*and* there must be a file called "nums.txt" inside that directory.  A path like
this is called a *relative path* because it is based off the starting point of
wherever we run the program from.  With Thonny, this is where you saved the
Python file to.

We could also specify an *absolute path* which starts at the beginning of your
file system.  They look different on different systems, but a Windows absolute
path might look like this:


``` python
infile = open("C:/Users/annie/programs/data/nums.txt", "r")
```

Here we specify the complete path from our hard drive to the file we want to
open.  This doesn't depend on a starting point and should work no matter where
the program is run from.

Relative paths are like giving directions from a giving starting point, like
"from your house, turn left, and drive one mile".  Absolute paths are like
giving GPS coordinates for where you want to go.

Absolute paths don't depend on where you are when the program is run, but they
come with a significant disadvantage which is that they depend on the layout of
files on your computer.  If you open a file with the absolute path above, you
couldn't easily give the program to your friends to run.  They might not run
Windows and so may not have a "C drive" and, even if they did, probably don't
have their home folder called "annie".

Beginning programmers sometimes struggle with being able to find where
files on their computer are located in the file system[^osrant].  If you have
issues being able to open files on your computer, you're not alone.  Generally
you should use relative paths and put files in the same directory as the code
for your program, possibly in a sub-directory as in the "data/nums.txt" example
above.


11.7 Comprehension Questions
----------------------------


1. Why might you want to read input from a file instead of having the user type it in?
2. Why does `readline` return strings with extra blank line at the ends?  How
   can this be fixed?
3. When would you use a for loop over the lines of a file rather than call
   `readline` or `readlines`?
4. What's the difference between an absolute and relative path?
5. What's the difference between using the "w" mode and the "a" mode for output
   files?


11.8 Programming Exercises
---------------------------


1. Make a "line counter" program which reads in a file and then reports how many
   lines it contains.
2. Extend the line counter program to also count how many *words* are in an
   input file.  Hint: look at the `.split` method of strings.
3. Extend the total calculator program in section 11.5 to also compute the
   minimum and maximum values in the input.
4. Re-work any previous programming exercise you've done so that the input comes
   from a file and the output goes to a file.



::: {.blackbox}
::: {.blackbox-title}
**Chapter Summary**
:::

::: {.blackbox-contents}
-   Files can be opened using the `open` function which returns a file object.
    We can call the `.close` method on that file object to close the file.
-   Input from a file can be read line by line with the `.readline` method, or all
    at once with the `.readlines` method.
-   We can loop through the lines of a file with a for loop.
-   Lines read from a file end in newline characters which can be removed by
    calling the `.rstrip` method on the line.
-   We can print to a file by passing an optional parameter with the file object
    into the regular `print` function.
-   File names can be specified as relative paths, which start from where the
    program is run from, or absolute paths.
:::
:::


Footnotes {#footnote-label11 .visually-hidden}
---------


[^fileclose]: One situation where it *is* important to close files is if the
program runs for a long time and you want to make sure the file gets written
at a specific time.  For instance, if your program continues after writing data
to a file, and then your computer crashes, it's possible that the file won't
have been written properly.  This is because the operating system doesn't always
write data immediately, to improve performance.  Closing a file tells the OS
that you're done and the file should be written to now.

[^osrant]: This is especially true these days where modern operating systems
like, newer versions of Windows and Mac, intensionally obscure the fact that
files are stored in a hierarchical directory structure, in an effort to make
their systems more "user friendly".



