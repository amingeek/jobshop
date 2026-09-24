import '../css/app.css'

const sidebar = document.getElementById('mobileSidebar')
const overlay = document.getElementById('overlay')

window.openSidebar = function () {
    sidebar?.classList.remove('hidden')
    overlay?.classList.remove('hidden')
}

window.closeSidebar = function () {
    sidebar?.classList.add('hidden')
    overlay?.classList.add('hidden')
}
