document.getElementById('eventForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const title = this.querySelector('input[type="text"]').value;
    const description = this.querySelector('textarea').value;
    const file = this.querySelector('input[type="file"]').files[0];
    const gallery = document.getElementById('eventGallery');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const mediaElement = file.type.startsWith('image/') 
                ? `<img src="${e.target.result}" alt="${title}">`
                : `<video src="${e.target.result}" controls></video>`;
            const eventItem = document.createElement('div');
            eventItem.innerHTML = `
                <h4>${title}</h4>
                <p>${description}</p>
                ${mediaElement}
            `;
            gallery.appendChild(eventItem);
        };
        reader.readAsDataURL(file);
        this.reset();
    }
});