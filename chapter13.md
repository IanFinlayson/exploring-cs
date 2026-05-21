# Artificial Intelligence

## Overview

Artificial Intelligence reminds many people of science fiction. It is
often defined as getting computers to simulate intelligent behavior as
found in humans.

Lots of the programs we have done sort of could be considered as having
intelligent behavior. Problems we have talked about like finding the
largest item in the list, finding sums and averages etc. *do* require
intelligence.

We can broadly classify problems that humans solve into two categories:

-   Problems we solve with algorithms. We have algorithms to do
    arithmetic, sort things, find the biggest and smallest items, do
    comparisons etc. These are problems that we can get computers to
    solve by translating the algorithms we use into code.
-   Problems that we solve without really knowing how we solve them.
    Here we can solve a problem (sometimes very easily) without actually
    knowing the process that we use to solve it. Some examples:
    -   Recognizing faces.
    -   Walking without falling over.
    -   Recognizing symbols.

AI is all about trying to get computers to solve these problems that
humans can solve without algorithms.

------------------------------------------------------------------------

## Expert Systems

One of the earliest types of AI programs were called \"expert systems\".
They were designed to solve problems where there is a lot of knowledge
about something required to solve a problem.

One example is diagnosis systems like WebMD. These systems ask you
questions about your symptoms and eventually give you a list of possible
causes for those symptoms. The hardest thing about problems like this is
not really the \"computation\" of the answer so much as having all of
the needed information in a way the program can understand it.

In these systems, the knowledge isn\'t encoded directly into the
program, but is stored in a file called a \"knowledge database\". For
example, there might be part of a knowledge database that distinguishes
cold symptoms vs. flu symptoms:

``` shell2
Fever : not Cold, maybe Flu
Sneezing : maybe Cold, unlikely Flu
```

The program would then read in all of the facts in this database and use
if/else statements to go through and find the likelihood of each
diagnosis. The actual program is not terribly difficult in these
systems.

Unfortunately, people underestimated how hard it would be to put in all
of the information in for the program to make use of, and expert systems
are not widely used any more.

------------------------------------------------------------------------

## Search

Another early approach to AI was to view the problem as a *search*
problem. When we think of \"search\" we might think of searching
literally, as in searching a list for a particular string.

But we can also search a set of possible solutions for the best one.
This can be done for problems where we have to weigh several different
options and choose the best one. A common example of this is turn-based
games.

For example in Tic-Tac-Toe, we can program a computer to \"search\" for
the best move at each step. We can represent the possible moves
spreading out like a tree:

![A graph of tic-tac-toe boards. At the top is an empty board. Spreading
down from that is boards in which one cell is filled in with an X.
Spreading down from that is boards in which two cells are filled in, the
X from the row above, and an O. This way the graph represents the space
of possible tic-tac-toe boards.](images/tictac.svg){width="70%"}

Here the computer is \'X\' and needs to pick its move. To do so it
searches forward through all the 9 possible moves it could make. For
each one, it keeps on searching through for each move the *opponent* can
make.

It will search through looking for ways it can win the game. It will
then choose the move which leads to the most winning states.

This works for Tic-Tac-Toe because there are not that many possible
moves. It\'s also impossible to get stuck in a *cycle* - that means you
can\'t keep a game going forever.

This is not true of another game, Chess, which was sort of the \"holy
grail\" for AI until 1997 in which the computer Deep Blue beat Gary
Kasparov, the reigning chess champion at that time.

In Chess, it is impossible to go through every possible move like this.
The number of chess configurations is estimated to be about
\$10\^{45}\$. Also, chess play *can* have cycles - we can move a piece
on one turn and then just move it back the next.

Deep Blue essentially works off a search algorithm, but it limits the
possible search space in a number of ways:

-   It doesn\'t follow a move all the way to the end. Instead it gives
    it a score after a few steps. If we capture a piece or get into a
    strong position, the move will get a positive score, even if we
    haven\'t won yet. If we lose a piece, we get a negative score.
-   It compares the current path to the best one seen so far. If an
    earlier path led us to gain a piece, we don\'t really need to
    consider paths that lead to a worse outcome.
-   It assumes intelligent play from the opponent. It is unlikely our
    opponent will sacrifice pieces needlessly. So we don\'t go down
    paths where they commit a thoughtless blunder.
-   It uses some knowledge to search the most likely good moves. For
    instance, if our king is under check, we would not really need to
    evaluate any moves that don\'t get him out of check.

These approaches are called \"pruning techniques\" because they
\"prune\" the \"tree\" of possible moves. These can be very effective as
evidenced by the success of Deep Blue.

------------------------------------------------------------------------

## Neural Networks

The most widely used, newer, form of AI is the *neural network*. These
are loosely based on the way that our brains process information. A
neural network consists of multiple layers of \"neurons\":

![The image depicts a typical netual network with three layers of
neurons, each represented with a circle. On the left is the input layer
of three neurons. In the middle is the hidden layer of four neurons, and
finally the output layer has two. Each input layer neuron connects to
each neuron in the hidden layer, and each in the hidden layer connects
to each output neuron.](images/neural.svg){width="50%"}

The input layer of neurons takes the input of the program, which is
represented as a series of numbers. As we have seen, all data a computer
deals with can be stored just as numbers.

The input layer then applies multiplies its value by some *weight*,
which is just another number, and passes it to the next layer.

Each subsequent layer takes in its inputs and computes new values based
on more weights. This allows each neuron to produce an output based on
its inputs in some way:

![Shows the way a neuron computes its value. The neuron has three inputs
with floating point numbers coming into it. Each of these has a weight
associated with it. Each value is multiplied by the corresponding
weight, and then summed, which forms the output of the
neuron.](images/neural2.svg){width="50%"}

At the output layer, the numbers are resolved back into an answer.

The big question now is, how do we figure out the weights? The answer is
*training*. A neural network is trained by giving it lots of examples
and seeing how well it does. The weights will start off randomly. When
the network gets an answer right, the weights that led to that decision
are increased. When it gets an answer wrong, those weights are
decreased.

This process of getting the computer to train on example data is called
*machine learning*. There are other machine learning techniques besides
neural networks.

Large neural networks with lots of layers are called \"deep\" networks.
\"Deep learning\" refers to using these networks with automatic
training.

Neural networks are very good at solving certain problems. All of the
following are most commonly done with neural nets:

-   Image recognition
-   Speech recognition
-   Language translation
-   Financial analysis
-   Recommendation systems
-   Game playing

In game playing, neural networks have eclipsed the classical search
techniques. For years the last game at which the best humans could beat
the best computers was the game \"Go\". In 2017, Google\'s \"Alpha
Zero\" beat the best Go players.

Later that year, the same technique was turned to chess. Alpha Zero beat
the best chess programs. It took Alpha Zero only 4 hours to go from
complete chess novice, moving the pieces randomly, to the best chess
player on Earth.

While very powerful, neural networks have some downsides:

-   We can\'t really understand how it\'s working. The \"algorithm\"
    used is not something we can comprehend, but rather just a jumble of
    numbers. Some AI workers hope to understand how our brains work
    through programs, but this is not really possible this way.
-   Their success is based totally on training data. If a new situation,
    not in the training, comes about, how will the AI behave?
-   Because they are based on training, it\'s possible human biases will
    creep in. Neural networks are being used for important decisions,
    like approving mortgages. If there is bias against certain groups in
    the training data, it can get permanently encoded into the AI.
