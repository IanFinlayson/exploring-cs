Chapter 13: Artificial Intelligence
===================================

::: {.blackbox}
::: {.blackbox-title}
**Learning Objectives**
:::

::: {.blackbox-contents}
-   Understand broadly what Artificial Intelligence is and what problems it aims
    to solve
-   Learn about expert systems and why they are no longer widely used
-   See examples of AI problems which can be solved using tree searches
-   Learn about neural networks and how they can be trained using examples
-   Understand the basics behind large language models, the most commonly used
    AI systems today
-   See some of the issues with past and current AI systems
:::
:::



13.1 Overview
-------------

Artificial Intelligence (AI) has become widely used and talked about in
recent years.  Most people use the term to refer to chat programs like
ChatGPT, Claude, or Gemini but in fact they are just one type of AI system.
There are many other types of problems solved by AI that require different
solutions.  In general, AI refers to any attempt to get computers to
behave in the intelligent and flexible way that humans do.

Lots of the programs we have done sort of could be considered as having
intelligent behavior. Problems we have talked about like finding the largest
item in the list, finding sums and averages, computing the tip on a bill etc.
*do* require intelligence.

We can broadly classify problems that humans solve into two categories:

-   Problems we solve with algorithms. We have algorithms to do
    arithmetic, sort things, find the biggest and smallest items, do
    comparisons etc. These are problems that we can get computers to
    solve by translating the algorithms we use into code.
-   Problems that we solve without really knowing how we solve them.
    Here we can solve a problem (sometimes very easily) without actually
    knowing the process that we use to solve it. Some examples:
    -   Recognizing faces
    -   Walking without falling over
    -   Recognizing symbols
    -   Knowing how to throw or catch accurately

If somebody asked you how to add two numbers together, you could work them
through the steps and teach that skill to them.  Because of this, you can also
teach a computer to do this by coding the steps as a computer program.  But what
if somebody asked you how you know that a picture is of your mother?  Could you
write down a set of steps which would give you an answer?

AI is generally about trying to get computers to solve these problems that
humans can solve without really knowing the algorithm our brain uses to solve
them.


13.2 Expert Systems
-------------------

One of the earliest types of AI programs were called "expert systems".
They were designed to solve problems where there is a lot of knowledge
about something required to solve a problem.

One example is in medical diagnosis systems. These systems were developed to
take in lists of symptoms and eventually give a list of possible causes for
those symptoms. The hardest thing about problems like this is not really the
"computation" of the answer so much as having all of the needed information in a
way the program can understand it.

In these systems, the knowledge isn't encoded directly into the
program, but is stored in a file called a "knowledge database". For
example, there might be part of a knowledge database that distinguishes
cold symptoms vs. flu symptoms:

``` shell2
Fever : not Cold, maybe Flu
Sneezing : maybe Cold, unlikely Flu
```

The program would then read in all of the facts in this database and use if/else
statements to go through and find the likelihood of each diagnosis. MYCIN,
developed in the early 1970s is one example of an expert system used in medical
diagnosis.  The programming logic is not terribly hard in these systems, but
getting the knowledge into a system that can be understood and processed is
difficult.

AI has had many "hype cycles" where new technologies were built up to be able to
solve huge classes of problems.  These hype cycles attract lots of interest and
investment, but so far none of them have exactly lived up to the promises made.
During the 1980s, there was huge excitement about building expert systems which
could use massive knowledge databases to solve a whole host of problems.

Unfortunately, people underestimated how hard the "knowledge representation
problem is".  How can we store facts in a way that a program could read them in
and actually understand them well enough to make inferences on them?  Apart from
a few specialized domains, where the knowledge can be represented more easily,
expert systems are no longer widely used.


13.3 Search
-----------

Another early approach to AI was to view the problem as a *search*
problem. When we think of "search" we might think of searching
literally, as in searching a phone book for a particular name.
But we can also search a set of possible solutions for the best one.
This can be done for problems where we have to weigh several different
options and choose the best one. A common example of this is turn-based
games.

For example in Tic-Tac-Toe, we can program a computer to "search" for
the best move at each step. We can represent the possible moves
spreading out like a tree:

![A graph of tic-tac-toe boards. At the top is an empty board. Spreading
down from that is boards in which one cell is filled in with an X.
Spreading down from that is boards in which two cells are filled in, the
X from the row above, and an O. This way the graph represents the space
of possible tic-tac-toe boards.](images/tictac.svg){width="70%"}

