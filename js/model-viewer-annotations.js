const modelViewer = document.querySelector('#logo-spaces');


const checkbox = modelViewer.querySelector('#show-dimensions');
checkbox.addEventListener('change', () => {
    modelViewer.querySelectorAll('button').forEach((hotspot) => {
        if (checkbox.checked) {
            hotspot.classList.remove('hidden');
        } else {
            hotspot.classList.add('hidden');
        }
    });
});