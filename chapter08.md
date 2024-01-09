Chapter 8: Lists
================

------------------------------------------------------------------------

::: {.blackbox}
::: {.blackbox-title}
**Learning Objectives**
:::

::: {.blackbox-contents}
-   Understand the purpose of list variables in Python.
-   Learn how to create lists of data, and index them to get values out.
-   Learn how to loop through lists with for loops.
-   Be able to add values to a list.
-   Learn how to read in lists from the user.
:::
:::

8.1 Storing Lots of Variables
-----------------------------

------------------------------------------------------------------------

Imagine that we were writing a program where we wanted to store a large
amount of data. For example, imagine we were writing a program to figure
calculate your grade in a class. We might want to store all of our
grades into the program. Let's say we have 10 quiz grades in the class.
We might write code like this:

``` {.python}
quiz1 = 88
quiz2 = 94
quiz3 = 76
quiz4 = 100
quiz5 = 92
quiz6 = 89
quiz7 = 95
quiz8 = 85
quiz9 = 79
quiz10 = 99
```

Then we might want to add up all of these grades to figure out our
average:

``` {.python}
total = quiz1 + quiz2 + quiz3 + quiz4 + quiz5 + quiz6 + quiz7 + quiz8 + quiz9 + quiz10
average = total / 10
```

This hopefully seems a little bit tedious and repetitive. We have to
make 10 different variables and do the same thing with all of them.
Here, it's not *too* bad with 10. But imagine if we had even more
numbers we wanted to keep track. For instance, imagine you're
*teaching* a course and wanted to store all 10 quiz grades from 25
students. That would be a lot of variables!

There is a better way of doing this which is to use a **list**. A list
is a collection of multiple pieces of data that are stored together in
one variable.

8.2 Creating Lists
------------------

------------------------------------------------------------------------

To create a list, we can put the values in the list between square
brackets, separated by commas. For example, we can store our 10 quiz
grades in a list like this:

``` {.python}
quizzes = [88, 94, 76, 100, 92, 89, 95, 85, 79, 99]
```

We could also create a list of strings:

``` {.python}
names = ["Bob", "Alice", "Joe", "Mary"]
```

Each of these lists stores *all* of the values inside them. Lists
provide a convenient way to store a bunch of things together with one
name to access them.

8.3 Accessing List Elements
---------------------------

------------------------------------------------------------------------

Once we have created a list, we can access each thing in the list. To do
this, we can use the position of each element we want to access. Like
strings, the first thing in the list is at position 0. The second
element is at position 1, and so on. Starting at position 1 is a common
mistake in programming.

In order to access an element, we use the name of the list, then the
position inside of brackets. So to access the first quiz grade in the
above list, we would use:

``` {.python}
print(quizzes[0])
```

To access the last name above, we can say:

``` {.python}
print(names[3])
```

When we use the position number to access the things inside of a list,
we say that we are *indexing* the list.

If we use an index that is too big for our list, Python will give us an
error message:

``` {.output}
>>> print(names[4])
Traceback (most recent call last):
  File "<pyshell#1>", line 1, in 
    print(names[4])
IndexError: list index out of range
```

8.4 Example: Dates
------------------

------------------------------------------------------------------------

Let's say we want to write a program that converts a numerical date
into one using words for the month. For example, we can put in 3 for the
month and 25 for the day and it will print out "March 25". We could do
it with if statements like this:

``` {.python}
if month == 1:
    print("January", day)
elif month == 2:
    print("February", day)
elif month == 3:
    print("March", day)
# and so on...
```

But this can actually be done with less code (and more efficiently)
using lists. We can make a list of all the month names. We could then
*index* the list with the month number. We will have to subtract 1 from
the index because month numbers start at 1, but list numbers start at 0.

``` {.python}
# get our input
month = int(input("What is the month? "))
day = int(input("What is the day? "))

# make a list of all the names of months
names = ["January", "February", "March", "April", "May", "June", "July",
         "August", "September", "October", "November", "December"]

# get the name of this month by indexing
monthName = names[month - 1]

# print our output
print("It is", monthName, day)
```

This program works by taking in the month as a number. It then subtracts
one from this number and uses it to index the list. So if the month
number is 5, it subtracts 1 to get 4. It then uses 4 as the index to get
the name "May" out of the list.

Below is an example of this program running:

``` {.output}
What is the month? INPUTSTART6INPUTEND
What is the day? INPUTSTART22INPUTEND
It is June 22
```

8.5 Looping Through a List
--------------------------

------------------------------------------------------------------------

One super common thing to do with a list is to loop through everything
in the list and do something with each thing in it. For example, we
might loop through a list of our quiz scores to add them up, or loop
through a list of names searching for one name in particular.

We can do this by using a for loop in Python. We have seen for loops for
looping through strings and sequences of numbers using range(). They
also work for lists.

For example, if we want to print all of our quiz grades, we could write
code like this:

``` {.python}
quizzes = [88, 94, 76, 100, 92, 89, 95, 85, 79, 99]

for quiz in quizzes:
    print(quiz)
```

