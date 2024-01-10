Chapter 9: Functions
====================

------------------------------------------------------------------------

::: {.blackbox}
::: {.blackbox-title}
**Learning Objectives**
:::

::: {.blackbox-contents}
-   Understand some of the benefits of splitting a program into multiple
    functions.
-   Learn how to create our own functions.
-   Understand the purpose of parameters and how to write functions that
    use them.
-   Understand the purpose of return values and how to use them.
-   Learn what "scope" is and how it affects variables in functions.
:::
:::

9.1 What is a Function?
------------------------

We have been calling functions in Python ever since the very first
"Hello World!" program:

``` {.python}
print("Hello World!")
```

Here we are calling the `print` function and asking it to print the
given message to the screen for us. Every function has a job to do. The
job of the print function is to print thins to the screen. When we
"call" a function, we ask it to do its job.

Functions can have **parameters**, which are the things between the
parenthesis. Parameters allow us to pass data to a function to control
how it works. The print function prints out each of its parameters.

Consider the following function call:

``` {.python}
import math
x = math.sqrt(144.0)
```

The `math.sqrt` function takes a number as a parameter. The job it has
to do is to calculate the square root of the parameter. Unlike the print
function, the sqrt function *returns* a value. We use parameters to give
information to a function, and return values let functions give
information back to us. So here, 144.0 is the parameter, and the return
value will be 12.

Not all functions return values. If we try to print the return value
from the `print` function, we'll get the value "None":

``` {.python}
>>> x = print("Hello")
>>> print(x)
None
```

So parameters allow us to pass information to functions. Some functions
take no parameters, some take one, and some take more. Likewise some
functions return a value back and some do not.

------------------------------------------------------------------------

9.2 Why Write Functions?
-------------------------

In addition to calling functions that already exist, we can create our
own. There are many reasons to do this. The first is to split our code
up into more manageable pieces. Just like books are divided into
paragraphs and chapters, programs can be divided up into functions to
make them easier to understand and write.

Another reason is to decrease repetitive code. Imagine you were writing
a Program that reads in the size of a rectangle so it can compute the
area and perimeter. It needs the width and height to do this, and both
numbers should be greater than zero. We should make sure that's the
case, so our code to read these values might look like this:

``` {.python}
# read the width
width = int(input("Width: "))
while width <= 0:
    print("Please enter a positive number.")
    width = int(input("Width: "))

# read the height
height = int(input("Height: "))
while height <= 0:
    print("Please enter a positive number.")
    height = int(input("Height: "))
```

This code is pretty repetitive. The input line, while condition and loop
bodies are all basically the same. The only things different are the
variable name being used and the input prompt.

Having repetitive code in programs is not ideal. For one, we have to
write more code. A basic tenet of programming is to not do more work
than you have to. Another, even bigger, reason is that now we have to
*maintain* the code in two places. If we want to, say, make it so that
it doesn't crash the program when a letter is accidentally entered,
then would have to make that change in *two* places. As we write larger
programs that take longer to debug, having repetitive code like this is
a bad idea.

If we were to write a function to read in a positive number, then we can
just call upon it whenever we need to, and know that it already does
this job. That might look like this:

``` {.python}
# read height and width
width = readPositive("Width: ")
height = readPositive("Height: ")
```

We pass in the prompts, because that was the one thing that's really
different. Of course we have to create the `readPositive` function for
this to work. So we will see how to make functions next.

------------------------------------------------------------------------

9.3 Writing a Function
-----------------------

So now that we know we want to write functions, we need to know how to
do so. Functions are created using the following syntax:

``` {.python}
def functionName(parameters):
    line 1
    line 2
    # etc ...
```

The keyword `def` starts a function, it stands for define. Function
names follow the same rules as variable names: any letter or underscore,
followed by any numbers of letters, numbers and underscores. Parameters
are specified the same as in a function call: as a list separated by
commas inside of parenthesis. Then the colon signifies the start of the
function. Each line of code in the function must be indented over, as in
a loop or if statement.

As an example, we can define a function that prints out a greeting:

``` {.python}
def greet():
    print("Hello!")
```

Here the function's name is `greet`, and it takes no parameters. The
body of the function is the code that will be run when the function gets
called. This function doesn't return anything either.

