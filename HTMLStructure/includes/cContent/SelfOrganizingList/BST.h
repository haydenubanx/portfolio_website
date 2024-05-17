// From the software distribution accompanying the textbook
// "A Practical Introduction to Data Structures and Algorithm Analysis,
// Third Edition (C++)" by Clifford A. Shaffer.
// Source code Copyright (C) 2007-2011 by Clifford A. Shaffer.

// This file includes all of the pieces of the BST implementation

// Include the node implementation
#include "BSTNode.h"

// Include the dictionary ADT
#include "dictionary.h"
#include <string>

#ifndef BST_H
#define BST_H

using namespace std;

// Binary Search Tree implementation for the Dictionary ADT
template <typename Key, typename E>
class BST : public Dictionary<Key, E> {
private:
    BSTNode<Key, E>* root;   // Root of the BST

    int nodecount;         // Number of nodes in the BST

    // Private "helper" functions
    void clearhelp(BSTNode<Key, E>*);
    BSTNode<Key, E>* inserthelp(BSTNode<Key, E>*,
        const Key&, const E&);
    BSTNode<Key, E>* deletemin(BSTNode<Key, E>*);
    BSTNode<Key, E>* getmin(BSTNode<Key, E>*);
    BSTNode<Key, E>* getmax(BSTNode<Key, E>*);
    BSTNode<Key, E>* removehelp(BSTNode<Key, E>*, const Key&);
    E* findhelp(BSTNode<Key, E>*, const Key&) const;
    void printhelp(BSTNode<Key, E>*, int) const;
    void vist(BSTNode<Key, E>*) const;

public:

    // Constructor
    BST() { root = NULL; nodecount = 0; }  

    //Note from Prof Sipantzi -- I've commented out the destructor
    //since you would have to change clearhelp() to make it work with
    //doubly-threaded trees and that is not part of the assignment.
    //~BST() { clearhelp(root); }            // Destructor

    //Returns the value of root
    BSTNode<Key, E>* getRoot() {
        return root;
    }

    //Traverses a tree to find node, while remembering previous node to find parent of that node
    BSTNode<Key, E>* getParent(BSTNode<Key, E>* childNode) {

        //Nodes to track the previous and current nodes
        BSTNode<Key, E>* previousNode = root;
        BSTNode<Key, E>* currentNode = root;


        //If the node to be searched for is the root, return root as there are no parents
        if (childNode->key() == root->key()) {
            return root;
        }

        //If the node is found, return the previous node which is it's parent
        else if (childNode->key() == currentNode->key()) {
            return previousNode;
        }

        

        //If the value of the child is less than the current node's value traverse left
        else if (childNode->key() < currentNode->key() && childNode != NULL){
            //While the key is not found, continue traversing
            while (childNode->key() != currentNode->key()) {

                //If the node to be searched for is greater than the current node
                if (childNode->key() > currentNode->key() && childNode != NULL) {
                  
                    //Set previous to the current node
                    previousNode = currentNode;

                    //Set the current node to the right child to traverse right
                    currentNode = currentNode->right();

                }
                else {
                 
                    //Otherwise traverse left
                    previousNode = currentNode;
                    currentNode = currentNode->left();
                }
               
            }
        }

        //If the value of the child is greater than the current node traverse right
        else if (childNode->key() > currentNode->key() && childNode != NULL){

            while (childNode->key() != currentNode->key()) {
                //If the node to be searched for is less than the current node
                if (childNode->key() < currentNode->key() && childNode != NULL) {
                  
                    //Traverse left
                    previousNode = currentNode;
                    currentNode = currentNode->left();
                }

                else {
                  
                    //Otherwise traverse right
                    previousNode = currentNode;
                    currentNode = currentNode->right();
                }
            }
            
        }

        //If the node is found, return the previous node which is it's parrent
        if (childNode->key() == currentNode->key()) {
            return previousNode;
        }
    }


    // Reinitialize tree
    void clear()   
    {
        //Calls clearhelp function to clear tree
        clearhelp(root); root = NULL; nodecount = 0;
    }

    // Insert a record into the tree.
    // k Key value of the record.
    // e The record to insert.
    void insert(const Key& k, const E& e) {
        root = inserthelp(root, k, e);
        nodecount++;
    }

