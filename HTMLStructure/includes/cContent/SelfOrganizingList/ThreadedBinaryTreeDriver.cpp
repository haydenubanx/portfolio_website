#include <iostream>
#include <fstream>
#include <string>
#include <sys/stat.h>
#include "BST.h"

using namespace std;

inline bool doesFileExist (const string& name) {
  struct stat buffer;
  return (stat (name.c_str(), &buffer) == 0);
}

//Main Function to print implementation results
int main() {


	ifstream infile;
	BST<int, string> newTree;

	//Test insert function with key value pairs
//	cout << "Using insert function to build binary tree \n";

	//Read data in from file and create node for each pair
        if(doesFileExist("includes/cContent/SelfOrganizingList/OutputData.txt")) {
            infile.open("includes/cContent/SelfOrganizingList/OutputData.txt");

            if(infile.peek() == std::ifstream::traits_type::eof()) {
                infile.open("includes/cContent/SelfOrganizingList/InputData.txt");
            }
        }
        else {
            infile.open("includes/cContent/SelfOrganizingList/InputData.txt");
        }


	//If the File opened correctly
	if (infile.is_open())
	{
		//Declare variables as strings to read with getline
		string key;
		string value;


		//While the eof marker has not been reached, read in from file
		while (!infile.eof())
		{

			//Read values from file
			getline(infile, key, ',');
			getline(infile, value, '\n');

			//convert key from string to int for inserting into tree
            if(key != "" && !(key.find("Left Child") != std::string::npos) && !(key.find("Right Child") != std::string::npos)) {
                int integerKey = stoi(key);
                newTree.insert(integerKey, value);
            }

			//Temporary Print Statement to print list items as added
//			cout << "Added: " << integerKey << ", " << value << endl;
		}

		//Close the File
		infile.close();
	}


	//Print function if file was not able to be opened
	else {
		cout << "Unable to open file";
	}

	//Adds threading
//	cout << "\n\nAdding Threads: \n";

	//Calls functions to add threads to tree
//	newTree.setThreaded(newTree.getRoot());

	//Print Size of tree
//	cout << "Binary tree is size: " << newTree.size() << endl << endl;


	//Print tree structure
//	cout << "\nNow Printing Tree Structure \n";

    ofstream myfile;
    string outputContent = newTree.print();
    myfile.open ("includes/cContent/SelfOrganizingList/OutputData.txt");
    myfile << outputContent;
    myfile.close();

	cout << endl << endl;


	//Testing the find function
//	cout << "Finding value at key 87: ";
//
//	cout << *newTree.find(87);
//
//	cout << endl << endl;


	//Display inorder printing
//	cout << "Now performing an inorder print \n";
//
//	newTree.printInorder();
//
//	cout << endl;
//
//	//Display reverse order printing
//	cout << "Now performing a reverse order print \n";
//
//	newTree.printReverse();
//
//	cout << endl;
//
//	//Remove Value at key
//	cout << "Removing value at key: 90\n";
//
//
//	cout << "Value " << *newTree.remove(90) << " removed" << endl << endl;


	//Remove Root value
//	cout << "Removing root value of: " << *newTree.removeAny() << endl << endl;
//
//	//Reprint Tree without removed values
//	cout << "\nReprinting Tree With Removed Values \n";
//
//	newTree.print();
//
//	cout << endl << endl;
//
//	//Clean up tree
//	cout << "Cleaning up tree with clear" << endl;

	newTree.clear();

}