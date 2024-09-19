class BinarySearchTree {
    constructor() {
        this.root = null;
    }

    insert(key, value) {
        const newNode = { key, value, left: null, right: null };
        if (!this.root) {
            this.root = newNode;
        } else {
            this._insertNode(this.root, newNode);
        }
    }

    _insertNode(node, newNode) {
        if (newNode.key < node.key) {
            if (!node.left) {
                node.left = newNode;
            } else {
                this._insertNode(node.left, newNode);
            }
        } else {
            if (!node.right) {
                node.right = newNode;
            } else {
                this._insertNode(node.right, newNode);
            }
        }
    }

    display() {
        return this._display(this.root);
    }

    _display(node, level = 0, result = '') {
        if (node) {
            result = this._display(node.right, level + 1, result);
            result += '\n' + ' '.repeat(level * 4) + node.key + ':' + node.value;
            result = this._display(node.left, level + 1, result);
        }
        return result;
    }
}