    // Remove a record from the tree.
    // k Key value of record to remove.
    // Return: The record removed, or NULL if there is none.
    E* remove(const Key& k) {
        E* temp = findhelp(root, k);   // First find it
        if (temp != NULL) {
            root = removehelp(root, k);
            nodecount--;
        }
        return temp;
    }


    // Remove and return the root node from the dictionary.
    // Return: The record removed, null if tree is empty.
    E* removeAny() {  // Delete min value
        if (root != NULL) {
            E* temp = new E;
            *temp = root->element();
            root = removehelp(root, root->key());
            nodecount--;
            return temp;
        }
        else return NULL;
    }

    // Return Record with key value k, NULL if none exist.
    // k: The key value to find. */
    // Return some record matching "k".
    // Return true if such exists, false otherwise. If
    // multiple records match "k", return an arbitrary one.
    E* find(const Key& k) const { return findhelp(root, k); }

    // Return the number of records in the dictionary.
    int size() { return nodecount; }

    // Print the contents of the BST
    void print() const { 
        if (root == NULL) cout << "The BST is empty.\n";
        else printhelp(root, 0);
    }



    //Takes the root of the tree as input and sets threads on each node in the tree
    void setThreaded(BSTNode<Key, E>* currentNode) {

        //If the current node is not null, the tree is not empty
        if (currentNode != NULL) {

            //If the current left pointer is NUll, thread it
            if (currentNode->left() == NULL) {

                //Temporary variable to hold the left pointer. Initialized as the parent as it is the first to check when traversing
                BSTNode<Key, E>* leftPointerToSet = getParent(currentNode);

                //if the minimum value in the tree is the current node, do nothing as a left pointer is not needed
                if (getmin(root)->key() == currentNode->key());

                else {
                    //Otherwise if the current node is less than the temp variable
                    while (currentNode->key() < leftPointerToSet->key()) {

                        //Continue moving up levels in the tree until a greater value is found
                        leftPointerToSet = getParent(leftPointerToSet);
                    }

                    //Create a left thread to the node being pointed at by the temp variable
                    currentNode->setLeft(leftPointerToSet);

                    //Set the left threaded boolean to true
                    bool lthreaded = true;
                    currentNode->setLeftThreaded(lthreaded);

                    //Print confirmation
                    cout << "The left pointer at key " << currentNode->key() << " was set to point at " << leftPointerToSet->key() << endl;
                }
            }

            //If the current right pointer is NUll, thread it
            if (currentNode->right() == NULL) {

                //Temp variable to store right pointer object
                BSTNode<Key, E>* rightPointerToSet = getParent(currentNode);

               //If the current node is the max value do nothing as a right thread is not to be added
                if (getmax(root)->key() == currentNode->key());

                else {
                    //While the current node is greater than the pointer, continue traversing up the tree
                    while (currentNode->key() > rightPointerToSet->key() && rightPointerToSet->key() != root->key()) {
                        //Set the right pointer up a level 
                        rightPointerToSet = getParent(rightPointerToSet); 
                    }

                    //Thread the right pointer of the current node to the temp value and update the right thread boolean
                    currentNode->setRight(rightPointerToSet);
                    bool rthreaded = true;
                    currentNode->setRightThreaded(rthreaded);

                    //Print confirmation
                    cout << "The right pointer at key " << currentNode->key() << " was set to point at " << rightPointerToSet->key() << endl;
                }
            }


            //If not a threaded left pointer, continue left traversal
            if (!currentNode->getLeftThreaded() && getmin(root)->key() != currentNode->key()) {
                setThreaded(currentNode->left());
            }

            //If not a threaded right pointer, continue right traversal
            if (!currentNode->getRightThreaded() && getmax(root)->key() != currentNode->key()) {
                setThreaded(currentNode->right());
            }
        }
    }

