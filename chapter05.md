Chapter 5
=========

------------------------------------------------------------------------

Making Decisions {#making-decisions .sub}
================

::: {.blackbox}
::: {.blackbox-title}
**Learning Objectives**
:::

::: {.blackbox-contents}
-   Learn how to use if statements to make programs that make decisions.
-   Understand comparisons and how to make them.
-   Meet the boolean type and the boolean operations.
-   Learn how to use elif and else statements to create multi-way
    decisions.
:::
:::

5.1 Decisions in Algorithms
---------------------------

------------------------------------------------------------------------

So far, our programs have all started on the first line and executed
each line in sequence until the end of the program. However, many
algorithms have the need to make decisions and do different things under
different conditions.

For example, when we talked about algorithms back in chapter 1, we came
up with the following for guessing a number when the player just
answered \"yes\" or \"no\":

**Algorithm 1**
```
    1. Set G to 1.
    2. Ask if their number is G.
    3. If it was, then we are done!
    4. If it was not, then add 1 to G.
    5. Go back to step 2.
```

Here the algorithm needs to make a decision based on the information it
has available to it. If the guess was right, we do one thing. Otherwise
we do another. Lots of algorithms have to do things like this.

Another example is adding numbers. When you are adding a column of
numbers you have to make a decision on whether to carry or not. You
check if the column totals more than 9. If so, you carry the tens place
to the next column. If not, you don\'t.

In this chapter, we will talk about how to write Python programs that
make decisions like this.

5.2 If Statements
-----------------

------------------------------------------------------------------------

The way that we can make decisions like this in Python is with an *if
statement*. If statements in Python start with the word `if`, followed
by some sort of condition, then a colon.

A **condition** is something that might be either true or false. For
example, if we read in a number from the user, it might be bigger than
10, or it might not. To check this, we could use the following if
statement:

``` {.python}
if number > 10:
```

After this line, we put all of the code that we want to happen when the
condition is true. For example, we can just print a message that the
number is bigger than 10 with a program like this:

``` {.python}
number = int(input("Enter a number: "))
if number > 10:
    print("That is bigger than 10.")
```

When Python runs this program, it will check if the condition of the
number being bigger than 10 is true or not. If it is, Python will
execute the print statement. If the condition is false, that print line
will not be executed.

If we run this program and put in a number bigger than, we will see the
message like this:

``` {.output}
Enter a number: 50
That is bigger than 10.
```

However, if we put in something smaller than 10, the program will
**not** run the print message, and we will see nothing:

``` {.output}
Enter a number: 5
```

5.3 Indentation and Spacing
---------------------------

------------------------------------------------------------------------

Notice that the print message in the program above was indented over to
the right. Sometimes spaces don\'t matter in Python programs, but here
these spaces before the print are actually really important. Python uses
indentation to mark if lines are part of an if statement or not.

For example, we can add some more message to the program above, and
whether they are indented or not will determine if they are \"part of\"
the if statement:

``` {.python}
number = int(input("Enter a number: "))
if number > 10:
    print("That is bigger than 10.")
    print("Good job putting such a big number!")
print("Bye bye!")
```

The first two messages, the ones which are indented, will only be
executed when the number is bigger than 10. However, the message which
says \"Bye bye!\" will be printed every single time the program runs ---
whether the condition is met or not. That\'s because it\'s not indented,
so it\'s not part of the if statement.

For this to work, we need to indent our code correctly so Python can
tell if it\'s part of an if statement or not. Code should normally not
be indented, but if it\'s part of an if, it should be. If you mix up
indentation, Python will get confused. For instance, code like this will
not work:

``` {.python}
# error, messed up indentation!
number = int(input("Enter a number: "))
if number > 10:
    print("That is bigger than 10.")
  print("In between")
print("Bye bye!")
```

Here Python will be confused because it doesn\'t know what to do with
the second message. Is it part of the if block or not?

5.4 Comparisons
---------------

------------------------------------------------------------------------

In the example above we used the `>` operator to compare two numbers and
decide which one was bigger. Of course we can also check if something is
less than something else. Or if two things are equal or not. Python uses
the following comparison operators:

  ------ --------------------------
  `<`    Less than
  `>`    Greater than
  `<=`   Less than or equal to
  `>=`   Greater than or equal to
  `==`   Equal to
  `!=`   Not equal to
  ------ --------------------------

The `<` and `>` operators will be familiar to most people from math.
However Python is designed so its easy to type code on a regular
keyboard. So instead of the ≤ ≥ and ≠ symbols, Python uses `<=`, `>=`,
and `!=`.

Also notice that to check if two things are equal, Python uses **two**
equal signs. That\'s because a single `=` is already used for something:
assigning variables. It\'s a pretty common mistake to forget to put the
second equal sign in.

5.5 Example: Checking Input
---------------------------

------------------------------------------------------------------------

One common use of if statements is to check if the input users enter
makes sense or not. For example, if we ask the user their age, they
could enter a value that doesn\'t make sense like -7, or 3000. We can
use if statements to write a program which will check if the age given
is too low or too high before going on to the rest of the program. We
will also give them another chance to put in their age correctly.

For our purposes, let\'s say the age has to be between 5 and 125.
Anything less than 5 we\'ll count as a mistake (we\'re assuming toddlers
aren\'t going to use this program). Also, anything over 125 will be
counted as too old (assuming the person using the program hasn\'t broken
the lifespan record by three years).

We can do this with the following program:

**Program 5.1**


``` {.python}
age = int(input("What is your age? "))

if age < 5:
    print("That is too young!  Try again.")
    age = int(input("What is your age? "))

if age > 125:
    print("That is too old!  Try again.")
    age = int(input("What is your age? "))

print("Your age is", age)
```

Because the lines of code which scold the user for entering bad data are
indented under the if line, they will only happen when the conditions
are true. If the user enters good data, they will never be done. For
example if we put in 20, this happens:

``` {.output}
What is your age? 20
Your age is 20
```

However, if we put in too low of a number, the condition in the first if
statement *will* be true. When that happens, the scolding and getting a
new age will happen:

``` {.output}
What is your age? 2
That is too young!  Try again.
What is your age? 20
Your age is 20
```

Likewise, if we put in an age which is over 125, the second if statement
will have a true condition:

``` {.output}
What is your age? 750
That is too old!  Try again.
What is your age? 75
Your age is 75
```

There\'s one flaw in this program which is that if you give a bad answer
*twice*, then it will just accept it. For example:

``` {.output}
What is your age? 750
That is too old!  Try again.
What is your age? 750
Your age is 750
```

In order to fix this, we will need to learn how to repeat some code over
and over again. That\'ll be the topic of the next chapter!

5.6 Booleans Types
------------------

------------------------------------------------------------------------

Last chapter we talked about **types** in Python. So far we have learned
about strings, integers and floats. Last chapter we saw how these work
and how to use them. But when we use if statements, we are actually
using another type.

It is called the *boolean* type. Numbers and strings can have many, many
different values. In fact there are essentially infinitely many
different values an integer or string can have. A boolean, on the other
hand, can have only two different values: `True` or `False`. Boolean
values are used to represent whether conditions are true or not. A
condition like `age < 5` has a boolean value. Either the age is less
than 5 (in which case it\'s true), or it isn\'t less than 5 (in which
case it\'s false).

The somewhat unusual name \"boolean\", which Python shortens to \"bool\"
comes from the English mathematician George Boole. Boole developed a
form of math based on true/false values which became influential in the
development of computers.

![George Boole, circa 1860](images/boole.jpg)

We often use booleans like the programs above. We do a comparison which
has a true/false value, and put it right into the if statement. But
booleans are normal types which means we can put them into variables
too.

For instance, we can assign a variable to be `True` or `False`:

``` {.output}
>>> done = False
>>> type(done)
<class 'bool'>
```

We could also put the result of a condition into a variable:

``` {.output}
>>> valid = length >= 0
>>> valid
True
```

Booleans are used for keeping track of information like whether certain
conditions have been met, or whether events have occurred. We will find
uses for using boolean variables like this next chapter.

5.7 Boolean Operations
----------------------

------------------------------------------------------------------------

Remember that a type determines what sorts of things you can do with
something. If you\'ve got a string, you can find the length, or join it
to another string. If you\'ve got an integer, you can add or subtract
it. If you have a boolean, there are things you can do to it too.

Booleans actually have just three operations:

-   not
-   and
-   or

The simplest of these is `not`. This operator just reverses the boolean
you give it. If you have a boolean which is true, then you apply `not`
to it, you get false. Here\'s an example:

``` {.output}
>>> valid = length >= 0
>>> valid
True
>>> not valid
False
```

If `valid` is true, then `not valid` is the opposite of that: false.

The next operator is `and`. This combines two booleans and tells you if
they are **both** true. For example, we could use this in an if
statement for checking if our age is within the 5 through 125 range:

``` {.python}
age = int(input("What is your age? "))

if age >= 5 and age <= 125:
    print("Your age is valid.")
```

Here we are combining up two boolean values. The first is the value we
get from `age >=5`. This will either be true or false. The second is
`age < 125`. When we combine them with `and`, we are going to end up
with true if both parts are true. If either part (or both parts) are
false, then we get false.

The last operator is `or`. Like `and`, it combines up two booleans and
gives you a new one. Whereas `and` checks if **both** sides are true,
`or` checks if **either** one is.

We could use this to write a program to detect when the age is
*invalid*:

``` {.python}
age = int(input("What is your age? "))

if age < 5 or age > 125:
    print("Your age is NOT valid.")
```

Notice how we use the or to combine up the two cases into one if
statement. Before we had the boolean operators at our disposal, we had
to do this with two separate if statements. Now, we can combine it into
one line.

5.8 Two-Way Decisions
---------------------

------------------------------------------------------------------------

Oftentimes, we want to test a condition and, if it\'s true, do one
thing, and if it\'s false, do another thing. For example, if we want to
write some code which tells us how to get dressed based on the
temperature, we could do something like this:

``` {.python}
temp = float(input("What temperature is it out? "))

if temp < 80:
    print("You should wear pants.")

if temp >= 80:
    print("You should wear shorts.")
```

This program checks if it\'s less than 80 degrees and tells the user to
wear pants in that case. It then checks the opposite: if it\'s not less
than 80 out, then it must be greater than or equal to 80 degrees. Here
it says to wear shorts.

It\'s so common to want to do this, that there is a simpler way, using
an `else` statement. That would look like this:

``` {.python}
temp = float(input("What temperature is it out? "))

if temp < 80:
    print("You should wear pants.")
else:
    print("You should wear shorts.")
```

Here, it will check if the temperature is less than 80. If so, it does
the first print message, telling us to wear pants. If the condition was
false, then it does the \"else\" part of the code --- the print which
tells us to wear shorts instead.

With an if/else statement, if the if condition is true, than the code
under the if line is executed. Otherwise, the code under the else line
is executed instead. It can never do *both* things.

5.9 Multi-Way Decisions
-----------------------

------------------------------------------------------------------------

Sometimes we have more than one condition we want to check, and handle
each one differently. We can do this using Python\'s `elif` statement.
This stands for \"else if\", and allows us to chain together multiple
conditions.

For example, imagine we want to expand our clothing-recommender program
to include cold weather. We could do it like this:

``` {.python}
temp = float(input("What temperature is it out? "))

if temp < 60:
    print("Wear a coat.")
elif temp < 80:
    print("You should wear pants.")
else:
    print("You should wear shorts.")
```

Here we recommend a coat when it\'s less than 60 degrees, pants when
it\'s less than 80, and shorts otherwise.

The way this works is that Python checks each condition in order. Once
it finds one condition that is true, it executes the statements under it
and then goes to the end of the chain. This is important because it
means **only one** of the parts will ever run. For example, in the above
program, if we put in 50, it will do this:

``` {.output}
What temperature is it out? 50
Wear a coat.
```

Here the first condition was true, so it tells us to bring a coat. Even
though the second condition is true as well, it doesn\'t tell us to wear
pants. As soon as one case in the chain is true, it stops.

There\'s no limit to how many `elif` statements we can include. If we
want, we can expand it even more:

**Program 5.2**

``` {.python}
temp = float(input("What temperature is it out? "))

if temp < 10:
    print("It's super cold, maybe stay home?")
elif temp < 30:
    print("Wear a snowsuit")
elif temp < 60:
    print("Wear a coat.")
elif temp < 80:
    print("You should wear pants.")
elif temp < 95:
    print("You should wear shorts.")
else:
    print("It's super hot, maybe stay home?")
```

It will still only give us one message, no matter what temperature we
put in.

Next chapter we will continue talking about booleans and conditions. We
have seen how they can be used to make decisions with if statements.
Next we will see how they can be used to repeat code over again with
loops.

::: {.blackbox}
::: {.blackbox-title}
**Chapter Summary**
:::

::: {.blackbox-contents}
-   Python if statements allow us to write programs which do different
    things according to a condition.
-   The indentation of code is important as it indicates what lines we
    always do, and what lines are part of an if statement.
-   We can use comparison operators to make decisions based on variables
    in our programs.
-   The boolean type represents a true or false value. They can be
    combined with the boolean operators: and, or, and not.
-   We can use the `else` statement to create a two-way decision. This
    makes the program do one thing when the condition is true, and a
    different thing when the condition is false.
-   The `elif` statement can be used when we have more than two cases in
    our program. Python will do the first condition that is true.
:::
:::
