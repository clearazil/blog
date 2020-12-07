'use strict';

const postsWithoutCategoryLink = document.querySelector(
    '#posts-without-category-link',
);

postsWithoutCategoryLink.onclick = (event) => {
    event.preventDefault();
    // do some ajax call
};

let categoryId;
const main = document.querySelector('#main');

document.addEventListener('click', (event) => {
    if (event.target &&
        event.target.classList.contains('category-link')
    ) {
        event.preventDefault();
        main.innerHTML = '<img src=/images/loading.gif>';
        categoryId = event.target.getAttribute('category-id');

        console.log(categoryId);

        fetch(route('home.index'), {
            headers: {
                'Accept': 'application/json, text-plain, */*',
                'X-Requested-With': 'XMLHttpRequest',
            },
            method: 'get',
        })
            .then((response) => {
                if (response.ok) {
                    return Promise.resolve(response);
                } else {
                    return Promise.reject(new Error('Failed to load'));
                }
            })
            .then((response) => {
                console.log(response);
                return response.text();
            }).then((data) => {
                main.innerHTML = data;
                console.log(data);
            }).catch((error) => {
                console.log(`Error: ${error.message}`);
            });
    }
});