If we run this program, nothing actually happens. Defining a function
does not run the code inside it. It just says what *would* happen should
the function ever actually be called. So in order for this program to do
something, we would need to call the function after defining it, like
this:

``` {.python}
# define the function
def greet():
    print("Hello!")

# call the function
greet()
```

Calling the functions we make works the same as calling a functions that
come with Python. Now the program will first define the function, and
then actually call it, so the print statement will run and we should see
this:

``` {.output}
Hello!  
```

Functions must be defined before they are called. So this program will
only work if the definition of greet is before the call to it. If we
flip them around, Python would give us an error message.

------------------------------------------------------------------------

9.4 Parameters
---------------

Suppose we want to personalize the greet function so that it greets
people by name. To do this, the function will need to know the name of
the person it is supposed to greet. To send information into a function,
we use parameters. In this case, we'll add a parameter to the function
that for the person's name:

``` {.python}
def greet(name):
    print("Hello,", name, "how are you?")
```

Now this function takes one parameter called `name`. Inside the
function, we can refer to `name` when we need that information. In this
case, we just print it out. Notice that the function isn't *setting*
the `name` variable anywhere. The function just assumes it has been set
to something already.

When we call the function, we pass in the actual value that should fill
in for the parameter. For example, we add three calls to this function
in the program below:

``` {.python}
def greet(name):
    print("Hello", name, "how are you?")

greet("Alice")
greet("Bob")
greet("Claire")
```

This program outputs the following:

``` {.output}
Hello Alice how are you?
Hello Bob how are you?
Hello Claire how are you?
```

Parameters let us pass information into the function to change the way
it works. The function above just prints out its name variable, but that
will be different based on what was passed in.

We have to get the number of parameters right, or Python won't be able
to call the function. If we pass the `greet` function zero parameters,
or more than one parameter, then Python will complain:

``` {.python}
>>> greet()
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
TypeError: greet() takes exactly 1 argument (0 given)

>>> greet("Too", "Many")
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
TypeError: greet() takes exactly 1 positional argument (2 given)
```

As another example, let's write a function that will print a countdown
from a starting point. Sometimes we will want the function to print out
a countdown starting at 10 and going down to 1. Sometimes we will want
to start at just 5 instead.

Because sometimes we want the starting point to be 10 and sometimes we
want it to be 5, that has to be a parameter. We can then use that
parameter, which we will call `start`, to control the for loop that will
do the counting down. The code for this function is below:

``` {.python}
def countdown(start):
    for i in range(start, 0, -1):
        print(i)
    print("Done!")

countdown(10)
countdown(5)
```

We are calling the `countdown` function with two different values for
the start parameter. The output of this program appears below:

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
Done!
5
4
3
2
1
Done!
```

9.5 Return Values
------------------

------------------------------------------------------------------------

Now that we have seen how to pass information *to* functions using
parameters, we will look at how to pass information back *from*
functions using return values.

A return value is a value that is produced by a function call. We have
seen functions that produce return values such as `input` and
`math.sqrt`. We can return values from our own functions using the
`return` statement. This statement takes the value we want to return.
The value we return can be any value in a Python program such as a
constant, variable or expression.

For example, let's say we want to write a function to calculate the
area of a rectangle. To do this, the information we need is the width
and height of the rectangle. Because we need to know this to do our
task, these should be parameters into the function. The result of our
work will be the area, so this is what we should return back. The
function could look like this:

``` {.python}
def rectangleArea(width, height):
    area = width * height
    return area
