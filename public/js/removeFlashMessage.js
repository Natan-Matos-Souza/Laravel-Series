const flashMessage = document.querySelectorAll('.alert');

function removeFlashMessage(flashMessage)
{
    flashMessage.forEach(e => {
        e.style.display = 'none';
    });
}

if (flashMessage)
{
    setTimeout(() => {
        removeFlashMessage(flashMessage);
    }, 2 * 1000);
}