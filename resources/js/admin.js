require('./bootstrap');

console.log('Scripts Admin')

const delForm = document.querySelectorAll('.delete-post-form');
console.log(delForm);

delForm.forEach(form => {
    form.addEventListener('submit', function (e) {
        const resp = confirm('Are you sure');
        console.log(resp);

        if (!resp) {
            e.preventDefault();
        }
    })
})
