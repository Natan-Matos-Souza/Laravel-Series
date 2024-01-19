const flashMessage = document.querySelector('.alert');

function removeFlashMessage(flashMessage)
{
    flashMessage.style.display = 'none';
}

if (flashMessage)
{
    setTimeout(() => {
        removeFlashMessage(flashMessage);
    }, 2 * 1000);
}