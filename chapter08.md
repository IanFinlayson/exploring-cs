Chapter 8: Using Libraries
=========================

------------------------------------------------------------------------

::: {.blackbox}
::: {.blackbox-title}
**Learning Objectives**
:::

::: {.blackbox-contents}
-   Understand what a library is.
-   Learn how to import libraries into a Python program.
-   Learn some of the functions of the math and random libraries.
-   Understand how to find libraries that are available for Python, and
    learn how to use them.
-   Learn how to install 3rd-party Python libraries in Thonny.
:::
:::

8.1 Overview
------------

------------------------------------------------------------------------

Python comes with some built-in functions that we've used in our
programs. These include things like `print`, `input`, `round`, and
`len`. We can use any of these directly in a Python program without
needing to do anything special.

Python also comes with lots of **libraries**, that we can use in our
programs. A library is essentially a collection of functions that we can
use in our own programs to help us. Python has ready-made libraries for
doing all sorts of things like solving math problems, getting random
numbers, handling dates and times, and even working with websites,
databases, and graphical interfaces. Python does not let you call on all
of these automatically, but the libraries included with Python are easy
to access, and we will see how to do that in this chapter.

There are also lots of other libraries that Python does not come with,
but which can be downloaded from the Internet. These allow programmers
to use code that was created by other programmers all across the world.
Sharing work with other people and building off of what others have done
is a big part of computer science. This makes it possible to make cooler
things than if everyone had to work alone.

Lastly in this chapter, we'll talk about how to look up documentation
on libraries so you can learn how to use them.

8.2 The import Statement
------------------------

------------------------------------------------------------------------

In order to use a library, we must put an `import` statement in our
program. This tells Python to load the library so that we access the
functions inside of it. For example, we will start by looking at the
math library. In order to use this library, we could do the following:


``` {.python}
import math
```

After doing the import, we will be able to call upon any of the
functions inside the math library. One thing that the math library comes
with is the `sqrt` function. This finds the square root of a number. For
example, the following programs asks the user to enter a number and then
prints the square root of it:


``` {.python}
import math

num = float(input("Enter a number: "))
root = math.sqrt(num)
print("The square root of", num, "is", root)
```

Here we start with the `import` statement, and then later use `sqrt`.
The import of math has to be before we actually use anything from the
math library. Usually people put import lines all at the top of a
program, so we make sure things are imported before we use them.

Also note that we don't just call `sqrt` directly, we have to put the
name of the library first, followed by a `.`, followed by the name of
the function we're using. The reason for this is to help keep things
organized. The math library has over 50 things in it, and if we are
using lots of libraries in one program, it could be hard to know what
things are coming from where. When we see `math.sqrt`, we know that the
sqrt function comes from the math library which we imported above.

8.3 Another form of import
--------------------------

------------------------------------------------------------------------

Sometimes we want to use some functions from a library and we don't
want to have to put the name of the library and the `.` before the name
of the functions every single time. For example, imagine we are writing
a program that had to do lots and lots of square roots. It might get
kind of tedious to write `math.sqrt` every time instead of just `sqrt`.

Python allows us to do that by using a different form of the import
command, which looks like this:

``` {.python}
from math import sqrt
```

This tells Python that we want to use the `sqrt` function from the math
library, and that we want to do it without having to write `math.`
before it every time. Now our program to calculate square roots might
look like this:


``` {.python}
from math import sqrt

num = float(input("Enter a number: "))
root = sqrt(num)
print("The square root of", num, "is", root)
```

Notice that we now *can* just say `sqrt` instead of having to put
`math.sqrt`. However, now we can't use anything from the math library
*except* for sqrt. If we wanted to be able to call upon multiple things
from the math library (like the `sin` function for calculating the sine
of an angle), we could add it to the from statement like this:


``` {.python}
from math import sqrt, sin
```

Now we could call upon the `sqrt` or the `sin` functions, both without
using `math.`. But we couldn't call upon any of the other things in the
math library.

If we really want to be able to use *everything*, from math, and we
don't want to type `math.` for any of it, we can do so like this:


``` {.python}
from math import *
```

The `*` means everything. So now we can call upon the `sqrt` and `sin`
functions, along with everything else in math, without needing the
`math.` beforehand.

Generally it's a good idea to stick with the first version of import
most of the time. That makes your code clearer since everyone can tell
what library everything we use is part of. There are cases, however,
when one program uses lots and lots of things from one library where
using the other form is more convenient.

8.4 Documentation Pages
-----------------------

------------------------------------------------------------------------

