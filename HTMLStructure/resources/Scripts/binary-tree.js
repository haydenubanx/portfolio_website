document.addEventListener("DOMContentLoaded", function() {
    if (typeof treeData !== 'undefined') {
        const treeContainer = document.getElementById('tree-container');
        buildAndDisplayTree(treeData, treeContainer);
    }
});

function buildAndDisplayTree(data, container) {
    const nodeMap = {};

    // First pass to create nodes
    data.forEach(node => {
        nodeMap[node.key] = {
            key: node.key,
            value: node.value,
            left: null,
            right: null
        };
    });

    // Second pass to connect nodes
    data.forEach(node => {
        if (node.children.left) {
            nodeMap[node.key].left = nodeMap[node.children.left];
        }
        if (node.children.right) {
            nodeMap[node.key].right = nodeMap[node.children.right];
        }
    });

    const rootKey = data[0].key;
    displayTree(nodeMap[rootKey], container);
}

function displayTree(node, container) {
    if (!node) return;

    // Create the node element
    const nodeElement = document.createElement('div');
    nodeElement.className = 'node';
    nodeElement.textContent = `${node.key}: ${node.value}`;
    container.appendChild(nodeElement);

    // Create a container for the children
    const childrenContainer = document.createElement('div');
    childrenContainer.className = 'children';
    container.appendChild(childrenContainer);

    // Recursively display the left and right children
    if (node.left) {
        const leftChildContainer = document.createElement('div');
        leftChildContainer.className = 'child';
        childrenContainer.appendChild(leftChildContainer);
        displayTree(node.left, leftChildContainer);

        // Draw the connection line to the left child
        const leftLine = document.createElement('div');
        leftLine.className = 'line vertical-line';
        leftLine.style.left = '25%';
        nodeElement.appendChild(leftLine);
    }

    if (node.right) {
        const rightChildContainer = document.createElement('div');
        rightChildContainer.className = 'child';
        childrenContainer.appendChild(rightChildContainer);
        displayTree(node.right, rightChildContainer);

        // Draw the connection line to the right child
        const rightLine = document.createElement('div');
        rightLine.className = 'line vertical-line';
        rightLine.style.left = '75%';
        nodeElement.appendChild(rightLine);
    }
}