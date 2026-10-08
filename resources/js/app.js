import '../css/app.css'

const sidebar = document.getElementById('mobileSidebar')
const overlay = document.getElementById('overlay')

window.openSidebar = function () {
    sidebar?.classList.remove('hidden')
    overlay?.classList.remove('hidden')
    document.body.style.overflow = 'hidden'
}

window.closeSidebar = function () {
    sidebar?.classList.add('hidden')
    overlay?.classList.add('hidden')
    document.body.style.overflow = ''
}

// Close the drawer with the Escape key.
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && sidebar && !sidebar.classList.contains('hidden')) {
        window.closeSidebar()
    }
})