Here the computer is 'X' and needs to pick its move. To do so it searches
forward through all the 9 possible moves it could make. For each one, it keeps
on searching through for each move the *opponent* can make.  It will search
through looking for ways it can win the game. It will then choose the move which
leads to the most winning states.

This is a possible way for an AI to play Tic-Tac-Toe because there are not that
many possible moves.  At each step, we only have at most 9 possible moves, and
there are only 9 steps in the game at most.  It would be hard for us to build
the entire tree of moves by hand, but a computer can roll through them.
It's also impossible to get stuck in a *cycle* with Tic-Tac-Toe, where we end up
back in the same game state again.

This is not true of another game, Chess, which was sort of the "holy
grail" for AI until 1997 in which the computer Deep Blue beat Gary
Kasparov, the reigning chess champion at that time.

In Chess, it is simply not possible to go through every possible move like this.
The number of chess configurations is estimated to be about
$10^{45}$.  This is an astronomically large number.
Also, chess play *can* have cycles - we can move a piece
on one turn and then just move it back the next.

Deep Blue essentially works off a search algorithm, but it limits the
possible search space in a number of ways:

-   It doesn't follow a move all the way to the end. Instead it gives
    it a score after a few steps. If we capture a piece or get into a
    strong position, the move will get a positive score, even if we
    haven't won yet. If we lose a piece, we get a negative score.
-   It compares the current path to the best one seen so far. If an
    earlier path led us to gain a piece, we don't really need to
    consider paths that lead to a worse outcome.
-   It assumes intelligent play from the opponent. It is unlikely our
    opponent will sacrifice pieces needlessly. So we don't go down
    paths where they commit a thoughtless blunder.
-   It uses some knowledge to search the most likely good moves. For
    instance, if our king is under check, we would not really need to
    evaluate any moves that don't get him out of check.

These approaches are called "pruning techniques" because they "prune" the "tree"
of possible moves.  Here we are essentially combining the search techniques to
go through possible outcomes with knowledge of experts, which is used to grade
outcomes and avoid paths that are not as promising.  These techniques can be
very effective as evidenced by the success of Deep Blue.


13.4 Neural Networks
--------------------

The most widely used, newer, form of AI is the *neural network*. These
are loosely based on the way that our brains process information. A
neural network consists of multiple layers of "neurons":

![The image depicts a typical neural network with three layers of
neurons, each represented with a circle. On the left is the input layer
of three neurons. In the middle is the hidden layer of four neurons, and
finally the output layer has two. Each input layer neuron connects to
each neuron in the hidden layer, and each in the hidden layer connects
to each output neuron.](images/neural.svg){width="50%"}

The input layer of neurons takes the input of the program, which is represented
as a series of numbers. As we have seen, all data a computer deals with can be
stored just as numbers.  The input layer then applies multiplies its value by
some *weight*, which is just another number, and passes it to the next layer.

Each subsequent layer takes in its inputs and computes new values based
on more weights. This allows each neuron to produce an output based on
its inputs in some way:

![Shows the way a neuron computes its value. The neuron has three inputs
with floating point numbers coming into it. Each of these has a weight
associated with it. Each value is multiplied by the corresponding
weight, and then summed, which forms the output of the
neuron.](images/neural2.svg){width="50%"}

At the output layer, the numbers are resolved back into an answer.  For example,
in the example of Tic-Tac-Toe, the input layer could represent the state of the
board as it currently is.  We can have 9 input neurons, one for each board
position, which is each assigned a
1 if it belongs to us, a -1 if it belongs to our opponent and a 0 if it is
untaken.  We can have 9 neurons in the output layer, one for each position,
where the larger the value is, the better the move is deemed to be for us.

The big question now is, how do we figure out the weights? The answer is
*training*. A neural network is trained by giving it lots of examples and seeing
how well it does. The weights will start off randomly. When the network gets an
answer right, those weights are strengthened.  When the network gets an answer
wrong, the weights are adjusted based on how much they contributed to the error.

This process of getting the computer to train on example data is called *machine
learning*. There are other machine learning techniques besides neural networks.
Neural networks are very good at solving certain problems. All of the following
are most commonly done with neural nets:

-   Image recognition
-   Speech recognition
-   Language translation
-   Financial analysis
-   Recommendation systems
-   Game playing

In game playing, neural networks have eclipsed the classical search techniques
discussed earlier. For years the last game at which the best humans could beat
the best computers was the game "Go". In 2017, Google's "Alpha Zero" beat the
best Go players.

