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


	//Read data in from file and create node for each pair
    if(doesFileExist("HTMLStructure/includes/cContent/SelfOrganizingList/OutputData.txt") ) {
        infile.open("HTMLStructure/includes/cContent/SelfOrganizingList/OutputData.txt");

        if(infile.peek() == std::ifstream::traits_type::eof()) {
            infile.open("HTMLStructure/includes/cContent/SelfOrganizingList/InputData.txt");
        }
    }
    else {
        infile.open("HTMLStructure/includes/cContent/SelfOrganizingList/InputData.txt");
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

    for(int i = 1; i < argc; i+=2) {

        string argKey = argv[i];
        string argValue = argv[i+1];

        size_t pos;
        int keyToAdd = stoi(argKey, &pos);
        string valueToAdd = argValue;
        newTree.insert(keyToAdd, valueToAdd);

    }

    ofstream myfile;
    string outputContent = newTree.print();
    myfile.open ("HTMLStructure/includes/cContent/SelfOrganizingList/OutputData.txt");
    myfile << outputContent;
    myfile.close();



	newTree.clear();

}