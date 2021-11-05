require('./bootstrap');

const deleteForm = document.querySelectorAll('.deleteForm');

deleteForm.forEach((el) => {
    el.addEventListener('submit', function(e) {
        console.log(el);
        let res = confirm('Delete Post?');
        if(!res) {
            e.preventDefault();
        }
    })
});
