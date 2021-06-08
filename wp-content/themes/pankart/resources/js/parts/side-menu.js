export default class lastSong {
  static get selector() {
    return '.top'
  }
  constructor(element) {
    this.headerElt = element
    this.navElt = this.headerElt.querySelector('.top-nav')

    this.openButton = document.createElement('button')
    this.openButton.className = 'top__open-button'
    this.openButton.textContent = 'Menu'

    this.closeButton = document.createElement('button')
    this.closeButton.className = 'top-nav__close-button'
    this.closeButton.textContent = 'Fermer'

    this.isOpen = false
    this.init()
  }
  init() {
    if (window.innerWidth <= 1010) {
      this.addButton()
    } else {
      this.removeButton()
    }

    this.checkWidth()
  }
  checkWidth() {
    this.updateOpen()

    window.addEventListener('resize', e => {
      if (window.innerWidth <= 1010) {
        this.addButton()
      } else {
        this.removeButton()
      }
    })
    this.closeButton.addEventListener('click', e => {
      this.isOpen = false
      this.updateOpen()
    })
    this.openButton.addEventListener('click', e => {
      this.isOpen = true
      this.updateOpen()
    })

    this.navElt.addEventListener('focusin', e => {
      this.isOpen = true
      this.updateOpen()
    })
    this.navElt.addEventListener('focusout', e => {
      this.isOpen = false
      this.updateOpen()
    })
  }
  updateOpen() {
    if (this.isOpen) {
      this.navElt.classList.add('top-nav_open')
      //this.navElt.insertAdjacentElement('afterbegin', this.closeButton)
    } else {
      this.navElt.classList.remove('top-nav_open')
      //this.navElt.removeChild(this.closeButton)
    }
  }

  addButton() {
    if (!this.headerElt.contains(this.openButton)) {
      this.headerElt.insertAdjacentElement('beforeend', this.openButton)
    }
    if (!this.navElt.contains(this.closeButton)) {
      this.navElt.insertAdjacentElement('afterbegin', this.closeButton)
    }
  }
  removeButton() {
    if (this.headerElt.contains(this.openButton)) {
      this.headerElt.removeChild(this.openButton)
    }
    if (this.navElt.contains(this.closeButton)) {
      this.navElt.removeChild(this.closeButton)
    }
  }
}