Later that year, the same technique was turned to chess. Alpha Zero beat
the best chess programs. It took Alpha Zero only 4 hours to go from
complete chess novice, moving the pieces randomly, to the best chess
player on Earth.

While very powerful, neural networks have some downsides:

-   We need to have lots of data available for training.  For example, to train
    a network to recognize images, we have to have a lot of example images
    already labelled for the system to learn from.
-   We can't really understand how it's working. The "algorithm"
    used is not something we can comprehend, but rather just a jumble of
    numbers. Some AI workers hope to understand how our brains work
    through programs, but this is not really possible this way.
-   Their success is based totally on training data. If a new situation,
    not in the training, comes about, how will the AI behave?
-   Because they are based on training, it's possible human biases will
    creep in. Neural networks are being used for important decisions,
    like approving mortgages. If there is bias against certain groups in
    the training data, it can get permanently encoded into the AI.


13.5 Large Language Models
--------------------------

Neural networks have been around since the 1950's, but have recently seen a
surge of popularity and hype.  There are two major reasons for this:

-   Recent advances in computer hardware, especially graphics processing units
    (GPUs), have made it possible to do the calculations needed for a neural
    network much faster than in the past.
-   With the Internet, there is a huge amount of training data in the form of
    text.
-   There have been algorithmic improvements in the training techniques for
    these networks, allowing them to learn more quickly and produce better
    results.

These three things have led to the use of larger neural networks with lots of
layers which are called "deep" networks.  A deep network has many hidden layers
with many neurons in each layer.  "Deep learning" refers to using these networks
with automatic training of some kind.

In particular large language models (LLMs) such as ChatGPT, Claude and Gemini are
deep neural networks which are trained on textual data from the Internet,
digital books, and other sources.  These systems do a passable job of generating
textual responses in many different contexts.  Recent years have seen a large
amount of hype and investment in these systems.

The problems inherent in neural networks discussed earlier still apply to LLMs:

-   Because their output is the result of incredibly complicated calculations,
    we cannot explain why an LLM gives the responses it produces.  Making
    decisions based on the output of an LLM is not ideal when there is no
    understandable explanation for that output.
-   They do not do a good job when there are holes in the training data.  When
    generating text about something which doesn't have large amounts of
    information available, these systems will simply make up credible sounding
    information.  This is commonly called a "hallucination".
-   There are many biases in the data that these systems were trained on, and
    thus they will produce biassed output based on that.
-   The fact that so many calculations are used in producing output means that
    large amounts of energy are needed to train and run these models.

It is unclear at the present whether these problems have good solutions.
Research is being done into each of these issues as we are in a "hype cycle" of
AI based around these LLM systems.



13.6 Comprehension Questions
----------------------------


1. Why are problems like recognizing faces harder for computers than problems
   like multiplying numbers?
2. What is an expert system and why are they no longer widely used?
3. Why is searching the entire tree of possible moves possible for the game of
   Tic-Tac-Toe but not for chess?
4. What is the difference between a deep neural network and a regular one?
5. Expert systems require humans to manually enter knowledge into a database.
   How is this different from the way a neural network "learns"? What are the
    trade-offs of each approach?
6. What are some of the downsides of solving problems with neural networks?


::: {.blackbox}
::: {.blackbox-title}
**Chapter Summary**
:::

::: {.blackbox-contents}
-   Artificial Intelligence (AI) seeks to solve problems which humans solve
    easily but cannot easily teach computers to solve because we don't seem to
    solve them algorithmically.
-   Expert systems were early AI systems which intended to encode knowledge into
    databases and have systems which harnessed that knowledge to make decisions.
    They were widely researched, but the fundamental difficulty is encoding
    knowledge in a way computers could use it effectively.
-   Many AI problems can be viewed as searching a space of possible solutions.
    This can be used for problems where this space is not too large, or can be
    effectively "pruned" to reduce its size.
-   Neural networks compute solutions using layers of "neurons" which are simple
    calculations based on inputs and weights.  The weights are computed using
    training data.
-   Despite being old technology, neural networks are being used widely because
    of a combination of more powerful hardware and lots training data available.
-   Large language models are a form of neural network trained to predict text
    based on large amounts of training data, primarily from the Internet.
-   Despite being widely used, these LLMs have many flaws which must be overcome
    before they should be used for important decision making.

:::
:::

