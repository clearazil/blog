'use strict';

const postsWithoutCategoryLink = document.querySelector(
    '#posts-without-category-link',
);

postsWithoutCategoryLink.onclick = (event) => {
    event.preventDefault();

    const search = new URLSearchParams({
        uncategorized: 1,
    });

    displayPosts(search);
};

let categoryId;
const main = document.querySelector('#main');

/**
 *
 * @param {URLSearchParams} search
 */
function displayPosts(search) {
    main.innerHTML = '<img src=/images/loading.gif>';

    const url = new URL(route('home.index'));
    url.search = search;

    fetch(url, {
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
            return response.text();
        }).then((data) => {
            main.innerHTML = data;
        }).catch((error) => {
            main.innerHTML = '<p>Er is een fout opgetreden.</p>';
            console.log(`Error: ${error.message}`);
        });
}

document.addEventListener('click', (event) => {
    if (event.target &&
        event.target.classList.contains('category-link')
    ) {
        event.preventDefault();
        categoryId = event.target.getAttribute('category-id');
        const search = new URLSearchParams({
            categoryId: categoryId,
        });

        displayPosts(search);
    }
});

