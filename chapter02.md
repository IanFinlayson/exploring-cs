Chapter 2: Starting Out
=========================


::: {.blackbox}
::: {.blackbox-title}
**Learning Objectives**
:::

::: {.blackbox-contents}
-   Understand what an interpreter, IDE, and shell do.
-   Learn how to install Python on your computer.
-   Know how to write and run simple Python programs.
-   Become comfortable writing programs which print messages to the
    screen.
-   Learn how to get user input into a program.
-   Understand how to create variables, and the rules for using them.
:::
:::

2.1 Interpreters and IDEs
-------------------------


As we learned in the last chapter, computers only directly understand
programs written in machine code. However, nearly all programs are
written in a high-level language. For this to work, we need an
interpreter program to translate the code into what the computer
understands.

So in order to run our programs, we have to install the interpreter for
the language that we want to use. Because we will be using Python, we
need to install the Python interpreter. If we just give Python programs
straight to our computer, it won't know what to do with them. We need
to interpreter to run them.

We will also be installing *another* program along with an interpreter.
This program is something called an **Integrated Development Environment
(IDE)**. An IDE is a program that lets you type in the program you are
writing. You could write your programs in any old program, but it's
generally much easier to use a program geared just for that purpose. For
example, an IDE will give you a button to pass your program to the
interpreter, highlight keywords in the language and make it easier to
see when you have errors.

The IDE we will be using here is a simple one called **Thonny**, which
is easy to use and get started with. It also includes Python with it, so
you only need to install one thing. The choice of IDE doesn't really
matter too much, if you want to use a different one for some reason (for
instance if you have one from another class), you can follow the rest of
the book using that too.

The rest of this chapter will guide you through setting up Python along
with our IDE for whichever type of computer system you have. Then, we
will see how to use it to run some Python code!

2.2 Installing Python
--------------------------------


Installing Thonny is slightly different depending on what sort of
computer you have.  Follow one of the following set of directions
based on whether you have Windows, Mac, or Linux:

