# import the math library for using the floor function
import math

# The merge sort function can be used to efficiently sort a list of unordered data
def merge_sort(this_list):
    # If the list is bigger than one element
    if len(this_list) > 1:
        middle = math.floor((len(this_list) / 2))
        # Create two sub arrays for each half of the list
        left_array = this_list[: middle]
        right_array = this_list[middle:]
        # Call merge sort on each of those arrays (Will run until list is of size 1)
        left_array = merge_sort(left_array)
        right_array = merge_sort(right_array)
        # Merge the arrays together
        this_list = merge(left_array, right_array)
    return this_list

# Function for merging two arrays together
def merge(array_one, array_two):
    merged_array = []
    counter_i = 0
    counter_j = 0
    # While both of the arrays are not empty, compare the elements of the array at the next index
    while counter_i < len(array_one) and counter_j < len(array_two):
        # Add the smallest of the elements at the front of the array to the merged list
        if array_one[counter_i] <= array_two[counter_j]:
            merged_array.append(array_one[counter_i])
            counter_i += 1
        else:
            merged_array.append(array_two[counter_j])
            counter_j += 1
    # Append values from the end of an array as they will always be sorted when the other array is empty
    while counter_j < len(array_two):
        merged_array.append(array_two[counter_j])
        counter_j += 1
    while counter_i < len(array_one):
        merged_array.append(array_one[counter_i])
        counter_i += 1
    return merged_array

# Main Program
unsorted_list = [13, 87, 56, 54, 34, 87, 234, 5, 9, 0, 45, 32, 12, 5, 65, 67, 89, 12, 35]
unsorted_list_2 = [5, 4, 3, 2, 1]
# Print Array One
print()
print("Unsorted List: \t", unsorted_list)
print("Sorted List: \t", merge_sort(unsorted_list))
# Print Array two
print()
print("Unsorted List: \t", unsorted_list_2)
print("Sorted List: \t", merge_sort(unsorted_list_2))