The for loop assigns each thing in the list to `quiz`, one by one, and
executes the lines under the for loop on it. In this case, it will print
all of the quiz scores to the screen one by one. By changing the code in
the loop, we can do different things with each item.

To add all of the quiz scores together, we can do the following:

``` {.python}
# our list of quiz scores
quizzes = [88, 94, 76, 100, 92, 89, 95, 85, 79, 99]

# figure out the total score
total = 0
for quiz in quizzes:
    total = total + quiz

# find the average and print it
average = total / len(quizzes)
print("Your average score is", average)
```

The `total` variable here is worth talking about a little bit. We set it
to 0 before the loop and then also set it inside the loop. What we set
it to there is `total + quiz`. So the first thing it's equal to is 0,
then we set it to that 0 plus the first quiz value, so it becomes 88.
Then the next time through the loop, we set it to the 88 it is now plus
the 94, resulting in total storing 182. This kind of "accumulation"
loop is common in coding.

This is much less code than having to add all 10 variables by typing
them all out! We also can add more quiz scores to the list without
having to redo the code to find the average. This example also shows
using the `len` function to find the length of a list --- this works the
same way it does for strings.

8.6 Example: Smart Guess the Number
-----------------------------------

------------------------------------------------------------------------

When we first looked at using loops, we saw an example of a guess the
number program that started at 1, and then went on guessing up to 10. To
refresh your memory, this code looked like this:

``` {.python}
# guess 1 the first time
guess = 1
answer = input("Did you guess " + str(guess) + "? ")

# keep guessing the next number until they get it
while answer != "yes":
    guess = guess + 1
    answer = input("Did you guess " + str(guess) + "? ")

print("Got it!")
```

This program does in fact eventually guess the number the user is
thinking of, but it doesn't guess them in a very human-like manner.
Only a robot would guess in order like that. Another way is to guess the
numbers randomly, instead of in order:

``` {.python}
import random

# guess a random number
guess = random.randint(1, 10)
answer = input("Did you guess " + str(guess) + "? ")

# keep guessing in order until we get it
while answer != "yes":
    guess = random.randint(1, 10)
    answer = input("Did you guess " + str(guess) + "? ")

print("Got it!")
```

Now the program no longer guesses the numbers in order, but it still
doesn't guess them very well. Now each guess is random with no memory
of what the previous guesses were. It could even guess the same number
twice in a row. What we'd like is for the number to guess the numbers
from 1 to 10 in random order without repeating itself.

We can do this using a list of numbers to guess and then "shuffling"
the list. The idea here is that we will make a list to store all of the
numbers 1 through 10. Then we call the `random.shuffle` function which
takes a list and shuffles it randomly.

We then loop through this shuffled list and guess the numbers in it one
by one. Now the program will guess them in a random way, but it won't
ever guess the same number twice.

The code to do this is below:

``` {.python}
import random

guesses = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
random.shuffle(guesses)

for number in guesses:
     if input("Did you guess " + str(number) + "? ") == "yes":
          print("Got it!")
          break
```

There's something else new in this program which is the `break`
command. This exits out of the loop immediately when we run it. By doing
the break when we get the number right, we cause the loop to exit early,
when it might not have gone through all of the numbers yet. Without
this, the program would keep asking us until it went through all 10
numbers.

An example run of this program is below:

``` {.output}
Did you guess 6? INPUTSTARTnoINPUTEND
Did you guess 8? INPUTSTARTnoINPUTEND
Did you guess 4? INPUTSTARTnoINPUTEND
Did you guess 2? INPUTSTARTnoINPUTEND
Did you guess 5? INPUTSTARTnoINPUTEND
Did you guess 1? INPUTSTARTnoINPUTEND
Did you guess 7? INPUTSTARTyesINPUTEND
Got it!
```

8.7 Splitting Input
-------------------

------------------------------------------------------------------------

One very helpful thing we can do with strings is to call their `split`
method, which splits the string into parts by some separator (which we
get to choose). This can allow us to go through each word of a sentence,
for example.

The following program does just that. It asks the user to input a
sentence. It then calls the `split` method to split it based on spaces.
This gives us back a list variable (which we call words). We can then do
what we want to with those individual words. Here we just print them
out.

``` {.python}
# read in a whole sentence
sentence = input("Enter a sentence: ")

# split it into words (separated by spaces)
words = sentence.split(" ")

# loop through each one
for word in words:
    print(word)
```

Below is an example run of this program:

``` {.output}
Enter a sentence: INPUTSTARTthe quick brown fox jumps over the lazy dogINPUTEND
the
quick
brown
fox
jumps
over
the
lazy
dog
```

We can use this to improve our quiz grade averaging program. In this
program we "hard-coded" our quiz scores into the program with the
following line of code:

``` {.python}
quizzes = [88, 94, 76, 100, 92, 89, 95, 85, 79, 99]
```

