document.addEventListener("DOMContentLoaded", function() {
    if (typeof treeLevels !== 'undefined' && treeLevels.length > 0) {
        const treeContainer = document.getElementById('tree-container');
        displayTree(treeLevels, treeContainer);
    }
});

function displayTree(levels, container) {
    levels.forEach((level, levelIndex) => {
        const levelContainer = document.createElement('div');
        levelContainer.className = 'children';
        levelContainer.style.position = 'relative';
        levelContainer.style.display = 'flex';
        levelContainer.style.justifyContent = 'center';

        level.forEach((node, nodeIndex) => {
            const nodeElement = document.createElement('div');
            nodeElement.className = 'node';
            nodeElement.style.position = 'relative';
            nodeElement.style.margin = '10px';
            nodeElement.textContent = `${node.key}: ${node.value}`;

            // Add lines to connect to child nodes
            if (levelIndex < levels.length - 1) {
                const leftChildIndex = nodeIndex * 2;
                const rightChildIndex = leftChildIndex + 1;

                if (leftChildIndex < levels[levelIndex + 1].length) {
                    const leftLineVertical = document.createElement('div');
                    leftLineVertical.className = 'line';
                    leftLineVertical.style.position = 'absolute';
                    leftLineVertical.style.top = '100%';
                    leftLineVertical.style.left = '50%';
                    leftLineVertical.style.transform = 'translateX(-50%)';
                    leftLineVertical.style.width = '2px';
                    leftLineVertical.style.height = '20px';
                    leftLineVertical.style.backgroundColor = '#333';
                    nodeElement.appendChild(leftLineVertical);

                    const leftLineHorizontal = document.createElement('div');
                    leftLineHorizontal.className = 'line';
                    leftLineHorizontal.style.position = 'absolute';
                    leftLineHorizontal.style.top = '120%';
                    leftLineHorizontal.style.left = '-50%';  // Adjust to connect to the child node
                    leftLineHorizontal.style.width = '50%';
                    leftLineHorizontal.style.height = '2px';
                    leftLineHorizontal.style.backgroundColor = '#333';
                    nodeElement.appendChild(leftLineHorizontal);
                }

                if (rightChildIndex < levels[levelIndex + 1].length) {
                    const rightLineVertical = document.createElement('div');
                    rightLineVertical.className = 'line';
                    rightLineVertical.style.position = 'absolute';
                    rightLineVertical.style.top = '100%';
                    rightLineVertical.style.left = '50%';
                    rightLineVertical.style.transform = 'translateX(-50%)';
                    rightLineVertical.style.width = '2px';
                    rightLineVertical.style.height = '20px';
                    rightLineVertical.style.backgroundColor = '#333';
                    nodeElement.appendChild(rightLineVertical);

                    const rightLineHorizontal = document.createElement('div');
                    rightLineHorizontal.className = 'line';
                    rightLineHorizontal.style.position = 'absolute';
                    rightLineHorizontal.style.top = '120%';
                    rightLineHorizontal.style.left = '50%';  // Adjust to connect to the child node
                    rightLineHorizontal.style.width = '50%';
                    rightLineHorizontal.style.height = '2px';
                    rightLineHorizontal.style.backgroundColor = '#333';
                    nodeElement.appendChild(rightLineHorizontal);
                }
            }

            levelContainer.appendChild(nodeElement);
        });

        container.appendChild(levelContainer);
    });
}