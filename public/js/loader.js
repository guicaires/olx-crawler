const body = document.querySelector('body');
const loader = document.querySelector('.loader');
const spinner = document.querySelector('.loader i');

const startLoader = () => {
    loader.style.right = '0%';
    spinner.style.right = '50%';
    body.style.overflow = 'hidden';
    body.classList.add('loading');
}

const stopLoader = () => {
    loader.style.right = '100%';
    spinner.style.right = '100%';
    body.style.overflow = '';
    body.classList.remove('loading');

    location = '#results';
}