1. To install Python along with Thonny on **Windows** computers, go to the
    [Thonny website](https://thonny.org/). Hover over the Windows link in
    the download box at the upper right. Click the top link which is labeled
    "Installer with 64-bit Python". Choose to save the file. When the
    download is finished, run the installer program.

    Click next, select the agreement, choose where to install it, and wait
    for the installer to finish. Once it is done, you should have Thonny,
    along with its Python interpreter installed.


2. To install Python along with Thonny on a **Mac OSX** computer, go to the
    [Thonny website](https://thonny.org/). Hover over the the Mac link in the
    download box at the upper right. Click the link to the .pkg file and download
    it to your computer.

    When the download has finished, you should see the Thonny icon in a
    window. Drag this icon into your applications folder to copy it to your
    computer. You should then have it installed and be able launch Thonny
    from your Application menu to start programming.

3. While all recent versions of **Linux** come with Python, they do not come
    with Thonny. To install it, open up a terminal and run the following
    command:

    ``` {.algorithm}
    bash <(wget -O - https://thonny.org/installer-for-linux)
    ```

    Then hit Enter at the prompt to continue.

    That should download the latest version, and install it on your
    computer. You should be able to find Thonny amongst your installed
    applications. You could also launch it by running the command:

    ``` {.algorithm}
    ~/apps/thonny/bin/thonny
    ```

2.3 The Shell Window
--------------------


You should now have Python and Thonny installed. When you run it, you
should see a window something like this:

![The main Thonny window](images/thonny.png){alt="The main Thonny window"}

The main window has two main parts. The top is the file area. This is
where you will type in the program that you will create. This is empty
right now, and called "\<untitled\>".

The bottom area is called the **Shell**. This is a window where you can
pass Python code to the Python interpreter. Any code you put in here
will be run right away and the results will be given to you. Here is an
example:

![Some examples put into the shell window](images/shell.png){alt="Some examples
put into the shell window, such as adding 3 + 4, and calling the print
function"}

As you can see, when we put `3 + 4` into the shell, it gives us the
answer, 7. Likewise when we put in the command `print("Hi!")`, it prints
what we told it to. What's happening here is that these are small
amounts of Python code. When we put them in, the shell window passes
them to the Python interpreter, which runs them. Any results are
displayed back in the shell. It is called a "shell" because it sort of
surrounds the Python interpreter and acts as our interface to it.

Generally, the top file area is for writing a program that you will run
all at once. This window saves what you put there so you can run it over
and over again as you work on a program. The bottom shell area is for
trying things out and experimenting. Unless you copy and paste it some
place else, the things you put into the shell window are not saved.

As you can see from the first example in the screenshot above, the shell
can work as a calculator. Try putting a few other simple math
expressions in and see how the shell gives you results back.

2.4 Our First Program
---------------------


Now we are ready to write our first program. The goal of the first
program is just to print the text "Hello World" to the screen [^1].
The code for this program is the
following:

**Program 2.1**
``` {.python}
# this is our first program
print("Hello World!")
```

You should type this program into the top window of Thonny. Then we can
run the program. This can be done in one of three ways:

-   Clicking the "Run" menu, then choosing "Run current script".
-   Clicking the green play button (![](images/run.png){alt="The green play
    button"}).
-   Hitting the F5 key.

Before the program can run, it will ask you to save it. When saving your
program files, you should put them some place where you will be able to
find them again. You should also always name them something ending with
the ".py" extension.

Once the program is saved, it will run. You should then see the results
in the shell window:

![The results of running the program](images/prog.png){alt="The program prints
'Hello World!' in the shell window"}

Now that we have seen how to run the program, we will talk about the
program itself a little bit. This program consists of two lines. The
first line says:

``` {.python}
# this is our first program
```

This line is a **comment**. Any line that starts with the \# symbol is a
comment in Python [^2]. When the interpreter
gets a comment line, it completely ignores it, and moves on to the next
line. The sole purpose of comments is to leave little notes in the code,
for any people reading. They are meant to explain things about how the
program works. This program is so short and simple that the comment is
not really needed, but as we work on more complex programs, they'll
become more helpful.

The second line of the program says:

``` {.python}
print("Hello World!")
```

This is the line that actually tells the Python interpreter to do
something. Python comes with lots of commands called **functions** built
in that cause it to do different things. One of these is `print`. The
parenthesis mark the things that will be printed. In this case, it's
just the message "Hello World!".

Both the parenthesis and the quotation marks are needed for the program
to work. You can change the message inside the quotation marks to
whatever you want though. Try changing it so that it prints out your
name.

2.5 When Things Go Wrong
------------------------


We said that the parenthesis and quotes are needed, but what happens if
we get rid of them? In these cases, the Python interpreter will not be
able to figure out what to do with the code, and will give us an error
message. For instance, if we get rid of the quotation marks, we get
this:

![Missing quotation marks](images/error0.png){alt="Python tells us
'Invalid syntax' in red text as an error message"}

Here the program did not run successfully. Instead, the shell gives us
the error `SyntaxError: invalid syntax`. There is also an "Assistant"
window which is a feature of Thonny to help us figure the error out. In
this case, it's not terribly helpful. The specific problem here is that
Python has no idea what to do with the exclamation mark since that
doesn't mean anything in Python code.

If we get rid of the parenthesis instead, we get a different error:

![Missing parenthesis](images/error1.png){alt="Python tells us that we
are missing parentheses and suggests adding them in"}

Here the error is much easier to figure out. It actually tells us what
is missing and even suggests a fix for it. Even though the two errors
were pretty similar, one would be much easier to figure out.

Errors can be stressful as a beginning programmer. Even if your code is
99% correct, one mistake can prevent the interpreter from being able to
figure it out. As you get more experience with programming, they get
easier and easier to fix. In the meantime, you can always ask your
friends or instructor for help.



2.6 Output
----------


In our first Python program, we saw the `print` function which prints
whatever message is put between the parenthesis. Here it is again:

``` {.python}
print("Hello World!")
```

`print` is the main way for doing output in Python. Of course, we can
have multiple print statements in a program. The following program has
three prints:

``` {.python}
print("Welcome to this program!")
print("Hello World!")
print("Bye bye!")
```

When a program has more than one line like this, Python will do them one
by one. This is an important point of programming. Unless we tell Python
otherwise, it starts with the first instruction, then goes through them
in order until it gets to the end.

So this program will print the first line, then the second, and then the
third. The output of this program looks like this:

``` {.output}
Welcome to this program!
Hello World!
Bye bye!
```

By the way, in this book, we will display code in the blocks with a
light grey background, and what the programs output with a darker
background like this.

As you can see, this program prints three lines of output, one for each
of our three print statements. We will look at more things we can do
with print statements in a bit, but first let's look at getting user
input.

2.7 Input
---------


We can also do input in Python, when we want to ask the user for
information. Most programs take some sort of input, which allows us to
control what the program is doing, or what values it is calculating
with.

This can be done with the `input` function. Like `print`, `input` can
take a message inside of parenthesis. In the case of input, this message
is a question to give the user, called a **prompt**.

Here is an example of how `input` works[^3]:

``` {.python}
input("How are you feeling today? ")
```

When we run this program, it will print the prompt to the screen for us,
and then wait for us to type something in. To give the program the input
it's waiting for, we have to type into the shell window at the bottom
of the screen. When you type something in and hit enter, it will take
the input:

![Giving the program input](images/input.png){alt="The user typed
'Pretty Good' into the shell window as input"}

As you can see, Thonny colors what we are typing in blue, and what the
program prints as black. Here the input we gave the program was the
words "Pretty Good".

We can only type one line of text. As soon as we hit enter, Python moves
on from the input instruction. In this case, there is no next
instruction so the program finishes.

This program does not actually *do anything* with the input we give it.
In the program above, whatever the user types in can't really affect
the program at all. In order to do something with input, we must put it
into a *variable*.

2.8 Variables
-------------


We talked about variables briefly when we were talking about algorithms
back in Chapter 1. Here we will talk about how to use them in Python.

Variables in programming are names that we associate with some piece of
information. Variables let us refer back to something that was created
earlier on in a program. They also let us save whatever the user inputs,
so we can keep track of it.

The way that a variable is created in Python is by putting the name on
the left hand side, then an equals sign, and finally the thing that you
want to store in the variable. For instance, if we want to save our
user's input in a variable, we could do it like this:

``` {.python}
answer = input("How are you feeling today? ")
```

Now when we run this program, it will ask us the question, and wait for
us to enter a response. It will then save whatever we give it into the
variable called `answer`. We can now change the program so that it
prints it back to us:

``` {.python}
answer = input("How are you feeling today? ")
print("You said")
print(answer)
```

Here is an example of the output of this program:

``` {.output}
How are you feeling today? INPUTSTARTpretty goodINPUTEND
You said
pretty good
```

The text that we typed is in a different color so that you can see what the
user types in this example. The white text is what the program itself is
printing out.

There are a couple of things to note about this program. First, we have
saved the input we typed into the variable called `answer`. We can then
print this variable out on the third line of the program. This line of
code is worth talking about:

``` {.python}
print(answer)
```

Notice how this did not actually print the word "answer". When we
print a variable, it doesn't print the variable's *name*, it prints
the variable's *value*. Whatever got stored in the variable (which is
whatever we typed in), gets printed here.

Also, notice how there are no quotation marks around "answer" in the
print command. If we put quotation marks in, it *would* actually have
printed out the word "answer". We have to use quotation marks to print
some message out exactly, and no quotation marks when we want to get the
thing stored in a variable.

There are some rules for naming our variables. The name of a variable
has to be made of letters, numbers and underscore characters. They
cannot begin with a number and cannot have spaces in them.

These are examples of legal variable names:

-   `price`
-   `price_in_dollars`
-   `priceFor2`

And these are not legal:

-   `full-price` (the - symbol is not allowed)
-   `2_times_price` (can't start with a number)
-   `price in dollars` (no spaces are allowed)

Variables also should not be named something that already means
something in Python. That means that you should not name a variable
`print` or `input`. There are lots of other names in Python that mean
things and we will see them as we go.

Notice that Thonny colors `print` and `input` differently than other
things. If the new variable you just made also shows up colored like
this, then it means something special and you should pick another name!

2.9 More on Printing
--------------------


In the program above, we printed our message on two different lines,
which looks kind of weird. Instead, we can print it on one line, using
just one print instruction. To do that, we can pass the message and the
variable to print on one line, separated by a comma. That would look
like this:

``` {.python}
answer = input("How are you feeling today? ")
print("You said", answer)
```

When we run this program, it gives us this:

``` {.output}
How are you feeling today? INPUTSTARTpretty goodINPUTEND
You said pretty good
```

There is no limit to how many things we can print like this --- we can
just keep adding things and putting commas between them. Like if we want
to also print "Bye!" so the user knows the program is done, we could
add that in:

``` {.python}
answer = input("How are you feeling today? ")
print("You said", answer, ". Bye!")
```

Now the program prints this:

``` {.output}
How are you feeling today? INPUTSTARTpretty goodINPUTEND
You said pretty good . Bye!
```

Notice that Python automatically puts a space between the things that we
are printing. This is often helpful, but in this case makes the output
look kind of weird since there is a space before our period. When we
want to avoid this, we can also give the text `sep=""` to print. This
tells Python to separate the things it's printing with nothing at all.
Now the program looks like this:

**Program 2.2**

``` {.python}
answer = input("How are you feeling today? ")
print("You said ", answer, ". Bye!", sep="")
```

And it will output the following:

``` {.output}
How are you feeling today? INPUTSTARTpretty goodINPUTEND
You said pretty good. Bye!
```

Note that we had to now put a space between "You said" and the
variable because now there isn't one put in automatically. Some people
aren't too bothered about details like this, but I like to get the
spacing to look exactly right for the program's output.

2.10 Example: Greeting Program
-----------------------------


Now let's create a slightly longer program which will need two
variables. We'll talk about how the program will behave first, and then
talk about how to write it.

We want the program to ask the user for two things:

1.  Their name
2.  What day of the week it is

It will then give them a personalized greeting wishing them to have a
good day. For example, if we put in "Nicole" and "Thursday", then it
would print this:

``` {.output}
Hello Nicole!
Have a great Thursday!
```

However, if we put in "Tim" and "Monday" when the program asks our
name and what day it is, then it will print this:

``` {.output}
Hello Tim!
Have a great Monday!
```

This is an important point in programming --- what the program does will
depend on the input given to it. It means that we can't just write the
program like this:

``` {.python}
print("Hello Nicole!")
print("Have a great Thursday!")
```

If we did, then it works if your name is Nicole, and it happens to be
Thursday, but it won't work in any other case. You also can't just
replace "Nicole" and "Thursday" with your own name and day. If you
do, it will work for you that day, but not in any other situation.

What we want is to have the program do the right thing in *every*
situation. For that, we need to put the name and the day into variables.
We will need one for each thing. One variable generally keeps track of
just one piece of information.

We will start by asking the user their name and storing the result into
a variable:

``` {.python}
name = input("What is your name? ")
```

Next, we need to ask them for the other piece of information we need,
the day of the week:

``` {.python}
day = input("What day is it? ")
```

Now we have these two variables, which we have called `name` and `day`.
The next step is to do the printing. Now we will use our variables so
that whatever answers they gave to those questions will be repeated:

``` {.python}
print("Hello ", name, "!", sep="")
```

This will print "Hello ", followed by the user's name, and then an
exclamation point, with no spaces in between (so the exclamation shows
up right after their name).

Now it should greet them by name no matter what they put in. We can do
the same thing to wish them a good day:

``` {.python}
print("Have a great ", day, "!", sep="")
```

Below is the whole program, with a comment at the top. It's usually a
good idea to put a comment at the top of your code explaining what the
point of the program is.

**Program 2.3**

``` {.python}
# this program gives the user a custom greeting
name = input("What is your name? ")
day = input("What day is it? ")

print("Hello ", name, "!", sep="")
print("Have a great ", day, "!", sep="")
```

Notice the program also has a blank line in it. Blank lines are ignored
just like comments are. It's common in programs to put a blank line
between different sections of code --- kind of like paragraphs in a
paper.

Below is an example run --- though of course what it prints exactly
depends on what you tell it!

``` {.output}
What is your name? INPUTSTARTMaryINPUTEND
What day is it? INPUTSTARTFridayINPUTEND
Hello Mary!
Have a great Friday!
```


2.11 Comprehension Questions
---------------------------


1. Why do we need an interpreter for running programs written in high-level languages like Python?
2. What is an Integrated Development Environment (IDE)?
4. What is a comment in Python, and what is its purpose in a program?
5. What happens if there is an error in a program?  Will the program be able to
   be run?
6. If a program has multiple statements, where does Python begin executing them?
7. Why do we almost always assign the result of a call to input into a variable?
8. What happens if Python sees a blank line in a program?
9. Why do you think Python doesn't allow spaces to be in variable names?
10. What's the difference between: `print(name)` and `print("name")`?


2.12 Programming Exercises
-------------------------


1. Change program 2.3 so that it also asks the user where they are from.
   Then, make it so the print also says where the user is from such as
   "Hello Mary from Pennsylvania" or "Hello Joe from England", before
   telling them to have a great day.
2. Write a program that asks the user for their name, major, and class (such as
   first-year, sophomore, junior, or senior).  Then print out a message to them
   using those three pieces of information.



::: {.blackbox}
::: {.blackbox-title}
**Chapter Summary**
:::

::: {.blackbox-contents}
-   An interpreter is a program that translates programs so that they
    can be executed by the computer. An IDE is a program that lets you
    write programs and passes them to the interpreter.
-   The Thonny IDE can be installed on Windows, Mac, or Linux. It has a
    file window for writing programs, and a shell window for running
    commands interactively.
-   Comments are lines starting with a \# and are little notes that are
    put into programs.
-   The `print` command is used to print things to the screen. You can
    pass multiple things to `print`, and it will print them one after
    the other.
-   The `input` command is used to get input from the user. Input should
    normally be stored into a variable.
-   Variables are used to keep track of information in a program. They
    are given a name of your choosing and can be referred to later.
:::
:::

Footnotes {#footnote-label .visually-hidden}
---------

[^1]: Having the first program print this message is something of a silly
    tradition in computer science. It dates back at least to the 1978
    book "The C Programming Language".

[^2]: I used to insist this symbol be called a "pound" or "hash"
    symbol, and become annoyed when it was called a "hashtag", but
    I've accepted it. You can say that Python comments begin with
    hashtags.
    
[^3]: Notice the space after question mark. That is not necessary, but it
    puts a space before the user can start typing, which I think looks
    neater.



