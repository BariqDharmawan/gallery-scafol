//homepage
function galleryEditCaption(btnClicked) {
    const dataTarget = btnClicked.dataset.boxToEdit;
    const boxTarget = document.querySelector(dataTarget);
    const addAttr = document.createAttribute('contenteditable');

    addAttr.value = "true";
    boxTarget.setAttributeNode(addAttr);
}
function positionCursor() {

    const tag = document.getElementById("galleryCaption");

    // Creates range object 
    let setpos = document.createRange();

    // Creates object for selection 
    let set = window.getSelection();

    // Set start position of range 
    setpos.setStart(tag.childNodes[0], 12);

    // Collapse range within its boundary points 
    // Returns boolean 
    setpos.collapse(true);

    // Remove all ranges set 
    set.removeAllRanges();

    // Add range with respect to range object. 
    set.addRange(setpos);

    // Set cursor on focus 
    tag.focus();
}

const btnEditable = document.querySelectorAll('.editable-btn');
btnEditable.forEach(eachBtn => {
    document.addEventListener('click', (event) => {
        const isClickOnBtnEdit = eachBtn.contains(event.target) ||
            document.querySelector(eachBtn.dataset.boxToEdit).contains(event.target);
        if (isClickOnBtnEdit === false) {
            document.querySelector(eachBtn.dataset.boxToEdit).removeAttribute('contenteditable');
        }
    });
    eachBtn.addEventListener('click', () => {
        galleryEditCaption(eachBtn);
        positionCursor();
    });
});

const galleryItem = document.querySelectorAll('.gallery-item time');
galleryItem.forEach(gallery => {
    gallery.textContent = moment(gallery.textContent).fromNow();
});