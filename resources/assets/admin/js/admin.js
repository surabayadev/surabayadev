/**
 * Used to setup jQuery, Bootstrap, Axios, & Any Global Helper
 */
require('./../../bootstrap')

/**
 * Start Bootstrap Library
 */
require('./sb-admin-2.min.js')


/**
 * Tooltip
 */
$('body *[data-toggle=tooltip]').tooltip({ boundary: 'window' })


/**
 * Sidebar
 */

// Check Sidebar LocalStorage Status
const sidebar = document.querySelector('#accordionSidebar')
if (localStorage.getItem('sidebarToggled') === 'true') {
  sidebar.classList.add('toggled')
} else {
  sidebar.classList.remove('toggled')
}

// Save sidebar action into the localStorage
const sidebarHandler = (e) => {
  localStorage.setItem('sidebarToggled', sidebar.classList.contains('toggled'))
}
document.querySelector('#sidebarToggle').addEventListener('click', sidebarHandler)
document.querySelector('#sidebarToggleTop').addEventListener('click', sidebarHandler)
