# start by asking for 1
number = 1
answer = input("Did you guess 1?")

# keep doing the loop until the answer is yes
while answer != "yes":
    number = number + 1
    answer = input("Did you guess " + str(number) + "?")

# when we are done the loop it means we got it
print("Got it!")

