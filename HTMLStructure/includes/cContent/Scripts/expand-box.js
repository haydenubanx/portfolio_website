function toggleCode() {
    console.log("Button clicked");
    const codeBox = document.getElementById('code-box');
    const button = document.querySelector('.toggle-button');
    if (codeBox.style.display === 'block') {
        codeBox.style.display = 'none';
        button.textContent = 'Show Code';
    } else {
        codeBox.style.display = 'block';
        button.textContent = 'Hide Code';
    }
}