So the math library has lots of things we might want to use in it. But
how do we find out all what's in there? And how do we learn how to use
those things? The answer is that we read the documentation. The Python
website has pages of documentation for every one of the libraries that
it comes with. The page for the [math library is available
here](https://docs.python.org/3/library/math.html).

Just like reading the manual for an electronic device that you purchase,
reading programming documentation can be a bit overwhelming. The math
page includes *all* of the information you would need to use the math
library. Usually you have a specific question, and will need to hunt
through the documentation page looking for the answer.

Luckily, the pages are broken down into categories, and each function is
labelled. For example, the description listed for `sqrt` looks like
this:

math.**sqrt**(*x*)\

::: {style="margin-left:40px"}
Return the square root of *x*.
:::

To read this, we would see that the name of the function is `sqrt`. We
would see that it's part of the math library, so we need to put `math.`
before using it (unless we use the from style of import). We also see
that there is one thing inside of the parenthesis. Then the description
of the function says that it returns to us the square root of that thing
(which it calls `x`).

Another important question is "How does one know what libraries Python
even comes with?" The answer to that question is that Python also
includes a list of all the libraries that it comes with. [You can find
that page here](https://docs.python.org/3/library/). It starts listing
the "built-in" things such as `print`, `len`, etc. The it lists all of
the things you can import into Python, grouped in categories.

8.5 Example: Password Entropy
-----------------------------

------------------------------------------------------------------------

As an example of using the math library, let's look at the problem of
figuring out how difficult a password would be to guess based on how
long the password is, and how many characters might be in it. This is
related to the problem we looked at last week of checking that a
password met the length and character requirements. But now we are
seeing how good those requirements themselves are.

Cryptographers use a concept called password entropy, which is a
numerical measure of how difficult a password would be to guess. This is
based on how many available characters might be in the password, and the
length of the password. The more possible characters might be in the
password, the harder it is to guess, and the longer the password is, the
harder it is to guess. It is calculated as:

E = log~2~(C^L^)

Where:\
C = the number of possible unique characters available\
L = the length of the password\
E = the password entropy

In order to write this program, we need to somehow calculate a logarithm
with a base of 2. Python's math library actually has a function that
does exactly this. [You can read about it
here](https://docs.python.org/3/library/math.html#math.log2). We can use
this function to write a program to calculate the password entropy:


``` {.python}
import math

# read the input
chars = int(input("How many characters are available? "))
length = int(input("How long is the password required to be? "))

# perform the calculation
entropy = math.log2(chars ** length)

print("The entropy of this is", entropy)
```

Here we only had one thing in the math library we wanted, so we stuck
with the normal `import math` line to pull in the math library. Then
when we needed to do the logarithm, we call the function we need with
`math.` before it.

Let's try the program out. First we will figure out the password
entropy of a 4-digit pin number:

``` {.output}
How many characters are available? INPUTSTART10INPUTEND
How long is the password required to be? INPUTSTART4INPUTEND
The entropy of this is 13.287712379549449
```

The higher the number, the harder the password would be to guess. Let's
try the scheme of needing 8 characters for a password, and pulling from
lower-case letters, upper-case letters, and digits:

``` {.output}
How many characters are available? INPUTSTART62INPUTEND
How long is the password required to be? INPUTSTART8INPUTEND
The entropy of this is 47.633570483095
```

The 62 comes from the 26 lower-case letters, plus the 26 upper-case,
plus the 10 digits. This password scheme is stronger because it has a
much higher entropy value!

8.6 The random Library
----------------------

------------------------------------------------------------------------

Another very useful library that is included with Python is the `random`
library, for getting random numbers. You can read all about it [on its
documentation page here](https://docs.python.org/3/library/random.html).

Probably the most useful thing in it for us now is `randint` which we
can use to get random integers between two values. For example, the
following program gets the starting point and ending point from the
user, and then prints a random number between those two (including both
ends):


``` {.python}
import random

a = int(input("Starting point: "))
b = int(input("Ending point: "))

num = random.randint(a, b)
print("Your random number is", num)
```

Random numbers are used for all sorts of things in programs. They are
used for games that give you random interactions (for example, some
games give you random "loot" when you defeat enemies). Also some
algorithms use random numbers as an important part of how they work.

In actual fact, computers cannot really give us truly random numbers.
The values that `randint` provides actually are produced from
mathematical sequences. They *seem* random, but are in fact not. These
numbers are called "pseudo-random" for that reason[^1].

Now that we can use random numbers, we can write a simple "Rock, Paper,
Scissors" game. In this game, two players each pick one of the three
possible throws from the name of the game. There are then rules for
determining the winner based on the two throws where:

-   Rock beats scissors
-   Scissors beats paper
-   Paper beats rock

In order to write this program, we will do three main things:

1.  Get the user's throw by asking them in an input statement
2.  Get the computer's throw by choosing a random number
3.  Compare the two and determine a winner

The code for this program is below:


``` {.python}
import random

# get the user's throw
user = input("Rock, Paper, or Scissors? ")

# pick the computer's throw randomly
num = random.randint(1, 3)
if num == 1:
    comp = "Rock"
elif num == 2:
    comp = "Paper"
else:
    comp = "Scissors"
print("Computer throws", comp)

# if they threw the same thing, it's a tie
if user == comp:
    print("Tie!")

# if the user throws something that beats the computer
elif user == "Rock" and comp == "Scissors" or \
     user == "Scissors" and comp == "Paper" or \
     user == "Paper" and comp == "Rock":
   print("You win!")
else:
    print("You lose!")
```

This program does something we have not seen yet, which is to break a
line of code into pieces. The condition which tests to see if the user
wins is very long. We could write it all on one line, but here we split
it into three lines. Because Python cares about indentation, we have to
tell it that those three lines are actually still part of one long
condition. We do that by putting the `\` symbol at the end of the line.
That tells Python that the line continues below.

This program would not work (or at least not be very fun) without random
numbers. We pick the random number to be between 1 and 3. We then use
the random number to decide which of the three things the computer
should play. Here is an example run where we were lucky enough to win:

``` {.output}
Rock, Paper, or Scissors? INPUTSTARTPaperINPUTEND
Computer throws Rock
You win!
```

8.7 Third-Party Libraries
-------------------------

------------------------------------------------------------------------

The math and random libraries both come with Python. If you have Python
installed, you can import them and start using them right away. In this
section we'll talk about how to use libraries that Python *doesn't*
come with. These are sometimes called "third-party" libraries since
some other person besides you and the language designers created them.

Python programmers who want to share a library they created with the
world do so on the [Python Package Index (PyPI)](https://pypi.org/).
This is a common repository for sharing code in a placer everyone can
find it. Most of the widely used libraries on PyPI are very complex,
with many of them having entire textbooks devoted just to them.

As an example of one simple third-party library, we will talk about the
"art" library, which you can read about on the [PyPI art
page](https://pypi.org/project/art/). This library solves the very
important problem of printing messages in fancier "ASCII art" fonts.
To be able to use it, we first must install it. Luckily, Thonny makes
this very easy.

Start by clicking "Tools" on the toolbar, and then "Manage
Packages\...". That pulls up a window that looks something like this:

![The Manage Packages Screen](images/pkgs1.png)

Now we can search PyPI for the art package. There are several results,
so click on the one that just says "art":

![The Search Results for "art"](images/pkgs2.png)

That brings you to this page. Click "Install" to install the package:

![The art Package Screen](images/pkgs3.png)

We should now have the library and be ready to use it. It comes with
several functions you can read about on its home page. For now let's
just call the `art.tprint` function which takes a string and prints it
out in a fancy ASCII art font:


``` {.python}
import art

# print the message in a fancy way
art.tprint("Hello!")
```

That gives us this exciting output:

``` {.output}
 _   _        _  _         _
| | | |  ___ | || |  ___  | |
| |_| | / _ \| || | / _ \ | |
|  _  ||  __/| || || (_) ||_|
|_| |_| \___||_||_| \___/ (_)
```

8.8 Using Libraries
-------------------

------------------------------------------------------------------------

The functions and things that can be used in Python come in three broad
categories:

1.  Python has some "built-in" things that can be used without having
    to import anything. Those can be seen [on this
    page](https://docs.python.org/3/library/functions.html), and include
    `print`, `len`, `round` and so on.
2.  Python also comes with lots of libraries pre-installed, but which
    you need to import to be able to call upon. These include the math
    and random libraries that we have seen in this chapter. You can find
    a list of these [on this page](https://docs.python.org/3/library/).
    We will see a few more examples as we go on.
3.  Lastly, anyone can create their own Python libraries. There are
    thousands of Python libraries that programmers have created and
    shared with others on the Internet. Thonny allows you to download
    them from the Python Package Index. Once downloaded, you can import
    them and use them in your programs.

One of the cool things about coding is that you can build upon the work
of others. It would be overwhelming (if not downright impossible) to
build a big program from scratch and have to write everything in it
yourself. Instead, you can use things that come with Python or written
by others as a part of your program.

::: {.blackbox}
::: {.blackbox-title}
**Chapter Summary**
:::

::: {.blackbox-contents}
-   Python comes with some functions available by default, such as
    `print`, `range`, and `len`. Other things are included with Python,
    but we have to import libraries to access them.
-   The import statement allows us to tell Python we want to use a
    library. The basic and most common form of it imports the library,
    but we must specify the name of the library and a . before each
    thing we use from it.
-   There is another form of import we can use which starts with the
    keyword "from". This form allows us to import things from a
    library without needing to put the name of the library and the .
    before each thing.
-   Each library has a page of documentation which shows you all of the
    things in the library and teaches you how to use them.
-   Programmers use libraries to make programming easier and can even
    share their own code as libraries for others to build off.
:::
:::

Footnotes {#footnote-label .visually-hidden}
---------

[^1]: There have been cases where programmers use this fact to figure out
    the algorithms behind "random" gambling games like slot machines
    and predict when the games will produce a payout.
    
