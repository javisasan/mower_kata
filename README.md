# Mower Kata

## How to Launch the Kata

In order to launch the test, we'll need **PHP version 7.1** installed in our machine.

Prepare the project with the following command in the root directory of the repository:

> php phars/composer.phar install

Make sure everything is ok launching all the test suite:

> php phars/phpunit.phar

There are two ways of launching the Mower Kata:

##### Launch through the Integration Test

Just launch the following command:

> php phars/phpunit.phar tests/Integration

The integration test will throw the kata using the file **INPUT_TEST_CASE.txt**. You
can change the input file within the same test, editing the test case.

#### Launch through the Init script

There's an script in the root folder of the repository which can be used to start the process:

> php init.php

When invoking this script without parameters, the file **INPUT_TEST_CASE.txt** will
be used as the default input file. But you can pass a file as a parameter in order to customize the
input of the test as shown:

> php init.php custom_test_case.txt

### Code Challenge

We need to develop an application that helps in controlling brand new mowers from our facility.
We have rolled out brand new robotic mowers that are able to cut the grass and to inspect
the terrain with their cameras to identify problems in the green areas.

Our facility has a lot of green spaces but for the MVP, we will consider only one
single green grass plateau to simply the problem.

A green grass plateau, which is curiously rectangular, must be navigated by the mowers so
they can cut the grass and that their on-board cameras can get a complete view of the
surrounding terrain to send to the Facility Maintenance Office.

A mower’s position and location are represented by a combination of X and Y coordinates
and a letter representing one of the four cardinal compass points (N, E, S, W). The plateau
is divided up into a grid to simplify navigation. An example position might be 0, 0, N, which
means the mower is in the bottom left corner and facing North.

In order to control a mower, the Facility Maintenance Office sends a simple string of letters. The
possible letters are “L”, “R” and ”M”. “L” and “R” make the mower spin 90 degrees left or
right respectively, without moving from its current spot. “M” means to move forward one
grid point and maintain the same Heading.

Assume that the square directly North from (X, Y) is (X, Y + 1).

### Input

The first line of input is the upper-right coordinates of the plateau, the bottom-left
coordinates are assumed to be 0, 0.

The rest of the input is information pertaining to the mowers that have been deployed.
Each mower has two lines of input. The first line gives the mower’s position, and the
second line is a series of instructions telling the mower how to explore the plateau. The
position is made up of two integers and a letter separated by spaces, corresponding to the
X and Y coordinates and the mower’s orientation.

Each mower will be finished sequentially, which means that the second mower won’t start
to move until the first one has finished moving.

### Output

The output for each mower should be its final coordinates and heading.

Input Test Case #1:

```
5 5
1 2 N
LMLMLMLMM
3 3 E
MMRMMRMRRM
```

Output Test Case #1:

```
1 3 N
5 1 E
```
