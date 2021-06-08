export default class lastSong {
  static get selector() {
    return '.top-nav__item_about'
  }
  constructor(element) {
    this.liElt = element
    this.subNavElt = this.liElt.querySelector('.sub-nav')
    this.hElt = this.liElt.querySelector('.top-nav__sub-title')
    this.isOpen = false
    this.init()
  }
  init() {
    //onclick
    this.hElt.addEventListener('click', e => {
      if (this.isOpen === false) {
        this.open()
        return
      } else {
        this.close()
      }
    })
    document.addEventListener('click', e => {
      if (!this.liElt.contains(e.target)) {
        this.close()
      }
    })
    //on focus
    this.liElt.addEventListener('focusin', e => {
      this.open()
    })
    this.liElt.addEventListener('focusout', e => {
      this.close()
    })

    this.update()
  }
  open() {
    this.isOpen = true
    this.update()
  }

  close() {
    this.isOpen = false
    this.update()
  }

  update() {
    if (this.isOpen === true) {
      this.subNavElt.classList.add('sub-nav_open')
    }
    if (this.isOpen === false) {
      this.subNavElt.classList.remove('sub-nav_open')
    }
  }
}
