export default class lastSong {
  static get selector() {
    return '.ls-nav'
  }
  constructor(element) {
    this.navElt = element
    this.buttonElt = this.navElt.querySelector('.ls-nav__button')
    this.listeElt = this.navElt.querySelector('.ls-nav__list')
    this.isOpen = false
    this.init()
  }
  init() {
    //onclick
    this.buttonElt.addEventListener('click', e => {
      this.open()
    })
    document.addEventListener('click', e => {
      if (!this.navElt.contains(e.target)) {
        this.close()
      }
    })
    //on focus
    this.navElt.addEventListener('focusin', e => {
      this.open()
    })
    this.navElt.addEventListener('focusout', e => {
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
      this.listeElt.style.transform = 'scale(1,1)'
    }
    if (this.isOpen === false) {
      this.listeElt.style.transform = 'scale(0,0)'
    }
  }
}
