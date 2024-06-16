#include <iostream>
#include <fstream>
#include <unistd.h>
#include <string>
#include <sys/stat.h>
#include "BST.h"

using namespace std;

inline bool doesFileExist (const string& name) {
  struct stat buffer;
  return (stat (name.c_str(), &buffer) == 0);
}


//Main Function to print implementation results
int main(int argc, char *argv[]) {


	ifstream infile;
	BST<int, string> newTree;

	if(doesFileExist("includes/cContent/SelfOrganizingList/OutputData.txt")) {
            infile.open("includes/cContent/SelfOrganizingList/OutputData.txt");
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
			int integerKey = stoi(key);

			newTree.insert(integerKey, value);

		}

		//Close the File
		infile.close();
	}


	//Print function if file was not able to be opened
	else {
		cout << "Unable to open file";
	}


	//Calls functions to add threads to tree
//	newTree.setThreaded(newTree.getRoot());

//	//Remove Value at key
    for(int i = 1; i < argc; i++) {

        string arg = argv[i];

        size_t pos;
        int valueToRemove = stoi(arg, &pos);
        newTree.remove(valueToRemove);

    }

    newTree.print();
    cout << endl << endl;

	newTree.clear();

}