    //Prints the tree with an inorder traversal
    void printInorder() {

        //Node to store position in array initialized to the smallest value
        BSTNode<Key, E>* currentNode = getmin(root);


        //If the tree is empty
        if (root == NULL) cout << "The BST is empty.\n";



        else {
            //Print the smallest element
            cout << currentNode->element() << "\n";

            //initialize counter
            int counter = 0;

            //Print element one less times than there are objects since smallest has already been printed
            for (int i = 0; i < size() - 1; i++) {

               
                //If a right thread exists, follow thread
                if (currentNode->getRightThreaded()) {
                    currentNode = currentNode->right();
                }

                //Otherwise traverse tree
                else {

                    //If there is a right pointer, follow it
                    if (currentNode->right() != NULL) {

                        //Set current node to the right pointer
                        currentNode = currentNode->right();

                        //While the left child is not empty and not a thread. This way left movements can be made after right movements
                        while (currentNode->left() != NULL && !currentNode->getLeftThreaded()) {
                            //Traverse left
                            currentNode = currentNode->left();
                        }

                    }

                }
                //Print element
                cout << currentNode->element() << "\n";
            }
        }
    }
    //Print tree with a reverse traversal
    void printReverse() {

        //Node to store position in array. Initialized to the largest element
        BSTNode<Key, E>* currentNode = getmax(root);

        //Print largest element in the tree
        cout << currentNode->element() << "\n";

        //Traverse through every item in the tree -1 since the largest element has already been printed
        for (int i = 0; i < size() - 1; i++) {

            //If there is a left thread, follow it
            if (currentNode->getLeftThreaded()) {
                //Follow left thread
                currentNode = currentNode->left();

                
            }

            else {
                //If there is a left pointer that is not a thread, follow it
                if (currentNode->left() != NULL) {

                    //Follow left pointer
                    currentNode = currentNode->left();

                    //While there are right nodes that are not threads, traverse right
                    while (currentNode->right() != NULL && !currentNode->getRightThreaded()) {
                        currentNode = currentNode->right();
                    }
                }
            }
            //Print element
            cout << currentNode->element() << "\n";
        }
    }

};

// Visit -- prints out root
template <typename Key, typename E>
void BST<Key, E>::vist(BSTNode<Key, E>* r) const {
    cout << "Node - " << r->element() << endl;
}

// Clean up BST by releasing space back free store
template <typename Key, typename E>
void BST<Key, E>::
clearhelp(BSTNode<Key, E>* root) {
    if (root == NULL) return;
    //If the root has a left thread
    if (root->getLeftThreaded()) {

        //Remove the thread and set the pointer to NULL
        root->clearLeftThread();

        //Update the left threaded Boolean to false
        bool threadedValue = false;

        root->setLeftThreaded(threadedValue);

    }
    //Otherwise clear left pointer
    else clearhelp(root->left());

    //If there is a right thread
    if (root->getRightThreaded()) {

        //Remove the thread and update the pointer to NULL
        root->clearRightThread();

        //Update the right Thread boolean to false
        bool threadedValue = false;

        root->setRightThreaded(threadedValue);

    }

    //Otherwise remove right pointer
    else clearhelp(root->right());
    //Delete root
    delete root;
}


// Insert a node into the BST, returning the updated tree
template <typename Key, typename E>
BSTNode<Key, E>* BST<Key, E>::inserthelp(
    BSTNode<Key, E>* root, const Key& k, const E& it) {

    // Empty tree: create node
        if (root == NULL)  
            return new BSTNode<Key, E>(k, it, NULL, NULL);

        //If the key is less than the root's key
        if (k < root->key()) {

            //If it is left threaded, it will be inserted here so set threaded boolean to false
            if (root->getLeftThreaded()) {

                bool boolToPass = false;
                root->setLeftThreaded(boolToPass);
            }
            //Insert into tree through recursive calls until location is found
            root->setLeft(inserthelp(root->left(), k, it));

        }
          
        else {


            //If it is right threaded, it will be insert here so set threaded boolean to false 
            if (root->getRightThreaded()) {

                bool boolToPass = false;
                root->setRightThreaded(boolToPass);
            }
            //Recursively make calls to right side of tree until position is found
            root->setRight(inserthelp(root->right(), k, it));
        }


        // Return tree with node inserted
        return root;       

}

// Delete the minimum value from the BST, returning the revised BST
template <typename Key, typename E>
BSTNode<Key, E>* BST<Key, E>::
getmin(BSTNode<Key, E>* rt) {
    //If the rt is Null do nothing because the tree is empty
    if (rt != NULL) {
        //If the left pointer is Null
        if (rt->left() == NULL)
            //return the root
            return rt;


        else {
            //Otherwise, if the node is not left threaded
            if (!rt->getLeftThreaded()) {
                //Traverse left until minimum is found
                return getmin(rt->left());
            }

            //Return updated root with minimum value
            return rt;            
        }
    }
}

