Chapter 6
=========

------------------------------------------------------------------------

Going Back Again {#going-back-again .sub}
================

::: {.blackbox}
::: {.blackbox-title}
**Learning Objectives**
:::

::: {.blackbox-contents}
-   Learn how to write while loops to repeat code while some condition
    is true.
-   Understand infinite loops, and know how to stop a program with an
    infinite loop.
-   Learn how for loops work, and how to use them to loop through
    strings.
-   Learn how to use the range function to create sequences of numbers
    that can be used with for loops.
:::
:::

6.1 Repeating Steps
-------------------

------------------------------------------------------------------------

Many algorithms are built on the concept of a **loop** where you repeat
some steps of the algorithm multiple times. For example:

-   On a shampoo bottle, it says \"Lather, rinse, and repeat\".
-   In our \"guess the number\" algorithm, we have to keep on guessing
    until we guess the number right.
-   In adding and subtracting algorithms you learned in grade school you
    must keep going for every digit of the number.

With loops we will be able to write programs that do these kinds of
things, and repeat some part of the program over again.

As a first example, consider the \"guess the number\" game. We could in
theory just use if statements to guess all the numbers:

``` {.python}
if input("Did you guess 1? ") == "yes":
    print("Got it!")
elif input("Did you guess 2? ") == "yes":
    print("Got it!")
elif input("Did you guess 3? ") == "yes":
    print("Got it!")
elif input("Did you guess 4? ") == "yes":
    print("Got it!")
elif input("Did you guess 5? ") == "yes":
    print("Got it!")
elif input("Did you guess 6? ") == "yes":
    print("Got it!")
elif input("Did you guess 7? ") == "yes":
    print("Got it!")
elif input("Did you guess 8? ") == "yes":
    print("Got it!")
elif input("Did you guess 9? ") == "yes":
    print("Got it!")
elif input("Did you guess 10? ") == "yes":
    print("Got it!")
```

However, this is clearly kind of repetitive. It also isn\'t sustainable,
if we wanted to write a program that would guess a number from 1 to 100,
that would be a lot of typing! Instead we should use a loop.

6.2 While Loops
---------------

------------------------------------------------------------------------

The simplest loop in Python is the while loop. The while loop looks a
lot like an if statement. It starts with the word `while`, and then it
has a condition, followed by a colon. Then there are some statements
indented over. These statements are called the **loop body**.

The following is a simple example of a program with a while loop:

**Program 6.1**

``` {.python}
number = 1
while number <= 10:
    print(number)
    number = number + 1
```

The way a while loop works is sort of similar to an if statement too.
When this program is run, we start by setting the number variable to 1.
Next we check if that variable is less than or equal to 10. If so we do
the statements indented under the loop.

The difference is that, after we\'re done those statements, *we go back
to the top*. It will check the condition another time. If it\'s *still*
true, it does the loop again. It will keep on doing it over and over
again until the condition is false.

In this particular case, the program will find that the condition is
true the first time, so it will print the number, and then add one to
it. Now the number is 2. This is still less than or equal to 10, so it
does the loop body again. It keeps going on like this until the number
variable is bigger than 10. So the output will be this:

``` {.output}
1
2
3
4
5
6
7
8
9
10
```

We can now use a while loop to implement the simple version of the
\"guess a number\" game as follows:

**Program 6.2**

``` {.python}
# start by asking for 1
number = 1
answer = input("Did you guess 1?")

# keep doing the loop until the answer is yes
while answer != "yes":
    number = number + 1
    answer = input("Did you guess " + str(number) + "?")

# when we are done the loop it means we got it
print("Got it!")
```

This program will keep looping until the user enters \"yes\". At that
point, the condition becomes false and so the loop exits.

There\'s quite a bit going on in this code, so let\'s go through it.

-   First, we need to ask them the first question: whether their number
    was 1 or not. We do this so that the variable answer is defined for
    the start of the loop.
-   We then have the loop condition which checks if their answer was not
    \"yes\". If it wasn\'t we go into the loop. If it was, then we got
    it on the first try, and skip over the whole loop.
-   Inside the loop body, we add 1 to the number variable. This is how
    we change the thing we guess from 1, to 2, to 3, etc.
-   We also ask them if the latest number is their guess or not. Doing
    so is a little tricky. Unlike `print`, the `input` function doesn\'t
    let us pass it numbers, only a string. So we have to convert number
    to a string with the `str` function, and join it to the rest of the
    question.
-   The code after the while loop, which prints \"Got it!\", will only
    happen once the condition becomes false. For this program that means
    that answer *was* yes.

6.3 Example: Checking Input
---------------------------

------------------------------------------------------------------------

We\'ve talked about how to use if statements to check if user input is
valid. For instance, this program will check if the user enters a
negative number for their age:

``` {.python}
# program that checks for bad data once
age = int(input("How old are you? "))

if age < 0:
    print("Hey, your age can't be negative!")
    age = int(input("How old are you for real? "))

print("You are", age, "years old.")
```

However, if someone puts in a negative number twice in a row, then the
bad input will still get through. We could of course repeat the check
again to make *really* sure:

``` {.python}
# (silly) program that checks for bad data twice
age = int(input("How old are you? "))

if age < 0:
    print("Hey, your age can't be negative!")
    age = int(input("How old are you for real? "))

if age < 0:
    print("Hey, your age STILL can't be negative!")
    age = int(input("How old are you for real? "))

print("You are", age, "years old.")
```

Of course now, they can put in a negative number *three* times. Clearly
this is not a great way of approaching this. A better way would be to
use a loop. In this case, we will want to keep on asking them, over and
over again, until they eventually put in valid data. Maybe this is the
first try, or maybe it\'s the hundredth.

We can do it by simply replacing `if` with `while`. Now, the program
will *keep* asking the user for data until it is greater than or equal
to 0. Now the program looks like this:

**Program 6.3**

``` {.python}
# program that checks for bad data over and over
age = int(input("How old are you? "))

while age < 0:
    print("Hey, your age can't be negative!")
    age = int(input("How old are you for real? "))

print("You are", age, "years old.")
```

Below is an example run of this program, where the user messes up by
entering a negative age a few times in a row:

``` {.output}
How old are you? INPUTSTART-5INPUTEND
Hey, your age can't be negative!
How old are you for real? INPUTSTART-2INPUTEND
Hey, your age can't be negative!
How old are you for real? INPUTSTART-7INPUTEND
Hey, your age can't be negative!
How old are you for real? INPUTSTART-1000INPUTEND
Hey, your age can't be negative!
How old are you for real? INPUTSTART27INPUTEND
You are 27 years old.
```

6.4 Infinite Loops
------------------

------------------------------------------------------------------------

One danger when creating loops is that the condition might *never*
become true. For example, there\'s a mistake in the program below which
causes this:

``` {.python}
number = 1

while number < 10:
    print(number)
    numer = number + 1

print("All done!")
```

Here we mistyped \"number\" as \"numer\". So when we run the addition,
it doesn\'t change number to be bigger. Instead it makes a *new*
variable. Because of our typo, the variable `number` never reaches 10,
so the condition stays false forever. This is called an *infinite loop*
and is a common programming mistake.

If you run this program, it will never stop running. It will just
continue on forever. Or until you stop it, which is probably what you
will want to do. You can do this in Thonny by hitting the stop button
(![](images/stop.png)), or by choosing \"Stop/Restart backend\" from the
\"Run\" menu.

6.5 Example: Running Total
--------------------------

------------------------------------------------------------------------

Let\'s write a program that will compute a running total of numbers. The
way this will work is that you will put in numbers to the program, and
it will add them all together, and show you the sum after each one. You
can then stop the program by entering a 0 (there\'s no reason to add 0
normally since it won\'t change anything).

Below is an example of a run of this program, so you can see how it
should work before we dive into some code:

``` {.output}
What's the first number? INPUTSTART7INPUTEND
Running total is 7
Next: INPUTSTART12INPUTEND
Running total is 19
Next: INPUTSTART-5INPUTEND
Running total is 14
Next:  INPUTSTART2INPUTEND
Running total is 16
Next:  INPUTSTART0INPUTEND
The total is 16
```

The code which solves this problem is given below:

**Program 6.4**

``` {.python}
# get the first number
number = int(input("What's the first number? "))
total = number

# keep going until they enter 0
while number != 0:
    print("Running total is", total)
    number = int(input("Next: "))
    total = total + number

# print the final result
print("The total is", total)
```

We start by getting the first number from the user. The `number`
variable is used to store the thing they just entered. The `total`
variable is used to keep track of the running sum. It starts as the same
as the number first entered.

The condition for this while loop is `number != 0`. So we will keep
going as long as the number they entered wasn\'t 0.

Inside the loop, we do a few things. First we print out the total so the
user can see it change for each number they enter. Then we get the next
number. Lastly we add it to the total variable.

After the loop, we just print out the total sum.

This kind of program would be *impossible* to write without a loop of
some kind. Even if we wanted to copy and paste a bunch of code, we
couldn\'t because we don\'t know ahead of time how many numbers the user
will want to add.

6.6 For Loops
-------------

------------------------------------------------------------------------

There is another type of loop in Python called a **for loop**. A for
loop is similar to a while loop in that it lets you do some piece of
code over and over again. But it is different in that it loops through
every element in a *sequence* of some kind.

The only type of sequence we have seen so far is a string. A string is a
sequence of characters (which could be letters, digits, punctuation,
etc.). Below is a for loop that just prints each character one by one:

**Program 6.5**

``` {.python}
name = input("What's your name? ")

for letter in name:
    print(letter)
```

The for loop looks a bit different from the while loop. Instead of the
condition, we have the word `for` followed by a variable name. The
variable name above is `letter`. Then we have the word `in`, followed by
the sequence we are using. In this case, that\'s the string `name`.

When you run a for loop, it makes the variable (`letter` in this case)
equal to each thing in the sequence one-by-one. It then runs the loop
body on it. So if we enter, let\'s say \"Amy\" as the name, then it will
first set `letter` to \"A\". It will then run the loop body on \"A\".
Next it will run the loop body again, but with `letter` equal to \"m\".
Lastly it will run the loop body with `letter` as \"y\". Then it will
stop.

The result of running this program can be seen below:

``` {.output}
What's your name? INPUTSTARTAmyINPUTEND
A
m
y
```

The result of this program is that it prints the name out vertically.

Every for loop could be replaced by a while loop that does the same
thing. In the example above, we could have written a while loop to count
up to the length of the string, and used indices to get the letters out.

But for loops have a few benefits when looping through a sequence:

-   It\'s much harder to accidentally make an infinite for loop.
-   For loops are a little easier to read. They make our intention of
    looping through a sequence more obvious.

6.7 The range Function
----------------------

------------------------------------------------------------------------

For loops can be used to loop through any *sequence*. A string is just
one type of sequence. There are several others in Python. The next one
that we will look at is a *range*.

The `range` function is used to create a sequence of numbers. For
example, we could use `range` to make a sequence of numbers from 1
through 10. Or a sequence of numbers from 25 down to 5. We can then
combine `range` with a for loop to write code that does something for
each number in the sequence.

If we pass `range` 1 number, it will give us a sequence from 0 up to
(but not including) that number. For example, if we pass 10:

``` {.python}
for i in range(10):
    print(i)
```

Then range will give us a sequence of numbers going from 0 through 9.
Instead of starting at 1, range starts at 0 --- just like string
indices[^1]. If we run this program, we will
get:

``` {.output}
0
1
2
3
4
5
6
7
8
9
```

Just like the for loop with a string, this for loop sets our variable
(called `i`) to each thing in the sequence one by one. It then runs the
loop body once for each value.

If we don\'t want to start on 0, we can also pass range a starting
point. To do that, we have to pass two numbers. The first is the start
and the second is 1 past the ending point.

For example, if we want to make a range of numbers from 5 through 10,
including both end points, we could do it like this:

``` {.python}
for i in range(5, 11):
    print(i)
```

This program will print the numbers from 5 to 10:

``` {.output}
5
6
7
8
9
10
```

Lastly, we can pass *three* numbers into `range`. The first two are the
same as before. The last number we pass in will be used as *step*
between each. For example, if we want to go through even numbers from 2
through 10, we could pass a step of 2:

``` {.python}
for i in range(2, 11, 2):
    print(i)
```

This gives us the following:

``` {.output}
2
4
6
8
10
```

The step is just the amount that you add to each number to go on to the
next one.

We could also pass a negative number for the step to go *backwards*:

``` {.python}
for i in range(10, 0, -1):
    print(i)
```

This gives us the following:

``` {.output}
10
9
8
7
6
5
4
3
2
1
```

6.8 Example: Temperature Table
------------------------------

------------------------------------------------------------------------

As an example of a for loop with a range, let\'s write a program which
gives us a table of Celsius temperatures with their equivalent
Fahrenheit temperatures. Rather than read in one, and print out the
other, we will just print a whole table. That way the user can see how
the two relate.

One part of this is converting one temperature from Fahrenheit to
Celsius. We can do this by subtracting 32 from the Fahrenheit
temperature and then multiplying by ^5^⁄~9~.

The next part is doing this for a bunch of temperatures. To be helpful,
let\'s make the range of temperatures start at the lowest Fahrenheit
temperature it\'s likely to be. Here in Virginia, it\'s rare that it
gets below 0°, or above 100° Fahrenheit. We can therefore use 0 as the
starting point to range, and 101 as the ending point (remember it has to
be just *past* the value we want to end at.

It will also be nicer if we don\'t print *every* temperature from 0° to
100°. 100 lines of output will probably be too much. Instead, we will go
in increments of 5°. To do this, we can just pass 5 for the last thing
to `range`.

The program, then, is given below:

**Program 6.6**

``` {.python}
# loop from 0 to 100, going 5 at a time
for far in range(0, 101, 5):
    # do the conversion, and round it
    cel = (far - 32) * 5/9
    cel = round(cel, 2)

    # print one line of the table
    print(far, "degrees F =", cel, "degrees C")
```

Here our loop variable is called `far` (short for Fahrenheit). It is
given all the values in the sequence of numbers we make with range.
First it\'s 0, then 5, then 10, all the way to 100.

For each time through the loop, we do all of the commands on the loop
body. This converts to a Celsius temperature, rounds it, and prints out
the two temperatures that are equivalent.

The output from this program is given below:

``` {.output}
0 degrees F = -17.78 degrees C
5 degrees F = -15.0 degrees C
10 degrees F = -12.22 degrees C
15 degrees F = -9.44 degrees C
20 degrees F = -6.67 degrees C
25 degrees F = -3.89 degrees C
30 degrees F = -1.11 degrees C
35 degrees F = 1.67 degrees C
40 degrees F = 4.44 degrees C
45 degrees F = 7.22 degrees C
50 degrees F = 10.0 degrees C
55 degrees F = 12.78 degrees C
60 degrees F = 15.56 degrees C
65 degrees F = 18.33 degrees C
70 degrees F = 21.11 degrees C
75 degrees F = 23.89 degrees C
80 degrees F = 26.67 degrees C
85 degrees F = 29.44 degrees C
90 degrees F = 32.22 degrees C
95 degrees F = 35.0 degrees C
100 degrees F = 37.78 degrees C
```

There are other types of sequences that for loops work with. We will see
a few more as we go. We will also see lots more examples of solving
problems with loops. Almost all algorithms use looping in some fashion.

::: {.blackbox}
::: {.blackbox-title}
**Chapter Summary**
:::

::: {.blackbox-contents}
-   Many algorithms use looping, which is repeating some steps of the
    algorithm multiple times.
-   While loops are based on a condition. They check if the condition is
    true. If it is, they run the code in the loop body. They then check
    the condition again. They will keep doing this until the condition
    is false.
-   It is possible to make a loop where the condition will never become
    true. This is called an infinite loop, and usually is a mistake.
-   A for loop is used to do something with every part of a sequence.
-   A string is a sequence. If you want to do something with every
    character in a string, a for loop works best.
-   We can also create sequences of numbers with the `range` function.
    `range` can be given a starting point, an ending point, and the
    amount to increase or decrease by.
:::
:::

Footnotes {#footnote-label .visually-hidden}
---------

[^1]: It might seem weird at first, but we count starting at 0 in
    computer science. The reason has to do with the fact that memory
    addresses are calculated based on an offset past the start of
    something. So the first symbol in a string is stored 0 bytes past
    the beginning.