```

The return statement sends back the value of the `area` variable which
was computed. When we call this function, we'll need to save the value
it gives us into a variable. If we don't than the result it gives us
will be lost (just like we have to store the value that `input` gives us
into a variable). The following bit of code calls the function above and
then prints the result of it:

``` {.python}
a = rectangleArea(3, 5)
print("The area of a 3 by 5 rectangle is", a)
```

We can also take the output of a function and pass it directly as a
parameter to another function. For instance, we can print the area of a
rectangle to the screen directly by calling it from inside of print:

``` {.python}
print(rectangleArea(5, 7))
```

Here the rectangleArea function is called with parameters of 5 and 7.
This function is going to return the value 35 which is then passed
directly as a parameter to the print function. The upshot is that the 35
will be printed directly to the screen, without being stored in a
variable first. We have actually been doing this same thing with the
`input` function for a while in code like this:

``` {.python}
age = int(input("Enter your age: "))
```

Here the `input` function's return value (a string) is passed directly
to the `int` function, which then returns us the integer version of that
string.

A function can also have multiple `return` statements for different
cases. For example, we can write a function to convert a number grade
into a letter grade:

``` {.python}
def numberToLetter(grade):
    if grade >= 92:
        return "A"
    elif grade >= 89:
        return "A-"
    elif grade >= 87:
        return "B+"
    elif grade >= 82:
        return "B"
    elif grade >= 79:
        return "B-"
    elif grade >= 77:
        return "C+"
    elif grade >= 72:
        return "C"
    elif grade >= 69:
        return "C-"
    elif grade >= 67:
        return "D+"
    elif grade >= 60:
        return "D"
    else:
        return "F"
```

Here we have a `return` statement for each condition in the function.
When Python executes this function, the first condition that is true
will have its return statement executed.

While we can have multiple `return` statements, we can only ever execute
one of them for each function. As soon as we reach the `return`
statement, we leave the function and don't do anything else. For
example, this program has a statement after the `return`:

``` {.python}
def rectangleArea(width, height):
    area = width * height
    return area
    print("Hello!")    # will never be printed
```

This will never print the "Hello!" message, because Python leaves the
function as soon as the `return` is done. No statements after that will
be executed.

------------------------------------------------------------------------

9.6 A couple more examples
---------------------------

Another benefit of functions is they sometimes make code easier to read.
We have seen that we can check if a number is even or odd by using the
modulus operator. To refresh your memory, we can write a program to tell
the user if their age is an even number like this:

``` {.python}
age = int(input("What is your age? "))

if age % 2 == 0:
    print("Your age is even")
else:
    print("Your age is odd")
```

What's going on is that the modulus operator divides the age variable
by 2, and checks the remainder. If it's 0, then the age is evenly
divided by 2, so it must be even. How this code works is not exactly
clear. To help make this easier to read and understand, we can write
functions called `isEven` and `isOdd` to perform these calculations:

``` {.python}
def isEven(num):
    if num % 2 == 0:
        return True
    else:
        return False

def isOdd(num):
    if num % 2 == 1:
        return True
    else:
        return False
```

These functions both take a number as a parameter. They then do the
modulus trick to determine if the number is even or odd and then return
a boolean True or False value. Now we can call them whenever we want to
know if a number is even or odd, instead of having to write out the
modulus expression directly.

As another example, let's say we want to write our own version of
Python's `max` function? Given a list of numbers, it should return the
biggest item out of it.

This function will take the list as a parameter. The return value should
be the biggest item found in the list. We can do this with the following
function:

``` {.python}
def max(values):
    biggest = values[0]
    for v in values:
        if v > biggest:
            biggest = v
    return biggest
```

Here we loop through the list and keep track of the biggest item that we
have seen so far. Once we've gone through the whole thing, we return
the biggest.

Finally, let's write the code for the `readPositive` function we talked
about earlier. To do this, we will make the prompt for the user a
parameter, then read values until one is positive, and then use a
`return` to send it back to the user. This might look like this:

``` {.python}
def readPositive(prompt):
    value = int(input(prompt))
    while value <= 0:
        print("Please enter a positive number.")
        value = int(input(prompt))
    return value
```

We could even make a more general version of this function which gets a
number as input from the user between any lower and upper limits. The
limits could be passed into the function along with the prompt.

------------------------------------------------------------------------

9.7 Scope
----------

**Scope** refers to the parts of code that can access things like
variables. Before we used functions, we could access any variable any
place in our program, after it was created. But when we create variables
inside of a function, they can only be accessed inside of that function.
For example, the `hello` function below makes a variable called
`message`. We are allowed to access that variable inside the `hello`
function, but not outside of it:

``` {.python}
def hello():
    message = "Hello!"
    # this is OK because we're inside the function
    print(message)

# this is not allowed
print(message)
```

This program produces an error because, in the last print statement, we
are not inside of the hello function. Therefore the variable `message`
cannot be accessed. Even if the function hello() is called, and
`message` is created, we still cannot access `message` outside of the
function.

``` {.python}
def hello():
    message = "Hello!"
    print(message)

