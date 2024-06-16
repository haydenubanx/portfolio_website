#include "book.h"
#include "BinNode.h"

#ifndef BSTNODE_H
#define BSTNODE_H

// Simple binary tree node implementation
template <typename Key, typename E>
class BSTNode : public BinNode<E> {
private:
    Key k;                  // The node's key
    E it;                   // The node's value
    BSTNode* lc;            // Pointer to left child
    BSTNode* rc;
    BSTNode* parent;            // Pointer to parent

    //Booleans for marking if BST node is threaded
    bool leftThreaded = false;
    bool rightThreaded = false;
    bool hasParent = false;

public:
    // Two constructors -- with and without initial values
    BSTNode() { lc = rc = NULL; }
    BSTNode(Key K, E e, BSTNode* l = NULL, BSTNode* r = NULL)
    {
        k = K; it = e; lc = l; rc = r;

    }
    ~BSTNode() {}             // Destructor

    // Functions to set and return the value and key
    E& element() { return it; }
    void setElement(const E& e) { it = e; }
    Key& key() { return k; }
    void setKey(const Key& K) { k = K; }

    // Functions to set and return the children
    inline BSTNode* left() const { return lc; }
    inline BSTNode* getParent() const { return parent; }

    void setLeft(BinNode<E>* b) {
        leftThreaded = true;
        lc = (BSTNode*)b;
    }
    inline BSTNode* right() const { return rc; }
    void setRight(BinNode<E>* b) {
        rightThreaded = true;
        rc = (BSTNode*)b;
    }

    void setParent(BinNode<E>* b) {
        parent = (BSTNode*)b; }

    // Return true if it is a leaf, false otherwise
    bool isLeaf() { return (lc == NULL) && (rc == NULL); }

    //Returns true if Node is left threaded
    bool getLeftThreaded() {
        return leftThreaded;
    }

    //Returns true if Node is right threaded
    bool getRightThreaded() {
        return rightThreaded;
    }


    //Sets threaded boolean value of left thread
    void setLeftThreaded(bool value) {
        leftThreaded = value;
    }

    //Sets threaded boolean value of right thread
    void setRightThreaded(bool value) {
        rightThreaded = value;
    }

    bool hasAParent() {
        return hasParent;
    }

    void setHasParentValue(bool parentValue) {
        hasParent = parentValue;
    }


    //Sets the left pointer to Null
    void clearLeftThread() {
        lc = NULL;
    }

    //Sets the right pointer to Null
    void clearRightThread() {
        rc = NULL;
    }


};

#endif