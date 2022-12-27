# loop from 0 to 100, going 5 at a time
for far in range(0, 101, 5):
    # do the conversion, and round it
    cel = (far - 32) * 5/9
    cel = round(cel, 2)

    # print one line of the table
    print(far, "degrees F =", cel, "degrees C")