Let's say that our program was so super helpful that we wanted to share
it with our friends. We would not necessarily want them to have to edit
our code to put in their own grades. So instead we should make it so the
program asks you for the quiz grades.

There are a couple of ways to do this, but one is to make the program
read them in on one line and then split them up. We can use any kind of
separator we want to separate the numbers. Let's say we want to use a
comma.

The following program does this by asking the user to enter their quiz
grades, splitting them into individual things in a list, and then
looping through them.

``` {.python}
# read in a whole sentence
quizzes = input("Enter quiz grades separated by commas: ")

# split it into parts
quizzes = quizzes.split(",")

# loop through each one getting total
total = 0
for quiz in quizzes:
    total = total + int(quiz)

# print average
print("Average is", total / len(quizzes))
```

One wrinkle here is that our list is actually storing strings, because
that's what the `split` method returns to us. So when we do the adding
we have got to convert the numbers to int first.

Below is an example of this program being run:

``` {.output}
Enter quiz grades separated by commas: INPUTSTART92,78,88,70,100,94INPUTEND
Average is 87.0
```

Now we are reading in the list from the user, and looping over it to
calculate the average.

8.8 Adding to a List
--------------------

------------------------------------------------------------------------

So far we have looked at making lists all in one go, either by getting
the list contents from `split`, or by listing the things inside
brackets, like this:

``` {.python}
names = ["Bob", "Alice", "Joe", "Mary"]
```

But what if we want to add an item to a list that already exists? This
can be done with the `append` list method. For instance, this code will
add two new names to the list:

``` {.python}
names.append("Joe")
names.append("Beatrice")
```

This allows us build a list as we go, rather than create the whole thing
at once. As we will see, there are lots of cases where being able to add
to a list is handy.

The `append` method adds items on to the *end* of the list. If we wanted
to add an item somewhere else, we can use the `insert` method instead.
This method takes two parameters. The first is the index we want to
insert at. The second parameter is the item we would like to insert.

The following code starts by making an empty list, and then inserting
some names into it at different positions:

``` {.python}
names = []
names.insert(0, "Bob")
names.insert(0, "Alice")
names.insert(1, "James")
print(names)
```

This example will print `['Alice', 'James', 'Bob']`.

When "Bob" is inserted at position 0, it's the only one, so the list
is `["Bob"]`. Then, when "Alice" is inserted at location 0, the list
becomes `["Alice", "Bob"]`. Finally, when "James" is inserted at
location 1, he is inserted between Alice and Bob to make the list
`["Alice", "James", "Bob"]`.

If we care about the *order* of the list, insert lets us choose where to
put new items.

8.9 Reading in a List
---------------------

------------------------------------------------------------------------

We've seen one way to read in a list in Python, using the `split`
method. Here we ask the user to enter all the values on one line, with
some separator like a space or comma. This works well sometimes, but
there are some downsides. One is that it reads it all in as strings, and
another is that it might be inconvenient if there's a lot of items to
read.

Another way to input a list from the user is to read in each value
separately and then add them to the list one by one. With this approach,
we can read them in as numbers.

The following program attempts to do this:

``` {.python}
numbers = []
while True:
    item = int(input("Enter a number: "))
    numbers.append(item)
    print(numbers)
```

The only problem with this code is that it is an infinite loop. We need
to have some way of knowing when to stop!

There are two ways that this could be done:

1.  Ask the user up front how many items they would like to enter, and
    then loop that many times. The following example does this:

``` {.python}
quizzes = []
count = int(input("How many quizzes are there? "))

for i in range(count):
    item = int(input("Enter a quiz grade: "))
    quizzes.append(item)
```

2.  Have a certain value reserved to mean "I'm done now". A value
    used in this manner is called a *sentinel* value. If we are entering
    numbers that should always be positive, like quiz grades, then we
    can use -1 as the sentinel.

    An example doing it this way is below:

``` {.python}
quizzes = []
item = int(input("Enter a quiz grade: "))

while item >= 0:
    quizzes.append(item)
    item = int(input("Enter a quiz grade: "))
    
print(quizzes)
```

Note in this example that we need to read in a quiz grade twice. The
first time is done before the loop to make sure that the `item` variable
is defined before we test it in our while condition. Then we read it
again inside the loop to make sure it can happen for every quiz the user
wants to enter.

::: {.blackbox}
::: {.blackbox-title}
**Chapter Summary**
:::

::: {.blackbox-contents}
-   Lists store multiple pieces of information together in one variable.
    This is helpful when you have lots of related things to store.
-   You can create a list all at once, by putting the things in the list
    inside square brackets, separated by commas.
-   You can also add things into a list that was already created using
    either `append`, which adds to the end, or `insert` which can put
    something into the middle of a list.
-   You can get individual items out of a list using brackets with an
    index inside of them. Like strings, the indices start at 0.
-   We can loop through lists using for loops, which go through each
    item in the list one by one.
-   There are different ways to read in a list from the user. We can
    read a bunch of items in one line, and use `split` to split them up,
    we can also read them one by one and add them to the list as we go.
:::
:::