# call the function
hello()

# still not OK and will cause an error
print(message)
```

The scope of the `message` variable is only inside the hello function
because that's where it was made. If we made `message` outside of the
function, this would be OK:

``` {.python}
# message is not in a function, so its scope is the whole program
message = "Hello!"

def hello():
    # this variable CAN be called here
    print(message)

# this is OK too
print(message)
```

Here, `message` is set up outside of the function and *can* be accessed
inside of functions in the program.

Variables created outside of a function are called **global** and
variables inside of a function are called **local**. So the scope of a
global variable is the whole program, and the scope of a local variable
is just the function it's in.

The reason Python works this way is to try to keep programs more
organized. If our program has a bunch of functions in it, that all make
several variables, things would become messy if all of those variables
could be accessed anywhere in the program. By keeping the scope of a
variable just to the function it was made in, things stay organized. If
you want to use some value from a function in other parts of your
program, you need to use a `return` to send it back.


9.8 Designing Programs with Functions
--------------------------------------

------------------------------------------------------------------------

When writing programs that are long and complicated, it's a good idea
to break the program up into functions. We start the program by thinking
about what pieces we need. We then make functions for each of the pieces
and write them one by one. This is sometimes called a "divide and
conquer" approach because we divide the program into parts and
"conquer" them one by one.

In general each function should do one specific job. If a piece of code
does more than one thing, you should consider splitting it up into
multiple functions.

9.9 Comprehension Questions
----------------------------

------------------------------------------------------------------------

1. What is a function in Python, and why is it beneficial to use functions in your programs?
2. What is the difference between writing a function and calling it?
3. What term is used to describe passing information *into* a function?
4. What term is used to describe passing information *back from* a function?
5. What does the term "scope" refer to in the context of functions?
6. What happens if you don't pass all of the parameters a function expects?


9.10 Programming Exercises
-------------------------


------------------------------------------------------------------------

1. Write a function to convert a Celsius temperature to Fahrenheit.  The
   parameters should be the Celsius temperature and the return value the
   Fahrenheit one.  The formula for the conversion is $F = C \times \frac{9}{5} + 32$.

2. Write a function called "getInt" based on the readPositive function above.
   The function should take the minimum and maximum values the user can put in.
   It should then ask the user to enter a number until they put in something
   between that range, and return it when they do

3. Write a function called "printStart". It should take a list as the first parameter and
   a number, called "n" as the second parameter. It should print the first "n"
   items of the list to the screen.

4. Write a program which calculates a few properties of rectangles, each being
   done with a separate function.  The three functions you should write are:
      
      **area**
      This function should take the height and width of the rectangle and return the
      area of the rectangle. which is the product of the two.

      **perimeter**
      This function should take the height and width of the rectangle and return the
      perimeter, which is the sum of all four sides.

      **isSquare**
      This function should take the height and width and return a boolean indicating
      whether or not the rectangle is also a square.
   Have the program get the height and width of the rectangle and call each of
   these functions, printing the results.

5. Write a function which takes a list of numbers as a parameter and returns the
   smallest value found in the list.

6. Write a function called "filterNegatives". It should take a list of numbers as the
   parameter. It should return a new list of numbers with only the positive numbers
   from the original list. So if you gave it [1, -3, 5, -6, 8, 12, -2] then it would return back
   [1, 5, 8, 12].



::: {.blackbox}
::: {.blackbox-title}
**Chapter Summary**
:::

::: {.blackbox-contents}
-   Functions allow us to split programs into independent parts. This
    makes programs easier to write and test, and keeps code more
    organized.
-   Parameters allow us to pass information into functions, which allows
    us to customize the way that they work. When we call the function,
    we supply it with the values it needs.
-   Return values allow functions to pass information back to the code
    that called them. To use the return value, you normally store it
    into a variable.
-   When a variable is created inside of a function, it can only be used
    inside of that function. We say the scope of that variable is inside
    that function which is called local. When a variable is created
    outside of a function, its scope is global which means it can be
    used anywhere.
-   When working on a big program, functions allow us to split the work
    into smaller units and make solving a big problem more approachable.
:::
:::