//Returns the maximum value in the tree
template <typename Key, typename E>
BSTNode<Key, E>* BST<Key, E>::
getmax(BSTNode<Key, E>* rt) {
    //If the right pointer is null return the root
    if (rt->right() == NULL)
        return rt;


    else {
        //If the node is not right threaded
        if (!rt->getRightThreaded()) {
            //Recursively make calls until the maximum value is found
            return getmax(rt->right());
        }

        else {

            return rt;
        }
    }
}

//Delete the smallest value in the tree
template <typename Key, typename E>
BSTNode<Key, E>* BST<Key, E>::
deletemin(BSTNode<Key, E>* rt) {
    if (rt->getLeftThreaded() || rt->left() == NULL) // Found min
        return rt->right();
    else {                      // Continue left
        if (!rt->getLeftThreaded()) {
            rt->setLeft(deletemin(rt->left()));
        }
        return rt;
    }
    
}

// Remove a node with key value k
// Return: The tree with the node removed
template <typename Key, typename E>
BSTNode<Key, E>* BST<Key, E>::
removehelp(BSTNode<Key, E>* rt, const Key& k) {
    if (rt == NULL) return NULL;    // k is not in tree
    else if (k < rt->key())
        rt->setLeft(removehelp(rt->left(), k));
    else if (k > rt->key())
        rt->setRight(removehelp(rt->right(), k));
    else {                            // Found: remove it
        BSTNode<Key, E>* temp = rt;
        if (rt->left() == NULL) {     // Only a right child

            //If the root is right threaded
            if (rt->getRightThreaded()) {
                //Remove right thread and set pointer to NULL
                rt->clearRightThread();

                //Update threaded boolean
                bool tempToPass = false;
                rt->setRightThreaded(tempToPass);
            }

            //  so point to right
            rt = rt->right();         
            delete temp;
        }
        else if (rt->right() == NULL) { // Only a left child

            //If the node is left threaded
            if (rt->getLeftThreaded()) {
                //Remove the left thread and set left pointer to NULL
                rt->clearLeftThread();

                //Update left thread boolean
                bool tempToPass = false;
                rt->setLeftThreaded(tempToPass);
            }

            rt = rt->left();          //  so point to left
            delete temp;
        }
        else {                    // Both children are non-empty

            BSTNode<Key, E>* temp = getmin(rt->right());
            rt->setElement(temp->element());
            rt->setKey(temp->key());
            rt->setRight(deletemin(rt->right()));
            
            //If it is left threaded remove threads
            if (rt->getLeftThreaded()) {

                temp->setLeft(rt->left());
                rt->clearLeftThread();

                bool tempToPass = false;
                rt->setLeftThreaded(tempToPass);
            }

            //If right threaded remove threads
            if (rt->getRightThreaded()) {

                temp->setRight(rt->right());
                rt->clearRightThread();

                bool tempToPass = false;
                rt->setRightThreaded(tempToPass);
            }
                delete temp;
        }
    }
    return rt;
}

// Find a node with the given key value
template <typename Key, typename E>
E* BST<Key, E>::findhelp(BSTNode<Key, E>* root,
    const Key& k) const {
    if (root == NULL) return NULL;          // Empty tree

    //If the value is less than the root and not threaded, follow left pointer
    if (k < root->key() && !root->getLeftThreaded())
        return findhelp(root->left(), k);   // Check left

    //If the value is greater than the root and not threaded, follow right pointer
    else if (k > root->key() && !root->getRightThreaded())
        return findhelp(root->right(), k);  // Check right


    else {
        E* temp = new E;
        *temp = root->element();
        return temp;  // Found it
    }
}

// Print out a BST
template <typename Key, typename E>
void BST<Key, E>::
printhelp(BSTNode<Key, E>* root, int level) const {
    if (root == NULL) return;           // Empty tree

    //If not left threaded
    if (root != NULL && root->left() != NULL && !root->getLeftThreaded()) {
        printhelp(root->left(), level + 1);   // Do left subtree
    }
    
    for (int i = 0; i < level; i++)         // Indent to level
        cout << "  ";
    cout << root->key() << "\n";        // Print node value

    //If not right threaded
    if (root->right() != NULL && !root->getRightThreaded()) {
        printhelp(root->right(), level + 1);  // Do right subtree
    }
    
}

#endif