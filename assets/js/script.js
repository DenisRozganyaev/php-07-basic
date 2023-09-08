const notifyEl = document.getElementById('notify');

if (notifyEl) {
    setTimeout(() => {
        notifyEl.remove()
    }, 5000)
}
