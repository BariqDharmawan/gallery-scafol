//homepage
function galleryEditCaption(btnClicked) {
    const dataTarget = btnClicked.getAttribute('data-box-to-edit').replace('#', '');
    const boxTarget = document.querySelector('#' + '25');
    console.log(boxTarget);
    // boxTarget.setAttribute('contenteditable', 'true');
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
function currentNav(navId) {
    const current = window.location.href.split('#')[0];
    const nav = document.getElementById(navId);
    const navItem = nav.getElementsByTagName('a');
    for (let itemElement of navItem) {
        if(itemElement.href === current || itemElement.href === decodeURIComponent(current)) {
            // Tambahkan kelas 'active' pada tautan tersebut
            itemElement.classList.add("active");
        }
    }
}

currentNav('filter-category');
currentNav('navbarGallery');

const btnEditable = document.querySelectorAll('.editable-btn');
btnEditable.forEach(eachBtn => {
    // document.addEventListener('click', (event) => {
    //     const isClickOnBtnEdit = eachBtn.contains(event.target);
    //     if (!isClickOnBtnEdit) {
    //         document.querySelector(eachBtn.getAttribute('data-box-to-edit')).removeAttribute('contenteditable');
    //     }
    // });
    eachBtn.addEventListener('click', () => {
        console.log(eachBtn.getAttribute('data-box-to-edit'));
        galleryEditCaption(eachBtn);
        // positionCursor();
    });
});

const galleryItem = document.querySelectorAll('.gallery-item time');
galleryItem.forEach(gallery => {
    gallery.textContent = moment(gallery.textContent).fromNow();
});